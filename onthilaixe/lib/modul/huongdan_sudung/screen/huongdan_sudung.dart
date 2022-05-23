
import 'package:flutter/material.dart';
import 'dart:async'show Future;
import 'package:flutter/services.dart' show rootBundle;
class HuongDanSuDung extends StatefulWidget {
  const HuongDanSuDung({Key? key}) : super(key: key);

  @override
  _HuongDanSuDungState createState() => _HuongDanSuDungState();
}

class _HuongDanSuDungState extends State<HuongDanSuDung> {
  ValueNotifier<String> instruction=ValueNotifier('dang load');

  fetchFilteData() async {
    String responText;
    responText = await rootBundle.loadString('assets/data.txt');
    setState(() {
      instruction.value = responText;
    });
  }
  @override
  void initState() {
    super.initState();

    fetchFilteData();
  }
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('Hướng Dẫn Sử Dụng'),
      ),
      body: SingleChildScrollView(

        child: Container(
          color: Colors.black12,
          padding: EdgeInsets.symmetric(vertical: 20,horizontal: 20),
            child: ValueListenableBuilder<String>(
              valueListenable: instruction,
              builder: (context, value, child) => Text(  value  ,
                  style: TextStyle(fontSize: 24)),
            )),
      ),
    );
  }
}
