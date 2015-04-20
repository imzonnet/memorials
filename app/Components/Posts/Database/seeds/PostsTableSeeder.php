<?php namespace App\Components\Posts\Database\Seeds;
use App\User;
use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();
        $types = ['post', 'page'];
        $user = User::first();
        foreach(range(1,20) as $index) {

            DB::table('exp_posts')->insert([
                'title' => $faker->name,
                'description' => $faker->paragraph(5),
                'image' => $faker->imageUrl(rand(295, 300), 235, 'people'),
                'state' => 1,
                'created_by' => $user->id,
                'type' => $types[array_rand($types)],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

        }

    }

}
