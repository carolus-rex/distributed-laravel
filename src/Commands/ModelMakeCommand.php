<?php

namespace Optimus\Api\System\Commands;

use Illuminate\Foundation\Console\ModelMakeCommand as LaravelModelMakeCommand;

class ModelMakeCommand extends LaravelModelMakeCommand
{
	use CommandGeneratorTrait;

    protected function getPath($name)
    {
        $name = str_replace_first($this->rootNamespace(), '', $name);

        return $this->laravel->basePath().'/components/'.str_replace('\\', '/', $name).'.php';
    }
}
