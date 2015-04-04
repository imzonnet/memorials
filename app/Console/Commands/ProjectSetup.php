<?php namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

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
        $this->call('vendor:publish', ['--provider' => 'App\Components\Memorials\MemorialsServiceProvider']);
        $this->info('Publishing Complete!');
        $this->info('_________________________');
        $this->info('Migrating database');
        $this->call('migrate');
        $this->info('Migrating Complete!');
        $this->info('_________________________');
        $this->info('Install sample data. Please type: php artisan project:seed ');
	}


}
