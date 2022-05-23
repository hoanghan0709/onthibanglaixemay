<?php

namespace App\Http\Controllers;

use App\Models\MeoThi;
use Illuminate\Http\Request;

class MeoThiController extends Controller
{
    function getAllMT(){
        return MeoThi::all();
   }    
   function getMT($id){
  $result = MeoThi::where('id',$id)->get();
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
   function insertMT (Request $request){
    $meothi = new MeoThi();
    $meothi->id=$request->id;
    $meothi->NoiDung=$request->NoiDung;
    $meothi->Ten=$request->Ten;
    $result=$meothi->save();
    if($request==true){
        return ["Kết quả:"=>"Thêm thành công!"];
    }else{
        return ["Kết quả:"=>"Thêm thất bại!"];
    }
}
 
function deleteMT($id){
    $result = MeoThi::where('id',$id)->delete();
     
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
function updateMT(Request $request){
    $result = MeoThi::where('id',$request->id)->update([
        'NoiDung'=>$request->NoiDung,
        'Ten'=>$request->Ten

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
function searchMT($Ten){
    return MeoThi::where("NoiDung","like",$Ten."%")->get();
}
}
