<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class librarian extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['lib_id','name','email','password'];
    public $primaryKey = 'lib_id';
}
