<?php namespace App\Components\Services\Database\Seeds;
use App\User;
use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicesTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();

        DB::table('granit_services')->delete();

        $services = [
            ['Re-Paint', 'templates/frontend/default/images/services/1.png'],
            ['Add Name', 'templates/frontend/default/images/services/1.png'],
            ['Design Gravestone', 'templates/frontend/default/images/services/2.png'],
            ['Straighten Gravestone', 'templates/frontend/default/images/services/3.png'],
            ['Trim Grave', 'templates/frontend/default/images/services/4.png'],
            ['Order Flowers', 'templates/frontend/default/images/services/2.png']
        ];
        foreach(range(1,20) as $index) {

            DB::table('granit_services')->create([
                'title' => $services[$index][0],
                'description' => $faker->paragraph(5),
                'image' => $services[$index][1],
                'state' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

        }

    }

}
