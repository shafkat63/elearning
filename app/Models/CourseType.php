<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseType extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'course_type';
    protected $fillable = [
        'name',
        'status',
        'create_by',
        'create_date',
        'update_by',
        'update_date'
    ];
}
