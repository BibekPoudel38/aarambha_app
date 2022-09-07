import 'dart:developer';

import 'package:flutter/material.dart';

import '../utils/validators.dart';

class LoginPage extends StatefulWidget {
  const LoginPage({super.key});

  @override
  State<LoginPage> createState() => _LoginPageState();
}

class _LoginPageState extends State<LoginPage> {
  TextEditingController usernameController = TextEditingController(),
      passwordController = TextEditingController();

  final GlobalKey<FormState> _formKey = GlobalKey<FormState>();

  String gender = "Male";
  changeGender(value) {
    gender = value;
    setState(() {});
  }

  @override
  Widget build(BuildContext context) {
    final double devHeight = MediaQuery.of(context).size.height;
    final double devWidth = MediaQuery.of(context).size.width;
    return Scaffold(
      appBar: AppBar(
        title: const Text("Login"),
      ),
      body: Padding(
        padding: const EdgeInsets.all(8.0),
        child: Form(
          key: _formKey,
          child: ListView(
            children: [
              Image.network(
                  "https://img.freepik.com/free-vector/mobile-login-concept-illustration_114360-135.jpg?w=2000"),
              const Text("Username"),
              TextFormField(
                controller: usernameController,
                validator: usernameValidator,
                decoration: const InputDecoration(hintText: "Enter username"),
              ),
              const SizedBox(height: 10),
              const Text("Password"),
              TextFormField(
                controller: passwordController,
                validator: passwordValidator,
                decoration: const InputDecoration(hintText: "Enter password"),
              ),
              const SizedBox(height: 10),
              const Text("Confirm Password"),
              TextFormField(
                validator: (value) {
                  if (value != passwordController.text) {
                    return "Password didn't match";
                  }
                  return null;
                },
                decoration: const InputDecoration(hintText: "Enter password"),
              ),
              const SizedBox(height: 10),
              Row(
                children: [
                  Radio(
                    value: "Male",
                    groupValue: gender,
                    onChanged: changeGender,
                  ),
                  const Text("Male"),
                  Radio(
                    value: "Female",
                    groupValue: gender,
                    onChanged: changeGender,
                  ),
                  const Text("Female"),
                  Radio(
                    value: "Others",
                    groupValue: gender,
                    onChanged: changeGender,
                  ),
                  const Text("Others"),
                ],
              ),
              const SizedBox(height: 10),
              ElevatedButton(
                onPressed: () {
                  if (_formKey.currentState!.validate()) {
                    log(usernameController.text);
                    log(passwordController.text);
                  }
                },
                child: const Text("Login"),
              ),
            ],
          ),
        ),
      ),
    );
  }
}
