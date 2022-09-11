// To parse this JSON data, do
//
//     final departmentModel = departmentModelFromJson(jsonString);

import 'dart:convert';

List<DepartmentModel> departmentModelFromJson(String str) =>
    List<DepartmentModel>.from(
        json.decode(str).map((x) => DepartmentModel.fromJson(x)));

String departmentModelToJson(List<DepartmentModel> data) =>
    json.encode(List<dynamic>.from(data.map((x) => x.toJson())));

class DepartmentModel {
  DepartmentModel({
    required this.id,
    required this.name,
    required this.description,
    required this.hOD,
    required this.createdAt,
    required this.updatedAt,
    required this.banner,
    required this.icon,
    required this.color,
  });

  int id;
  String name;
  String description;
  int hOD;
  DateTime createdAt;
  DateTime updatedAt;
  String banner;
  String icon;
  String color;

  factory DepartmentModel.fromJson(Map<String, dynamic> json) =>
      DepartmentModel(
        id: json["id"],
        name: json["name"],
        description: json["description"],
        hOD: json["h_o_d"],
        createdAt: DateTime.parse(json["created_at"]),
        updatedAt: DateTime.parse(json["updated_at"]),
        banner: json["banner"],
        icon: json["icon"],
        color: json["color"],
      );

  Map<String, dynamic> toJson() => {
        "id": id,
        "name": name,
        "description": description,
        "h_o_d": hOD,
        "created_at": createdAt.toIso8601String(),
        "updated_at": updatedAt.toIso8601String(),
        "banner": banner,
        "icon": icon,
        "color": color,
      };
}
