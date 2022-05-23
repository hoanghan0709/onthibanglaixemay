import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:onthilaixe/modul/dang_ky/bloc/dangky_bloc.dart';
import 'package:onthilaixe/modul/dang_ky/model/dangky_model.dart';
import 'package:onthilaixe/modul/trang_chu/screen/trang_chu.dart';

class DangKy extends StatefulWidget {
  const DangKy({Key? key}) : super(key: key);

  @override
  State<DangKy> createState() => _DangKyState();
}

class _DangKyState extends State<DangKy> {
  final bloc = DangKyBloc();
  late TextEditingController _emailtextEditingController;
  late TextEditingController _passwordtextEditingController;
  late TextEditingController _gioitinhtextEdittingController;
  late TextEditingController _hotentextEdittingController;
  ValueNotifier<bool> showPassword = ValueNotifier(false);

  @override
  void initState() {
    bloc.init();
    _emailtextEditingController = TextEditingController();
    _passwordtextEditingController = TextEditingController();
    _gioitinhtextEdittingController = TextEditingController();
    _hotentextEdittingController = TextEditingController();
    super.initState();
  }

  _showEndTestDialog() {
    showDialog(
        context: context,
        builder: (_) => mounted
            ? Dialog(
                child: Container(
                  alignment: Alignment.center,
                  height: 100,
                  width: 100,
                  child: Column(
                    mainAxisSize: MainAxisSize.min,
                    children: [
                      Text('Đăng Ký Thất Bại'),
                      OutlinedButton(
                          onPressed: () {
                            Navigator.pop(context);
                          },
                          child: Text('OK'))
                    ],
                  ),
                ),
              )
            : Container());
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text(' '),
      ),
      body: Stack(children: [
        Image.asset(
          'assets/background.png',
          height: MediaQuery.of(context).size.height,
          fit: BoxFit.fitHeight,
        ),
        SingleChildScrollView(
          child: Center(
            child: Column(
              children: <Widget>[ SizedBox(
                height: 30,
              ),Text('ĐĂNG KÝ',style: TextStyle(fontWeight: FontWeight.bold,fontStyle: FontStyle.italic,fontSize: 40,color: Colors.red),),
                SizedBox(
                  height: 50,
                ),
                Padding(
                  padding:
                      const EdgeInsets.symmetric(horizontal: 30, vertical: 10),
                  child: TextFormField(
                    controller: _hotentextEdittingController,
                    decoration: const InputDecoration(
                        border: OutlineInputBorder(
                            borderSide:
                                BorderSide(width: 3, color: Colors.black),
                            borderRadius:
                                BorderRadius.all(Radius.circular(20))),
                        hintStyle: TextStyle(color: Colors.black),
                        labelStyle: TextStyle(color: Colors.black),
                        icon: Icon(Icons.accessibility),
                        hintText: 'Họ Tên',
                        labelText: 'Họ Tên'),
                  ),
                ),
                Padding(
                  padding:
                      const EdgeInsets.symmetric(horizontal: 30, vertical: 10),
                  child: TextFormField(
                    controller: _emailtextEditingController,
                    decoration: const InputDecoration(
                        border: OutlineInputBorder(
                            borderSide:
                                BorderSide(width: 3, color: Colors.black),
                            borderRadius:
                                BorderRadius.all(Radius.circular(20))),
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
                      obscureText: value,
                      controller: _passwordtextEditingController,
                      decoration: InputDecoration(
                          border: OutlineInputBorder(
                              borderSide:
                                  BorderSide(width: 3, color: Colors.black),
                              borderRadius:
                                  BorderRadius.all(Radius.circular(20))),
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
                SizedBox(
                  height: 30,
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
                                  horizontal: 60, vertical: 20),
                              shape: RoundedRectangleBorder(
                                  borderRadius: BorderRadius.all(
                                    Radius.circular(20),
                                  ),
                                  side:
                                      BorderSide(color: Colors.red, width: 2))),
                          onPressed: () {
                            DangKyModel dangKyModel = DangKyModel(
                                hoTen: _hotentextEdittingController.text,
                                email: _emailtextEditingController.text,
                                password: _passwordtextEditingController.text);
                            bloc.DangKyUser(dangKyModel).then((value) {
                              if (value != null)
                                Navigator.pop(context);
                              else {
                                _showEndTestDialog();
                              }
                            });
                          },
                          child: Text(
                            'Đăng Ký',
                            style: TextStyle(
                              color: Colors.black,
                            ),
                          )),
                    )
                  ],
                )
              ],
            ),
          ),
        ),
      ]),
    );
  }
}
