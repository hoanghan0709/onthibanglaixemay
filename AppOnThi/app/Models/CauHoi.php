<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BaiThi;
class CauHoi extends Model
{
    protected  $fillable = ['TenCH','HinhAnh','NoiDungCH','DapAnDung','DapAnA','DapAnB','DapAnC','DapAnD','GiaiThich','id_LLT'];
   // use HasFactory;
    public function bai_this()
    {
        return $this->belongsToMany(BaiThi::class);
    }
}
