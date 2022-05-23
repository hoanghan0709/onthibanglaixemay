import 'package:onthilaixe/modul/dang_nhap/model/dangnhapmodel.dart';

class DangNhapResponse {
  String message = '';
  UserModel? dangnhap;

  DangNhapResponse.map(dynamic object) {
    this.message = object['message'];
    if(object['data']!=null){
      this.dangnhap = UserModel.map(object['data']);
    }
    else{
      this.dangnhap=null;
    }

  }
}
