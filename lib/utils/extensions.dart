import 'package:flutter/material.dart';

extension ContainerExtension on Container {
  round() {
    return ClipRRect(
      borderRadius: BorderRadius.circular(20),
      child: this,
    );
  }
}

extension StringExtension on String {
  aarambhaCapitalize() {
    return toUpperCase();
  }

  toTextWidget() {
    return Text(this).bold();
  }
}

extension Textension on Text {
  bold() {
    return Text(
      data!,
      style: const TextStyle(
        fontWeight: FontWeight.bold,
        color: Colors.red,
      ),
    );
  }
}
