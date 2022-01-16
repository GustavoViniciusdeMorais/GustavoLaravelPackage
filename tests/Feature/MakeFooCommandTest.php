<?php

namespace GustavoVinicius\BlogPackage\Tests\Feature;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisa;
use GustavoVinicius\BlogPackage\Tests\TestCase;

class MakeFooCommandTest extends TestCase
{
    /** @test */
    function it_creates_a_new_foo_class()
    {
        $fooClass = app_path('Foo/MyFooClass.php');

        if(File::exists($fooClass)){
            unlink($fooClass);
        }

        $this->assertFalse(File::exists($fooClass));

        Artisan::call('make:foo MyFooClass.php');

        $this->assertTrue(File::exists($fooClass));

        $expectedContent = <<<CLASS
        <?php

        namespace App\Foo;
        
        use GustavoVinicius\Foo;
        
        class MyFooClass implements Foo
        {
            public function myFoo()
            {
                //foo
            }
        }
        CLASS;

        $this->assertEquals($expectedContent, file_get_contents($fooClass));
    }
}