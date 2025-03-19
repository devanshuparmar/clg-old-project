<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservation extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['reservation_id','student_id','student_uid','book_id','book_name','book_author','reservation_time','cancelled','status','time'];
    public $primaryKey = 'reservation_id';
}
