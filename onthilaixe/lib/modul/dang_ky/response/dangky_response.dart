import 'package:flutter/material.dart';
import 'package:onthilaixe/modul/dang_ky/model/dangky_model.dart';

class DangKyResponse {
  late DangKyModel dangKyModel ;

  DangKyResponse.map(dynamic object){
     this.dangKyModel=DangKyModel.map(object);
  }
}