<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Party;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        User::create([
            'name' =>'Admin',
            'username' =>'admin',
            'email' =>'admin@gmail.com',
            'nid' =>1365465465,
            'password' =>bcrypt('password'),
            'role' =>'admin',
            'area_id' =>1,
        ]);

        User::create([
            'name' =>'Candidate',
            'username' =>'canidate',
            'email' =>'candidate@gmail.com',
            'nid' =>1365465464,
            'password' =>bcrypt('password'),
            'role' =>'candidate',
            'area_id' =>1,
        ]);

        User::create([
            'name' =>'Voter',
            'username' =>'voter',
            'email' =>'voter@gmail.com',
            'nid' =>1365465463,
            'password' =>bcrypt('password'),
            'role' =>'admin',
            'area_id' =>1,
        ]);

        Party::create([
            'name' =>'Bangladesh Awami League',
            'symbol_name' =>'Boat',
            'symbol' =>'Boat.jpeg',
        ]);

        Party::create([
            'name' =>'Bangladesh Nationalist Party',
            'symbol_name' =>'Crops',
            'symbol' =>'Crops.jpeg',
        ]);
        Party::create([
            'name' =>'Jatiya Party (Ershad)',
            'symbol_name' =>'Axe',
            'symbol' =>'Axe.jpeg',
        ]);
    }
}
