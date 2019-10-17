<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Amitav Roy',
            'email' => 'reachme@amitavroy.com',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'name' => 'Jhon Doe',
            'email' => 'jhon.doe@amitavroy.com',
            'password' => bcrypt('password'),
        ]);
    }
}
