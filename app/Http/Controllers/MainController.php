<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\UserBook;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $billboard = Book::where('hero', 1)->orderByDesc('updated_at')->get();
        $featured = Book::where('feat', 1)->orderByDesc('updated_at')->get();
        $best = Book::select('book.*')
            ->selectSub(function ($query) {
                $query->selectRaw('SUM(user_book.wish = true) + SUM(user_book.read = true)')
                    ->from('user_book')
                    ->whereColumn('book.id', 'user_book.id_book');
            }, 'total')
            ->join('user_book', 'book.id', '=', 'user_book.id_book')
            ->orderByDesc('total')
            ->first();
        $popular = Book::take(8)->get();
        
        return view('main.main', compact('billboard', 'featured', 'best', 'popular'));
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

    public function book($id)
    {
        $book = Book::findOrFail($id);
        $popular = Book::take(8)->get();
        
        return view('main.pages.page', [
            'book' => $book,
            'popular' => $popular,
        ]);
    }

    public function wishlist()
    {
        $id_user = Auth::id();

        $book = Book::select('book.*')
            ->join('user_book', 'book.id', '=', 'user_book.id_book')
            ->join('users', 'user_book.id_user', '=', 'users.id')
            ->where('user_book.id_user', $id_user)
            ->where('user_book.wish', true)
            ->orderByDesc('user_book.created_at')
            ->get();

        return view('main.pages.wishlist', compact('book'));
    }

    public function wish($id)
    {
        $id_user = Auth::id();

        $exist = UserBook::where('id_user', $id_user)
            ->where('id_book', $id)
            ->where('wish', true)
            ->first();

        if (!$exist) {
            $new = new UserBook();
            $new->id_user = $id_user;
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
        $id_user = Auth::id();

        $exist = UserBook::where('id_user', $id_user)
            ->where('id_book', $id)
            ->where('wish', true)
            ->first();
        $exist->delete();

        return redirect()->route('wishlist');
    }

    public function readlist()
    {
        $id_user = Auth::id();

        $book = Book::select('book.*')
            ->join('user_book', 'book.id', '=', 'user_book.id_book')
            ->join('users', 'user_book.id_user', '=', 'users.id')
            ->where('user_book.id_user', $id_user)
            ->where('user_book.read', true)
            ->orderByDesc('user_book.created_at')
            ->get();

        return view('main.pages.readlist', compact('book'));
    }
    
    public function read($id)
    {
        $id_user = Auth::id();
        $role = Auth::user()->role;
        $book = Book::findOrFail($id);

        if ($role === 'user') {
            $exist = UserBook::where('id_user', $id_user)
                ->where('role', '=', 'user')
                ->where('id_book', $id)
                ->where('read', true)
                ->first();
    
            if (!$exist) {
                $new = new UserBook();
                $new->id_user = $id_user;
                $new->id_book = $id;
                $new->read = true;
                $new->save();
    
                $book->quantity -= 1;
                $book->save();
            }
        }

        return view('main.pages.file', ['book' => $book]);
    }

    public function return($id)
    {
        $id_user = Auth::id();
        $book = Book::findOrFail($id);

        $exist = UserBook::where('id_user', $id_user)
            ->where('id_book', $id)
            ->where('read', true)
            ->first();
        $exist->delete();

        $book->quantity += 1;
        $book->save();

        return redirect()->route('readlist');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
