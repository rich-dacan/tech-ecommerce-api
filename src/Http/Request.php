<?php

namespace App\Http;

class Request
{
  public static function method()
  {
    return $_SERVER['REQUEST_METHOD'];
  }

  public static function body()
  {
    $body = file_get_contents('php://input');

    $json = json_decode($body, true) ?? [];

    $data = match (self::method()) {
      'GET' => $_GET,
      'POST', 'PUT', 'DELETE' => $json,
    };

    return $data;
  }
}
