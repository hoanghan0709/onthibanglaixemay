import 'package:flutter/cupertino.dart';
import 'package:onthilaixe/appconst/appdata.dart';
import 'package:onthilaixe/modul/thi_sat_hach/model/baithimodel.dart';
import 'package:onthilaixe/modul/thi_sat_hach/model/cauhoi_model.dart';
import 'package:onthilaixe/modul/thi_sat_hach/response/cauhoi_response.dart';
import 'package:onthilaixe/modul/thi_sat_hach/response/provider.dart';
import 'package:onthilaixe/modul/thi_sat_hach/response/thisathach_response.dart';
import 'package:onthilaixe/network/app_exception.dart';
import 'package:rxdart/rxdart.dart';

class ThiSatHachBloc extends ChangeNotifier {
  bool isDispose = false;

  final _provider = ThiSatHachProvider();

  late BehaviorSubject<List<BaiThiModel>>  _fetchBaiThi; //1 dang cua StreamController
  Stream<List<BaiThiModel>> get baiThiSatHachStream => _fetchBaiThi.stream;
  List<BaiThiModel> baithi = [];

  late BehaviorSubject<List<CauHoiModel>> _fetchcauhoi;
  Stream<List<CauHoiModel>> get cauHoiStream => _fetchcauhoi.stream;
  List<CauHoiModel> cauhoi = [];

  late BehaviorSubject<String> _fetchgiaithich;
  Stream<String> get giaithichStream => _fetchgiaithich.stream;

  Map<dynamic, bool> ketqua = {};

  int? diem;

  init() {
    isDispose = false;
    _fetchcauhoi = BehaviorSubject();
    _fetchgiaithich = BehaviorSubject();
    _fetchBaiThi = BehaviorSubject();
  }

  dispose() {
    isDispose = true;
    _fetchgiaithich.close();
    _fetchcauhoi.close();
    _fetchBaiThi.close();
  }

  int tinhDiem(String dapanDung, String dapanChon) {
    return dapanDung == dapanChon ? 1 : 0;
  }

  Future<ThiSatHachResponse?> getAllBT() async {
      try {
      var response = await _provider.getAllBT(AppData().profile!.id);
      baithi.addAll(response.baithi);
      if (!isDispose) _fetchBaiThi.sink.add(baithi); //sink data vào
      // quăng data vào stream
    } on AppException {
      print('ERROR ${AppException().message}');
      return null;
    }
  }

  Future<CauHoiResponse?> getCHbyBT(int id) async {
    try {
      var response = await _provider.getCHbyBT(id);
      cauhoi.addAll(response.cauhoi);
      if (!isDispose) {
        _fetchcauhoi.sink.add(cauhoi);
      }
      for (int i = 0; i < cauhoi.length; i++) {
        ketqua[i] = false;
      }
    } on AppException {
      print('ERROR ${AppException().message}');
      return null;
    }
  }

  Future<CauHoiResponse?> getCHbyLT(int id) async {
    try {
      var response = await _provider.getCHbyLLT(id);
      cauhoi.addAll(response.cauhoi);
      if (!isDispose) {
        _fetchcauhoi.sink.add(cauhoi);
      }
    } on AppException {
      print('ERROR ${AppException().message}');
      return null;
    }
  }

  Future<String> giaithich(String gthich) async {
    if (!isDispose) {
      _fetchgiaithich.sink.add(gthich);
    }

    return gthich;
  }

  Future<String?> updateBt(BaiThiModel baithi) async {
    try {
      var response = await _provider.updateBTtoServe(baithi);
      if (!isDispose) return response;
    } on AppException {
      print('ERROR ${AppException().message}');
      return null;
    }
  }
}
