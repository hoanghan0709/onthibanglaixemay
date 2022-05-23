import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:onthilaixe/appconst/appdata.dart';
import 'package:onthilaixe/modul/dang_ky/screen/dang_ky.dart';
import 'package:onthilaixe/modul/dang_nhap/bloc/dangnhap_bloc.dart';
import 'package:onthilaixe/modul/dang_nhap/model/dangnhapmodel.dart';
import 'package:onthilaixe/modul/dang_nhap/response/provider.dart';
import 'package:onthilaixe/modul/trang_chu/screen/trang_chu.dart';

class DangNhap extends StatefulWidget {
  const DangNhap({Key? key}) : super(key: key);

  @override
  State<DangNhap> createState() => _DangNhapState();
}

class _DangNhapState extends State<DangNhap> {
  late TextEditingController _emailtextEditingController;
  late TextEditingController _passwordtextEditingController;
  ValueNotifier<bool> showPassword = ValueNotifier(false);
  final bloc = DangNhapBloc();
  ValueNotifier<bool> _isLoading = ValueNotifier(false);

  @override
  void initState() {
    bloc.init();
    _emailtextEditingController = TextEditingController();
    _passwordtextEditingController = TextEditingController();

    super.initState();
  }
  _showEndTestDialog() {
    showDialog(
        context: context,
        builder: (_) => mounted
            ? Dialog(
          child: Column(
            mainAxisSize: MainAxisSize.min,
            children: [
              SizedBox(height: 20,),
              Text('Đăng Nhập Thất Bại'),
              OutlinedButton(
                  onPressed: () {
                    Navigator.pop(context);
                  },
                  child: Text('OK'))
            ],
          ),
        )
            : Container());
  }
  @override
  Widget build(BuildContext context) {
    return Scaffold(
appBar: AppBar(title: Text('Đăng nhập'),),
      body: SingleChildScrollView(
        child: Stack(children: [

          Image.asset(
            'assets/background.png',
            height: MediaQuery.of(context).size.height,
            fit: BoxFit.fitHeight,
          ),
          Column(
            mainAxisAlignment: MainAxisAlignment.center,
            children: <Widget>[SizedBox(height: 60,),
               Container(height:200,width: 200,child: Image.asset('assets/logoo.png')),SizedBox(height: 20,),
              Padding(
                padding: const EdgeInsets.symmetric(horizontal: 30),
                child: TextFormField(
                  controller: _emailtextEditingController,
                  decoration: const InputDecoration(
                      border: OutlineInputBorder(
                          borderSide: BorderSide(width: 3, color: Colors.blue),
                          borderRadius: BorderRadius.all(Radius.circular(20))),
                      hintStyle: TextStyle(color: Colors.black),
                      labelStyle: TextStyle(color: Colors.black),
                      icon: Icon(Icons.person),
                      hintText: 'Nhập tài khoản/Email',
                      labelText: 'Tài Khoản'),
                ),
              ),
              SizedBox(
                height: 10,
              ),
              Padding(
                padding: const EdgeInsets.symmetric(horizontal: 30),
                child: ValueListenableBuilder<bool>(
                  valueListenable: showPassword,
                  builder: (BuildContext context, bool value, child) =>
                      TextFormField(
                    style: TextStyle(color: Colors.black),
                    obscureText: !value,
                    controller: _passwordtextEditingController,
                    decoration: InputDecoration(
                        border: OutlineInputBorder(
                            borderSide: BorderSide(width: 3, color: Colors.blue),
                            borderRadius: BorderRadius.all(Radius.circular(20))),
                        hintStyle: TextStyle(color: Colors.black),
                        labelStyle: TextStyle(color: Colors.black),
                        icon: Icon(Icons.lock),
                        suffixIcon: GestureDetector(
                            onTap: () {
                              showPassword.value = !showPassword.value;
                            },
                            child: Icon(Icons.remove_red_eye_sharp)),
                        hintText: 'Mật khẩu',
                        labelText: 'Nhập mật khẩu'),
                  ),
                ),
              ),
              Row(mainAxisAlignment: MainAxisAlignment.end, children: [
                Padding(
                    padding: EdgeInsets.symmetric(horizontal: 30, vertical: 10),
                    child: GestureDetector(
                        onTap: () {
                          Navigator.pushNamed(context,
                              '/dangKy');
                        },
                        child: Text('Đăng ký ngay!'))),
              ]),
              SizedBox(
                height: 10,
              ),
              Row(
                mainAxisAlignment: MainAxisAlignment.center,
                children: [
                  Container(
                    alignment: Alignment.center,
                    child: OutlinedButton(
                        style: OutlinedButton.styleFrom(
                            backgroundColor: Colors.redAccent,
                            padding: const EdgeInsets.symmetric(
                                horizontal: 80, vertical: 15),
                            shape: RoundedRectangleBorder(
                                borderRadius: BorderRadius.all(
                                  Radius.circular(20),
                                ),
                                side: BorderSide(color: Colors.red, width: 2))),
                        onPressed: () {
                          _showLoading();
                          DangNhapModel dangNhapModel = DangNhapModel(
                              email: _emailtextEditingController.text,
                              password: _passwordtextEditingController.text);
                          Future.delayed(Duration(seconds: 1),(){
                            bloc.DangNhapUser(dangNhapModel).then((value) {
                              if (value!.dangnhap != null) {
                                AppData().profile=value.dangnhap;
                                AppData().islogin=true;
                                AppData().saveProfile(AppData().profile);
                                Navigator.pushNamed(context,
                                    '/trangChu').whenComplete(() {
                                  _passwordtextEditingController.clear();
                                  _emailtextEditingController.clear();
                                  AppData().profile=null;
                                  AppData().islogin=false;
                                  AppData().saveProfile(AppData().profile);// profile = null

                                });
                                _hideLoading();

                              }else{
                                _hideLoading();
                                _showEndTestDialog();
                              }
                              _hideLoading();
                            });
                          });


                        },
                        child: Text(
                          'Đăng Nhập',
                          style: TextStyle(
                            color: Colors.black,
                          ),
                        )),
                  )
                ],
              )
            ],
          ),
          _loadingWidget()
        ]),
      ),
    );
  }

  _showLoading(){
    _isLoading.value=true;
  }
  _hideLoading(){
    _isLoading.value=false;
  }

  _loadingWidget(){
    return ValueListenableBuilder<bool>(valueListenable: _isLoading, builder: (_,value,__){
       if (value) {
         return Column(
           children: [
             Container(
               margin: EdgeInsets.only(left: 50,top: 100),
               color: Colors.black45.withOpacity(0.5),
               width: 300,
               height: 300,
               child: Center(
                 child: Column(
                   children: [SizedBox(height: 150,),
                     CircularProgressIndicator(

                       color: Colors.red,
                       strokeWidth: 1.0,
                       semanticsLabel: 'Loading',
                     ),SizedBox(height: 50,),Text("Đăng Nhập!",style: TextStyle(color: Colors.white,fontSize: 20  )),
                   ],
                 ),
               ),
             ),
           ],
         );
       } else {
         return Container();
       }
     });

  }
}
