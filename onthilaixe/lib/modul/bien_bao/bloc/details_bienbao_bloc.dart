import 'package:onthilaixe/modul/bien_bao/model/bienbaomodel.dart';
import 'package:onthilaixe/modul/bien_bao/response/bien_bao_response.dart';
import 'package:rxdart/rxdart.dart';

class DetailsBienBaoBloc {
  late BehaviorSubject<BienBaoModel> _fetchBienBao;
  Stream<BienBaoModel> get BienBaoStream => _fetchBienBao.stream;




  init() {
    _fetchBienBao = BehaviorSubject();
  }
  dispore() {
    _fetchBienBao.close();
  }
  Future<void> loadBienBao(BienBaoModel data) async{
    _fetchBienBao.sink.add(data);
    return Future.value(data);
  }
}
