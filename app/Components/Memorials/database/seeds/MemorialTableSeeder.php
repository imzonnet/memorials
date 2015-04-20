<?php namespace App\Components\Memorials\Database\Seeds;
use App\User;
use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MemorialTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();

        DB::table('granit_memorials')->delete();
        $user = User::first();

        foreach(range(1,10) as $index) {
            DB::table('granit_memorials')->insert([
                'name' => $faker->name,
                'avatar' => $faker->imageUrl(rand(295, 300), 235, 'people'),
                'birthday' => $faker->dateTimeThisCentury(),
                'death' => $faker->dateTimeBetween('-3 months', '-1 months'),
                'biography' => $faker->paragraph(10),
                'obituary' => $faker->paragraph(10),
                'buried'    => $faker->address,
                'lat'   => '16.050825',
                'lng'   => '108.215067',
                'created_by' => $user->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

    }

}
