class BienBaoModel {
  String noidungBB = '';
  String HinhAnhBB = '';
  String tenBB = '';
  int id = 0;

  BienBaoModel(
      {this.noidungBB = '', this.HinhAnhBB = '', this.tenBB = '', this.id = 0});
  BienBaoModel.map(dynamic object) {
    this.id = object['id'] ?? 0;
    this.noidungBB = object['NoiDungBB'] ?? '';
    this.tenBB = object['TenBB'] ?? '';
    this.HinhAnhBB = object['HinhAnhBB'] ?? '';
  }
}
