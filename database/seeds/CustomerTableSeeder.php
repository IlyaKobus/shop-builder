<?php

use Illuminate\Database\Seeder;

class CustomerTableSeeder extends Seeder
{
    /**
     * @throws Exception
     */
    public function run()
    {
        for ($i = 1; $i <= 30; $i++) {
            DB::table('customers')->insert([
                'first_name' => "customer$i",
                'last_name' => 'fiction' . (30 - $i),
                'email' => "customer$i@larashop.com",
                'password' => \Illuminate\Support\Facades\Hash::make('customer'),
                'is_confirmed' => (bool)($i % 2),
                'customer_group_id' => random_int(1, 2),
            ]);
        }
    }
}
