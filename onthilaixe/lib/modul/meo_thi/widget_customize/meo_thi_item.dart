import 'package:flutter/material.dart';
import 'package:onthilaixe/modul/meo_thi/screen/details_meothi.dart';
import 'package:onthilaixe/modul/meo_thi/model/meo_thi_model.dart';
import 'package:onthilaixe/modul/meo_thi/screen/ds_meothi.dart';

class MeoThiItem extends StatelessWidget {
  const MeoThiItem({Key? key, required this.data, })
      : super(key: key);
  final MeoThiModel data;
  @override
  Widget build(BuildContext context) {
    return ListTile(
      onTap: () {
          Navigator.push(context, MaterialPageRoute(builder: (_)=>(DetailsMeoThi(data: data,))));
      },
      title: Text(data.Ten,
          style: TextStyle(color: Colors.black, fontWeight: FontWeight.bold)),
      subtitle: Padding(
          padding: EdgeInsets.symmetric(horizontal: 20.0),
          child: Text(data.NoiDung, style: TextStyle(color: Colors.black))),
    );
  }
}
