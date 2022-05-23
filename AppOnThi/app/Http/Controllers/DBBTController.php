<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BaiThi;
use App\Models\BienBao;
use App\Models\CauHoi;
use App\Models\LoaiBienBao;
use App\Models\LoaiLyThuyet;
use App\Models\LoaiMeoThi;
use App\Models\MeoThi;
use App\Models\TaiKhoanAdmin;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

use function PHPSTORM_META\map;

class DBBTController extends Controller
{
   //bai thi
    public function addBaiThi(Request $r){
        $baithi = new BaiThi;
        $baithi->TenBT= $r->tenBT;
        $baithi->Phut= $r->phut;
        $baithi->Giay= $r->giay;
        $baithi->Diem= $r->diem;
        $baithi->KetQua= $r->ketqua;
        $baithi->save();
        return $baithi;
    }
    public function viewcreateBaiThi(){
        return view('baithi/createBaiThi');
    }
 
    public function UpdateBaiThi(Request $r){
        $baithi = BaiThi::find($r->id);
       $baithi->update([
        'TenBT' => $r->tenBT,
        'Phut' => $r->phut,
        'Giay' => $r->giay,
        'Diem' => $r->diem,
        'KetQua' => $r->ketqua
       ]);
        return $baithi;
    }
    public function viewUpdateBaiThi($id){
        $baithi = BaiThi::find($id);
        if($baithi){
            return view('baithi/updateBaiThi',['baithi' => $baithi]);
        }else{
            echo "bai thi k ton tai";
        }
        
    }

    public function viewListBaiThi(){
        $list = BaiThi::all();
        if($list){
            return view('baithi/listBaiThi',['list' => $list]);
        }else{
            echo "k co bai thi";
        }
        
    }
    public function deleteBaiThi($id){
        $list = BaiThi::find($id);
        $list->delete();
        return 0;
        
    }
    

    // cau hỏi
    public function addCauHoi(Request $r){
        $cauhoi = new CauHoi;
        $cauhoi->TenCH= $r->tenCH;
        $cauhoi->HinhAnh= $r->hinhanh;
        $cauhoi->NoiDungCH= $r->noidungCH;
        $cauhoi->DapAnDung= $r->dapandung;
        $cauhoi->DapAnA= $r->dapanA;
        $cauhoi->DapAnB= $r->dapanB;
        $cauhoi->DapAnC= $r->dapanC;
        $cauhoi->DapAnD= $r->dapanD;
        $cauhoi->GiaiThich= $r->giaithich;
        $cauhoi->id_LLT= $r->id_LLT;
        $cauhoi->save();
        return $cauhoi;
    }
    public function viewcreateCauHoi(){
        $list_LTT = LoaiLyThuyet::get()->pluck('TenLoaiLT','id');//lay truong muon lay
        return view('cauhoi/createCauHoi',['list' => $list_LTT]);
    }
    public function viewListCauHoi(){
       
        $list = CauHoi::all();
        if($list  ){
            return view('cauhoi/listCauHoi',['list' =>  $list]);
        }else{
            echo "k co caau hoi";
        }
    }
    public function viewUpdateCauHoi($id){
        $cauhoi = CauHoi::find($id); 
        $list_LLT = LoaiLyThuyet::get()->pluck('TenLoaiLT','id'); 
        if($cauhoi){
            return view('cauhoi/updateCauHoi',['cauhoi' => $cauhoi,'loailt'=>$list_LLT]);
        }else{
            echo "cau hoi k ton tai";
        }
 
        
    }
    public function UpdateCauHoi(Request $r){
        $cauhoi = CauHoi::find($r->id);
       $cauhoi->update([
        'TenCH' => $r->tenCH, 
        'NoiDungCH' => $r->noidungCH, 
        'HinhAnh' => $r->hinhanh,
        'DapAnDung' => $r->dapanDung,
        'DapAnA' => $r->dapanA, 
        'DapAnB' => $r->dapanB,
        'DapAnC' => $r->dapanC,
        'DapAnD' => $r->dapanD,
        'GiaiThich' => $r->giaithich,
        'id_LLT' => $r->idloailt 
       ]);
        return $cauhoi;
    }
    public function deleteCauHoi($id){
        $list = CauHoi::find($id);
        $list->delete();
        return 0;
        
    }
    //loai ly thuyet
    public function viewListLoaiLyThuyet(){
        $list_LLT = LoaiLyThuyet::all(); 
        if($list_LLT  ){
            return view('loailythuyet/listLoaiLyThuyet',['list_LLT' =>  $list_LLT]);
        }else{
            echo "k co loai ly thuyet";
        }
    }public function deleteLoaiLyThuyet($id){
        $llt = LoaiLyThuyet::find($id);
        $llt->delete();
        return 0;
    }
    public function viewcreateLoaiLyThuyet(){
            return view('loailythuyet/createLoaiLyThuyet');
    }
    public function addLoaiLyThuyet(Request $request){
        $loailt = new LoaiLyThuyet;
        $loailt->TenLoaiLT = $request->tenloaiLT;
        $loailt->Icon = $request->icon;
         $loailt->save();
         return $loailt;
    }
    public function viewUpdateLoaiLyThuyet($id){
        $loailt = LoaiLyThuyet::find($id);
        if($loailt){
                return view('loailythuyet/updateLoaiLyThuyet',['loailt'=>$loailt]);
        }else{
            echo "ko  co loai ly thuyet nao";
        }
    }
    public function UpdateLoaiLyThuyet(Request $r){
        $loailt =LoaiLyThuyet::find($r->id);
        $loailt->update([
            'TenLoaiLT' =>$r->tenloaiLT,
            'Icon' =>$r->icon

        ]);
        return $loailt;
    }
    //bien bao

