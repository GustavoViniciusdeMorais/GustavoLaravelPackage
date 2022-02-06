<?php

namespace GustavoVinicius\BlogPackage;

use Illuminate\Support\ServiceProvider;
use GustavoVinicius\BlogPackage\Console\InstallBlogPackage;
use GustavoVinicius\BlogPackage\Console\MakeFooCommand;
use GustavoVinicius\BlogPackage\Console\MakeDecoratorInterfaceCommand;
use Illuminate\Console\Scheduling\Schedule;

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
    // Register the command if we are running in the CLI
    if($this->app->runningInConsole()){
      $this->commands([
        InstallBlogPackage::class,
      ]);

      $this->commands([
        MakeFooCommand::class,
      ]);

      $this->commands([
        MakeDecoratorInterfaceCommand::class,
      ]);
    }

    // Schedule the command if you are using the application via the CLI
    // if($this->app->runningInConsole()){
    //   $this->app->booted(function(){
    //     $schedule = $this->app->make(Schedule::class);
    //     $schedule->command('some:command')->everyMinute();
    //   });
    // }
  }
}