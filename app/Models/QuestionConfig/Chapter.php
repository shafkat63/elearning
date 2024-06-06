<?php

namespace App\Models\QuestionConfig;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    public $timestamps = false;
    
    protected $table = 'chapters';

    protected $fillable = ['id','subject_id','paper_id','name', 'status','create_by','create_date','update_by','update_date']; 
}
