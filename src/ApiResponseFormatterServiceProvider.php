<?php

namespace Okriiza\ApiResponseFormatter;

use Illuminate\Support\ServiceProvider;

class ApiResponseFormatterServiceProvider extends ServiceProvider
{

  public function register()
  {
    $this->app->singleton(ApiResponseFormatter::class, function () {
      return new ApiResponseFormatter();
    });
  }
}
