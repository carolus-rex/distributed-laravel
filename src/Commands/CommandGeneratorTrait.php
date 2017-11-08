<?php

namespace Optimus\Api\System\Commands;

use Illuminate\Support\Str;

trait CommandGeneratorTrait {
	protected function rootNamespace()
    {
        return "Components\\";
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace."\\".$this->getNameInput()."\\".Str::plural($this->type);
    }
}
