<?php namespace App\Components\Memorials\Database\Seeds;
use App\Components\Memorials\Models\Memorial;
use App\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GuestbookTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();

        DB::table('granit_guestbooks')->delete();
        $user = User::first();
        $memorials = array();
        foreach(Memorial::all() as $memorial) {
            $memorials[] = $memorial->id;
        }
        foreach(range(1,20) as $index) {
            DB::table('granit_guestbooks')->insert([
                'title' => $faker->name,
                'description' => $faker->paragraph(),
                'mem_id' => $memorials[array_rand($memorials)],
                'created_by' => $user->id,
                'created_at' => $faker->dateTime('now'),
                'updated_at' => $faker->dateTime('now'),
            ]);
        }

    }

}
