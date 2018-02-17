<?php

namespace SwaraaTech;

use Illuminate\Support\ServiceProvider;
use SwaraaTech\Commands\SpaceCommand;

class SpacesServiceProvider extends ServiceProvider {
	/**
	 * Bootstrap services.
	 *
	 * @return void
	 */
	public function boot() {
//		include __DIR__ . "/routes.php";
		$this->loadRoutesFrom( __DIR__ . '/routes.php' );
		$this->loadViewsFrom( __DIR__ . '/views', 'spaces' );
		$this->loadMigrationsFrom( __DIR__ . "/migrations" );
		$this->commands( [
			SpaceCommand::class,
		] );
	}

	/**
	 * Register services.
	 *
	 * @return void
	 */
	public function register() {
		//
	}
}
