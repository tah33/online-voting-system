<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Candidate;
class DatabaseSeeder extends Seeder
{

    public function run()
    {
        /*// $this->call(UsersTableSeeder::class);
        User::create([
            'name' =>'Saria',
            'username' =>'saria',
            'email' =>'saria@gmail.com',
            'nid' =>1365465465464,
            'password' =>bcrypt('123456'),
            'role' =>'admin',
        ]);*/
        for ($i=0; $i <= 4 ; $i++) { 
            Candidate::create([
            'user_id' =>1,
            'election_id' =>1,
            'status' =>1,
            'votes' =>1,
            'area' =>1,
        ]);
        }
        

    }
}
