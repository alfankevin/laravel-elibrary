<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookRequest;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $book = Book::select('book.*', 'category.category')
            ->join('category', 'book.id_category', '=', 'category.id')
            ->orderByDesc('book.id')
            ->get();
    
        return view('admin.pages.book', compact('book'));
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
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();
            $path = 'assets/files/pdf';
            $file = $file->move($path, $fileName);
        }

        Book::create([
            'id_category' => $request['id_category'],
            'title' => $request['title'],
            'author' => $request['author'],
            'description' => $request['description'],
            'quantity' => $request['quantity'],
            'file' => $fileName,
            'cover' => $coverName,
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

        Book::where('id', $id_book)
            ->update([
                'id_category' => $id_category,
                'title' => $title,
                'author' => $author,
                'description' => $description,
                'quantity' => $quantity,
            ]);

        $book = Book::findorfail($id_book);
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
