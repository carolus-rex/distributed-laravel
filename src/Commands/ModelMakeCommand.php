<?php

namespace Optimus\Api\System\Commands;

use Illuminate\Support\Str;

use Illuminate\Foundation\Console\ModelMakeCommand as LaravelModelMakeCommand;

class ModelMakeCommand extends LaravelModelMakeCommand
{
	use CommandGeneratorTrait;

    protected function getPath($name)
    {
        $name = str_replace_first($this->rootNamespace(), '', $name);

        return $this->laravel->basePath().'/components/'.str_replace('\\', '/', $name).'.php';
    }

    protected function createController()
    {   
        $controller = Str::studly(class_basename($this->argument('name')));

        $modelName = $this->qualifyClass($this->getNameInput());

        $this->call('make:controller', [
            'name' => $controller,
            '--model' => $this->option('resource') ? $modelName : null,
        ]);
    }
}
