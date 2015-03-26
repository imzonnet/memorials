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
        $this->call('migrate');

        $this->call('migrate', ['--path' => 'App\Components\Memorials\database\migrations']);

        $this->info('Migrate Success!');
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return [
			//['example', InputArgument::REQUIRED, 'An example argument.'],
		];
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return [
			['example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null],
		];
	}

}
