<?php namespace App\Components\Memorials\Database\Seeds;
use App\Components\Memorials\Models\Memorial;
use App\Components\Memorials\Models\PhotoAlbum;
use App\Components\Memorials\Models\PhotoItem;
use App\User;
use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhotoAlbumsTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();

        $user = User::first();
        $memorials = array();
        foreach(Memorial::all() as $memorial) {
            $memorials[] = $memorial->id;
        }
        $users = array();
        foreach(User::all() as $u) {
            $users[] = $u->id;
        }
        foreach(range(1,20) as $index) {
            $album = PhotoAlbum::create([
                'title' => $faker->name,
                'description' => $faker->paragraph(),
                'mem_id' => $memorials[array_rand($memorials)],
                'created_by' => $user->id
            ]);

            foreach(range(1,10) as $index) {
                $photo = PhotoItem::create([
                    'title' => $faker->name,
                    'image' => $faker->imageUrl(rand(460, 470), 370, 'people'),
                    'album_id' => $album->id,
                    'created_by' => $user->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
                foreach(range(1,rand(2, 5)) as $index) {
                    DB::table('granit_photo_comments')->insert([
                        'photo_id'  => $photo->id,
                        'user_id'   => $users[array_rand($users)],
                        'text'  =>  $faker->paragraph(),
                        'parent_id' => 0,
                        'likes' =>  rand(0, 50),
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);
                }
            }
        }

    }

}
