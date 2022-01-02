<?php

namespace GustavoVinicius\BlogPackage;

use Illuminate\Support\ServiceProvider;

class BlogPackageServiceProvider extends ServiceProvider
{
  public function register()
  {
    $this->app->bind('calculator', function($app) {
        return new Calculator();
    });
  }

  public function boot()
  {
    // test
  }
}