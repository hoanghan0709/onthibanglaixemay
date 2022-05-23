import 'package:flutter/material.dart';
import 'package:onthilaixe/modul/bien_bao/bloc/details_bienbao_bloc.dart';
import 'package:onthilaixe/modul/bien_bao/model/bienbaomodel.dart';
import 'package:onthilaixe/modul/bien_bao/screen/bien_bao.dart';
import 'package:onthilaixe/modul/meo_thi/model/meo_thi_model.dart';

class DetailsBienBao extends StatefulWidget {
  BienBaoModel data;
  DetailsBienBao({Key? key, required this.data}) : super(key: key);

  @override
  _DetailsBienBaoState createState() => _DetailsBienBaoState();
}

class _DetailsBienBaoState extends State<DetailsBienBao> {
  final bloc = DetailsBienBaoBloc();
  @override
  void initState() {
    bloc.init();
    bloc.loadBienBao(widget.data);
    super.initState();
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: Text('Thông tin biển báo')),
      body: StreamBuilder<BienBaoModel>(
        stream: bloc.BienBaoStream,
        builder: (context, snapshot) {
          return snapshot.hasData
              ? SingleChildScrollView(
                  child: Column(
                    children: <Widget>[
                      SizedBox(
                        height: 50,
                      ),
                      Center(child: Image.network(snapshot.data!.HinhAnhBB)),
                      SizedBox(
                        height: 10,
                      ),
                      Container(
                        child: Text(
                          snapshot.data!.tenBB,
                          style: TextStyle(
                              fontSize: 20, fontWeight: FontWeight.bold),
                        ),
                        padding: EdgeInsets.only(left: 30, right: 30),
                      ),
                      SizedBox(
                        height: 15,
                      ),
                      Container(
                        child: Text(
                          snapshot.data!.noidungBB,
                          style: TextStyle(fontSize: 16),
                        ),
                        padding: EdgeInsets.only(left: 30, right: 30),
                      )
                    ],
                  ),
                )
              : CircularProgressIndicator();
        },
      ),
    );
  }
}
