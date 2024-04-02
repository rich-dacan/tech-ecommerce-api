<?php

namespace App\Controllers;

use App\Http\Request;
use App\Http\Response;

class UserController
{
  public function create(Request $request, Response $response) {
    $body = $request::body();

    $response::json([
      'error' => false,
      'success' => true,
      'message' => 'User created',
      'data' => $body

    ], 201);
  }

  public function login(Request $request, Response $response) {
    echo 'Store';
  }

  public function fetch(Request $request, Response $response) {
    echo 'Create';
  }

  public function update(Request $request, Response $response) {
    echo 'Update';
  }

  public function delete(Request $request, Response $response, array $id) {
    echo 'Delete';
  }
}
