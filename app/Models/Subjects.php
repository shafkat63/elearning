<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subjects extends Model
{
    public $timestamps = false;
    
    protected $table = 'subjects';

    protected $fillable = ['name', 'status','create_by','create_date','update_by','update_date']; 

}
