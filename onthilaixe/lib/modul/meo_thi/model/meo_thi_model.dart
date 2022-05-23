class MeoThiModel{
  int id =0;
  String NoiDung ='';
  String Ten='';
  MeoThiModel({this.id=0,this.NoiDung='',this.Ten=''});
  MeoThiModel.map(dynamic object){
    this.id = object['id'] ?? 0;
    this.Ten=object['Ten']?? '';
    this.NoiDung=object['NoiDung'] ?? '';

  }
}