import 'dart:convert';

import 'package:get/get.dart';
import 'package:myapp/model/intern_model.dart';
import 'package:myapp/utils/remote_services.dart';

class HomePageController extends GetxController {
  // @override
  // void onInit() {
  //   super.onInit();
  //   fetchInterns();
  // }

  bool loading = false;
  List<InternModel> interns = [];
  fetchInterns() async {
    loading = true;
    update();
    var response = await RemoteService().fetchInterns();
    interns = internModelFromJson(json.encode(response.data['data']));
    loading = false;
    update();
  }
}
