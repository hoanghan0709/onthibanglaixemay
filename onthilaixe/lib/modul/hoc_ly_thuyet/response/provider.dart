import 'dart:convert';

import 'package:dio/dio.dart';
import 'package:onthilaixe/modul/hoc_ly_thuyet/response/hoc_ly_thuyet_response.dart';
import 'package:onthilaixe/modul/thi_sat_hach/response/thisathach_response.dart';
import 'package:onthilaixe/network/api_path.dart';
import 'package:onthilaixe/network/rest_api.dart';

class HocLyThuyetProvider {
  final _apiService = DioHttpProvider();

//giao tiếp với api
  Future<HocLyThuyetResponse> getAllLLT() async {
    var response = await _apiService.dioGetRequest(ApiPath.getAllLLT);
    return HocLyThuyetResponse.map(response);
  }
}