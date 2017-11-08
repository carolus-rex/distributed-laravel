<?php

namespace Optimus\Api\System\Commands;

use Illuminate\Routing\Console\ControllerMakeCommand as LaravelControllerMakeCommand;

class ControllerMakeCommand extends LaravelControllerMakeCommand
{
    use CommandGeneratorTrait;
    
    protected function realRootNamespace()
    {
        return $this->laravel->getNamespace();
    }

    protected function getPath($name)
    {
        $name = str_replace_first($this->rootNamespace(), '', $name);

        return $this->laravel->basePath().'/components/'.str_replace('\\', '/', $name).$this->type.'.php';
    }

    protected function replaceNamespace(&$stub, $name)
    {
        $stub = str_replace(
            ['DummyNamespace', 'DummyRootNamespace'],
            [$this->getNamespace($name), $this->realRootNamespace()],
            $stub
        );

        return $this;
    }

    protected function replaceClass($stub, $name)
    {
        $class = str_replace($this->getNamespace($name).'\\', '', $name);

        return str_replace('DummyClass', $class.$this->type, $stub);
    }
}
