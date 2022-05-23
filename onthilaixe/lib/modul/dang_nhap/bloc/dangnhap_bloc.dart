import 'dart:async';

import 'package:onthilaixe/modul/dang_nhap/model/dangnhapmodel.dart';
import 'package:onthilaixe/modul/dang_nhap/response/dangnhap_response.dart';
import 'package:onthilaixe/modul/dang_nhap/response/provider.dart';
import 'package:onthilaixe/network/app_exception.dart';
import 'package:rxdart/rxdart.dart';

class DangNhapBloc{
  final _provider = DangNhapProvider();
  bool isDispore = false;
  late BehaviorSubject<DangNhapModel> _fetchDangKy;
  Stream<DangNhapModel> get dangKyStream => _fetchDangKy.stream;
  init(){
    isDispore= false;
    _fetchDangKy = BehaviorSubject();
  }
  dispore(){
    isDispore=true;
    _fetchDangKy.close();
  }
  Future<DangNhapResponse?> DangNhapUser(DangNhapModel dangNhapModel) async {
    try {
      var response = await _provider.dangnhap(dangNhapModel);
      return response;

    } on AppException {
      print('ERROR ${AppException().message}');
      return null;
    }
  }
}