class DangNhapModel {
  String email = '';
  String password = '';
  DangNhapModel({this.email = '', this.password = ''});

  DangNhapModel.map(dynamic object) {
    this.email = object['email'] ?? '';
    this.password = object['password'] ?? '';
  }

  Map<String, dynamic> toJson() => {'email': email, 'password': password};
}

class UserModel {
  int id = 0;
  String HoTenUser = '';
  String email = '';
  String password = '';
  UserModel() {
    this.id = 0;
    this.HoTenUser = '';
    this.email = '';
    this.password = '';
  }
  UserModel.map(dynamic object) {
    this.id = object['id'] ?? 0;
    this.HoTenUser = object['HoTenUser'] ?? '';
    this.email = object['email'] ?? '';
    this.password = object['password'] ?? '';
  }

  Map<String, dynamic> toJson() =>
      {'id': id, 'HoTenUser': HoTenUser, 'email': email, 'password': password};
}
