<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;
    protected $table = 'book';
    public function author() {
        return $this->belongsToMany(Authors::class, 'author_has_book', 'book_id', 'author_id');
    }
    public function category() {
        return $this->belongsTo(Categories::class,'category_id','id')->select(['id', 'title']);
    }
}
