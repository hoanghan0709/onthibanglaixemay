import 'package:onthilaixe/modul/meo_thi/model/meo_thi_model.dart';

class MeoThiResponse {
  List<MeoThiModel> meothi = [];
  MeoThiResponse.map(dynamic object) {
    var content = object as List;
    if (content.isNotEmpty) {
      content.forEach((element) {
        this.meothi.add(MeoThiModel.map(element));
      });
    }
  }
}
