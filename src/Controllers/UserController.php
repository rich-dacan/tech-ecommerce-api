<?php

namespace App\Controllers;

use App\Http\Request;
use App\Http\Response;
use App\Services\UserService;

class UserController
{
  public function create(Request $request, Response $response) {
    $body = $request::body();
    $user = UserService::create($body);

    $response::json([
      'error' => false,
      'success' => true,
      'message' => 'User created',
      'data' => $user

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
