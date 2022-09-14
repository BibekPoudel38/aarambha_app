import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:myapp/model/intern_model.dart';

import '../controller/detail_controller.dart';

class DetailPage extends StatelessWidget {
  const DetailPage({super.key, required this.model});
  final InternModel model;
  @override
  Widget build(BuildContext context) {
    return GetBuilder<DetailController>(
      init: DetailController(model.id),
      builder: (controller) {
        return controller.loading
            ? const Material(
                child: Center(
                  child: CircularProgressIndicator(),
                ),
              )
            : controller.model == null
                ? const Material(child: Center(child: Text("No User")))
                : Scaffold(
                    appBar: AppBar(
                      title: Text(
                        controller.model!.fullName,
                      ),
                    ),
                    body: Container(
                      child: Text(model.emailAddress),
                    ),
                  );
      },
    );
  }
}
