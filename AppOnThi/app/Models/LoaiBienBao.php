<?php

namespace App\Models;
use App\Models\BienBao;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiBienBao extends Model
{
     use HasFactory;
     protected $fillable = ['TenLoaiBB'];
    public function bienbaos()
    {
        return $this->hasMany(BienBao::class);
    }
}
