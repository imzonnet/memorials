<?php namespace App\Components\Memorials\Database\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class MemorialDatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call(MemorialTableSeeder::class);
		$this->call(GuestbookTableSeeder::class);
		$this->call(TimelineTableSeeder::class);
		$this->call(PhotoAlbumsTableSeeder::class);
		$this->call(VideoTableSeeder::class);
	}

}
