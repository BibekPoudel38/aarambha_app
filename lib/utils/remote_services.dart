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
}
