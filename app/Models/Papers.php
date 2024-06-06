<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Papers extends Model
{
    public $timestamps = false;
    
    protected $table = 'papers';

    protected $fillable = ['id','subject_id','name', 'status','create_by','create_date','update_by','update_date']; 
}
