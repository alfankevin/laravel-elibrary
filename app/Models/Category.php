<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'category';
    protected $guarded = ['id_category'];
    protected $primaryKey = 'id_category';

    public function book() {
        return $this->hasMany(Book::class);
    }
}
