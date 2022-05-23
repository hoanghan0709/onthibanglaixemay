import 'package:onthilaixe/modul/dang_nhap/model/dangnhapmodel.dart';
import 'package:onthilaixe/modul/dang_nhap/response/dangnhap_response.dart';
import 'package:onthilaixe/network/api_path.dart';
import 'package:onthilaixe/network/rest_api.dart';

class DangNhapProvider {
  final _apiService = DioHttpProvider();

//giao tiếp với api
  Future<DangNhapResponse> dangnhap(DangNhapModel dangNhapModel) async {
    var response = await _apiService.dioGetRequest(ApiPath.dangnhap,params: dangNhapModel.toJson());
    return DangNhapResponse.map(response);
  }
}