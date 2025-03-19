<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class author extends Model
{
    use HasFactory;
 
    public $timestamps = false;
    protected $fillable = ['author_id','author_name'];
    public $primaryKey = 'author_id';
    
}
