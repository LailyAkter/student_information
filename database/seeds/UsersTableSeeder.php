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
            'role_id' => '1',
            'name' => 'MD. Admin',
            'email' =>'lailyakter138@gmail.com',
            'password' =>bcrypt('rootadmin'),
        ]);

         DB::table('users')->insert([
            'role_id' => '2',
            'name' => 'Student',
            'email' =>'student@gmail.com',
            'password' =>bcrypt('rootstudent'),
        ]);
    }
}
