import 'package:flutter/material.dart';
import 'package:onthilaixe/appconst/appdata.dart';
import 'package:onthilaixe/modul/bien_bao/bloc/bienbao_bloc.dart';
import 'package:onthilaixe/modul/bien_bao/model/bienbaomodel.dart';
import 'package:onthilaixe/modul/bien_bao/model/loai_bien_bao.dart';
import 'package:onthilaixe/modul/bien_bao/screen/ds_bienbao.dart';
import 'package:onthilaixe/modul/bien_bao/widget_customize/bien_bao_item.dart';

class BienBao extends StatefulWidget {
  BienBao({Key? key}) : super(key: key);

  @override
  _BienBaoState createState() => _BienBaoState();
}

class _BienBaoState extends State<BienBao> with TickerProviderStateMixin {
  final bloc = BienBaoBloc();
  late int id;
  int tabBarleng = 0;
  late TabController _tabController;

  @override
  void initState() {
    bloc.init();
    _tabController = TabController(length: 0, vsync: this);
    bloc.getAllLBB().then((value) { //lay loai bien bao
      if (value != null) {
        tabBarleng = value.loaibienbao.length;
        _tabController = TabController(length: value.loaibienbao.length, vsync: this);
        value.loaibienbao.forEach((element) {
          bloc.getAllBB(element.id).then((value) {// lay bien bao theo loai bien bao
            AppData().bienbao.update(element, (v) => v = value!.bienbao);
          });
        });

        AppData().saveData();
      } else
        print('RESPONSE RETURN NULL');
    }).whenComplete(() {});
    print('a${AppData().bienbao}');
    super.initState();
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text('Biển Báo'),
      ),
      body: SingleChildScrollView(
        child: StreamBuilder<List<LoaiBienBaoModel>>(
            stream: bloc.loaibienBaoStream,
            builder: (context, snapshot) {
              //load 1 lần 2 cái
              return snapshot.hasData
                  ? Column(children: [
                      TabBar(
                        isScrollable: true,
                        controller: _tabController,
                        tabs: snapshot.data!.map((e) {
                          return Tab(
                              child: Text(
                            e.tenLBB,
                            style: TextStyle(color: Colors.black),
                          ));
                        }).toList(),
                      ),
                      Container(
                        height: MediaQuery.of(context).size.height -
                            (MediaQuery.of(context).padding.top +
                                kToolbarHeight + 70),
                        child: TabBarView(
                          controller: _tabController,
                          children: List.generate(
                            tabBarleng,
                            (index) => Center(
                              child: DsBienBao(
                                loaiBienBaoId: snapshot.data![index].id,
                              ),
                            ),
                          ),
                        ),
                      ),
                    ])
                  : CircularProgressIndicator();
            }),
      ),
    );
  }
}
