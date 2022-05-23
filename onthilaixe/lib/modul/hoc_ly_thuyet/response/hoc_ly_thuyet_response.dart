import 'package:onthilaixe/modul/hoc_ly_thuyet/model/hoc_ly_thuyet_model.dart';
import 'package:onthilaixe/modul/thi_sat_hach/model/baithimodel.dart';

class HocLyThuyetResponse {
  List<HocLyThuyetModel> lythuyet = [];

  HocLyThuyetResponse.map(dynamic object) {
    var content = object as List;
    this.lythuyet= content.map((e) => HocLyThuyetModel.map(e)).toList();
  }
}
