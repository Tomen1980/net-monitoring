<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientModel extends Model
{
    protected $table = 'client';
    protected $guarded = [];
    public $timestamps = false;
}
