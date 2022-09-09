import 'package:flutter/material.dart';

import '../utils/user_credentials.dart';

class SplashPage extends StatefulWidget {
  const SplashPage({super.key});

  @override
  State<SplashPage> createState() => _SplashPageState();
}

class _SplashPageState extends State<SplashPage> {
  @override
  void initState() {
    super.initState();
    isLoggedIn();
  }

  final UserCredentials _credentials = UserCredentials();
  isLoggedIn() async {
    var navigator = Navigator.of(context);
    int? id = await _credentials.readId();
    Future.delayed(const Duration(seconds: 3)).then((value) {
      if (id == null) {
        navigator.pushNamedAndRemoveUntil('/login', (_) => false);
      } else {
        navigator.pushNamedAndRemoveUntil('/homepage', (_) => false);
      }
    });
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: Colors.white,
      body: Center(
        child: Image.asset("assets/splash.gif"),
      ),
    );
  }
}
