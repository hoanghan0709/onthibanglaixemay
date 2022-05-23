import 'dart:convert';

import 'package:onthilaixe/modul/bien_bao/response/bien_bao_response.dart';
import 'package:onthilaixe/modul/bien_bao/response/loai_bien_bao_response.dart';
import 'package:onthilaixe/network/api_path.dart';
import 'package:onthilaixe/network/rest_api.dart';



//chứa 2 hàm xử lý của biển báo

class BienBaoProvider {

  final _apiService = DioHttpProvider();
  late int id;
//giao tiếp với api

  Future<BienBaoResponse> getAllBBbyLBB(int id) async {
    //khi gọi hàm này thì lấy biển báo theo id loại biển báo
    var url = ApiPath.getBBbyLBB+'/$id';
    var response = await _apiService.dioGetRequest(url);
    print(jsonEncode(response));
    return BienBaoResponse.map(response);
  }

  Future<LoaiBienBaoResponse> getAllLBB() async {
    var response = await _apiService.dioGetRequest(ApiPath.getAllLBB);
    return LoaiBienBaoResponse.map(response);
  }
  Future<BienBaoResponse> getBB() async{
    var response = await _apiService.dioGetRequest(ApiPath.getBB);
    return BienBaoResponse.map(response);
  }

}
