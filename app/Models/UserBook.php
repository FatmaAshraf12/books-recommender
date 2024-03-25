<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBook extends Model
{
    protected $table = 'users_books';
    use HasFactory;

    protected $fillable = [
        'user_id',
        'book_id',
        'start_page',
        'end_page'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
