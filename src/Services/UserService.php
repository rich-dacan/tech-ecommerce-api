<?php

namespace App\Services;

use App\Utils\Validator;

class UserService
{
  public static function create(array $data)
  {
    $fields = [];
    foreach ($data as $field => $value) {
      switch ($field) {
        case 'username':
          $fields[$field] = ['required'];
          break;
        case 'email':
          $fields[$field] = ['required', 'email'];
          break;
        case 'password':
          $fields[$field] = ['required', 'min:6'];
          break;
        default:
          $fields[$field] = ['required'];
          break;
      }
    }

    $errors = Validator::validate($fields, $data);

    if (empty($errors)) {
      return $data;

    } else {

      // foreach ($errors as $field => $error) {
      //   throw new \Exception(json_encode("Error in field ($field): -> {$error}."));
      //   // echo "Error in field ($field): {$error}.";
      // }
      throw new \Exception(json_encode($errors));
    }
  }
}
