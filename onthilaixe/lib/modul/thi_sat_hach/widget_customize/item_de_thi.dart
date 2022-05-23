import 'package:flutter/material.dart';
import 'package:flutter_countdown_timer/current_remaining_time.dart';
import 'package:flutter_svg/flutter_svg.dart';
import 'package:onthilaixe/appconst/appconst.dart';
import 'package:onthilaixe/modul/thi_sat_hach/bloc/thisathach_bloc.dart';
import 'package:onthilaixe/modul/thi_sat_hach/model/baithimodel.dart';
import 'package:onthilaixe/modul/thi_sat_hach/screen/man_hinh_thuc_hanh.dart';

class ItemDeThi extends StatelessWidget {
  final BaiThiModel baithi;

  const ItemDeThi({
    Key? key,
    required this.baithi,
  }) : super(key: key);

  @override
  Widget build(BuildContext context) {
    //danh sách các biến thay đổi giá trị
    ValueNotifier<int?> _diem = ValueNotifier(baithi.diem);
    ValueNotifier<String?> kq = ValueNotifier(baithi.ketqua);
    ValueNotifier<CurrentRemainingTime?> _time = ValueNotifier(null);
    ValueNotifier<int> sec = ValueNotifier(baithi.giay);
    ValueNotifier<int> min = ValueNotifier(baithi.phut);

    final _bloc = ThiSatHachBloc();
    return InkWell(
      onTap: () {
        _diem.value == null
            ? Navigator.push<Map<String, dynamic>>(
                context,
                MaterialPageRoute(
                    builder: (_) => ManHinhThucHanh(
                          number: baithi.id,
                          type: TrangChuType.thisathach,
                        ))).then((data) {
                var time = data!['time' ] as CurrentRemainingTime;
                min.value = 19 - time.min!.toInt();
                sec.value = 60 - time.sec!.toInt();
                _diem.value = data['diem'];
                if (_diem.value! >= 21)
                  kq.value = 'Đã đậu';
                else {
                  kq.value = 'Đã rớt';
                }
                var bt = BaiThiModel(
                    id: baithi.id,
                    tenBT: baithi.tenBT,
                    phut: min.value,
                    giay: sec.value,
                    diem: _diem.value,
                    ketqua: kq.value);
                _bloc.updateBt(bt).whenComplete(() {});
                _time.value = data['time'];
              })
            : showDialog(
                context: context,
                builder: (
                  context,
                ) {
                  return Dialog(
                      child: Container(
                        padding: EdgeInsets.symmetric(vertical: 10),
                        height: 100,width: 100,
                        child: Column(
                    children: [
                        Align(
                            alignment: Alignment.center,
                            child: Text(
                              'Bài thi đã được thi ! Bạn có muốn thi lại?',
                              style: TextStyle(fontSize: 15),
                            )),SizedBox(height: 5,),Row(
                              children: [
                                SizedBox(width:  70,),
                                OutlinedButton(onPressed: (){

                                  Navigator.push<Map<String, dynamic>>(
                                      context,
                                      MaterialPageRoute(
                                          builder: (_) => ManHinhThucHanh(
                                            number: baithi.id,
                                            type: TrangChuType.thisathach,
                                          ))).then((data) {
                                    var time = data!['time' ] as CurrentRemainingTime;
                                    min.value = 19 - time.min!.toInt();
                                    sec.value = 60 - time.sec!.toInt();
                                    _diem.value = data['diem'];
                                    if (_diem.value! >= 21)
                                      kq.value = 'Đã đậu';
                                    else {
                                      kq.value = 'Đã rớt';
                                    }

                                    var bt = BaiThiModel(
                                        id: baithi.id,
                                        tenBT: baithi.tenBT,
                                        phut: min.value,
                                        giay: sec.value,
                                        diem: _diem.value,
                                        ketqua: kq.value);

                                    _bloc.updateBt(bt).whenComplete(() {});


                                    _time.value = data['time'];  Navigator.pop(context);
                                  });
                        }, child: Text('OK')),SizedBox(width: 20,),OutlinedButton(onPressed: (){
                                  Navigator.pop(context);

                                }, child: Text('Canel')),
                              ],
                            ),
                    ],
                  ),
                      ));
                });
      },
      child: Container(
        decoration: BoxDecoration(
          gradient: LinearGradient(
              colors: [Color(0xFFEEBD89), Color(0xFFD13ABD)],
              begin: Alignment.topLeft,
              end: Alignment.bottomRight),
          borderRadius: BorderRadius.only(
              topLeft: Radius.circular(40),
              topRight: Radius.circular(40),
              bottomLeft: Radius.circular(40),
              bottomRight: Radius.circular(40)),
          boxShadow: [
            BoxShadow(
                color: Colors.black26,
                spreadRadius: 1,
                blurRadius: 0,
                offset: Offset(0, 5))
          ],
        ),
        width: MediaQuery.of(context).size.width / 2 - 10,
        height: MediaQuery.of(context).size.width / 2 - 40,
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          children: <Widget>[
            Text(  '${baithi.tenBT}',  style: TextStyle(fontWeight: FontWeight.w700, fontSize: 20),  ),
            SizedBox(
              height: 10,
            ),
            ValueListenableBuilder<int?>(
              valueListenable: _diem,
              builder: (_, diem, __) => Text(
                diem != null ? 'Điểm đạt được:${diem}' : 'CHƯA CÓ ĐIỂM',
                style: TextStyle(fontWeight: FontWeight.w700, fontSize: 20),
              ),
            ),
            ValueListenableBuilder<int>(
              valueListenable: min,
              builder: (_, min, __) => ValueListenableBuilder<int>(
                valueListenable: sec,
                builder: (_, sec, __) => Text(
                  '${min}:${sec}',
                  style: TextStyle(fontWeight: FontWeight.w700, fontSize: 20),
                ),
              ),
            ),
            ValueListenableBuilder<int?>(
              valueListenable: _diem,
              builder: (_, diem, __) => Text(
                diem != null
                    ? diem >= 16
                        ? 'Đã đậu'
                        : 'Đã rớt'
                    : 'THI NGAY',
                style: TextStyle(fontSize: 18, fontWeight: FontWeight.bold),
              ),
            )
          ],
        ),
      ),
    );
  }
}
