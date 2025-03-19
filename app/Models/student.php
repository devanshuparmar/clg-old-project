<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['idstudents','name','course','semester','division','enrollment_number','email','password','contact_details','approval'];
    public $primaryKey = 'idstudents';
}