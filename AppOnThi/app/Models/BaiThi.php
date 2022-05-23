<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CauHoi;
use App\Models\User;
class BaiThi extends Model
{
   // use HasFactory;
   protected $fillable = ['TenBT','Phut','Giay','Diem','KetQua'];
    public function cau_hois()
    {
        return $this->belongsToMany(CauHoi::class,'cauhoibaithis','id','id_CH');
    } 
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
