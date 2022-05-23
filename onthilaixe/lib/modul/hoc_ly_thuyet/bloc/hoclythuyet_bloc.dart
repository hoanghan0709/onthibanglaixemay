
import 'package:onthilaixe/modul/hoc_ly_thuyet/model/hoc_ly_thuyet_model.dart';
import 'package:onthilaixe/modul/hoc_ly_thuyet/response/hoc_ly_thuyet_response.dart';
import 'package:onthilaixe/modul/hoc_ly_thuyet/response/provider.dart';
import 'package:onthilaixe/network/app_exception.dart';
import 'package:rxdart/rxdart.dart';

class HocLyThuyetBloc {
  bool isDispose = false;

  final _provider = HocLyThuyetProvider();

  late BehaviorSubject< List<HocLyThuyetModel>> _fetchHocLyThuyet; //1 dang cua StreamController
  //ừ
  Stream<List<HocLyThuyetModel>> get baiHocLyThuyetStream => _fetchHocLyThuyet.stream;
  List<HocLyThuyetModel> lythuyet = [];


  init() {

    _fetchHocLyThuyet = BehaviorSubject();
    isDispose = false;
  }

  dispose() {
    isDispose = true;

    _fetchHocLyThuyet.close();
  }



  Future<HocLyThuyetResponse?> getAllLLT() async {
    try {
      var response = await _provider.getAllLLT();
      lythuyet.addAll(response.lythuyet);
      if (!isDispose) _fetchHocLyThuyet.sink.add(lythuyet);
      // quăng data vào stream
    }
    on AppException {
      print('ERROR ${AppException().message}');
      return null;
    }
  }
}