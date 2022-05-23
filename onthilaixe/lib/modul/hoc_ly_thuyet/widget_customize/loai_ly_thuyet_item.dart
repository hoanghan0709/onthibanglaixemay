import 'package:flutter/material.dart';
import 'package:flutter_svg/flutter_svg.dart';
import 'package:onthilaixe/appconst/appconst.dart';
import 'package:onthilaixe/modul/thi_sat_hach/screen/man_hinh_thuc_hanh.dart';

class LoaiLyThuyetItem extends StatelessWidget {
  final String title;
  final int id;

  final String icon;

  LoaiLyThuyetItem(
      {Key? key, required this.title, required this.icon, required this.id})
      : super(key: key);

  @override
  Widget build(BuildContext context) {
    return ListTile(
      onTap: () {
        Navigator.push(
            context,
            MaterialPageRoute(
              builder: (context) => ManHinhThucHanh(
                type: TrangChuType.lythuyet,
                number: id,

              ),
            ));
      },
      leading: Image.network(
        icon,
        height: 50,
        width: 50,
      ),
      title: Text(
        title,
        style: TextStyle(fontSize: 20),
      ),
    );
  }
}
