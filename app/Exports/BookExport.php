<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;

class BookExport implements FromCollection, WithHeadings, WithStrictNullComparison
{
    public function collection()
    {
        $data = DB::table('book')
            ->select('book.id', 'book.title', 'book.author', 'category.category', 'book.description', 'book.quantity', 'book.file', 'book.cover')
            ->leftJoin('category', 'book.id_category', '=', 'category.id')
            ->get();
        return $data;
    }

    public function headings(): array
    {
        return [
            'id',
            'title',
            'author',
            'category',
            'description',
            'quantity',
            'file',
            'cover',
        ];
    }
}
