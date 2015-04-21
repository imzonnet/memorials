<?php namespace App\Components\Posts\Database\Seeds;
use App\User;
use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();
        $types = ['post', 'page', 'post'];
        $user = User::first();
        foreach(range(1,10) as $index) {

            DB::table('exp_categories')->insert([
                'title' => $faker->name,
                'description' => $faker->paragraph(5),
                'created_by' => $user->id,
                'type' => $types[array_rand($types)],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

        }

    }

}
