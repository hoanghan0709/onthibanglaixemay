import 'package:flutter/material.dart';
import 'package:flutter_countdown_timer/countdown_controller.dart';
import 'package:flutter_countdown_timer/countdown_timer_controller.dart';
import 'package:flutter_countdown_timer/current_remaining_time.dart';
import 'package:flutter_countdown_timer/flutter_countdown_timer.dart';
import 'package:onthilaixe/appconst/appconst.dart';
import 'package:onthilaixe/appconst/appdata.dart';
import 'package:onthilaixe/modul/thi_sat_hach/bloc/thisathach_bloc.dart';
import 'package:onthilaixe/modul/thi_sat_hach/model/cauhoi_model.dart';
import 'package:onthilaixe/modul/thi_sat_hach/screen/thi_sat_hach.dart';
import 'package:onthilaixe/modul/thi_sat_hach/widget_customize/radiobutton.dart';

class ManHinhThucHanh extends StatefulWidget {
  final int number;
  final TrangChuType type;

  ManHinhThucHanh({
    Key? key,
    required this.number,
    required this.type,
  }) : super(key: key);

  @override
  _ManHinhThucHanhState createState() => _ManHinhThucHanhState();
}

class _ManHinhThucHanhState extends State<ManHinhThucHanh>
    with AutomaticKeepAliveClientMixin {
  late CountdownTimerController _countdownController;

  int endTimeMinute = 0;
  int endTimeSec = 0;
  final bloc = ThiSatHachBloc();
  int currentPage = 0;
  final _pageController = PageController(initialPage: 0, keepPage: false);

  CurrentRemainingTime? remainingTime;
  String dapanChonn = 'abc';
  int diem = 0;

  @override
  void dispose() {
    _countdownController.dispose();
    bloc.dispose();
    super.dispose();
  }

  @override
  void initState() {
    bloc.init();
    if (widget.type == TrangChuType.thisathach)
      bloc.getCHbyBT(widget.number);
    else
      bloc.getCHbyLT(widget.number);

    _countdownController = CountdownTimerController(
        endTime: DateTime.now().millisecondsSinceEpoch + 1200000,
        onEnd: () => _showEndTestDialog(endTimeMinute, endTimeSec));
    super.initState();
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        elevation: 0,
        leading: IconButton(
          onPressed: () {
            Navigator.pop<Map<String, dynamic>>(
                context, {'diem': diem, 'time': remainingTime});
          },
          icon: Icon(Icons.arrow_back),
        ),
        title: Text((widget.type == TrangChuType.thisathach)
            ? "Bộ đề ${widget.number}"
            : "Học lý thuyết"),
        actions: [
          widget.type == TrangChuType.thisathach ? _thoigian() : Container(),
          widget.type == TrangChuType.thisathach
              ? Center(
                  child: TextButton(
                  child: Text('Kết thúc',
                      style: TextStyle(
                          color: Colors.white,
                          fontSize: 18,
                          fontWeight: FontWeight.w700)),
                  onPressed: () {
                    _handleEndTime(_countdownController.currentRemainingTime);
                    _countdownController.dispose();
                    _showEndTestDialog(endTimeMinute, endTimeSec);
                    for (int i = 0; i < bloc.cauhoi.length; i++) {
                      if (bloc.ketqua[i] == true) diem++;
                    }
                    print('Kết quả đạt được: ${bloc.ketqua}');
                  },
                ))
              : Container(child: Text(' '))
        ],
      ),
      body: _builCH(),
    );
  }

  Widget _builCH() {
    return widget.type == TrangChuType.thisathach ? _CHbyBT() : _CHbyLT();
  }

  Widget _CHbyBT() {
    return StreamBuilder<List<CauHoiModel>>(
        stream: bloc.cauHoiStream,
        builder: (context, snapshot) {
          return snapshot.hasData
              ? PageView.builder(
                  physics: NeverScrollableScrollPhysics(),
                  controller: _pageController,
                  itemCount: snapshot.data!.length,
                  itemBuilder: (_, index) {
                    ValueNotifier<int> _groupValue = ValueNotifier(-1);
                    bool hasImage = snapshot.data![index].hinhAnh != null;
                    return SingleChildScrollView(
                      child: Column(
                        children: <Widget>[
                          Text(
                            snapshot.data![index].tenCH,
                            style: TextStyle(
                                fontSize: 18, fontWeight: FontWeight.w700),
                          ),
                          Container(
                            padding: EdgeInsets.only(left: 10, right: 10),
                            child: Text(
                              snapshot.data![index].noidungCH,
                              style: TextStyle(
                                  fontSize: 18, fontWeight: FontWeight.w700),
                            ),
                          ),
                          hasImage
                              ? Image.network(
                                  snapshot.data![index].hinhAnh ?? '',
                                  height:
                                      MediaQuery.of(context).size.width - 150,
                                  width:
                                      MediaQuery.of(context).size.width - 160,
                                )
                              : Container(),
                          ListView.separated(
                              shrinkWrap: true,
                              separatorBuilder: (context, i) => Divider(
                                    color: Colors.black,
                                  ),
                              itemCount: 4,
                              itemBuilder: (context, i) {
                                return ValueListenableBuilder<int>(
                                  valueListenable: _groupValue,
                                  builder: (_, value, __) {
                                    return SingleRadioButton<int>(
                                      title:
                                          "${_getDapAn(i, snapshot.data![index])}",
                                      onChanged: (value) {
                                        _groupValue.value = value ?? 0;
                                        dapanChonn =
                                            _getDapAn(i, snapshot.data![index]);
                                        if (dapanChonn ==snapshot.data![index].dapAnDung) {
                                          bloc.ketqua[index] = true;
                                        }
                                      },
                                      groupValue: value,
                                      value: i,
                                    );
                                  },
                                );
                              }),
                          Align(
                            alignment: Alignment.bottomCenter,
                            child: index == snapshot.data!.length - 1
                                ? Container()
                                : OutlinedButton(
                                    style: OutlinedButton.styleFrom(
                                        backgroundColor: Colors.red,
                                        side: BorderSide(
                                            width: 1, color: Colors.red),
                                        shape: RoundedRectangleBorder(
                                            borderRadius: BorderRadius.all(
                                                Radius.circular(40)))),
                                    child: Text(
                                      'Câu tiếp theo',
                                      style: TextStyle(color: Colors.black),
                                    ),
                                    onPressed: () {
                                      currentPage++;
                                      _pageController.animateToPage(currentPage,
                                          duration: Duration(milliseconds: 300),
                                          curve: Curves.ease);
                                    },
                                  ),
                          ),
                        ],
                      ),
                    );
                  })
              : Center(child: Text(''));
        });
  }

  Widget _giaithich(String giaithich, ValueNotifier<bool> showGiaiThich) {
    bloc.giaithich(giaithich);
    return ValueListenableBuilder<bool>(
      builder: (context, value, child) => value
          ? Container(
              height: 300,
              width: MediaQuery.of(context).size.width,
              decoration: BoxDecoration(
                  gradient: LinearGradient(
                      colors: [Color(0xFFEEBD89), Color(0xFFD13ABD)],
                      begin: Alignment.topLeft,
                      end: Alignment.bottomRight),
                  borderRadius: BorderRadius.circular(20)),
              padding:
                  const EdgeInsets.symmetric(horizontal: 20.0, vertical: 20.0),
              child: SingleChildScrollView(
                child: Column(
                  children: <Widget>[
                    Text(
                      'GIẢI THÍCH ĐÁP ÁN:',
                      style:
                          TextStyle(fontSize: 20, fontWeight: FontWeight.bold),
                    ),
                    SizedBox(
                      height: 20,
                    ),
                    StreamBuilder<String>(
                      stream: bloc.giaithichStream,
                      builder: (context, snapshot) {
                        return Row(
                          children: [
                            Expanded(
                              child: Text(
                                snapshot.data ?? '',
                                style: TextStyle(
                                    fontSize: 15, color: Colors.black45),
                              ),
                            ),
                          ],
                        );
                      },
                    )
                  ],
                ),
              ),
            )
          : Container(),
      valueListenable: showGiaiThich,
    );
  }

  Widget _CHbyLT() {
    return StreamBuilder<List<CauHoiModel>>(
        stream: bloc.cauHoiStream,
        builder: (context, snapshot) {
          return snapshot.hasData
              ? PageView.builder(
                  // physics: NeverScrollableScrollPhysics(),
                  controller: _pageController,
                  itemCount: snapshot.data!.length,
                  itemBuilder: (_, index) {
                    ValueNotifier<int> _groupValue = ValueNotifier(-1);
                    bool hasImage = snapshot.data![index].hinhAnh != null;
                    ValueNotifier<bool> showGiaiThich = ValueNotifier(false);

                    return SingleChildScrollView(
                      child: Column(
                        children: <Widget>[
                          Text(
                            snapshot.data![index].tenCH,
                            style: TextStyle(
                                fontSize: 18, fontWeight: FontWeight.w700),
                          ),
                          Container(
                            padding: EdgeInsets.only(left: 10, right: 10),
                            child: Text(
                              snapshot.data![index].noidungCH,
                              style: TextStyle(
                                  fontSize: 18, fontWeight: FontWeight.w700),
                            ),
                          ),
                          hasImage
                              ? Image.network(
                                  snapshot.data![index].hinhAnh ?? '',
                                  height:
                                      MediaQuery.of(context).size.width - 100,
                                  width:
                                      MediaQuery.of(context).size.width - 100,
                                )
                              : Container(),
                          ListView.separated(
                              shrinkWrap: true,
                              separatorBuilder: (context, i) => Divider(
                                    color: Colors.black,
                                  ),
                              itemCount: 4,
                              itemBuilder: (context, i) {
                                return ValueListenableBuilder<int>(
                                  valueListenable: _groupValue,
                                  builder: (_, value, __) {
                                    return SingleRadioButton<int>(
                                      title:
                                          "${_getDapAn(i, snapshot.data![index])}",
                                      onChanged: (value) {
                                        _groupValue.value = value ?? 0;
                                        dapanChonn =
                                            _getDapAn(i, snapshot.data![index]);
                                        showGiaiThich.value =  snapshot.data![index].dapAnDung == dapanChonn   ? true : false;
                                      },
                                      groupValue: value,
                                      value: i,
                                    );
                                  },
                                );
                              }),
                          _giaithich(
                              snapshot.data![index].giaithich, showGiaiThich)
                        ],
                      ),
                    );
                  })
              : Center(child: Text(''));
        });
  }

  Widget _thoigian() {
    return CountdownTimer(
      controller: _countdownController,
      widgetBuilder: (context, time) {
        if (time != null) {
          return Container(
            padding: EdgeInsets.only(top: 20),
             height: 20,
            child: Text(
              '${time.min ?? 0}:${time.sec ?? 0}',
              style: TextStyle(color: Colors.white,fontSize: 16),
            ),
          );
        } else
          return Container();
      },
    );
  }

  String _getDapAn(int index, CauHoiModel cauhoi) {
    switch (index) {
      case 0:
        return cauhoi.dapAnA;
      case 1:
        return cauhoi.dapAnB;
      case 2:
        return cauhoi.dapAnC;
      case 3:
        return cauhoi.dapAnD;
      default:
        return '';
    }
  }

  _showEndTestDialog(int time, int endTimeSec) {
    showDialog(
        context: context,
        builder: (_) => mounted
            ? Dialog(
                child: Container(
                  padding: EdgeInsets.only(top: 20),
                  height: 130,
                  width: 200,
                  child: Column(
                    mainAxisSize: MainAxisSize.min,
                    children: [
                      Text(
                        'Hết Thời Gian Làm Bài!',
                        style: TextStyle(
                            fontSize: 20, fontWeight: FontWeight.bold),
                      ),
                      SizedBox(
                        height: 5,
                      ),
                      Text(
                        'Thời gian đã làm:${endTimeMinute}:${endTimeSec}',
                        style: TextStyle(
                            fontSize: 15, fontWeight: FontWeight.bold),
                      ),
                      OutlinedButton(
                          onPressed: () {
                            Navigator.pop(context);
                          },
                          child: Text('OK'))
                    ],
                  ),
                ),
              )
            : Container());
  }

  void _handleEndTime(CurrentRemainingTime? currentRemainingTime) {
    endTimeMinute = 19 - currentRemainingTime!.min!.toInt();
    endTimeSec = 60 - currentRemainingTime.sec!.toInt();
    remainingTime = currentRemainingTime;
  }

  @override
  bool get wantKeepAlive => true;
}
