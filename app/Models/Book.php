<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'read_intervals',
        'num_of_read_pages'    ];
        
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
