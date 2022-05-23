import 'package:flutter/material.dart';
import 'package:onthilaixe/appconst/appdata.dart';
import 'package:onthilaixe/modul/bien_bao/bloc/bienbao_bloc.dart';
import 'package:onthilaixe/modul/bien_bao/model/bienbaomodel.dart';
import 'package:onthilaixe/modul/bien_bao/widget_customize/bien_bao_item.dart';

class DsBienBao extends StatefulWidget {
  final int loaiBienBaoId;

  const DsBienBao({Key? key, required this.loaiBienBaoId}) : super(key: key);

  @override
  _DsBienBaoState createState() => _DsBienBaoState();
}

class _DsBienBaoState extends State<DsBienBao> {
  final _bloc = BienBaoBloc();
  @override
  void initState() {
    _bloc.init();
    _bloc.getAllBB(widget.loaiBienBaoId).then((value) {
    });
    super.initState();
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(

        body: StreamBuilder<List<BienBaoModel>>(
            stream: _bloc.bienBaoStream,
            builder: (context, snapshot) {

              return snapshot.hasData? ListView.builder(
                itemCount: snapshot.data!.length,
                itemBuilder: (context, index) {
                  BienBaoModel bienbao = snapshot.data![index];
                  return BienBaoItem(data: bienbao,);
                },
              ):CircularProgressIndicator();
            }
        )
    );
  }
}
