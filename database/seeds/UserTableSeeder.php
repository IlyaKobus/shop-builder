<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'admin',
            'email' => 'admin@larashop.com',
            'password' => \Illuminate\Support\Facades\Hash::make('admin'),
            'user_group_id' => 1,
        ]);
    }
}
