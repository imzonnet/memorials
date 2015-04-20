<?php namespace App\Components\Posts\Database\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PostsDatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        Model::unguard();
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        DB::statement('TRUNCATE TABLE exp_categories');
        DB::statement('TRUNCATE TABLE exp_posts');
        DB::statement('TRUNCATE TABLE exp_post_category');

        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $this->call(CategoriesTableSeeder::class);
        $this->call(PostsTableSeeder::class);

	}

}
