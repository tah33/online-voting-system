<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Candidate;
class DatabaseSeeder extends Seeder
{

    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        User::create([
            'name' =>'Saria',
            'username' =>'saria',
            'email' =>'saria@gmail.com',
            'nid' =>1365465465464,
            'password' =>bcrypt('123456'),
            'role' =>'admin',
        ]);
        

    }
}
