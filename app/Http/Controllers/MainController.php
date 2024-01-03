<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\UserBook;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StoreBookRequest;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $billboard = Book::where('hero', 1)->orderByDesc('updated_at')->get();
        $featured = Book::where('feat', 1)->orderByDesc('updated_at')->get();
        $popular = Book::where('id_user', 1)->orderByDesc('updated_at')->take(8)->get();
        $best = Book::select('book.*')
            ->selectSub(function ($query) {
                $query->selectRaw('SUM(user_book.wish = true) + SUM(user_book.read = true)')
                    ->from('user_book')
                    ->whereColumn('book.id', 'user_book.id_book');
            }, 'total')
            ->join('user_book', 'book.id', '=', 'user_book.id_book')
            ->orderByDesc('total')
            ->first();
        
        return view('main.main', compact('billboard', 'featured', 'popular', 'best'));
    }

    public function book($id)
    {
        $book = Book::findOrFail($id);
        $popular = Book::where('id_user', 1)->orderByDesc('updated_at')->take(8)->get();
        
        return view('main.pages.page', compact('book', 'popular'));
    }

    public function booklist(Request $request)
    {
        $search = $request->input('search');

        $book = $search 
            ? Book::where('title', 'like', '%'.$search.'%')
                   ->orWhere('author', 'like', '%'.$search.'%')
                   ->orderByDesc('id')
                   ->get()
            : Book::orderByDesc('id')->get();
    
        return view('main.pages.booklist', compact('book'));
    }

    public function filter($category)
    {
        $book = Book::join('category', 'book.id_category', '=', 'category.id')
            ->where('category.category', $category)
            ->get();
        
        return view('main.pages.booklist', compact('book'));
    }

    public function wishlist()
    {
        $book = Book::select('book.*')
            ->join('user_book', 'book.id', '=', 'user_book.id_book')
            ->join('users', 'user_book.id_user', '=', 'users.id')
            ->where('user_book.id_user', auth()->user()->id)
            ->where('user_book.wish', true)
            ->orderByDesc('user_book.created_at')
            ->get();

        return view('main.pages.wishlist', compact('book'));
    }

    public function wish($id)
    {
        $exist = UserBook::where('id_user', auth()->user()->id)
            ->where('id_book', $id)
            ->where('wish', true)
            ->first();

        if (!$exist) {
            $new = new UserBook();
            $new->id_user = auth()->user()->id;
            $new->id_book = $id;
            $new->wish = true;
            $new->save();

            return back();
        } else {
            return redirect()->route('wishlist');
        }
    }

    public function remove($id)
    {
        $exist = UserBook::where('id_user', auth()->user()->id)
            ->where('id_book', $id)
            ->where('wish', true)
            ->first();
        $exist->delete();

        return redirect()->route('wishlist');
    }

    public function readlist()
    {
        $book = Book::select('book.*')
            ->join('user_book', 'book.id', '=', 'user_book.id_book')
            ->join('users', 'user_book.id_user', '=', 'users.id')
            ->where('user_book.id_user', auth()->user()->id)
            ->where('user_book.read', true)
            ->orderByDesc('user_book.created_at')
            ->get();

        return view('main.pages.readlist', compact('book'));
    }
    
    public function read($id)
    {
        $book = Book::findOrFail($id);

        if (Auth::user()->role === 'user' && $book->quantity > 0 && $book->id_user != Auth::user()->id) {
            $exist = UserBook::where('id_user', auth()->user()->id)
                ->where('id_book', $id)
                ->where('read', true)
                ->first();
    
            if (!$exist) {
                $new = new UserBook();
                $new->id_user = auth()->user()->id;
                $new->id_book = $id;
                $new->read = true;
                $new->save();
    
                $book->quantity -= 1;
                $book->save();
            }

            return view('main.pages.file', compact('book'));
        } else if ($book->id_user == Auth::user()->id || Auth::user()->role === 'admin') {
            return view('main.pages.file', compact('book'));
        } else {
            return back();
        }
    }

    public function return($id)
    {
        $book = Book::findOrFail($id);

        $exist = UserBook::where('id_user', auth()->user()->id)
            ->where('id_book', $id)
            ->where('read', true)
            ->first();
        $exist->delete();

        $book->quantity += 1;
        $book->save();

        return redirect()->route('readlist');
    }

    public function mybook()
    {
        $book = Book::where('id_user', auth()->user()->id)->orderByDesc('created_at')->get();

        return view('main.pages.mybook', compact('book'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::orderByRaw("SUBSTRING(category, 1, 1)")
            ->orderBy('category')
            ->get();

        return view('main.pages.upload', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        if ($request->hasFile('cover')) {
            $cover = $request->file('cover');
            $coverName = $cover->getClientOriginalName();
            $path = 'assets/files/image';
            $cover = $cover->move($path, $coverName);
        }
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();
            $path = 'assets/files/pdf';
            $file = $file->move($path, $fileName);
        }

        Book::create([
            'id_user' => auth()->user()->id,
            'id_category' => $request['id_category'],
            'title' => $request['title'],
            'author' => $request['author'],
            'description' => $request['description'],
            'quantity' => $request['quantity'],
            'file' => $fileName,
            'cover' => $coverName,
        ]);

        return redirect()->route('mybook');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $book = Book::where('id', $id)->first();
        $category = Category::orderByRaw("SUBSTRING(category, 1, 1)")
            ->orderBy('category')
            ->get();

        if ($book->id_user == auth()->user()->id) {
            return view('main.pages.update', compact('book', 'category'));
        } else {
            return back();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $book = Book::findorfail($id);

        $id_category = $request['id_category'];
        $title = $request['title'];
        $author = $request['author'];
        $description = $request['description'];
        $quantity = $request['quantity'];

        Book::where('id', $id)
            ->update([
                'id_category' => $id_category,
                'title' => $title,
                'author' => $author,
                'description' => $description,
                'quantity' => $quantity,
            ]);

        if ($request->hasFile('cover')) {

            $path = 'assets/files/image/'. $book->cover;
            if(file_exists($path)) {
                File::delete($path);
            }

            $cover = $request->file('cover');
            $coverName = $cover->getClientOriginalName();
            $path = 'assets/files/image/';
            $cover = $cover->move($path, $coverName);
            $book->cover = $coverName;
        }
        if ($request->hasFile('file')) {

            $path = 'assets/files/pdf/'. $book->file;
            if(file_exists($path)) {
                File::delete($path);
            }

            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();
            $path = 'assets/files/pdf/';
            $file = $file->move($path, $fileName);
            $book->file = $fileName;
        }
        $book->update();

        return redirect()->route('mybook');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $book = Book::findorfail($id);
        $book->delete();
        
        return back();
    }
}
