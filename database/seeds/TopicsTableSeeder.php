<?php

use Illuminate\Database\Seeder;
use App\Models\Topic;

class TopicsTableSeeder extends Seeder
{
    public function run()
    {
        $topics = factory(Topic::class)->times(100)->create();
//        make()->each(function ($topic, $index) {
//            if ($index == 0) {
//                // $topic->field = 'value';
//            }
//        });
//
//        Topic::insert($topics->toArray());
    }

}

