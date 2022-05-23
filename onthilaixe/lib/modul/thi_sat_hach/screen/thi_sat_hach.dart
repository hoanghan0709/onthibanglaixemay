import 'package:flutter/material.dart';
import 'package:onthilaixe/modul/thi_sat_hach/bloc/thisathach_bloc.dart';
import 'package:onthilaixe/modul/thi_sat_hach/model/baithimodel.dart';
import 'package:onthilaixe/modul/thi_sat_hach/widget_customize/item_de_thi.dart';

class ThiSatHach extends StatefulWidget {
  const ThiSatHach({Key? key}) : super(key: key);

  @override
  _ThiSatHachState createState() => _ThiSatHachState();
}

class _ThiSatHachState extends State<ThiSatHach> {
  final _bloc = ThiSatHachBloc();
  @override
  void initState() {
    _bloc.init();
    // _bloc.getBt();
    _bloc.getAllBT();
    super.initState();
  }

  @override
  void dispose() {
    _bloc.dispose();
    super.dispose();
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
        backgroundColor: Colors.blueGrey,
        appBar: AppBar(
          title: Text("Thi Sát Hạch"),
        ),
        body: SingleChildScrollView(
          child: StreamBuilder<List<BaiThiModel>>(
            stream: _bloc.baiThiSatHachStream,
            builder: (context, snapshot) {
              return snapshot.hasData
                  ? Column(
                      children: <Widget>[
                        SizedBox(
                          height: 20,
                        ),

                        Padding(
                          padding: const EdgeInsets.symmetric(
                              horizontal: 5, vertical: 5),
                          child: Wrap(
                              runSpacing: 10,
                              spacing: 10,
                              children: List.generate(
                                  snapshot.data!.length,
                                  (index) => ItemDeThi(
                                      baithi: snapshot.data![index]))),
                        )
                      ],
                    )
                  : Center(
                      child: CircularProgressIndicator(
                      color: Colors.red,
                    ));
            },
          ),
        ));
  }
}
