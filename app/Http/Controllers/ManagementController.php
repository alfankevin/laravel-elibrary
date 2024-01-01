<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Exports\BookExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ManagementController extends Controller
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
            ON book.id_category = category.id
            ORDER BY book.id DESC;
        ');
        return view('admin.pages.management', compact('book'));
    }

    public function export()
    {
        return Excel::download(new BookExport, 'books.xlsx');
    }

    public function billboard($id)
    {
        $book = Book::findorfail($id);

        if ($book->hero) {
            $book->hero = false;
        } else {
            $book->hero = true;
        }

        $book->save();

        return response()->json(['message' => 'Success']);
    }

    public function featured($id)
    {
        $book = Book::findorfail($id);

        if ($book->feat) {
            $book->feat = false;
        } else {
            $featCount = Book::where('feat', true)->count();
            if ($featCount >= 4) {
                return response()->json(['message' => 'Only 4 featured book'], 422);
            }
            $book->feat = true;
        }

        $book->save();

        return response()->json(['message' => 'Success']);
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
