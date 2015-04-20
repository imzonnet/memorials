<?php namespace App\Components\Memorials\Database\Seeds;
use App\Components\Memorials\Models\Memorial;
use App\User;
use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TimelineTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();

        DB::table('granit_timelines')->delete();
        $user = User::first();
        $memorials = array();
        foreach(Memorial::all() as $memorial) {
            $memorials[] = $memorial->id;
        }
        foreach(range(1,20) as $index) {
            DB::table('granit_timelines')->insert([
                'title' => $faker->name,
                'year' => $faker->year,
                'description' => $faker->paragraph(),
                'image' => $faker->imageUrl(rand(295, 300), 235, 'people'),
                'mem_id' => $memorials[array_rand($memorials)],
                'created_by' => $user->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

    }

}
