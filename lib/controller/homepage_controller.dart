import 'dart:convert';

import 'package:fluttertoast/fluttertoast.dart';
import 'package:get/get.dart';
import 'package:myapp/model/departments_model.dart';
import 'package:myapp/model/intern_model.dart';
import 'package:myapp/utils/remote_services.dart';

class HomePageController extends GetxController {
  @override
  void onInit() {
    super.onInit();
    fetchInterns();
    fetchDepartments();
  }

  fetchAllData() {
    fetchInterns();
    fetchDepartments();
  }

  bool loading = false;
  List<InternModel> interns = [];
  fetchInterns() async {
    loading = true;
    update();
    var response = await RemoteService().fetchInterns();
    print(response.data);
    if (response.data['status'] == false) {
      Fluttertoast.showToast(msg: response.data['message']);
    } else {
      interns = internModelFromJson(json.encode(response.data['data']));
    }
    loading = false;
    update();
  }

  bool departmentsLoading = false;
  List<DepartmentModel> departments = [];
  fetchDepartments() async {
    departmentsLoading = true;
    update();

    var response = await RemoteService().fetchDepartments();
    if (response.data['status'] == false) {
      Fluttertoast.showToast(msg: response.data['message']);
    } else {
      departments = departmentModelFromJson(json.encode(response.data['data']));
    }

    departmentsLoading = false;
    update();
  }
}
