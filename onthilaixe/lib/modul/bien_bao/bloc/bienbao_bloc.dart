import 'dart:convert';

import 'package:onthilaixe/appconst/appdata.dart';
import 'package:onthilaixe/modul/bien_bao/model/bienbaomodel.dart';
import 'package:onthilaixe/modul/bien_bao/model/loai_bien_bao.dart';
import 'package:onthilaixe/modul/bien_bao/response/bien_bao_response.dart';
import 'package:onthilaixe/modul/bien_bao/response/loai_bien_bao_response.dart';
import 'package:onthilaixe/modul/bien_bao/response/provider.dart';
import 'package:onthilaixe/network/app_exception.dart';
import 'package:rxdart/rxdart.dart';

class BienBaoBloc {
  bool isDispose = false;
  final _provider = BienBaoProvider();

  late BehaviorSubject<List<BienBaoModel>> _fetchBienBao; //1 dang cua StreamController
  Stream<List<BienBaoModel>> get bienBaoStream => _fetchBienBao.stream;
  List<BienBaoModel> bienbao = [];

  late BehaviorSubject<List<LoaiBienBaoModel>>
      _fetchLoaiBienBao; //1 dang cua StreamController
  Stream<List<LoaiBienBaoModel>> get loaibienBaoStream =>
      _fetchLoaiBienBao.stream;
  List<LoaiBienBaoModel> loaibienbao = [];

  init() {
    _fetchBienBao = BehaviorSubject();
    _fetchLoaiBienBao = BehaviorSubject();
    isDispose = false;
  }

  dispose() {
    isDispose = true;
    _fetchBienBao.close();
    _fetchLoaiBienBao.close();
  }

  Future<BienBaoResponse?> getAllBB(int id) async {
    try {
      var response = await _provider.getAllBBbyLBB(id);

      bienbao.addAll(response.bienbao);
      if (!isDispose) {
        _fetchBienBao.sink.add(bienbao);
         return response;
      }
      // quăng data vào stream
      return null;
    } on AppException {
      print('ERROR ${AppException().message}');
      return null;
    }
  }


  Future<LoaiBienBaoResponse?> getAllLBB() async {
    try {
      var response = await _provider.getAllLBB();
      loaibienbao.addAll(response.loaibienbao);
      if (!isDispose) {
        _fetchLoaiBienBao.sink.add(loaibienbao);
        return response;
      }
      return null;
      // quăng data vào stream
    } on AppException {
      print('ERROR ${AppException().message}');
      return null;
    }
  }
}
