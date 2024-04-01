<?php


namespace App\Core;

use App\Http\Request;
use App\Http\Response;

class Core {
  public static function dispatch(array $routes) {
    $url = "/";

    isset($_GET['url']) && $url .= $_GET['url'];

    $prefixController = 'App\\Controllers\\';

    foreach ($routes as $route) {
      $pattern = '#^'. preg_replace('/{id}/', '([\w-]+)', $route['path']) .'$#';

      if (preg_match($pattern, $url, $matches)) {
        array_shift($matches);

        if ($route['method'] !== Request::method()) {
          Response::json([
            'error' => true,
            'success' => false,
            'message' => 'Error: method not allowed',

          ], 405);
          return;
        }

        [$controller, $action] = explode('@', $route['action']);

        $controller = $prefixController . $controller;
        $extendController = new $controller;
        $extendController->$action(...$matches);
      }
    }
  }
}
