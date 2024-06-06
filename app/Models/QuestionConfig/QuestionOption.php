<?php

namespace App\Models\QuestionConfig;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionOption extends Model
{
    public $timestamps = false;
    
    protected $table = 'question_option';

    protected $fillable = ['id','questions_id','options','optionanser', 'status','create_by','create_date','update_by','update_date']; 
}
