import 'package:flutter/material.dart';
import 'package:onthilaixe/appconst/appdata.dart';
import 'package:onthilaixe/modul/bien_bao/screen/bien_bao.dart';
import 'package:onthilaixe/modul/dang_ky/screen/dang_ky.dart';
import 'package:onthilaixe/modul/dang_nhap/screen/dang_nhap.dart';
import 'package:onthilaixe/modul/hoc_ly_thuyet/screen/hoc_ly_thuyet.dart';
import 'package:onthilaixe/modul/huongdan_sudung/screen/huongdan_sudung.dart';
import 'package:onthilaixe/modul/meo_thi/screen/meo_thi.dart';
import 'package:onthilaixe/modul/thi_sat_hach/screen/man_hinh_thuc_hanh.dart';
import 'package:onthilaixe/modul/thi_sat_hach/screen/thi_sat_hach.dart';

import 'modul/trang_chu/screen/trang_chu.dart';

void main() {
  WidgetsFlutterBinding.ensureInitialized();
  AppData().getData();
  runApp(const MyApp());
}

class MyApp extends StatelessWidget {
  const MyApp({Key? key}) : super(key: key);

  // This widget is the root of your application.
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      initialRoute: AppData().islogin?'/trangChu':'/dangNhap',
      routes: {
        "/trangChu": (context) => TrangChu(),
        "/thiSatHach": (context) => ThiSatHach(),
        "/dangNhap": (context) => DangNhap(),
        "/dangKy": (context) => DangKy(),
        "/hocLyThuyet": (context) => HocLyThuyet(),
        "/bienBao": (context) => BienBao(),
        "/meoThi": (context) => MeoThi(),
        "/huongDanSuDung":(context)=>HuongDanSuDung()
      },
      debugShowCheckedModeBanner: false,
      title: 'Flutter Demo',
      theme: ThemeData(

        primarySwatch: Colors.blue,
      ),
      // home: AppData().islogin?TrangChu(): DangNhap(),
    );
  }
}

class MyHomePage extends StatefulWidget {
  const MyHomePage({Key? key, required this.title}) : super(key: key);


  final String title;

  @override
  State<MyHomePage> createState() => _MyHomePageState();
}

class _MyHomePageState extends State<MyHomePage> {
  int _counter = 0;

  void _incrementCounter() {
    setState(() {
      // This call to setState tells the Flutter framework that something has
      // changed in this State, which causes it to rerun the build method below
      // so that the display can reflect the updated values. If we changed
      // _counter without calling setState(), then the build method would not be
      // called again, and so nothing would appear to happen.
      _counter++;
    });
  }

  @override
  Widget build(BuildContext context) {
    // This method is rerun every time setState is called, for instance as done
    // by the _incrementCounter method above.
    //
    // The Flutter framework has been optimized to make rerunning build methods
    // fast, so that you can just rebuild anything that needs updating rather
    // than having to individually change instances of widgets.
    return Scaffold(
      appBar: AppBar(
        // Here we take the value from the MyHomePage object that was created by
        // the App.build method, and use it to set our appbar title.
        title: Text(widget.title),
      ),
      body: Center(
        // Center is a layout widget. It takes a single child and positions it
        // in the middle of the parent.
        child: Column(
          // Column is also a layout widget. It takes a list of children and
          // arranges them vertically. By default, it sizes itself to fit its
          // children horizontally, and tries to be as tall as its parent.
          //
          // Invoke "debug painting" (press "p" in the console, choose the
          // "Toggle Debug Paint" action from the Flutter Inspector in Android
          // Studio, or the "Toggle Debug Paint" command in Visual Studio Code)
          // to see the wireframe for each widget.
          //
          // Column has various properties to control how it sizes itself and
          // how it positions its children. Here we use mainAxisAlignment to
          // center the children vertically; the main axis here is the vertical
          // axis because Columns are vertical (the cross axis would be
          // horizontal).
          mainAxisAlignment: MainAxisAlignment.center,
          children: <Widget>[
            const Text(
              'You have pushed the button this many times:',
            ),
            Text(
              '$_counter',
              style: Theme.of(context).textTheme.headline4,
            ),
          ],
        ),
      ),
      floatingActionButton: FloatingActionButton(
        onPressed: _incrementCounter,
        tooltip: 'Increment',
        child: const Icon(Icons.add),
      ), // This trailing comma makes auto-formatting nicer for build methods.
    );
  }
}
