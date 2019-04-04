<?php

use Illuminate\Database\Seeder;

class OptionTableSeeder extends Seeder
{
    /**
     * @throws Exception
     */
    public function run()
    {
        /* Color */
        DB::table('options')->insert([
            'sort_order' => random_int(0, 10),
            'created_at' => now(),
        ]);

        DB::table('translations')->insert([
            'key' => "name",
            'value' => "Color",
            'localable_id' => 1,
            'localable_type' => \App\Modules\Option\Models\Option::class,
            'language_code' => 'us',
        ]);
        DB::table('translations')->insert([
            'key' => "name",
            'value' => "Цвет",
            'localable_id' => 1,
            'localable_type' => \App\Modules\Option\Models\Option::class,
            'language_code' => 'ru',
        ]);
        /* ----- */

        /* Provider */
        DB::table('options')->insert([
            'sort_order' => random_int(0, 10),
            'created_at' => now(),
        ]);

        DB::table('translations')->insert([
            'key' => "name",
            'value' => "Provider",
            'localable_id' => 2,
            'localable_type' => \App\Modules\Option\Models\Option::class,
            'language_code' => 'us',
        ]);
        DB::table('translations')->insert([
            'key' => "name",
            'value' => "Поставщик",
            'localable_id' => 2,
            'localable_type' => \App\Modules\Option\Models\Option::class,
            'language_code' => 'ru',
        ]);
        /* -------- */

        /* Complectation */
        DB::table('options')->insert([
            'sort_order' => random_int(0, 10),
            'created_at' => now(),
        ]);

        DB::table('translations')->insert([
            'key' => "name",
            'value' => "Complectation",
            'localable_id' => 3,
            'localable_type' => \App\Modules\Option\Models\Option::class,
            'language_code' => 'us',
        ]);
        DB::table('translations')->insert([
            'key' => "name",
            'value' => "Комплектация",
            'localable_id' => 3,
            'localable_type' => \App\Modules\Option\Models\Option::class,
            'language_code' => 'ru',
        ]);
        /* -------- */
    }
}
