<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\LoaiLyThuyet;
use App\Models\CauHoi;
class LoaiLyThuyetController extends Controller
{
    //
    function getAllLLT(){
      
        return LoaiLyThuyet::all();
    }
    function insertLLT(Request $request){
        $loailythuyet = new LoaiLyThuyet();
        $loailythuyet->id=$request->id;
        $loailythuyet->TenLoaiLT=$request->TenLoaiLT;
        $loailythuyet->Icon=$request->Icon;
        $result=$loailythuyet->save();
        if($result)
        {
            echo 'Kết quả:'.'Thêm Loại lý thuyết thành công!';
        }
        else{
            echo 'Kết quả:'.'Thêm Loại lý thuyết thất bại!';
        }
    }
    function updateLLT(Request $request){
        $result = LoaiLyThuyet::where('id',$request->id)->update([
            'TenLoaiLT'=>$request->TenLoaiLT,
            'Icon'=>$request->Icon
         
        ]);
        if($result){
            echo "Kết quả:"."Cập nhật loại lý thuyết thành công!";
        }else{
            echo "Kết quả:"."Cập nhật loại lý thuyết thất bại!";
        }
    }
    function deleteLLT($id){
        $result = LoaiLyThuyet::where('id',$id)->delete();
        if($result)
        {
            echo 'Kết quả:'.'Xóa loại lý thuyết thành công!';
        }
        else{
            echo 'Kết quả:'.'Xóa loại lý thuyết thất bại!';
        }
    }
    function searchLLT($TenLoaiLT){
        return LoaiLyThuyet::where('TenLoaiLT','like',$TenLoaiLT.'%')->get();
    }
    function getCHbyLLT($id=null){
         
        return $id ? DB::table('loai_ly_thuyets')
        ->join('cau_hois','loai_ly_thuyets.id','=','cau_hois.id_LLT')
        ->where('loai_ly_thuyets.id',$id)
        ->get() : CauHoi::all();
        
    }
}
