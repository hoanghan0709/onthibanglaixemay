class HocLyThuyetModel {
  int id = 0;
  String tenLLT = '';
  String icon ='';
  HocLyThuyetModel.map(dynamic object) {
    this.id = object['id'] ?? 0;
    this.tenLLT = object['TenLoaiLT'] ?? '';
      this.icon=object['Icon']??'';
  }
}
