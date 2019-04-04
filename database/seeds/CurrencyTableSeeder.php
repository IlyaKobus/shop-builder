<?php

use Illuminate\Database\Seeder;

class CurrencyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* UAH */
        DB::table('currencies')->insert([
            'code' => 'UAH',
            'postfix' => 'UAH',
            'value' => 27.5,
        ]);

        DB::table('translations')->insert([
            'key' => "name",
            'value' => "Ukrainian Gryvna",
            'localable_id' => 1,
            'localable_type' => \App\Modules\Currency\Models\Currency::class,
            'language_code' => 'us',
        ]);
        DB::table('translations')->insert([
            'key' => "name",
            'value' => "Гривна",
            'localable_id' => 1,
            'localable_type' => \App\Modules\Currency\Models\Currency::class,
            'language_code' => 'ru',
        ]);
        /* --- */

        /* USD */
        DB::table('currencies')->insert([
            'code' => 'USD',
            'prefix' => '$',
            'postfix' => 'USD',
            'is_default' => true,
        ]);

        DB::table('translations')->insert([
            'key' => "name",
            'value' => "USA Dollar",
            'localable_id' => 2,
            'localable_type' => \App\Modules\Currency\Models\Currency::class,
            'language_code' => 'us',
        ]);
        DB::table('translations')->insert([
            'key' => "name",
            'value' => "Доллар",
            'localable_id' => 2,
            'localable_type' => \App\Modules\Currency\Models\Currency::class,
            'language_code' => 'ru',
        ]);
        /* --- */

        /* RUB */
        DB::table('currencies')->insert([
            'code' => 'RUB',
            'postfix' => 'RUB',
            'value' => 64,
        ]);

        DB::table('translations')->insert([
            'key' => "name",
            'value' => "Russian Ruble",
            'localable_id' => 3,
            'localable_type' => \App\Modules\Currency\Models\Currency::class,
            'language_code' => 'us',
        ]);
        DB::table('translations')->insert([
            'key' => "name",
            'value' => "Рубль",
            'localable_id' => 3,
            'localable_type' => \App\Modules\Currency\Models\Currency::class,
            'language_code' => 'ru',
        ]);
        /* --- */
    }
}
