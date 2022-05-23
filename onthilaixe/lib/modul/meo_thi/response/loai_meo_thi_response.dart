import 'package:onthilaixe/modul/meo_thi/model/loai_meo_thi_model.dart';

class LoaiMeoThiResponse {

  List<LoaiMeoThiModel> loaimeothi = [];
  LoaiMeoThiResponse.map(dynamic object){
    var content = object as List;
    if(content.isNotEmpty){
      content.forEach((element) {
        this.loaimeothi.add(LoaiMeoThiModel.map(element));
      });
    }

  }
}