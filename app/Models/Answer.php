<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    // Specify the table name if it differs from the plural of the model name
    protected $table = 'answers';

    // Specify the primary key if it's not 'id'
    protected $primaryKey = 'id';

    // Specify the attributes that are mass assignable
    protected $fillable = [
        'student_id',
        'status',
        'exam_id',
        'question_id',
        'answer_id',
        'solution_id',
    ];
}
