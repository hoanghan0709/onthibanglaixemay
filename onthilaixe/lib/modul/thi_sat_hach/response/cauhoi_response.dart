
import 'package:onthilaixe/modul/thi_sat_hach/model/cauhoi_model.dart';

class CauHoiResponse {
  List<CauHoiModel> cauhoi = [];

  CauHoiResponse.map(dynamic object) {
    var content = object as List;
    this.cauhoi= content.map((e) => CauHoiModel.map(e)).toList();
  }
}
