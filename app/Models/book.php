<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    protected $fillable = ['id_books','name','author','publisher','number_of_books','total_books'];
    public $primaryKey = 'id_books';
}

    