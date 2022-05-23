import 'package:flutter/material.dart';
import 'package:flutter_svg/flutter_svg.dart';
import 'package:onthilaixe/appconst/appconst.dart';
import 'package:onthilaixe/modul/bien_bao/screen/bien_bao.dart';
import 'package:onthilaixe/modul/hoc_ly_thuyet/screen/hoc_ly_thuyet.dart';
import 'package:onthilaixe/modul/meo_thi/screen/meo_thi.dart';
import 'package:onthilaixe/modul/thi_sat_hach/screen/thi_sat_hach.dart';

class ItemTrangChu extends StatelessWidget {
  final String title;
  final String icon;
  final Color color;
  final TrangChuType type;

  const ItemTrangChu(
      {Key? key,
      required this.title,
      required this.icon,
      required this.color,
      required this.type})
      : super(key: key);

  @override
  Widget build(BuildContext context) {
    return InkWell(
      onTap: () {
        switch (type) {
          case TrangChuType.thisathach:
            Navigator.push(
                context, MaterialPageRoute(builder: (_) => ThiSatHach()));
            break;
          case TrangChuType.lythuyet:
            Navigator.push(context,MaterialPageRoute(builder: (_)=>HocLyThuyet()));
            break;
          case TrangChuType.bienbao:
            Navigator.push(context,MaterialPageRoute(builder: (_)=>BienBao()));
            break;
          case TrangChuType.meothi:
          Navigator.push(context,MaterialPageRoute(builder: (_)=>MeoThi()));
            break;
        }
      },
      child: Container(
        decoration: BoxDecoration(
          color: color,
          borderRadius: BorderRadius.only(
              topLeft: Radius.circular(30),
              topRight: Radius.circular(30),
              bottomLeft: Radius.circular(30),
              bottomRight: Radius.circular(30)),
          boxShadow: [
            BoxShadow(
                color: Colors.black26,
                spreadRadius: 2.1,
                blurRadius: 0,
                offset: Offset(0, 10))
          ],
        ),
        width: MediaQuery.of(context).size.width / 2 - 30,
        height: MediaQuery.of(context).size.width / 2 - 30,
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          children: <Widget>[
            SvgPicture.asset(
              icon,
              width: 50,
              height: 50,
            ),
            SizedBox(
              height: 20,
            ),
            Text(
              title,
              style: TextStyle(fontWeight: FontWeight.w700, fontSize: 20),
            )
          ],
        ),
      ),
    );
  }
}
