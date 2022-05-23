import 'dart:convert';
import 'dart:io';
import 'package:dio/dio.dart';
import 'package:flutter/material.dart';
import 'app_exception.dart';
import 'dio_http.dart';

class DioHttpProvider {
  Future<dynamic> dioGetRequest(String urlPath,
      {Map<String, dynamic>? params, Function(dynamic)? onError}) async {
    print("dioGetRequest $urlPath");
    var responseJson;

    Map<String, String> headers = {
      'Content-type': 'application/json',
      'Accept': 'application/json'
      //"Authorization": DataInstance().accessToken.isEmpty ? "" :'Bearer ' +  DataInstance().accessToken,
    };

    try {
      var res = await dio.get(
        urlPath,
        options: Options(headers: headers),
        queryParameters: params,
      );
      responseJson = _returnResponse(res);
    } on DioError catch (_) {
      // print("No internet ${e.toString()}//\n${e.type}//\n${e.error}");
      throw FetchDataException(message: 'No Internet connection');
    }
    return responseJson;
  }

  Future<dynamic> dioPutRequest(String urlPath,
      {body, Map<String, dynamic>? params}) async {
    print("dioPutRequest $urlPath $body");
    var responseJson;

    Map<String, String> headers = {
      'Content-type': 'application/json',
      'Accept': 'application/json',
      // "Authorization": DataInstance().accessToken.isEmpty ? "" :'Bearer ' +  DataInstance().accessToken,
    };

    try {
      Response res = await dio.put(
        urlPath,
        data: body,
        options: Options(headers: headers),
        queryParameters: params,
      );
      responseJson = _returnResponse(res);
    } on DioError catch (_) {
      print("No internet");
      //  throw FetchDataException(message: 'No Internet connection');
    }

    return responseJson;
  }

  Future<dynamic> dioPostRequest(String urlPath,
      {body, Map<String, dynamic>? params}) async {
    print("dioPostRequest $urlPath -> ${JsonEncoder().convert(params)}");
    var responseJson;

    Map<String, String> headers = {
      // 'Content-type': 'application/json',
      // 'Accept': 'application/json',
      //   "Authorization": DataInstance().accessToken.isEmpty ? "" :'Bearer ' +  DataInstance().accessToken,
    };

    try {
      Response res = await dio.post(urlPath,
          data: body,
          queryParameters: params,
          options:
              Options(contentType: Headers.jsonContentType, headers: headers));

      print("POST RESPONSE ${res.statusCode}");

      responseJson = _returnResponse(res);
    } on DioError catch (e) {
      if (e.response!.statusCode == 403) {
        responseJson = e.response!.data;
      } else {
        // throw FetchDataException(message: 'No Internet connection');
      }
    }

    return responseJson;
  }

  Future<dynamic> dioDeleteRequest(String urlPath,
      {body, Map<String, dynamic>? params}) async {
    var responseJson;

    Map<String, String> headers = {
      // 'Content-type': 'application/json',
      // 'Accept': 'application/json',
      //"Authorization": DataInstance().accessToken.isEmpty ? "" :'Bearer ' +  DataInstance().accessToken,
    };

    try {
      Response res = await dio.delete(
        urlPath,
        data: body,
        options: Options(headers: headers),
        queryParameters: params,
      );
      responseJson = _returnResponse(res);
    } on DioError catch (_) {
      print("No internet");
      //   throw FetchDataException(message: 'No Internet connection');
    }
    return responseJson;
  }

  dynamic _returnResponse(Response response) {
    print("_returnResponse $response");
    if (response == null) {
       //throw FetchDataException(message: "FETCH DATA TIME OUT");
    } else {
      switch (response.statusCode) {
        case 200:
          return response.data;
        case 201:
          return response.data;
        case 400:
          throw BadRequestException(
              errorCode: 400, message: response.data.toString());
          break;
        case 401:
          throw BadRequestException(
              errorCode: 401, message: response.data.toString());
          break;
        case 403:
          throw UnauthorisedException(
              errorCode: 403, message: response.data.toString());
          break;
        case 404:
          throw BadRequestException(
              errorCode: 404, message: response.data.toString());
          break;
        case 406:
          throw BadRequestException(
              errorCode: 406, message: response.data.toString());
          break;
        case 500:
          print('ERROR 500');
          break;
        default:
          print("status code null");
          throw FetchDataException(
              message: 'Eror occured while Communication with Server');
      }
    }
  }
}
