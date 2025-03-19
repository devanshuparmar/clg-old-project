<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class issueBook extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['issue_id','student_id','book_id','book_name','book_author','librarian_id','issue_date','due_date','return_date','days_in_possession','fined'];
    public $primaryKey = 'issue_id';
}
