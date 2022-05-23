import 'dart:convert';

import 'package:onthilaixe/modul/meo_thi/response/loai_meo_thi_response.dart';
import 'package:onthilaixe/modul/meo_thi/response/meo_thi_response.dart';
import 'package:onthilaixe/modul/meo_thi/screen/meo_thi.dart';
import 'package:onthilaixe/network/api_path.dart';
import 'package:onthilaixe/network/rest_api.dart';

class MeoThiProvider {

  final _apiService = DioHttpProvider();
  late int id;

  Future<MeoThiResponse> getMTbyLMT(int id) async {
    //khi gọi hàm này thì lấy biển báo theo id loại biển báo
    var url = ApiPath.getMTbyLMT+'/$id';
    var response = await _apiService.dioGetRequest(url);
    print(jsonEncode(response));
    return MeoThiResponse.map(response);//trả ve bienbao đúng rồi
  }

  Future<LoaiMeoThiResponse> getAllLMT() async {
    var response = await _apiService.dioGetRequest(ApiPath.getAllLMT);
    return LoaiMeoThiResponse.map(response);
  }
///////////////////////////////////////
  Future<MeoThiResponse> getMT() async {
    var response = await _apiService.dioGetRequest(ApiPath.getMT);
    return MeoThiResponse.map(response);
  }


}