import 'package:flutter/material.dart';
import 'package:flutter/widgets.dart';
import 'package:flutter_svg/flutter_svg.dart';
import 'package:onthilaixe/modul/bien_bao/model/bienbaomodel.dart';
import 'package:onthilaixe/modul/bien_bao/screen/details_bienbao.dart';

class BienBaoItem extends StatelessWidget {
  BienBaoModel data;


  BienBaoItem(
      {Key? key,

      required this.data})
      : super(key: key);

  @override
  Widget build(BuildContext context) {
    return ListTile(
      onTap: () {
        Navigator.push(
            context,
            MaterialPageRoute(
                builder: (_) => (DetailsBienBao(
                      data: data,
                    ))));
      },
      title: Text(
        data.tenBB,
        style: TextStyle(color: Colors.black),
      ),
      subtitle: Text(data.noidungBB, style: TextStyle(color: Colors.blueAccent)),
      leading: FadeInImage.assetNetwork(
        image: data.HinhAnhBB,
        imageErrorBuilder: (_, __, ___) => Icon(Icons.error),
        placeholder: 'assets/ic_books.svg',
        height: 60,
        width: 60,
      ),
    );
  }
}
