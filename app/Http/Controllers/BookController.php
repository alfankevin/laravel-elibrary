<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookRequest;
use App\Models\Category;

class BookController extends Controller
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
            ORDER BY book.id DESC;
        ');
        $category = Category::where('id_category', '!=', 1)->orderByDesc('id_category')->get();
        return view('admin.pages.book', compact('book', 'category'));
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
    public function store(StoreBookRequest $request)
    {
        Book::create([
            'id_category' => $request['id_category'],
            'cover' => $request['cover'],
            'title' => $request['title'],
            'description' => $request['description'],
            'quantity' => $request['quantity'],
            'file' => $request['file'],
        ]);

        return redirect(route('book.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id_book = $request['id'];
        $id_category = $request['id_category'];
        $cover = $request['cover'];
        $title = $request['title'];
        $description = $request['description'];
        $quantity = $request['quantity'];
        $file = $request['file'];

        Book::where('id', $id_book)
                ->update([
                    'id_category' => $id_category,
                    'cover' => $cover,
                    'title' => $title,
                    'description' => $description,
                    'quantity' => $quantity,
                    'file' => $file,
                ]);

        return redirect()->route('book.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('book.index');
    }
}
