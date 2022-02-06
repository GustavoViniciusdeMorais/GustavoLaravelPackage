<?php

namespace GustavoVinicius\BlogPackage\Console;

use Illuminate\Console\GeneratorCommand;

class MakeDecoratorInterfaceCommand extends GeneratorCommand
{
    protected $name = 'decorator:interface';
    protected $description = 'Makes Decorator Interface';
    protected $type = 'Decorator';

    public function getStub()
    {
        return __DIR__.'/stubs/decoratorinterface.php.stub';
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Decorator';
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