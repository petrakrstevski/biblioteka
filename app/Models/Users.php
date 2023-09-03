<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;
    protected $table = 'users';

    public function users() {
        return $this->belongsToMany(Authors::class, 'rent', 'user_id', 'book_id');
    }
}