    public function viewListBienBao(){
        $bienbao = BienBao::all();
        if($bienbao){
                return view('bienbao/listBienBao',['bienbaoo'=>$bienbao]);
        }else{
            echo 'khong co bien bao';
        }
    }
    public function addBienBao(Request $r){
        $bienbao = new BienBao();
        $bienbao->TenBB=$r->tenBB;
        $bienbao->NoiDungBB=$r->noidungBB;
        $bienbao->HinhAnhBB=$r->hinhanhBB;
        $bienbao->id_LoaiBB=$r->id_LoaiBB; 
        $bienbao->save();
        return $bienbao;
    }
    public function viewcreateBienBao(){
        $list_LBB = LoaiBienBao::get()->pluck('TenLoaiBB','id');
        return view('bienbao/createBienBao',['list' => $list_LBB]);
       
    }
    public function deleteBienBao($id){
        $bienbao = BienBao::find($id);
        $bienbao->delete();
        return 0;
    }
    public function updateBienBao(Request $r){
        $bienbao = BienBao::find($r->id) ;
        $bienbao->update([
            'TenBB'=>$r->tenBB,
            'NoiDungBB'=>$r->noidungBB,
            'HinhAnhBB'=>$r->hinhanhBB, 
            'id_LoaiBB'=>$r->id_LoaiBB
        ]);
        return $bienbao;
    }
    public function viewupdateBienBao($id){
        $bienbao = BienBao::find($id);
        $list_LBB = LoaiBienBao::get()->pluck('TenLoaiBB','id'); 
        if($bienbao){
                return view('bienbao/updateBienBao',['bienbao'=>$bienbao,'loaibb'=>$list_LBB]);
        }else{
            echo "ko  co bien bao nao";
        }
    }
    //loai bienbao
    public function viewListLoaiBienBao(){
        $LoaiBienBao = LoaiBienBao::all();
        if($LoaiBienBao)
        {
            return view('loaibienbao/listLoaiBienBao',['LoaiBienBao'=>$LoaiBienBao]);
        }
        else{
            echo 'khong cho loai bien bao';
        }
    }
    public function addLoaiBienBao(Request $q){
        $loaibb = new LoaiBienBao;
        $loaibb->TenLoaiBB = $q->tenloaiBB;
        $loaibb->save();
        return $loaibb;
    }
    public function viewcreateLoaiBienBao(){
        return view('loaibienbao/createLoaiBienBao');
    }
    public function deleteLoaiBienBao($id){
        $loaiBB = LoaiBienBao::find($id);
        $loaiBB->delete();
        return 0;
    }
    public function viewupdateLoaiBienBao($id){
        $loaibb = LoaiBienBao::find($id);
        if($loaibb)
        {
            return view('loaibienbao/updateLoaiBienBao',['loaibb'=>$loaibb]);
        }else{
            echo "khong co loai bien bao nao";
        }
       
    }
    public function UpdateLoaiBienBao(Request $r){
        $loaibb = LoaiBienBao::find($r->id);
        $loaibb->update([
            'TenLoaiBB'=> $r->tenloaiBB
        ]);
        return $loaibb;
    }
    //meo thi
    public function viewListMeoThi(){
        $meothi = MeoThi::all();
        if($meothi){
            return view('meothi/listMeoThi',['list'=>$meothi]);
        }
        else{
            echo 'meo thi null';
        }
    }
    public function viewcreateMeoThi(){
      
         $list = LoaiMeoThi::get()->pluck('TenMeoThi','id');
         return view('meothi/createMeoThi',['list' => $list]);
    }
    public function addMeoThi(Request $r){
        $meothi = new MeoThi();
        $meothi->Ten=$r->tenMT;
        $meothi->NoiDung=$r->noidungMT;
        $meothi->id_LoaiMT=$r->id_LoaiMT;
        $meothi->save();
        return $meothi;
    }
    public function deleteMeoThi($id){
        $meothi = MeoThi::find($id);
        $meothi->delete();
        return 0; 
    }
     public function viewupdateMeoThi($id){
        $meothi = MeoThi::find($id);
        if($meothi){
            return view('/meothi/updateMeoThi',['meothi'=>$meothi]);
        }else{
            echo 'khong co meo thi nao';
        }
     }
     
