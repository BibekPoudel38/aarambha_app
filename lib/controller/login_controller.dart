import 'package:flutter/cupertino.dart';
import 'package:fluttertoast/fluttertoast.dart';
import 'package:get/get.dart';
import 'package:myapp/utils/remote_services.dart';
import 'package:myapp/utils/user_credentials.dart';

class LoginController extends GetxController {
  bool loading = false;

  login(String username, String password, BuildContext context) async {
    loading = true;
    update();
    var navigator = Navigator.of(context);
    RemoteService service = RemoteService();
    var response = await service.login(username, password);
    bool status = response.data['status'];
    if (!status) {
      // FToast.toast(context, toast: Text(""));
      Fluttertoast.showToast(msg: response.data['message']);
    } else {
      Fluttertoast.showToast(msg: response.data['message']);
      UserCredentials userCredentials = UserCredentials();
      userCredentials.storeId(response.data['profile']['id']);
      navigator.pushNamedAndRemoveUntil('/homepage', (_) => false);
    }
    loading = false;
    update();
  }
}
