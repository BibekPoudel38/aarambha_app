import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:myapp/controller/homepage_controller.dart';
import 'package:myapp/model/departments_model.dart';
import 'package:myapp/model/intern_model.dart';

class Homepage extends StatelessWidget {
  const Homepage({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text("AARAMBHA"),
      ),
      body: GetBuilder<HomePageController>(
        init: HomePageController(),
        builder: (controller) {
          return RefreshIndicator(
            onRefresh: () async {
              await controller.fetchAllData();
              return;
            },
            child: SingleChildScrollView(
              physics: const AlwaysScrollableScrollPhysics(),
              child: SizedBox(
                height: Get.height,
                width: Get.width,
                child: Column(
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: [
                    SizedBox(
                      height: 200,
                      width: Get.width,
                      child: controller.departmentsLoading
                          ? const Center(
                              child: CircularProgressIndicator(),
                            )
                          : RefreshIndicator(
                              onRefresh: () async {
                                controller.fetchInterns();
                                return;
                              },
                              child: ListView.builder(
                                scrollDirection: Axis.horizontal,
                                itemCount: controller.departments.length,
                                itemBuilder: (context, index) {
                                  DepartmentModel departmentModel =
                                      controller.departments[index];
                                  return Center(
                                    child: Container(
                                      height: 190,
                                      width: Get.width * 0.75,
                                      margin: EdgeInsets.only(
                                          right: 5, left: index == 0 ? 5 : 0),
                                      decoration: BoxDecoration(
                                        borderRadius: BorderRadius.circular(16),
                                        image: DecorationImage(
                                          image: NetworkImage(
                                            departmentModel.banner,
                                          ),
                                          fit: BoxFit.cover,
                                        ),
                                      ),
                                    ),
                                  );
                                },
                              ),
                            ),
                    ),
                    const Padding(
                      padding: EdgeInsets.all(8.0),
                      child: Text(
                        "Interns",
                        style: TextStyle(
                          fontSize: 20,
                          fontWeight: FontWeight.w500,
                        ),
                      ),
                    ),
                    controller.loading
                        ? const CircularProgressIndicator()
                        : Expanded(
                            child: ListView.builder(
                              itemCount: controller.interns.length,
                              itemBuilder: (context, index) {
                                InternModel intern = controller.interns[index];
                                return ListTile(
                                  leading: Image.network(intern.dIcon),
                                  title: Text(
                                    intern.fullName,
                                  ),
                                  subtitle: Text(intern.emailAddress),
                                  trailing: IconButton(
                                    icon: const Icon(Icons.call),
                                    onPressed: () {},
                                  ),
                                );
                              },
                            ),
                          ),
                  ],
                ),
              ),
            ),
          );
        },
      ),
    );
  }
}
