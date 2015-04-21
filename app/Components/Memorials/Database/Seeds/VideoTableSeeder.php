<?php namespace App\Components\Memorials\Database\Seeds;
use App\Components\Memorials\Models\Memorial;
use App\Components\Memorials\Models\Video;
use App\Libraries\Videos\VideoHelper;
use App\User;
use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VideoTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();

        $user = User::first();
        $memorials = array();
        $users = array();
        foreach(Memorial::all() as $memorial) {
            $memorials[] = $memorial->id;
        }

        foreach(User::all() as $u) {
            $users[] = $u->id;
        }
        $videos = [
            'https://www.youtube.com/watch?v=JNXP-gkdU04',
            'https://www.youtube.com/watch?v=smyCFdFGfKk',
            'https://www.youtube.com/watch?v=VSYNOS3TPD8',
            'https://www.youtube.com/watch?v=lvCQuc98Dlc',
            'https://www.youtube.com/watch?v=OpQFFLBMEPI',
            'https://www.youtube.com/watch?v=yTCDVfMz15M',
            'https://www.youtube.com/watch?v=FJfFZqTlWrQ',
            'https://www.youtube.com/watch?v=XjVNlG5cZyQ'
        ];
        $videoHelper = new VideoHelper();
        foreach(range(1,20) as $index) {
            $url = $videos[array_rand($videos)];
            $videoHelper->setUrl($url);

            $video = Video::create([
                'title' => $faker->name,
                'url' => $url,
                'image' => $videoHelper->getImage(),
                'times' => $videoHelper->getTime(),
                'mem_id' => $memorials[array_rand($memorials)],
                'created_by' => $user->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            foreach(range(1,5) as $index) {
                DB::table('granit_video_comments')->insert([
                    'video_id'  => $video->id,
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
