// To parse this JSON data, do
//
//     final internModel = internModelFromJson(jsonString);

import 'dart:convert';

List<InternModel> internModelFromJson(String str) => List<InternModel>.from(
    json.decode(str).map((x) => InternModel.fromJson(x)));

String internModelToJson(List<InternModel> data) =>
    json.encode(List<dynamic>.from(data.map((x) => x.toJson())));

class InternModel {
  InternModel({
    required this.id,
    required this.username,
    required this.fullName,
    required this.emailAddress,
    required this.educationLevel,
    required this.gender,
    required this.phoneNumber,
    required this.joinDate,
    required this.socialMediaLink,
    required this.completionDate,
    required this.department,
    required this.supervisor,
    required this.updatedDate,
  });

  int id;
  String username;
  String fullName;
  String emailAddress;
  String educationLevel;
  String gender;
  String phoneNumber;
  DateTime joinDate;
  String socialMediaLink;
  DateTime completionDate;
  int department;
  int supervisor;
  DateTime updatedDate;

  factory InternModel.fromJson(Map<String, dynamic> json) => InternModel(
        id: json["id"],
        username: json["username"],
        fullName: json["full_name"],
        emailAddress: json["email_address"],
        educationLevel: json["education_level"],
        gender: json["gender"],
        phoneNumber: json["phone_number"],
        joinDate: DateTime.parse(json["join_date"]),
        socialMediaLink: json["social_media_link"],
        completionDate: DateTime.parse(json["completion_date"]),
        department: json["department"],
        supervisor: json["supervisor"],
        updatedDate: DateTime.parse(json["updated_date"]),
      );

  Map<String, dynamic> toJson() => {
        "id": id,
        "username": username,
        "full_name": fullName,
        "email_address": emailAddress,
        "education_level": educationLevel,
        "gender": gender,
        "phone_number": phoneNumber,
        "join_date": joinDate.toIso8601String(),
        "social_media_link": socialMediaLink,
        "completion_date":
            "${completionDate.year.toString().padLeft(4, '0')}-${completionDate.month.toString().padLeft(2, '0')}-${completionDate.day.toString().padLeft(2, '0')}",
        "department": department,
        "supervisor": supervisor,
        "updated_date": updatedDate.toIso8601String(),
      };
}
