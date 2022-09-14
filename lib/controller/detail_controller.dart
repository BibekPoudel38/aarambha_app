import 'dart:convert';

import 'package:fluttertoast/fluttertoast.dart';
import 'package:get/get.dart';
import 'package:myapp/model/intern_detail_model.dart';
import 'package:myapp/utils/remote_services.dart';

class DetailController extends GetxController {
  DetailController(this.id);
  final int id;

  @override
  void onInit() {
    super.onInit();
    fetchInternDetail(id);
  }

  bool loading = false;
  InternDetailModel? model;
  fetchInternDetail(int id) async {
    loading = true;
    update();
    await Future.delayed(const Duration(seconds: 3));
    var response = await RemoteService().fetchInternDetail(id);
    bool status = response.data['status'];
    if (status) {
      Fluttertoast.showToast(msg: "Data loaded");
      // log(response.data['data'].toString());

      model = internDetailModelFromJson(json.encode(response.data['data']));
    } else {
      model = null;
      Fluttertoast.showToast(msg: response.data["message"]);
    }
    loading = false;
    update();
  }
}
