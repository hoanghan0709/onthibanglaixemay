class CauHoiModel {
  int id = 0;
  String tenCH = '';
  String noidungCH = '';
  String? hinhAnh;
  String dapAnDung = '';
  String dapAnLiet = '';
  String dapAnA = '';
  String dapAnB = '';
  String dapAnC = '';
  String dapAnD = '';
  String giaithich = '';


  CauHoiModel({
    this.id = 0,
    this.dapAnA = '',
    this.dapAnB = '',
    this.dapAnC = '',
    this.dapAnD = '',
    this.dapAnDung = '',
    this.dapAnLiet = '',
    this.hinhAnh,
    this.noidungCH = '',
    this.tenCH = '',
    this.giaithich  = '',
  });

  CauHoiModel.map(dynamic obj) {
    this.id = obj['id'] ?? 0;
    this.tenCH = obj['TenCH'] ?? '';
    this.noidungCH = obj['NoiDungCH'] ?? '';
    this.hinhAnh=obj['HinhAnh'];
    this.dapAnLiet = obj['DapAnLiet'] ?? '';
    this.dapAnDung = obj['DapAnDung'] ?? '';
    this.dapAnA = obj['DapAnA'] ?? '';
    this.dapAnB = obj['DapAnB'] ?? '';
    this.dapAnC = obj['DapAnC'] ?? '';
    this.dapAnD = obj['DapAnD'] ?? '';
    this.giaithich = obj['GiaiThich'] ?? '';
  }
}
