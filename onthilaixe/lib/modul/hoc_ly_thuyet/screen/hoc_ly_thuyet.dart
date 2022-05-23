import 'package:flutter/material.dart';
import 'package:onthilaixe/modul/hoc_ly_thuyet/bloc/hoclythuyet_bloc.dart';
import 'package:onthilaixe/modul/hoc_ly_thuyet/model/hoc_ly_thuyet_model.dart';
import 'package:onthilaixe/modul/hoc_ly_thuyet/widget_customize/loai_ly_thuyet_item.dart';
class HocLyThuyet extends StatefulWidget {
  const HocLyThuyet({Key? key}) : super(key: key);

  @override
  _HocLyThuyetState createState() => _HocLyThuyetState();
}

class _HocLyThuyetState extends State<HocLyThuyet> {
  final bloc= HocLyThuyetBloc();
  @override
  void initState() {
    bloc.init();
    bloc.getAllLLT();
    super.initState();
  }
  @override
  void dispose() {
    bloc.dispose();
    super.dispose();
  }
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: Text('Học lý thuyết'),),
      body: StreamBuilder<List<HocLyThuyetModel>>(
        stream: bloc.baiHocLyThuyetStream,
        builder: (context, snapshot) {
          return snapshot.hasData?ListView.builder(
            itemCount: snapshot.data!.length,
              itemBuilder:(context, index) =>  LoaiLyThuyetItem(
                id:snapshot.data![index].id  ,
            title: snapshot.data![index].tenLLT,
            icon: snapshot.data![index].icon,

          )):
          Center(
              child: CircularProgressIndicator(
                color: Colors.blue,
              ));
        }
      ),
    );
  }
}
