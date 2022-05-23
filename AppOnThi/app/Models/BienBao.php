<?php

namespace App\Models;
use App\Models\LoaiBienBao;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BienBao extends Model
{
    protected $fillable = ['TenBB','HinhAnhBB','NoiDungBB','id_LoaiBB'];
 
     use HasFactory;
    public function loaibienbaos()
    {
        return $this->hasMany(LoaiBienBao::class);
    }
}
