<?php namespace App\Console\Commands;

use Illuminate\Console\Command;

class ProjectSeed extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'project:seed';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Project seed data';

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
		$this->info('Importing Sample Data...');

        $this->call('db:seed');
        $this->call('db:seed', ['--class' => 'App\Components\Memorials\Database\Seeds\DatabaseSeeder']);
        $this->info('Import Comlete!');

        $this->info('_________________________________________');
        $this->info(' Admin Account: admin@admin.com | 123456 ');
        $this->error('Thank You! :))');
	}


}
