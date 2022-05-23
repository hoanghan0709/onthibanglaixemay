import 'package:flutter/material.dart';
import 'package:onthilaixe/modul/meo_thi/bloc/meo_thi_bloc.dart';
import 'package:onthilaixe/modul/meo_thi/model/meo_thi_model.dart';
import 'package:onthilaixe/modul/meo_thi/widget_customize/meo_thi_item.dart';

class DsMeoThi extends StatefulWidget {
  final int loaiMeoThiID;

  const DsMeoThi({Key? key, required this.loaiMeoThiID}) : super(key: key);

  @override
  _DsMeoThiState createState() => _DsMeoThiState();
}

class _DsMeoThiState extends State<DsMeoThi> {
  final bloc = MeoThiBloc();

  @override
  void initState() {
    bloc.init();
    bloc.getAllMT(widget.loaiMeoThiID);
    super.initState();
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: StreamBuilder<List<MeoThiModel>>(
        stream: bloc.MeoThiStream,
        builder: (context, snapshot) {
          return snapshot.hasData
              ? ListView.builder(
                  itemCount: snapshot.data!.length,
                  itemBuilder: (context, index) {
                    MeoThiModel meothi = snapshot.data![index];
                    return MeoThiItem(data:meothi);
                  },
                )
              : CircularProgressIndicator();
        },
      ),
    );
  }
}
