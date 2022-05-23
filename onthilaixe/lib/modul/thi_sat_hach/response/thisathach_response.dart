import 'package:onthilaixe/modul/thi_sat_hach/model/baithimodel.dart';

class ThiSatHachResponse {
  List<BaiThiModel> baithi = [];

  ThiSatHachResponse.map(dynamic object) {
    var content = object as List;
     this.baithi= content.map((e) => BaiThiModel.map(e)).toList();
  }
}
