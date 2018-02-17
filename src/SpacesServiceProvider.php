<?php

namespace SwaraaTech;

use Illuminate\Console\Scheduling\Schedule;
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
		$schedule = $this->app->make( Schedule::class );
		if ( env( "SM_CHECK_FREQUENCY" ) == "daily" && ! empty( env( "SM_CHECK_TIME" ) ) ) {
			$schedule->command( 'spaces:run' )->dailyAt( env( "SM_CHECK_TIME" ) );
		} else {
			$schedule->command( 'spaces:run' )->daily();
		}
		if ( env( "SM_CHECK_FREQUENCY" ) == "monthly" ) {
			$schedule->command( 'spaces:run' )->monthly();
		}
		if ( env( "SM_CHECK_FREQUENCY" ) == "weekly" ) {
			$schedule->command( 'spaces:run' )->weekly();
		}
		if ( env( "SM_CHECK_FREQUENCY" ) == "yearly" ) {
			$schedule->command( 'spaces:run' )->yearly();
		}
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
