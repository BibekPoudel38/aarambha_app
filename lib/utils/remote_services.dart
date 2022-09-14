import 'package:dio/dio.dart';
import 'package:myapp/utils/constants.dart';

class RemoteService {
  Future<Response> login(String username, String password) async {
    String url = "$baseUrl/api/login.php";
    var data = FormData.fromMap({
      "username": username,
      "password": password,
    });
    var response = await Dio().post(url, data: data);
    return response;
  }

  Future<Response> fetchInterns() async {
    String url = "$baseUrl/api/read_interns.php";
    var response = Dio().get(url);
    return response;
  }

  Future<Response> fetchInternDetail(int id) async {
    String url = "$baseUrl/api/read_interns.php?id=$id";
    var response = Dio().get(url);
    return response;
  }

  Future<Response> fetchDepartments() async {
    String url = "$baseUrl/api/read_departments.php";
    var response = Dio().get(
      url,
    );
    return response;
  }
}
