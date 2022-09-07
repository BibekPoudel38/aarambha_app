import 'package:flutter/material.dart';

class SignUpPage extends StatelessWidget {
  const SignUpPage({super.key});

  @override
  Widget build(BuildContext context) {
    final double devHeight = MediaQuery.of(context).size.height;
    final double devWidth = MediaQuery.of(context).size.width;
    return Scaffold(
      appBar: AppBar(
        title: const Text("Signup"),
      ),
      body: ListView(
        children: [
          SizedBox(height: devHeight * 0.1),
          const Text("Username"),
          TextFormField(
            decoration: const InputDecoration(hintText: "Enter username"),
          ),
          const Text("Email Address"),
          TextFormField(
            decoration: const InputDecoration(hintText: "Enter email"),
          ),
          const Text("Gender"),
          TextFormField(
            decoration: const InputDecoration(hintText: "Gender"),
          ),
          const Text("Phone"),
          TextFormField(
            decoration: const InputDecoration(hintText: "Enter phone number"),
          ),
          const Text("Password"),
          TextFormField(
            obscureText: true,
            decoration: const InputDecoration(hintText: "Enter password"),
          ),
          ElevatedButton(
            onPressed: () {},
            child: const Text("Login"),
          ),
        ],
      ),
    );
  }
}
