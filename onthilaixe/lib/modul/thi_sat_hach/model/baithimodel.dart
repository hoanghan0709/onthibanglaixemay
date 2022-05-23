class BaiThiModel {
  int id = 0;
  String tenBT = '';
  int phut = 0;
  int giay = 0;
  int? diem;
  String? ketqua;
  BaiThiModel({
   this.id=0,
   this.tenBT='',
   this.phut=0,
   this.giay=0,
    this.diem,
    this.ketqua
});
  BaiThiModel.map(dynamic object) {
    this.id = object['id_BT'] ?? 0;
    this.tenBT = object['TenBT'] ?? '';
    this.phut = object['Phut'] ?? 0;
    this.giay = object['Giay'] ?? 0;
    this.diem=object['Diem'];
    this.ketqua=object['KetQua'];
  }

  Map<String,dynamic> toJson()=>{
    'id':id,
    'TenBT':tenBT,
    'Phut':phut,
    'Giay':giay,
    'Diem':diem,
    'KetQua':ketqua
  };
}
