import 'dart:convert';

import 'package:dio/dio.dart';
import 'package:onthilaixe/appconst/appdata.dart';
import 'package:onthilaixe/modul/thi_sat_hach/model/baithimodel.dart';
import 'package:onthilaixe/modul/thi_sat_hach/response/cauhoi_response.dart';
import 'package:onthilaixe/modul/thi_sat_hach/response/thisathach_response.dart';
import 'package:onthilaixe/network/api_path.dart';
import 'package:onthilaixe/network/rest_api.dart';

class ThiSatHachProvider {
  final _apiService = DioHttpProvider();

//giao tiếp với api
  Future<ThiSatHachResponse> getAllBT(int id) async {
    var url =ApiPath.getAllBT+'/$id';
    var response = await _apiService.dioGetRequest(url);
    return ThiSatHachResponse.map(response);
  }

  Future<String> updateBTtoServe(BaiThiModel data) async {
    var param = data.toJson();
    var response = await _apiService.dioPutRequest(ApiPath.updateBT, params: param);

    return response.toString();
  }
  Future<CauHoiResponse> getCHbyBT(int id) async{
    var url =ApiPath.getCHbyBT+'/$id';
    var response = await _apiService.dioGetRequest(url);
     return CauHoiResponse.map(response);
  }


  Future<CauHoiResponse> getCHbyLLT(int id) async {
    var url =ApiPath.getCHbyLLT+'/$id';
    var response = await _apiService.dioGetRequest(url);
    return CauHoiResponse.map(response);
  }}
