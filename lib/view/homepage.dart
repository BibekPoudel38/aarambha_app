import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:myapp/controller/homepage_controller.dart';

class Homepage extends StatelessWidget {
  const Homepage({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text("Homepage"),
      ),
      body: GetBuilder<HomePageController>(
        init: HomePageController(),
        builder: (controller) {
          return controller.loading
              ? const CircularProgressIndicator()
              : ListView.builder(
                  itemCount: controller.interns.length,
                  itemBuilder: (context, index) {
                    return ListTile(
                      title: Text(controller.interns[index].gender),
                    );
                  },
                );
        },
      ),
    );
  }
}
