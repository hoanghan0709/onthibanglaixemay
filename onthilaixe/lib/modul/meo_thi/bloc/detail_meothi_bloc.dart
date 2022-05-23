
import 'package:onthilaixe/modul/meo_thi/model/meo_thi_model.dart';
import 'package:rxdart/rxdart.dart';

class DetailMeothiBloc {

  late BehaviorSubject<MeoThiModel> _meothiFetcher;
  Stream<MeoThiModel> get meothiStream => _meothiFetcher.stream;

  init(){
    _meothiFetcher= BehaviorSubject();
  }


  Future<void> loadMeothi(MeoThiModel data)async{
    _meothiFetcher.sink.add(data);
    return Future.value(data);
  }
}