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
        $book = DB::select('
            SELECT book.*, category.category
            FROM book
            INNER JOIN category
            ON book.id_category = category.id_category
            ORDER BY book.id ASC
            LIMIT 8;
        ');
        $banner = Book::orderByDesc('id')->take(2)->get();
        $featured = Book::orderByDesc('id')->take(4)->get();
        $popular = Book::where('quantity', Book::max('quantity'))->get();
        return view('main.main', compact('book', 'banner', 'featured', 'popular'));
    }

    public function booklist()
    {
        $book = Book::orderByDesc('id')->get();
        return view('main.pages.booklist', compact('book'));
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
