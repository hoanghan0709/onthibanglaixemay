<?php

namespace App\Http\Controllers;
use App\Models\LoaiBienBao; 
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
class LoaiBienBaoController extends Controller
{
   //
   function getAllLBB(){
      
    return LoaiBienBao::all();
}
function insertLBB(Request $request){
    $loaibienbao = new LoaiBienBao();
    $loaibienbao->id=$request->id;
    $loaibienbao->TenLoaiBB=$request->TenLoaiBB;
     
    $result=$loaibienbao->save();
    if($result)
    {
        echo 'Kết quả:'.'Thêm Loại lý thuyết thành công!';
    }
    else{
        echo 'Kết quả:'.'Thêm Loại lý thuyết thất bại!';
    }
}
function updateLBB(Request $request){
    $result = LoaiBienBao::where('id',$request->id)->update([
        'TenLoaiBB'=>$request->TenLoaiBB,
         
     
    ]);
    if($result){
        echo "Kết quả:"."Cập nhật loại lý thuyết thành công!";
    }else{
        echo "Kết quả:"."Cập nhật loại lý thuyết thất bại!";
    }
}
function deleteLBB($id){
    $result = LoaiBienBao::where('id',$id)->delete();
    if($result)
    {
        echo 'Kết quả:'.'Xóa loại lý thuyết thành công!';
    }
    else{
        echo 'Kết quả:'.'Xóa loại lý thuyết thất bại!';
    }
}
function searchLBB($TenLoaiBB){
    return LoaiBienBao::where('TenLoaiBB','like',$TenLoaiBB.'%')->get();
  }
// function getCHbyLBB($id=null){
     
//     return $id ? DB::table('loai_ly_thuyets')
//     ->join('cau_hois','loai_ly_thuyets.id','=','cau_hois.id_LLT')
//     ->where('loai_ly_thuyets.id',$id)
//     ->get() : CauHoi::all();
    
// }

function getBBbyLBB($id=null)
{        
    return $id ? DB::table('bien_baos')
    ->join('loai_bien_baos','loai_bien_baos.id','=','bien_baos.id_LoaiBB')
    ->where('loai_bien_baos.id',$id)
    ->get() : LoaiBienBao::all();          
}
}
