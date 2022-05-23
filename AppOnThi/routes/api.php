<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BaiThiController; 
use App\Http\Controllers\CauHoiController; 
use App\Http\Controllers\CauHoiBaiThiController; 
use App\Http\Controllers\BienBaoController; 
use App\Http\Controllers\LyThuyetController; 
use App\Http\Controllers\LoaiLyThuyetController ; 
use App\Http\Controllers\CauHoiByLyThuyetController ; 
use App\Http\Controllers\userbaithiController ; 
use App\Http\Controllers\LoaiBienBaoController ; 
use App\Http\Controllers\LoaiMeoThiController ; 
use App\Http\Controllers\UserController ; 
use App\Http\Controllers\MeoThiController ; 
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); 
/// Bài thi
Route::get('getAllBT',[BaiThiController::class,'getAll']);//ok
Route::post('insertBT',[BaiThiController::class,'insertBT']);//ok
Route::delete('deleteBT/{id}',[BaiThiController::class,'deleteBT']); //ok
Route::put('updateBT',[BaiThiController::class,'updateBT']); //ok
Route::get('searchBT/{TenBT?}',[BaiThiController::class,'searchBT']); //ok
/// Câu hỏi
Route::get('getAllCH',[CauHoiController::class,'getAllCH']);// ok
Route::post('insertCH',[CauHoiController::class,'insertCH']); //ok
Route::delete('deleteCH/{id}',[CauHoiController::class,'deleteCH']);//ok   
Route::put('updateCH',[CauHoiController::class,'updateCH']);  //ok
Route::get('searchCH/{TenCH?}',[CauHoiController::class,'searchCH']);  //ok

//Lý thuyết
Route::get('getAllLT',[LyThuyetController::class,'getAllLT']); 
Route::post('insertLT',[LyThuyetController::class,'insertLT']); 
Route::delete('deleteLT/{id}',[LyThuyetController::class,'deleteLT']);   
Route::put('updateLT',[LyThuyetController::class,'updateLT']);  
Route::get('searchLT/{TenLT?}',[LyThuyetController::class,'searchLT']); 
//Loại Lý thuyết
Route::get('getAllLLT',[LoaiLyThuyetController::class,'getAllLLT']); 
Route::post('insertLLT',[LoaiLyThuyetController::class,'insertLLT']); 
Route::delete('deleteLLT/{id}',[LoaiLyThuyetController::class,'deleteLLT']);   
Route::put('updateLLT',[LoaiLyThuyetController::class,'updateLLT']);  
Route::get('searchLLT/{TenLoaiLT?}',[LoaiLyThuyetController::class,'searchLLT']); 
//Câu hỏi-Bài thi
Route::get('getAllCHBT',[CauHoiBaiThiController::class,'getAllCHBT']); 
//Route::post('insertCHBT',[CauHoiBaiThiController::class,'insertCHBT']);
Route::get('insertCHBTList',[CauHoiBaiThiController::class,'insertCHBTList']);
Route::delete('deleteCHBT/{MaCH_id}',[CauHoiBaiThiController::class,'deleteCHBT']);   
Route::put('updateCHBT',[CauHoiBaiThiController::class,'updateCHBT']);  
Route::get('searchCHBT/{MaCH_id?}',[CauHoiBaiThiController::class,'searchCHBT']); 

//get cau hoi ly by ly thuyet
Route::get('getCHbyLLT/{id?}',[LoaiLyThuyetController::class,'getCHbyLLT']);
//get cau hoi ly by bai thi
Route::get('getCHbyBT/{id?}',[CauHoiBaiThiController::class,'getCHbyBT']);
 //get bai thi by user  getBTbyUser
 Route::get('getBTbyUser/{id?}',[userbaithiController::class,'getBTbyUser']);
//get lythuyet by user getLTbyUser // k lam
// get bienbao by loaibienbao
Route::get('getBBbyLBB/{id?}',[LoaiBienBaoController::class,'getBBbyLBB']);
//get meo thi by loaimeothi
Route::get('getMTbyLMT/{id?}',[LoaiMeoThiController::class,'getMTbyLMT']);

//bien bao 
Route::get('getBB',[BienBaoController::class,'getBB']); 
Route::get('getAllBB',[BienBaoController::class,'getAllBB']); 
Route::post('insertBB',[BienBaoController::class,'insertBB']); 
Route::delete('deleteBB/{id}',[BienBaoController::class,'deleteBB']);   
Route::put('updateBB',[BienBaoController::class,'updateBB']);  
Route::get('searchBB/{TenLoaiBB?}',[BienBaoController::class,'searchBB']); 
//loai bien bao 
Route::get('getAllLBB',[LoaiBienBaoController::class,'getAllLBB']); 
Route::post('insertLBB',[LoaiBienBaoController::class,'insertLBB']); 
Route::delete('deleteLBB/{id}',[LoaiBienBaoController::class,'deleteLBB']);   
Route::put('updateLBB',[LoaiBienBaoController::class,'updateLBB']);  
Route::get('searchLBB/{NoiDung?}',[LoaiBienBaoController::class,'searchLBB']); 

//meo thi

Route::get('getAllMT',[MeoThiController::class,'getAllMT']); 
Route::post('insertMT',[MeoThiController::class,'insertMT']); 
Route::delete('deleteMT/{id}',[MeoThiController::class,'deleteMT']);   
Route::put('updateMT',[MeoThiController::class,'updateMT']);  
Route::get('searchMT/{Ten?}',[MeoThiController::class,'searchMT']); 
Route::get('getMT/{id?}',[MeoThiController::class,'getMT']); 
//loai meo thi
Route::get('getAllLMT',[LoaiMeoThiController::class,'getAllLMT']); 
Route::post('insertLMT',[LoaiMeoThiController::class,'insertLMT']); 
Route::delete('deleteLMT/{id}',[LoaiMeoThiController::class,'deleteLMT']);   
Route::put('updateLMT',[LoaiMeoThiController::class,'updateLMT']);  
Route::get('searchLMT/{TenMeoThi?}',[LoaiMeoThiController::class,'searchLMT']); 
// user 
Route::get('insertUser',[UserController::class,'insertUser']); 

Route::get('dangnhap',[UserController::class,'dangNhap']); 

