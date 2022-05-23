 
<?php
// namespace App\Http\Controllers;

// use Illuminate\Http\Request;

// use App\Models\LyThuyet;

// class LyThuyetController extends Controller
// {
//     //
//     function getAllLT(){
//         return 'Danh sách các lý thuyết:'. LyThuyet::all();    
//     }
//     function insertLT(Request $request){
//         $lythuyet = new LyThuyet();
//         $lythuyet->id = $request->id;
//         $lythuyet->TenLT = $request->TenLT;
//         $result = $lythuyet->save();
//         if($result){
//             return ["Kết quả:"=>"Thêm lý thuyết thành công!"];
//         }else{
//             return ["Kết quả:"=>"Thêm lý thuyết thất bại!"];
//         }
//     }
//     function updateLT(Request $request){
//         $result = LyThuyet::where('id',$request->id)->update([
//              'TenLT'=>$request->TenLT
//         ]);
//         if($result){
//             echo "Kết quả:"."Cập nhật câu hỏi thành công!";
//         }else{
//             echo "Kết quả:"."Cập nhật câu hỏi thất bại!";
//         }
//     }
//     function deleteLT($id){
//         $result = LyThuyet::where('id',$id)->delete();
//         if($result){
//             return ["Kết quả:"=>"Xóa lý thuyết thành công!"];
//         }else{
//             return ["Kết quả:"=>"Xóa lý thuyết thất bại!"];
//         }
//     }
//     function searchLT($TenLT)
//     {
//         return LyThuyet::where('TenLT','like',$TenLT.'%')->get();
//     }
    
 