<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\userbaithi;

class userbaithiController extends Controller
{
    function getBTbyUser($id=null)
    {        
            // return $id ? DB::table('userbaithis')->select("id_BT","id")
            // ->where('id',$id)->get() : userbaithi::all();     
            
            return $id ? DB::table('bai_this')
            ->join('userbaithis','bai_this.id','=','userbaithis.id_BT')
            ->where('userbaithis.id',$id)
            ->get() : userbaithi::all();       
            }
 
} 
