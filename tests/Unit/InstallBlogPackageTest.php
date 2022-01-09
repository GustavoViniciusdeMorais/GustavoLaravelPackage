<?php

namespace Gustavo\BlogPackage\Tests\Unit;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use GustavoVinicius\BlogPackage\Tests\TestCase;

class InstallBlogPackageTest extends TestCase
{

    /** @test */
    public function the_install_commands_copies_the_configuration()
    {
        $blogPackage = 'blogpackage.php';
        
        // make shure we are starting from a clean state
        if(File::exists(config_path($blogPackage))){
            unlink(config_path($blogPackage));
        }

        $this->assertFalse(File::exists(config_path($blogPackage)));

        Artisan::call('blogpackage:install');

        $this->assertTrue(File::exists(config_path('blogpakcage.php')));
    }

}