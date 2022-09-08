import 'package:myapp/utils/constants.dart';
import 'package:shared_preferences/shared_preferences.dart';

class UserCredentials {
  // saving the id of the logged in user
  storeId(int id) async {
    SharedPreferences preferences = await SharedPreferences.getInstance();
    preferences.setInt(userKey, id);
  }

  // reading the id of the logged in user
  Future<int?> readId() async {
    SharedPreferences preferences = await SharedPreferences.getInstance();
    return preferences.getInt(userKey);
  }

  // deletes all the locally saved data or (logout)
  clearId() async {
    SharedPreferences preferences = await SharedPreferences.getInstance();
    preferences.clear();
  }
}
