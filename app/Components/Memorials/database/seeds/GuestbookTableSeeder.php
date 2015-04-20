<?php namespace App\Components\Memorials\Database\Seeds;
use App\Components\Memorials\Models\Memorial;
use App\User;
use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GuestbookTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();

        DB::table('granit_guestbooks')->delete();
        $memorials = array();
        foreach(Memorial::all() as $memorial) {
            $memorials[] = $memorial->id;
        }
        $users = array();
        foreach(User::all() as $u) {
            $users[] = $u->id;
        }
        foreach(range(1,30) as $index) {
            DB::table('granit_guestbooks')->insert([
                'title' => $faker->name,
                'description' => $faker->paragraph(),
                'mem_id' => $memorials[array_rand($memorials)],
                'created_by' => $users[array_rand($users)],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

    }

}
