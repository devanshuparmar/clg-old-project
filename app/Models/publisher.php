<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class publisher extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['publisher_id','publisher_name'];
    public $primaryKey = 'publisher_id';

}

