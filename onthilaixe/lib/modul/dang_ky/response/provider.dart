import 'package:onthilaixe/modul/dang_ky/model/dangky_model.dart';
import 'package:onthilaixe/modul/dang_ky/response/dangky_response.dart';
import 'package:onthilaixe/network/api_path.dart';
import 'package:onthilaixe/network/rest_api.dart';

class DangKyProvider{

  final _apiService = DioHttpProvider();
  Future<DangKyResponse> DangKyUser(DangKyModel dangKyModel) async{
    var res = await _apiService.dioGetRequest(ApiPath.insertUser,params: dangKyModel.toJson());
    return DangKyResponse.map(res);
  }
}