     public function updateMeoThi(Request $r){
         $meothi = MeoThi::find($r->id);
         $meothi->update([
            'Ten'=> $r->tenMT,
            'NoiDung'=> $r->noidungMT,
            'id_LoaiMT'=>$r->idloaiMT
         ]);
        return $meothi;
     }
     //loai meo thi

     public function viewListLoaiMeoThi(){
        $loaimt =LoaiMeoThi::all();
        if($loaimt){
            return view('loaimeothi/listLoaiMeoThi',['list'=>$loaimt]);
        }else{
            echo "khong ton tai loai meo thi nao";
        }
     }
     public function viewcreateLoaiMeoThi(){
            return view('loaimeothi/createLoaiMeoThi');
     }
     public function addLoaiMeoThi(Request $r){
        $loaimt = new LoaiMeoThi();
        $loaimt->TenMeoThi = $r->tenloaiMT;
        $loaimt->save();
        return $loaimt;
     }
     public function deleteLoaiMeoThi($id){
            $loaimt =  LoaiMeoThi::find($id);
            $loaimt ->delete();
            return 0;
             
     }
     public function viewupdateLoaiMeoThi($id){
            $loaimt = LoaiMeoThi::find($id);
            if($loaimt ){
                return view('loaimeothi/updateLoaiMeoThi',['list'=>$loaimt]);
            }
             else{
                 echo 'khong co loai meo thi nao';
             }
     }
     public function updateLoaiMeoThi(Request $r){
            $loaimt =  LoaiMeoThi::find($r->id);
            $loaimt ->update([
                'TenMeoThi'=> $r->tenloaiMT
            ]);
            return 0; 
     }
     public function viewTrangChu(){
         return view('TrangChu');
     }
     //dang nhap
     public function viewDangNhap(){
         return view('/dangnhap/dangnhap');
     } 
     public function checkDangNhap(Request $request){
        $exists_TKAdmin = TaiKhoanAdmin::where('username','=',$request->taikhoan)
        ->where('password','=',$request->matkhau)->first();

        if($exists_TKAdmin != null) { 
            return redirect()->route('admin.trangchu');
        }else {
            Session::flash('alter_error','Tài khoản hoặc mật khẩu không chính xác,vui lòng kiểm tra lại!');
            return redirect()->back(); 
        }
       
         
     }
     
//cauhoi-baithi
public function viewCauHoiBaiThi($id){
    $listCH = BaiThi::find($id)->cau_hois;
    $arrCH = [];
    foreach($listCH as $item){
        array_push($arrCH,$item->id);
    }
    $listCH_chua_pick = CauHoi::whereNotIn('id', $arrCH)->get();

    return view('many_to_many/CauHoiBaiThi',[
        'listCH' => $listCH,
        'list_chua_pick' =>$listCH_chua_pick,
        'id' => $id
    ]); 
}
public function AddCauHoiBaiThi($id,Request $r){
    BaiThi::find($id)->cau_hois()->attach($r->arr_pick);
    return 0;
} 
public function DeleteCauHoiBaiThi(Request $r){
    BaiThi::find($r->idBT)->cau_hois()->detach($r->idCH);
    return Redirect('/admin/CauHoiBaiThi/'.$r->idBT);
    
}
    //bai thi- user 
    public function viewBaiThiUser($id){
        $listBT = User::find($id)->bai_this;
        $arrBT=[];
        foreach($listBT as $item){
            array_push($arrBT,$item->id);
        }
        $listBT_chua_pick=BaiThi::whereNotIn('id',$arrBT)->get();
        return view('many_to_many/BaiThiUser',[
            'listBT'=>$listBT,
            'listBT_chua_pick'=>$listBT_chua_pick,
            'id'=>$id
        ]);
    }
    public function AddBaiThiUser($id,Request $r){
        User::find($id)->bai_this()->attach($r->arr_pick);
        return 0;
    }
    public function DeleteBaiThiUser(Request $r){
        User::find($r->idUser)->bai_this()->detach($r->idBT);
         return Redirect('/admin/BaiThiUser/'.$r->idUser);
    
    }
        
    //user
    public function deleteUser($id){
        $user = User::find($id);
        $user->delete();
        return 0;
    }
     
    public function viewListUser(){
        $user =User::all();
        if($user){
            return view('user/listUser',['list'=>$user]);
        }else{
            echo "khong ton tai user ";
        }
     }
}
