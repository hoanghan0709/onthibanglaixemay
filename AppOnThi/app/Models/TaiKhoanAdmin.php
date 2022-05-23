<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaiKhoanAdmin extends Model
{
    
    use HasFactory;

    protected $table = 'admin_users';
    protected $fillable = [
        'id',
        'username',
        'password',
        'name' 
    ];

    protected $primaryKey = 'id';

}
