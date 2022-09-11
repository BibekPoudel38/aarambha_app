import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:myapp/controller/home_controller_2.dart';

class Home extends StatelessWidget {
  const Home({super.key});

  @override
  Widget build(BuildContext context) {
    return GetBuilder<HomeController2>(
      init: HomeController2(),
      // initState: (_) {},
      builder: (controller) {
        return Scaffold(
          body: Center(
            child: Column(
              children: [
                ElevatedButton(
                  child: const Text("Press"),
                  onPressed: () {
                    controller.loadIntern();
                  },
                ),
                controller.internsLoading
                    ? const CircularProgressIndicator()
                    : controller.interns.isEmpty
                        ? const Text("Nothing")
                        : Expanded(
                            child: RefreshIndicator(
                              onRefresh: () async {
                                controller.loadIntern();
                              },
                              child: ListView.builder(
                                itemCount: controller.interns.length,
                                itemBuilder: (c, i) {
                                  return Card(
                                    child: ListTile(
                                      title:
                                          Text(controller.interns[i].fullName),
                                      subtitle:
                                          Text(controller.interns[i].dName),
                                    ),
                                  );
                                },
                              ),
                            ),
                          ),
              ],
            ),
          ),
        );
      },
    );
  }
}
