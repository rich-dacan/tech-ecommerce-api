<?php

  require_once __DIR__ . '/vendor/autoload.php';
  require_once __DIR__ . '/src/routes/routes.php';

  use App\Core\Core;
  use App\Http\Routes;

  Core::dispatch(Routes::all());
