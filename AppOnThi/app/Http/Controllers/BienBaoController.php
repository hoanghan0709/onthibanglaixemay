<?php

namespace App\Http\Controllers;
use App\Models\BienBao;
use Illuminate\Http\Request;

class BienBaoController extends Controller
{
    function getAllBB(){
        return BienBao::all();
   }
   function insertBB (Request $request){
    $bienbao = new BienBao();
    $bienbao->id=$request->id;
    $bienbao->TenBB=$request->TenBB;
    $bienbao->NoiDungBB=$request->NoiDungBB;
    $bienbao->HinhAnhBB=$request->HinhAnhBB;
    $result=$bienbao->save();
    if($request==true){
        return ["Kết quả:"=>"Thêm thành công!"];
    }else{
        return ["Kết quả:"=>"Thêm thất bại!"];
    }
}
 
function getBB($id){
    $result = BienBao::where('id',$id)->get();
      if($result)
      {
          echo "Lấy thành công! " . $id;
      }
      else
      {
          echo "Lấy thất bại! " . $id;
      }
      return $result;
    }
function deleteBB($id){
    $result = BienBao::where('id',$id)->delete();
     
    if($result)
    {
        echo "Xóa thành công! " . $id;
    }
    else
    {
        echo "Xóa thất bại! " . $id;
    }
}

//put
function updateBB(Request $request){
    $result = BienBao::where('id',$request->id)->update([
        'TenBB'=>$request->TenBB,
        'HinhAnhBB'=>$request->HinhAnhBB,
        'NoiDungBB'=>$request->NoiDungBB
    ]); 
     if($result){
        return ["Kết quả:"=>"Cập nhật thành công!"];
    }else{
        return ["Kết quả:"=>"Cập nhật thất bại!"];
    }
}
// tìm kiếm theo tên BT
// function searchBT($TenBT){
//     return BaiThi::where("TenBT","like",$TenBT."%")->get();
// }
function searchBT($TenBB){
    return BienBao::where("TenBB","like",$TenBB."%")->get();
}

}
