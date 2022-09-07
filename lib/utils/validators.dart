String? passwordValidator(value) {
  if (value == null || value.toString() == "") {
    return "Please enter password";
  } else if (value.length < 8) {
    return "Password cannot be less than 8 characters";
  }
  return null;
}

String? usernameValidator(value) {
  if (value == null || value.toString() == "") {
    return "Please enter username";
  } else if (value.trim().contains(" ")) {
    return "Username cannot contain space";
  }
  return null;
}
