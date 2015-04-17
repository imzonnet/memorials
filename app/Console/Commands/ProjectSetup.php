<?php namespace App\Console\Commands;

use App\Components\Dashboard\DashboardServiceProvider;
use App\Components\Flowers\FlowersServiceProvider;
use App\Components\Memorials\MemorialsServiceProvider;
use App\Components\Services\ServiceServiceProvider;
use Illuminate\Console\Command;

class ProjectSetup extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'project:setup';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Setup Project';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		$this->info('Setup Project...');
        $this->info('_________________________');
        $this->info('Publishing Migrate');
        \File::cleanDirectory('\database\migrations');
        $this->call('vendor:publish', ['--provider' => DashboardServiceProvider::class]);
        $this->call('vendor:publish', ['--provider' => ServiceServiceProvider::class]);
        $this->call('vendor:publish', ['--provider' => FlowersServiceProvider::class]);
        $this->call('vendor:publish', ['--provider' => MemorialsServiceProvider::class]);
        $this->info('_________________________');
        $this->info('Migrating database');
        $this->call('migrate');
        $this->info('Migrating Complete!');
        $this->info('_________________________');
        $this->info('Install sample data. Please type: php artisan project:seed ');
	}


}
