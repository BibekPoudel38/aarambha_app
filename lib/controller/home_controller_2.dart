import 'dart:convert';
import 'dart:developer';

import 'package:fluttertoast/fluttertoast.dart';
import 'package:get/get.dart';
import 'package:myapp/model/intern_model.dart';
import 'package:myapp/utils/remote_services.dart';

class HomeController2 extends GetxController {
  @override
  void onInit() {
    super.onInit();
    loadIntern();
  }

  bool internsLoading = false;
  List<InternModel> interns = [];
  loadIntern() async {
    internsLoading = true;
    update();
    await Future.delayed(const Duration(seconds: 3));

    var response = await RemoteService().fetchInterns();
    if (response.data['status'] == false) {
      Fluttertoast.showToast(msg: response.data['message']);
    } else {
      interns = internModelFromJson(json.encode(response.data['data']));
      log(interns.length.toString());
    }
    internsLoading = false;
    update();
  }
}
