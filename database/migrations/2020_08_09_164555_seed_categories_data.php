<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SeedCategoriesData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $data= [
            [
              'name' => '教程',
              'description' => '教导课程',
            ],
            [
                'name'  => '分享',
                'description' => '分享技术',
            ],
            [
                'name' => '问答',
                'description' => '答疑解惑',
            ],
            [
                'name' =>'公告',
                'description' => '全站公告',
            ],
        ];

        DB::table('categories')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('categories')->truncate();
    }
}
