<?php namespace App\Components\Memorials\Database\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MemorialDatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        DB::statement('TRUNCATE TABLE granit_memorials');
        DB::statement('TRUNCATE TABLE granit_guestbooks');
        DB::statement('TRUNCATE TABLE granit_timelines');
        DB::statement('TRUNCATE TABLE granit_photo_albums');
        DB::statement('TRUNCATE TABLE granit_photo_comments');
        DB::statement('TRUNCATE TABLE granit_videos');
        DB::statement('TRUNCATE TABLE granit_video_comments');
        DB::statement('TRUNCATE TABLE granit_services');

        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $this->call(ServicesTableSeeder::class);
		$this->call(MemorialTableSeeder::class);
		$this->call(GuestbookTableSeeder::class);
		$this->call(TimelineTableSeeder::class);
		$this->call(PhotoAlbumsTableSeeder::class);
		$this->call(VideoTableSeeder::class);
	}

}
