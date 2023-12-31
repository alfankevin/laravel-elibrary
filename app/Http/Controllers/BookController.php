<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookRequest;

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
        $category = Category::orderByDesc('id_category')->get();
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
        if ($request->hasFile('cover')) {
            // $cover = $request->file('cover')->store('cover', 'public'); // Storage
            $cover = $request->file('cover');
            $coverName = $cover->getClientOriginalName();
            $path = 'assets/files/image';
            $cover = $cover->move($path, $coverName);
        }

        Book::create([
            'id_category' => $request['id_category'],
            'title' => $request['title'],
            'author' => $request['author'],
            'description' => $request['description'],
            'quantity' => $request['quantity'],
            'file' => $request['file'],
            'cover' => $cover,
        ]);

        return redirect()->route('book.index');
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
        $title = $request['title'];
        $author = $request['author'];
        $description = $request['description'];
        $quantity = $request['quantity'];
        $file = $request['file'];
        $cover = $request['cover'];

        Book::where('id', $id_book)
                ->update([
                    'id_category' => $id_category,
                    'title' => $title,
                    'author' => $author,
                    'description' => $description,
                    'quantity' => $quantity,
                    'file' => $file,
                    'cover' => $cover,
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
