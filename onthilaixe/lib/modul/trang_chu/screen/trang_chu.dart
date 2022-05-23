import 'dart:async';
import 'dart:ui';

import 'package:flutter/material.dart';
import 'package:flutter_email_sender/flutter_email_sender.dart';
import 'package:onthilaixe/appconst/appconst.dart';
import 'package:onthilaixe/appconst/appdata.dart';
import 'package:onthilaixe/modul/bien_bao/screen/bien_bao.dart';
import 'package:onthilaixe/modul/dang_nhap/screen/dang_nhap.dart';
import 'package:onthilaixe/modul/hoc_ly_thuyet/screen/hoc_ly_thuyet.dart';
import 'package:onthilaixe/modul/huongdan_sudung/screen/huongdan_sudung.dart';
import 'package:onthilaixe/modul/meo_thi/screen/meo_thi.dart';
import 'package:onthilaixe/modul/thi_sat_hach/screen/thi_sat_hach.dart';
import 'package:onthilaixe/modul/trang_chu/widget_customize/item_trangchu.dart';

class TrangChu extends StatefulWidget {
  const TrangChu({Key? key}) : super(key: key);

  @override
  _TrangChuState createState() => _TrangChuState();
}

class _TrangChuState extends State<TrangChu> {
  late PageController pageviewController;

  @override
  void initState() {
    pageviewController = PageController();
    int pageindex = 0;
    Timer.periodic(Duration(seconds: 4), (timer) {
      if (pageindex > 3) pageindex = -1;
      pageindex++;
     if(pageviewController.position!=null) pageviewController.animateToPage(pageindex,
          duration: Duration(seconds: 1), curve: Curves.ease);
    });
    super.initState();
  }
@override
  void dispose() {
    pageviewController.dispose();
    super.dispose();
  }
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      drawer: Drawer(
        child: ListView(
          children: [
            DrawerHeader(
                decoration: BoxDecoration(color: Colors.red),
                child: Column(children: [
                  Text(AppData().profile!.HoTenUser),
                  Text(AppData().profile!.email),
                  Container(

                      height: 100,width: 100,
                      child:  Image.asset('assets/user.png'))
                ])),

            Divider(color: Colors.black45,),
            ListTile(
              onTap: ()  {
                  showModalBottomSheet(context: context, builder: (context) {
                    return Container(
                      height:500, child: Column(
                      children: [Text('Phản hồi'),TextField()],
                    )
                      ,);
                  },);
              },
              leading: Icon(Icons.email),
              title: Text('Email hỗ trợ'),
            ),  Divider(color: Colors.black45,),
            ListTile(onTap: ()=> Navigator.push(
                context,
                MaterialPageRoute(
                  builder: (context) => HuongDanSuDung(),
                )),
              leading: Icon(Icons.info),
              title: Text('Hướng dẫn sử dụng'),
            ), Divider(color: Colors.black45,),
            ListTile(onTap: ()=>Navigator.popUntil(context,  ModalRoute.withName('/dangNhap'),),
              leading: Icon(Icons.exit_to_app),
              title: Text('Đăng xuất'),
            )
          ],
        ),
      ),
      backgroundColor: Colors.cyan,
      appBar: AppBar(
        title: Text("Trang Chủ"),
        backgroundColor: Colors.blue,
      ),
      body: SingleChildScrollView(
        child: Column(
          children: <Widget>[
            Container(
              height: 300,
              width: MediaQuery.of(context).size.width,
              decoration: BoxDecoration(
                boxShadow: [
                  BoxShadow(
                      color: Colors.black38, spreadRadius: 10, blurRadius: 30)
                ],
                borderRadius: BorderRadius.only(
                  topLeft: Radius.zero,
                  topRight: Radius.zero,
                  bottomLeft: Radius.circular(30),
                  bottomRight: Radius.circular(30),
                ),
                border: null,
                color: Colors.transparent,
              ),
              child: PageView.builder(
                  itemCount: 4,
                  controller: pageviewController,
                  itemBuilder: (context, index) => GestureDetector(
                        onTap: () {
                          switch (index) {
                            case 0:
                              Navigator.push(
                                  context,
                                  MaterialPageRoute(
                                    builder: (context) => ThiSatHach(),
                                  ));
                              break;
                            case 1:
                              Navigator.push(
                                  context,
                                  MaterialPageRoute(
                                    builder: (context) => HocLyThuyet(),
                                  ));
                              break;
                            case 2:
                              Navigator.push(
                                  context,
                                  MaterialPageRoute(
                                    builder: (context) => BienBao(),
                                  ));
                              break;
                            case 3:
                              Navigator.push(
                                  context,
                                  MaterialPageRoute(
                                    builder: (context) => MeoThi(),
                                  ));
                              break;
                            default:
                              Navigator.push(
                                  context,
                                  MaterialPageRoute(
                                    builder: (context) => ThiSatHach(),
                                  ));
                          }
                        },
                        child: Stack(children: [
                          ClipRRect(
                            borderRadius: BorderRadius.only(
                                topLeft: Radius.zero,
                                topRight: Radius.zero,
                                bottomLeft: Radius.circular(30),
                                bottomRight: Radius.circular(30)),
                            child: Image.asset(
                              'assets/pageview${index + 1}.png',
                              fit: BoxFit.cover,
                              height: 300,
                            ),
                          ),
                          Positioned(
                              top: 100,
                              child: Padding(
                                  padding: const EdgeInsets.only(left: 65),
                                  child: Text(
                                    index == 0
                                        ? 'THI SÁT HẠCH'
                                        : index == 1
                                            ? 'HỌC LÝ THUYẾT'
                                            : index == 2
                                                ? 'HỌC BIỂN BÁO'
                                                : index == 3
                                                    ? 'HỌC MẸO THI'
                                                    : '',
                                    style: TextStyle(
                                        fontSize: 40,
                                        fontWeight: FontWeight.bold),
                                  ))),
                        ]),
                      )),
            ),
            SizedBox(
              height: 20,
            ),
            Row(children: [
              Spacer(),
              ItemTrangChu(
                title: "Thi Sát Hạch",
                icon: "assets/ic_pencil.svg",
                color: Colors.redAccent,
                type: TrangChuType.thisathach,
              ),
              Spacer(),
              ItemTrangChu(
                title: "Học Lý Thuyết",
                icon: "assets/ic_books.svg",
                color: Colors.deepOrangeAccent,
                type: TrangChuType.lythuyet,
              ),
              Spacer()
            ]),
            SizedBox(
              height: 30,
            ),
            Row(children: [
              Spacer(),
              ItemTrangChu(
                title: "Biển Báo",
                icon: "assets/ic_sign.svg",
                color: Colors.purpleAccent,
                type: TrangChuType.bienbao,
              ),
              Spacer(),
              ItemTrangChu(
                title: "Mẹo Thi ",
                icon: "assets/ic_brain.svg",
                color: Colors.lightGreen,
                type: TrangChuType.meothi,
              ),
              Spacer()
            ]),
            SizedBox(
              height: 20,
            )
          ],
        ),
      ),
    );
  }
}
