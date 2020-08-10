<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = Factory(User::class)->times(10)->create();

        $user = User::find(1);
        $user->name = 'tony';
        $user->email = 'tonyhappystyle@163.com';
        $user->introduction = 'myself fighting';
        $user->password = bcrypt('y1a2n3y4');
        $user->save();
    }
}
