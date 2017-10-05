<?php

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
        DB::table('users')->insert([
            'name' => 'Joel Medeiros',
            'email' => 'jooel.medeiros@gmail.com',
            'password' => bcrypt('abcd=1234'),
            'remember_token' => str_random(10),
            'api_token' => 'm4Ut0k3NL3g4Ln40',
        ]);
    }
}
