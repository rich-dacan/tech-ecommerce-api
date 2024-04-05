<?php

namespace App\Services;

use App\Utils\Validator;

class UserService
{
  public static function create(array $data)
  {
    try {
      $fields = [
        'username' => ['required'],
        'email' => ['required', 'email'],
        'password' => ['required', 'min:6'],
      ];

      Validator::validate($fields, $data);

      return $data;

    } catch (\Throwable $e) {
      return ['error' => $e->getMessage()];
    }
  }
}
