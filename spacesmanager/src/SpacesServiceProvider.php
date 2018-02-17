<?php

namespace SwaraaTech\Spacesmanager;

use Illuminate\Support\ServiceProvider;

class SpacesServiceProvider extends ServiceProvider {
	/**
	 * Bootstrap services.
	 *
	 * @return void
	 */
	public function boot() {
		include __DIR__ . "/routes.php";
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
