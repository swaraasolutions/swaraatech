<?php

namespace SwaraaTech\Commands;

use Hamcrest\Core\Set;
use Illuminate\Console\Command;
use SwaraaTech\Controllers\SetupController;

class SpaceCommand extends Command {
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'varun:run';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Run the spaces process';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct() {
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function handle() {
		$setupController = new SetupController();
		$setupController->index();
		$this->info( "Test" );
	}
}
