<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DBBTController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('admin')->group(function () {

    //bai thi
    Route::get('/createBaiThi', [DBBTController::class,'viewcreateBaiThi']);
    Route::post('/addBaiThi', [DBBTController::class,'addBaiThi']);
    Route::get('/updateBaiThi/{id}', [DBBTController::class,'viewUpdateBaiThi']);
    Route::post('/updateBaiThi/{id}', [DBBTController::class,'UpdateBaiThi']);
    Route::get('/listBaiThi',[DBBTController::class,'viewListBaiThi']);
    Route::get('/deleteBaiThi/{id}',[DBBTController::class,'deleteBaiThi']);
    //cau hoi
    Route::get('/createCauHoi', [DBBTController::class,'viewcreateCauHoi']);
    Route::post('/addCauHoi', [DBBTController::class,'addCauHoi']);
    Route::get('/listCauHoi',[DBBTController::class,'viewListCauHoi']);
    Route::get('/updateCauHoi/{id}',[DBBTController::class,'viewUpdateCauHoi']);
    Route::post('/updateCauHoi/{id}',[DBBTController::class,'UpdateCauHoi']);
    Route::get('/deleteCauHoi/{id}',[DBBTController::class,'deleteCauHoi']);
    //loai ly thuyet
    Route::get('/createLoaiLyThuyet', [DBBTController::class,'viewcreateLoaiLyThuyet']);
    Route::post('/addLoaiLyThuyet', [DBBTController::class,'addLoaiLyThuyet']);
    Route::get('/listLoaiLyThuyet',[DBBTController::class,'viewListLoaiLyThuyet']);
    Route::get('/updateLoaiLyThuyet/{id}',[DBBTController::class,'viewUpdateLoaiLyThuyet']);
    Route::post('/updateLoaiLyThuyet/{id}',[DBBTController::class,'UpdateLoaiLyThuyet']);
    Route::get('/deleteLoaiLyThuyet/{id}',[DBBTController::class,'deleteLoaiLyThuyet']);
    //bien bao
    Route::get('/listBienBao',[DBBTController::class,'viewListBienBao']);

    Route::get('/createBienBao',[DBBTController::class,'viewcreateBienBao']);
    Route::post('/addBienBao',[DBBTController::class,'addBienBao']);
    Route::get('/deleteBienBao/{id}',[DBBTController::class,'deleteBienBao']);

    Route::post('/updateBienBao/{id}',[DBBTController::class,'updateBienBao']);
    Route::get('/updateBienBao/{id}',[DBBTController::class,'viewupdateBienBao']);
    //loai bien bao
    Route::get('/listLoaiBienBao',[DBBTController::class,'viewListLoaiBienBao']);
    Route::get('/createLoaiBienBao',[DBBTController::class,'viewcreateLoaiBienBao']);
    Route::post('/addLoaiBienBao',[DBBTController::class,'addLoaiBienBao']);
    Route::get('/deleteLoaiBienBao/{id}',[DBBTController::class,'deleteLoaiBienBao']);

    Route::get('/updateLoaiBienBao/{id}',[DBBTController::class,'viewupdateLoaiBienBao']);
    Route::post('/updateLoaiBienBao/{id}',[DBBTController::class,'UpdateLoaiBienBao']);

    //meo thi
    Route::get('/listMeoThi',[DBBTController::class,'viewListMeoThi']);
    Route::get('/createMeoThi',[DBBTController::class,'viewcreateMeoThi']);
    Route::post('/addMeoThi',[DBBTController::class,'addMeoThi']);
    Route::get('/deleteMeoThi/{id}',[DBBTController::class,'deleteMeoThi']);
    
    Route::get('/updateMeoThi/{id}',[DBBTController::class,'viewupdateMeoThi']);
    Route::post('/updateMeoThi/{id}',[DBBTController::class,'updateMeoThi']);

    //loai meo thi   
    Route::get('/listLoaiMeoThi',[DBBTController::class,'viewListLoaiMeoThi']);
    Route::get('/createLoaiMeoThi',[DBBTController::class,'viewcreateLoaiMeoThi']);
    Route::post('/addLoaiMeoThi',[DBBTController::class,'addLoaiMeoThi']);

    Route::get('/deleteLoaiMeoThi/{id}',[DBBTController::class,'deleteLoaiMeoThi']);

    Route::get('/updateLoaiMeoThi/{id}',[DBBTController::class,'viewupdateLoaiMeoThi']);
    Route::post('/updateLoaiMeoThi/{id}',[DBBTController::class,'updateLoaiMeoThi']);
    //dang nhap 
    Route::get('/dangnhap',[DBBTController::class,'viewDangNhap']);
    Route::post('/dangnhap_post',[DBBTController::class,'checkDangNhap'])->name('admin.dangnhap');
    
//many yo many
    Route::get('/CauHoiBaiThi/{id}',[DBBTController::class,'viewCauHoiBaiThi']);
    Route::post('/AddCauHoiBaiThi/{id}',[DBBTController::class,'AddCauHoiBaiThi']);
    Route::get('/DeleteCauHoiBaiThi',[DBBTController::class,'DeleteCauHoiBaiThi']);

    Route::get('/DeleteBaiThiUser',[DBBTController::class,'DeleteBaiThiUser']);
    Route::post('/AddBaiThiUser/{id}',[DBBTController::class,'AddBaiThiUser']);
    Route::get('/BaiThiUser/{id}',[DBBTController::class,'viewBaiThiUser']);
    // trang chu

    Route::get('/TrangChu',[DBBTController::class,'viewTrangChu'])->name('admin.trangchu');
    //user
    Route::get('/listUser',[DBBTController::class,'viewListUser']);
    Route::get('/deleteUser/{id}',[DBBTController::class,'deleteUser']);
    

   
});

