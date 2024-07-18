<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlokModel extends Model
{
    protected $table = 'blok';
    protected $guarded = ['id'];
    
    public $timestamps = false;
}
