<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\User;
class UserController extends Controller
{
    function getAllUser(){
        return User::all();
   }    
   function getUser($id){
   $result = User::where('id',$id)->get();
    if($result)
    {
       return $result;
    }
    else
    {
       return null;
    } 
    return $result;
}

function dangNhap(Request $request){

    $result = DB::table('users')->where('email','=',$request->email)
    ->where('password','=',$request->password)->first();
     if($result)
     {
        return array('message' => 'Dang Nhap Ok','data'=>$result);
     }
     else
     {
       return array('message' => 'Dang Nhap Fail','data'=>null);
     } 
 }
   function insertUser (Request $request){
    $user = new User();
    $user->id=$request->id;
    $user->HoTenUser=$request->HoTenUser;
     
    $user->email=$request->email;
    $user->password=$request->password;
    $result=$user->save();
    if($request==true){
        return $user ;
    }else{
        return ["result:"=>"Thêm thất bại!"];
    }
}
 
function deleteUser($id){
    $result = User::where('id',$id)->delete();
     
    if($result)
    {
        return ["result:"=>"Xóa thành công!"];
    }
    else
    {
        return ["result:"=>"Xóa thất bại!"];
    }
}

//put
function updateUser(Request $request){
    $result = User::where('id',$request->id)->update([
        'HoTenUser'=>$request->HoTenUser,
        
        'email'=>$request->email,
        'password'=>$request->password 

    ]); 
     if($result){
        return ["result:"=>"Cập nhật thành công!"];
    }else{
        return ["result:"=>"Cập nhật thất bại!"];
    }
}
// tìm kiếm theo tên BT
// function searchBT($TenBT){
//     return BaiThi::where("TenBT","like",$TenBT."%")->get();
// }
function searchUser($email){
    return User::where("email","like",$email."%")->get();
}

}
