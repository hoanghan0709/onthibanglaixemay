import 'package:onthilaixe/modul/meo_thi/model/loai_meo_thi_model.dart';
import 'package:onthilaixe/modul/meo_thi/model/meo_thi_model.dart';
import 'package:onthilaixe/modul/meo_thi/response/loai_meo_thi_response.dart';
import 'package:onthilaixe/modul/meo_thi/response/meo_thi_response.dart';
import 'package:onthilaixe/modul/meo_thi/response/provider.dart';
import 'package:onthilaixe/network/app_exception.dart';
import 'package:rxdart/subjects.dart';

class MeoThiBloc {
  final _provider = MeoThiProvider();

  bool isDispose = false;
  late BehaviorSubject<List<MeoThiModel>> _streamMeoThi;

  Stream<List<MeoThiModel>> get MeoThiStream => _streamMeoThi.stream;
  List<MeoThiModel> meothi = [];

  late BehaviorSubject<List<LoaiMeoThiModel>> _streamLoaiMeoThi;

  Stream<List<LoaiMeoThiModel>> get LoaiMeoThiStream => _streamLoaiMeoThi.stream;
  List<LoaiMeoThiModel> loaimeothi = [];


  init() {
    _streamMeoThi = BehaviorSubject();
    _streamLoaiMeoThi = BehaviorSubject();
    isDispose = false;
  }

  dispore() {
    isDispose =true;
    _streamMeoThi.close();
    _streamLoaiMeoThi.close();

  }
  Future<MeoThiResponse?> getMT(MeoThiModel) async{
    try{
      var response =  await _provider.getMT();
      meothi.addAll(response.meothi);
      if (!isDispose) {
        _streamMeoThi.sink.add(meothi);
        return response;
      }
    }
    on AppException {

      print('ERROR ${AppException().message}');
      return null;
    }
  }
  Future<MeoThiResponse?> getAllMT(int id) async{
    try{
      var response =  await _provider.getMTbyLMT(id);
      meothi.addAll(response.meothi);
      if (!isDispose) {
        _streamMeoThi.sink.add(meothi);
        return response;
      }
    }
    on AppException {

      print('ERROR ${AppException().message}');
      return null;
    }
  }

  Future<LoaiMeoThiResponse?> getAllLMT() async {
    try {
      var response = await _provider.getAllLMT();
      loaimeothi.addAll(response.loaimeothi);
      if (!isDispose) {
        _streamLoaiMeoThi.sink.add(loaimeothi);
        return response;
      }
      return null;
      // quăng data vào stream
    } on AppException {
      print('ERROR ${AppException().message}');
      return null;
    }
  }
}


