<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    public $timestamps = false;
    
    protected $table = 'content';

    protected $fillable = ['content_name', 'content_details']; 
}
