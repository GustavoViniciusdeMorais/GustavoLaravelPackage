<?php

namespace GustavoVinicius\BlogPackage\Console;

use Illuminate\Console\GeneratorCommand;

class MakeFooCommand extends GeneratorCommand
{
    protected $name = 'make:foo';
    protected $description = 'Makes foo class';
    protected $type = 'Foo';

    public function getStub()
    {
        return __DIR__.'/stubs/foo.php.stub';
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Foo';
    }

    public function handle()
    {
        parent::handle();
        $this->doOtherOperations();
    }

    protected function doOtherOperations()
    {
        // get fuly qualified class name
        $class = $this->qualifyClass($this->getNameInput());

        // get destination path
        $path = $this->getPath($class);

        $content = file_get_contents($path);

        // update file content
        file_put_contents($path, $content);
    }
}