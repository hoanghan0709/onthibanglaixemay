import 'package:onthilaixe/modul/bien_bao/model/bienbaomodel.dart';

class LoaiBienBaoModel {
  String tenLBB = '';
  int id = 0;
  LoaiBienBaoModel.map(dynamic object)
  {
    this.id = object['id'] ?? 0;
    this.tenLBB = object['TenLoaiBB'] ?? '';
  }
}