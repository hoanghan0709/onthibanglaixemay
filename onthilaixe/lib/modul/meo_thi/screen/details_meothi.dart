import 'package:flutter/material.dart';
import 'package:onthilaixe/modul/meo_thi/bloc/detail_meothi_bloc.dart';
import 'package:onthilaixe/modul/meo_thi/model/meo_thi_model.dart';

class DetailsMeoThi extends StatefulWidget {
  MeoThiModel data;

  DetailsMeoThi({Key? key, required this.data}) : super(key: key);
  @override
  _DetailsMeoThiState createState() => _DetailsMeoThiState();
}

class _DetailsMeoThiState extends State<DetailsMeoThi> {
  final bloc = DetailMeothiBloc();
  @override
  void initState() {
    bloc.init();
    bloc.loadMeothi(widget.data);
    super.initState();
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('Thông tin mẹo thi'),
      ),
      body: Container(
        child: StreamBuilder<MeoThiModel>(
          stream: bloc.meothiStream,
          builder: (context, snapshot) {
            return snapshot.hasData
                ? Column(
                    children: <Widget>[
                      SizedBox(
                        height: 20,
                      ),
                      Container(
                        padding: EdgeInsets.only(left: 20,right:20),
                        child: Text(
                          snapshot.data!.Ten,
                          style: TextStyle(
                              fontSize: 20, fontWeight: FontWeight.bold),
                        ),
                      ),
                      SizedBox(
                        height: 20,
                      ),
                      Container(
                        padding: EdgeInsets.only(left: 30,right:30),
                        child: Text(
                          snapshot.data!.NoiDung,
                          style: TextStyle(fontSize: 16),
                        ),
                      )
                    ],
                  )
                : CircularProgressIndicator();
          },
        ),
      ),
    );
  }
}
