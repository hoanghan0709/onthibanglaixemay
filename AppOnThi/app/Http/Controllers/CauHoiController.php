<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CauHoi;
class CauHoiController extends Controller
{
    function getAllCH(){
         
        return CauHoi::all();
    }
    function insertCH(Request $request){
        $cauhoi = new CauHoi();
        $cauhoi->id=$request->id;
        $cauhoi->TenCH=$request->TenCH;
        $cauhoi->NoiDungCH=$request->NoiDungCH;
        $cauhoi->DapAnDung=$request->DapAnDung;
        $cauhoi->DapAnLiet=$request->DapAnLiet;
        $cauhoi->HinhAnh=$request->HinhAnh;
        $cauhoi->DapAnA=$request->DapAnA;
        $cauhoi->DapAnB=$request->DapAnB;
        $cauhoi->DapAnC=$request->DapAnC;
        $cauhoi->DapAnD=$request->DapAnD;
        $cauhoi->GiaiThich=$request->GiaiThich;
        $cauhoi->id_LLT=$request->id_LLT;
        $result=$cauhoi->save();
        if($request==true){
            return ["Kết quả:"=>"Thêm câu hỏi thành công!"];
        }else{
            return ["Kết quả:"=>"Thêm câu hỏi thất bại!"];
        }
    }
    function deleteCH($id){
        $result = CauHoi::where('id',$id)->delete();
        if($result){
            echo "Kết quả:"."Xóa câu hỏi thành công!";
        }
        else{
            echo "Kết quả:"."Xóa câu hỏi thất bại!";
        }
    }
    function updateCH(Request $request){
        $result = CauHoi::where('id',$request->id)->update([
            'TenCH'=>$request->TenCH,
            'NoiDungCH'=>$request->NoiDungCH,
            'DapAnDung'=>$request->DapAnDung, 
            'HinhAnh'=>$request->HinhAnh, 
            'DapAnA'=>$request->DapAnA,
            'DapAnB'=>$request->DapAnB,
            'DapAnC'=>$request->DapAnC,
            'DapAnD'=>$request->DapAnD,
            'GiaiThich'=>$request->GiaiThich,
            'id_LLT'=>$request->id_LLT
        ]);
        if($result){
            echo "Kết quả:"."Cập nhật câu hỏi thành công!";
        }else{
            echo "Kết quả:"."Cập nhật câu hỏi thất bại!";
        }
    }
    function searchCH($TenCH){
            return CauHoi::where('TenCH','like',$TenCH.'%')->get();
          //  return BaiThi::where("TenBT","like",$TenBT."%")->get();
    }
     
}
