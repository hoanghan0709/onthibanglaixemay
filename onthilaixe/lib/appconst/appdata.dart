import 'dart:convert';

import 'package:onthilaixe/modul/bien_bao/model/bienbaomodel.dart';
import 'package:onthilaixe/modul/bien_bao/model/loai_bien_bao.dart';
import 'package:onthilaixe/modul/dang_nhap/model/dangnhapmodel.dart';
import 'package:onthilaixe/modul/hoc_ly_thuyet/model/hoc_ly_thuyet_model.dart';
import 'package:onthilaixe/modul/meo_thi/model/loai_meo_thi_model.dart';
import 'package:onthilaixe/modul/meo_thi/model/meo_thi_model.dart';
import 'package:onthilaixe/modul/thi_sat_hach/model/cauhoi_model.dart';
import 'package:shared_preferences/shared_preferences.dart';

class AppData {
  AppData._internal();

  static final AppData _singleton = AppData._internal();

  factory AppData() {
    return _singleton;
  }

  UserModel? profile;
  bool islogin = false;

  Map<HocLyThuyetModel, List<CauHoiModel>> lythuyet = {};
  Map<LoaiBienBaoModel, List<BienBaoModel>?> bienbao = {};
  Map<MeoThiModel, List<LoaiMeoThiModel>> meothi = {};

  getData() async {
    SharedPreferences sharedPreferences = await SharedPreferences.getInstance();
    if (sharedPreferences.getString('profileKey') != null) {
      profile = UserModel.map(jsonDecode(
          sharedPreferences.getString('profileKey') ??
              '')); // bien strinh thanh object
    }
    islogin = sharedPreferences.getBool('isloginKey') ?? false;
  }

  saveProfile(UserModel? userModel) async {
    SharedPreferences sharedPreferences = await SharedPreferences.getInstance();
    sharedPreferences.setString('profileKey', jsonEncode(userModel));
    sharedPreferences.setBool(
        'isloginKey', islogin); // bien object thanh string
  }

  saveData() async {
    SharedPreferences sharedPreferences = await SharedPreferences.getInstance();
    sharedPreferences.setString('lythuyet', jsonEncode(lythuyet));
    sharedPreferences.setString('bienbao', jsonEncode(bienbao));
    sharedPreferences.setString('meothi', jsonEncode(meothi));
  }
}
