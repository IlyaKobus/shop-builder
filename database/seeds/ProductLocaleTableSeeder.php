<?php

use Illuminate\Database\Seeder;

class ProductLocaleTableSeeder extends Seeder
{
    public static $productNames = [
        'us' => [
            'HP Notebook ',
            'Lenovo PC ',
            'MS Product ',
            'ASUS handheld ',
            'TV SET ',
        ],
        'ru' => [
            'Ноутбук HP ',
            'ПК Lenovo ',
            'Прдукт компании MS ',
            'Планшет ASUS ',
            'Телевизор ',
        ]

    ];

    /**
     * @throws Exception
     */
    public function run()
    {
        for ($i = 1; $i <= 50; $i++) {
            DB::table('translations')->insert([
                'key' => "name",
                'value' => self::$productNames['us'][random_int(0, 4)] . \Illuminate\Support\Str::random(random_int(3, 10)),
                'localable_id' => $i,
                'localable_type' => \App\Modules\Product\Models\Product::class,
                'language_code' => 'us',
            ]);
            DB::table('translations')->insert([
                'key' => "name",
                'value' => self::$productNames['ru'][random_int(0, 4)] . \Illuminate\Support\Str::random(random_int(3, 10)),
                'localable_id' => $i,
                'localable_type' => \App\Modules\Product\Models\Product::class,
                'language_code' => 'ru',
            ]);

            DB::table('translations')->insert([
                'key' => "meta_tag_title",
                'value' => 'shop product',
                'localable_id' => $i,
                'localable_type' => \App\Modules\Product\Models\Product::class,
                'language_code' => 'us',
            ]);
            DB::table('translations')->insert([
                'key' => "meta_tag_title",
                'value' => 'продукт магазина',
                'localable_id' => $i,
                'localable_type' => \App\Modules\Product\Models\Product::class,
                'language_code' => 'ru',
            ]);
        }
    }
}
