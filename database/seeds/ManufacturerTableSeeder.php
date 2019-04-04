<?php

use Illuminate\Database\Seeder;

class ManufacturerTableSeeder extends Seeder
{
    const MANUFACTURER_NAMES = [
        'Apple',
        'Samsung',
        'HP',
        'Lenovo',
        'Acer',
    ];

    /**
     * @throws Exception
     */
    public function run()
    {
        for ($i = 0; $i < 5; $i++) {
            DB::table('manufacturers')->insert([
                'name' => self::MANUFACTURER_NAMES[$i],
                'sort_order' => random_int(0, 10),
            ]);
        }
    }
}
