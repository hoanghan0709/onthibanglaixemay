import 'package:onthilaixe/modul/bien_bao/model/bienbaomodel.dart';
import 'package:onthilaixe/modul/bien_bao/model/loai_bien_bao.dart';
import 'package:onthilaixe/modul/hoc_ly_thuyet/model/hoc_ly_thuyet_model.dart';
import 'package:onthilaixe/modul/thi_sat_hach/model/baithimodel.dart';

class LoaiBienBaoResponse {
  List<LoaiBienBaoModel> loaibienbao = [];

  LoaiBienBaoResponse.map(dynamic object) {
    var content = object as List;
    this.loaibienbao= content.map((e) => LoaiBienBaoModel.map(e)).toList();
    // if(content.isNotEmpty){
    //   content.forEach((element) {
    //     this.bienbao.add(BienBaoModel.map(element));
    //   });
    // }
  }
}
