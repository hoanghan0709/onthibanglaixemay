class DangKyModel {
  String hoTen ='';
  String email = '';
  String password='';

  DangKyModel({
    this.hoTen='', this.email='',this.password=''
  });
  DangKyModel.map(dynamic object) {
    this.hoTen = object['HoTenUser'] ?? '';
    this.email = object['email'] ?? '';
    this.password = object['password'] ?? '';
  }
    Map<String,dynamic> toJson()=>{
     'HoTenUser':hoTen,
      'email':email,
      'password':password
    };
}