<?php

namespace Optimus\Api\System;

use Illuminate\Support\ServiceProvider;

use Optimus\Api\System\Utilities;

class CommandServiceProvider extends ServiceProvider
{
	protected $defer = true;

	protected $commands = ["ControllerMakeCommand" => "command.controller.make"];

    public function register()
    {
    	foreach ($this->commands as $command_class => $command) {
			$this->app->extend($command, function ($extended_class, $app) use ($command_class) {
				$class = "Optimus\Api\System\Commands\\$command_class";
				return new $class($app['files']);
			});
    	}
		$this->commands($this->commands);
    }

    public function provides()
    {
    	return array_values($commands);
    }
}
