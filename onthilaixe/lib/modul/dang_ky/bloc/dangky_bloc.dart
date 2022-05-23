import 'package:onthilaixe/modul/dang_ky/model/dangky_model.dart';
import 'package:onthilaixe/modul/dang_ky/response/dangky_response.dart';
import 'package:onthilaixe/modul/dang_ky/response/provider.dart';
import 'package:onthilaixe/network/app_exception.dart';
import 'package:rxdart/subjects.dart';

class DangKyBloc {
  final _provider = DangKyProvider();
 bool isDispore = false;
 late BehaviorSubject<DangKyModel> _fetchDangKy;
 Stream<DangKyModel> get dangKyStream => _fetchDangKy.stream;

 init(){
   isDispore= false;
  _fetchDangKy = BehaviorSubject();
 }
 dispore(){
   isDispore=true;
   _fetchDangKy.close();
 }
 Future<DangKyResponse?> DangKyUser(DangKyModel dangKyModel) async {
   try {
     var response = await _provider.DangKyUser(dangKyModel);
     return response;

   } on AppException {
     print('ERROR ${AppException().message}');
     return null;
   }
 }

}