<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamMaster extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'exam_master';
    protected $fillable = [
        'id',
        'student_id',
        'subject_id',
        'paper_id',
        'chapter_id',
        'status',
        'create_by',
        'create_date',
        'update_by',
        'update_date'
    ];


    

}
