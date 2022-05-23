import 'package:onthilaixe/modul/bien_bao/model/bienbaomodel.dart';
import 'package:onthilaixe/modul/hoc_ly_thuyet/model/hoc_ly_thuyet_model.dart';
import 'package:onthilaixe/modul/thi_sat_hach/model/baithimodel.dart';

class BienBaoResponse {
  List<BienBaoModel> bienbao = [];

  BienBaoResponse.map(dynamic object) {
    var content = object as List;
    //this.bienbao= content.map((e) => BienBaoModel.map(e)).toList();// nó tra ve id va hinh à? ừa ten vs noid dung dau ta
    if(content.isNotEmpty){
      content.forEach((element) {
        this.bienbao.add(BienBaoModel.map(element));
      });
    }
  }
}
