<?php namespace App\Components\Memorials\Database\Seeds;
use App\Components\Memorials\Models\Memorial;
use App\Components\Memorials\Models\PhotoAlbum;
use App\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhotoAlbumsTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();

        DB::table('granit_photo_albums')->delete();
        $user = User::first();
        $memorials = array();
        foreach(Memorial::all() as $memorial) {
            $memorials[] = $memorial->id;
        }
        foreach(range(1,20) as $index) {
            $album = PhotoAlbum::create([
                'title' => $faker->name,
                'description' => $faker->paragraph(),
                'mem_id' => $memorials[array_rand($memorials)],
                'created_by' => $user->id
            ]);

            foreach(range(1,10) as $index) {
                DB::table('granit_photo_items')->insert([
                    'title' => $faker->name,
                    'image' => $faker->imageUrl(rand(460, 470), 370, 'people'),
                    'album_id' => $album->id,
                    'created_by' => $user->id,
                    'created_at' => $faker->dateTime('now'),
                    'updated_at' => $faker->dateTime('now'),
                ]);
            }
        }

    }

}
