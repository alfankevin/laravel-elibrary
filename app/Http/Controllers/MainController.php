<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banner = Book::orderByDesc('id')->take(2)->get();
        $featured = Book::orderByDesc('id')->take(4)->get();
        $best = Book::where('quantity', Book::max('quantity'))->first();
        $popular = DB::select('
            SELECT book.*, category.category
            FROM book
            INNER JOIN category
            ON book.id_category = category.id
            ORDER BY book.id ASC
            LIMIT 8;
        ');
        
        return view('main.main', compact('banner', 'featured', 'best', 'popular'));
    }

    public function booklist()
    {
        $book = Book::orderByDesc('id')->get();
        return view('main.pages.booklist', compact('book'));
    }

    public function wishlist()
    {
        $book = Book::orderByDesc('id')->get();
        return view('main.pages.wishlist', compact('book'));
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
        $popular = DB::select('
            SELECT book.*, category.category
            FROM book
            INNER JOIN category
            ON book.id_category = category.id
            ORDER BY book.id ASC
            LIMIT 8;
        ');
        
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
