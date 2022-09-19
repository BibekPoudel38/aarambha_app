import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:myapp/controller/home_controller_2.dart';
import 'package:myapp/utils/extensions.dart';

class Home extends StatelessWidget {
  const Home({super.key});

  @override
  Widget build(BuildContext context) {
    return GetBuilder<HomeController2>(
      init: HomeController2(),
      // initState: (_) {},
      builder: (controller) {
        return Scaffold(
          appBar: AppBar(),
          body: Center(
            child: Column(
              children: [
                "hello".toTextWidget(),
                Text(
                  "hello world".aarambhaCapitalize(),
                ).bold(),
                Container(
                  height: 150,
                  width: 150,
                  color: Colors.red,
                ).round(),
                // ElevatedButton(
                //   child: const Text("Press"),
                //   onPressed: () {
                //     // controller.loadIntern();
                //     HomeController2 hc2 = HomeController2();
                //     hc2.loadIntern();
                //   },
                // ),
                // ElevatedButton(
                //   child: const Text("Press Again"),
                //   onPressed: () {
                //     // controller.loadIntern();
                //     HomeController2 hc2 = HomeController2();
                //     log(hc2.interns.length.toString());
                //   },
                // ),
                // controller.internsLoading
                //     ? const CircularProgressIndicator()
                //     : controller.interns.isEmpty
                //         ? const Text("Nothing")
                //         : Expanded(
                //             child: RefreshIndicator(
                //               onRefresh: () async {
                //                 controller.loadIntern();
                //               },
                //               child: ListView.builder(
                //                 itemCount: controller.interns.length,
                //                 itemBuilder: (c, i) {
                //                   return Card(
                //                     child: ListTile(
                //                       title:
                //                           Text(controller.interns[i].fullName),
                //                       subtitle:
                //                           Text(controller.interns[i].dName),
                //                     ),
                //                   );
                //                 },
                //               ),
                //             ),
                //           ),
              ],
            ),
          ),
        );
      },
    );
  }
}
