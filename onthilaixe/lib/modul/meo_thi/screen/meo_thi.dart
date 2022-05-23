import 'package:flutter/material.dart';
import 'package:onthilaixe/modul/meo_thi/bloc/meo_thi_bloc.dart';
import 'package:onthilaixe/modul/meo_thi/model/loai_meo_thi_model.dart';
import 'package:onthilaixe/modul/meo_thi/screen/ds_meothi.dart';

class MeoThi extends StatefulWidget {
  const MeoThi({Key? key}) : super(key: key);

  @override
  _MeoThiState createState() => _MeoThiState();
}

class _MeoThiState extends State<MeoThi> with TickerProviderStateMixin {
  late TabController _tabController;
  final bloc = MeoThiBloc();
  late int id;
  int tabBarleng = 0;

  @override
  void initState() {
    bloc.init();
    _tabController= TabController(length: 0, vsync: this);
    bloc.getAllLMT().then((value) {
      if (value != null) {
        tabBarleng = value.loaimeothi.length;
        _tabController =
            TabController(length: value.loaimeothi.length, vsync: this);
      } else
        print("ERROR RETURN NULL");
    }).whenComplete(() {});
    super.initState();
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text('Mẹo thi'),
      ),
      body: SingleChildScrollView(
        child: StreamBuilder<List<LoaiMeoThiModel>>(
            stream: bloc.LoaiMeoThiStream,
            builder: (context, snapshot) {
              return snapshot.hasData
                  ? Column(
                      children: [
                        TabBar(
                          isScrollable: true,
                          controller: _tabController,
                          tabs: snapshot.data!.map((e) {
                            return Tab(
                                child: Text(
                              e.TenLoaiMeoThi,
                              style: TextStyle(color: Colors.black),
                            ));
                          }).toList(),
                        ),
                        Container(
                          height: MediaQuery.of(context).size.height -
                              (MediaQuery.of(context).padding.top +
                                  kToolbarHeight),
                          child: TabBarView(
                              controller: _tabController,
                              children: List.generate(
                                  tabBarleng,
                                  (index) => Center(
                                        child: DsMeoThi(
                                          loaiMeoThiID:
                                              snapshot.data![index].id,
                                        ),
                                      ))),
                        ),
                      ],
                    )
                  : CircularProgressIndicator();
            }),
      ),
    );
  }
}
