<?php

namespace App\Models\QuestionConfig;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public $timestamps = false;
    
    protected $table = 'questions';

    protected $fillable = ['id','subject_id','paper_id','chapter_id','question_name', 'status','create_by','create_date','update_by','update_date']; 

    public function questionAnswers()
    {
        return $this->hasMany(QuestionOption::class, 'questions_id');
    }


}
