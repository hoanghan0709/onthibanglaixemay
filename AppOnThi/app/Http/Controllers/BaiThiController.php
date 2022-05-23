<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BaiThi;

class BaiThiController extends Controller
{
    //lấy all ds
    function getAll(){
         return BaiThi::all();
    }
    
    function insertBT (Request $request){
        $baithi = new BaiThi();
        $baithi->id=$request->id;
        $baithi->TenBT=$request->TenBT;
        $baithi->Phut=$request->Phut;
        $baithi->Giay=$request->Giay;
        $baithi->Diem=$request->Diem;
        $baithi->KetQua=$request->KetQua;
        $result=$baithi->save();
        if($request==true){
            return ["Kết quả:"=>"Thêm thành công!"];
        }else{
            return ["Kết quả:"=>"Thêm thất bại!"];
        }
    }
     
    function deleteBT($id){
        $result = BaiThi::where('id',$id)->delete();
         
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
    function updateBT(Request $request){
        $result = BaiThi::where('id',$request->id)->update([
            'TenBT'=>$request->TenBT,
            'Phut'=>$request->Phut,
            'Giay'=>$request->Giay,
            'Diem'=>$request->Diem,
            'KetQua'=>$request->KetQua
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
    function searchBT($TenBT){
        return BaiThi::where("TenBT","like",$TenBT."%")->get();
    }
    
}
