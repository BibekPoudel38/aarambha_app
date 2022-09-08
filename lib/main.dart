import 'dart:io';

import 'package:flutter/material.dart';
import 'package:myapp/view/homepage.dart';
import 'package:myapp/view/login.dart';
import 'package:myapp/view/signup.dart';

void main() {
  HttpOverrides.global = MyHttpOverrides();
  runApp(const MyApp());
}

class MyApp extends StatelessWidget {
  const MyApp({super.key});

  // This widget is the root of your application.
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'Flutter Demo',
      theme: ThemeData(
        primarySwatch: Colors.deepOrange,
        primaryColor: Colors.deepOrange,
      ),
      home: const LoginPage(),
      routes: {
        '/homepage': (_) => const Homepage(),
        '/signup': (_) => const SignUpPage(),
      },
    );
  }
}

class MyHttpOverrides extends HttpOverrides {
  @override
  HttpClient createHttpClient(SecurityContext? context) {
    return super.createHttpClient(context)
      ..badCertificateCallback =
          (X509Certificate cert, String host, int port) => true;
  }
}
