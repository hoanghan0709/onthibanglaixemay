<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\cauhoibaithi;
use App\Models\BaiThi;
 
class CauHoiBaiThiController extends Controller
{
    function getAllCHBT(){
          return cauhoibaithi::all();
    }
    // function insertCHBT(Request $request){
        
    //     $cauhoibaithi = new cauhoibaithi();
    //     $cauhoibaithi->id=$request->id;
    //     $cauhoibaithi->id_CH=$request->id_CH;
    //     $result=$cauhoibaithi->save();
    //     if($result){
    //         echo 'Kết quả:'."Thêm câu hỏi bài tập thành công!";
    //     }else{
    //         echo 'Kết quả:'.'Thêm câu hỏi bài tập thất bại';
    //     }     
    // }
   
    
    function insertCHBTList(Request $request){
       // $cauhoi = new cauhoibaithi();
        $cauhoi = $request->id_CH; // retur nlist
         //$baithi = new cauhoibaithi();
         $baithi = $request->id;
        //var_dump( $cauhoi);
       // var_dump( $baithi);
       $arrIdCH = explode(",",$cauhoi);
       echo var_dump($arrIdCH)."thank you <br>";
    //    echo $arrIdCH[0]."thank you <br>";
    //    echo $arrIdCH[1]."thank you <br>";
        for($i=0;$i<count($arrIdCH);$i++)
         {
            //var_dump($arrIdCH[$i]);
            $cauhoibaithi = new cauhoibaithi();
            $cauhoibaithi->id_CH=(int)$arrIdCH[$i];
            //var_dump($arrIdCH[$i]);
            $cauhoibaithi->id=(int)$baithi;
            $result=$cauhoibaithi->save();
            if(!$result){
                return false;
            }
         }
         return true;
    }

    
    // 1 - n
    // function insertCHBT2($id,$id_CH){
    //     $cauhoibaithi = new cauhoibaithi();
    //     $cauhoibaithi->id=$id;
    //     $cauhoibaithi->id_CH=$id_CH;
    //     $result=$cauhoibaithi->save();
    //     if($result){
    //         echo 'Kết quả:'."Thêm câu hỏi bài tập thành công!";
    //     }else{
    //         echo 'Kết quả:'.'Thêm câu hỏi bài tập thất bại';
    //     }
    // } 
    
    
    function updateCHBT(Request $request){
        $result = cauhoibaithi::where('MaBT_id',$request->MaBT_id)->update([
            'MaCH_id'=>$request->MaCH_id
        ]);
        if($result)
        {
            echo 'Kết quả:'.'Cập nhật câu hỏi bài tập thành công!';
        }else{
            echo 'Kết quả:'.'Cập nhật câu hỏi bài tập thất bại!';
        }
    }
    
    function deleteCHBT($id){
        $result = cauhoibaithi::where('id',$id)->delete();
        if($result)
        {
            echo 'Kết quả:'.'Xóa câu hỏi bài tập thành công!';
        }else{
            echo 'Kết quả:'.'Xóa câu hỏi bài tập thất bại!';
        }
    }
    function searchCHBT($MaCH_id){
        return cauhoibaithi::where('MaCH_id','like',$MaCH_id.'%')->get();
        
    }
    function getCHbyBT($id=null){
         
        // return $id ? DB::table('cauhoibaithis')->select("id_CH","id")
        // ->where('id',$id)->get() : cauhoibaithi::all();
        
    return $id ? DB::table('cau_hois')
    ->join('cauhoibaithis','cau_hois.id','=','cauhoibaithis.id_CH')
    ->where('cauhoibaithis.id',$id)
    ->get() : cauhoibaithi::all();       
    }
}

