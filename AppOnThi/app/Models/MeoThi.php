<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeoThi extends Model
{
    protected $fillable = ['Ten','NoiDung','id_LoaiMT' ];
    use HasFactory;
}
