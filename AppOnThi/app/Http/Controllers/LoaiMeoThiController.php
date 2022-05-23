<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoaiMeoThi; 
use Illuminate\Support\Facades\DB;
class LoaiMeoThiController extends Controller
{
   
   //
   function getAllLMT(){
      
    return LoaiMeoThi::all();
}
function insertLBB(Request $request){
    $loaimeothi = new LoaiMeoThi();
    $loaimeothi->id=$request->id;
    $loaimeothi->TenMeoThi=$request->TenMeoThi;
     
    $result=$loaimeothi->save();
    if($result)
    {
        echo 'Kết quả:'.'Thêm Loại  thành công!';
    }
    else{
        echo 'Kết quả:'.'Thêm Loại  thất bại!';
    }
}
function updateLMT(Request $request){
    $result = LoaiMeoThi::where('id',$request->id)->update([
        'TenMeoThi'=>$request->TenMeoThi,
         
     
    ]);
    if($result){
        echo "Kết quả:"."Cập nhật loại lý thuyết thành công!";
    }else{
        echo "Kết quả:"."Cập nhật loại lý thuyết thất bại!";
    }
}
function deleteLMT($id){
    $result = LoaiMeoThi::where('id',$id)->delete();
    if($result)
    {
        echo 'Kết quả:'.'Xóa loại lý thuyết thành công!';
    }
    else{
        echo 'Kết quả:'.'Xóa loại lý thuyết thất bại!';
    }
}
function searchLMT($TenMeoThi){
    return LoaiMeoThi::where('TenMeoThi','like',$TenMeoThi.'%')->get();
  }
 
function getMTbyLMT($id=null)
{        
    return $id ? DB::table('meo_this')
    ->join('loai_meo_this','loai_meo_this.id','=','meo_this.id_LoaiMT')
    ->where('loai_meo_this.id',$id)
    ->get() : LoaiMeoThi::all();          
}
}
