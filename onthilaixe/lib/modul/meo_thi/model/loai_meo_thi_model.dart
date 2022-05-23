import 'package:onthilaixe/modul/bien_bao/model/loai_bien_bao.dart';

class LoaiMeoThiModel {
  int id = 0;
  String TenLoaiMeoThi = '';

  LoaiMeoThiModel({this.id = 0, this.TenLoaiMeoThi = ''});

  LoaiMeoThiModel.map(dynamic object) {
    this.id = object['id'] ?? 0;
    this.TenLoaiMeoThi = object['TenMeoThi'] ?? '';
  }
}
