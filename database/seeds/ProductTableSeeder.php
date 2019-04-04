<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * @throws Exception
     */
    public function run()
    {
        $finalCategories = \App\Modules\Category\Models\Category::getFinal();

        for ($i = 0; $i < 50; $i++) {
            DB::table('products')->insert([
                'price' => random_int(1000, 100000) / 100,
                'quantity' => random_int(5, 150),
                'weight' => random_int(1, 100) / 100,
                'model' => \Illuminate\Support\Str::random(),
                'status' => \App\Modules\Product\Enums\ProductStatusEnum::ENABLED,
                'currency_id' => random_int(1, 3),
                'manufacturer_id' => random_int(1, 5),
            ]);
        }
    }
}
