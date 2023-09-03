<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    use HasFactory;
    protected $table = 'rent';

    const CREATED_AT = 'issue_date';
    const UPDATED_AT = null;

    // public function knigi() {
    //     return $this->belongsToMany(Books::class, 'rent', 'user_id', 'book_id');
    // }
}

