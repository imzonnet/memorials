<?php namespace App\Components\Memorials\Database\Seeds;
use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicesTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();

        $services = [
            ['Re-Paint', 'templates/frontend/default/images/services/1.png'],
            ['Add Name', 'templates/frontend/default/images/services/5.png'],
            ['Design Gravestone', 'templates/frontend/default/images/services/2.png'],
            ['Straighten Gravestone', 'templates/frontend/default/images/services/3.png'],
            ['Trim Grave', 'templates/frontend/default/images/services/4.png']
        ];
        foreach($services as $index) {

            DB::table('granit_services')->insert([
                'title' => $index[0],
                'description' => $faker->paragraph(5),
                'image' => $index[1],
                'state' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

        }

    }

}
