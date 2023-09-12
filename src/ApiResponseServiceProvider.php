<?php

namespace Okriiza\ApiResponseFormatter;

use Illuminate\Support\ServiceProvider;

class ApiResponseServiceProvider extends ServiceProvider
{

  public function register()
  {
    $this->app->singleton(ApiResponse::class, function () {
      return new ApiResponse();
    });
  }
}
