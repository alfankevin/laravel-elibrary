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
        $billboard = Book::where('hero', 1)->orderByDesc('id')->get();
        $featured = Book::where('feat', 1)->orderByDesc('id')->get();
        $best = Book::where('quantity', Book::max('quantity'))->first();
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
            return redirect()->route('wishlist');
        } else {
            return redirect()->route('wishlist');
        }
    }

    public function delete($id)
    {
        $id_user = Auth::id();

        $exist = UserBook::where('id_user', $id_user)
            ->where('id_book', $id)
            ->where('wish', true)
            ->first();
        $exist->delete();

        return redirect()->route('wishlist');
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
    public function page($id)
    {
        $book = Book::findOrFail($id);
        $popular = Book::take(8)->get();
        
        return view('main.pages.page', [
            'book' => $book,
            'popular' => $popular,
        ]);
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('main.pages.file', ['book' => $book]);
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
