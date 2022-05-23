class AppException implements Exception {
  final message;
  int? errorCode;
  final prefix;

  AppException([this.errorCode, this.message, this.prefix]);

  String toString(){
    return "$errorCode  $prefix   $message";
  }
}

class FetchDataException extends AppException {
  FetchDataException({int errorCode = 0, String? message}) : super(errorCode, message, "Error During Communication: ");
}

class BadRequestException extends AppException {
  BadRequestException({int? errorCode,String? message}) : super(errorCode, message, "Invalid Request: ");
}

class UnauthorisedException extends AppException {
  UnauthorisedException({int? errorCode, message}): super(errorCode, message, "Unauthorised: ");
}

class InvalidInputException extends AppException {
  InvalidInputException({int? errorCode, String? message}): super(errorCode, message, "Invalid Input: ");
}