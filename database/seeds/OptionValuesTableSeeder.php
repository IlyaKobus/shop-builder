<?php

use Illuminate\Database\Seeder;

class OptionValuesTableSeeder extends Seeder
{
    /**
     * @throws Exception
     */
    public function run()
    {
        /* Color:red */
        DB::table('option_values')->insert([
            'sort_order' => random_int(0, 10),
            'option_id' => 1, // Color
        ]);

        DB::table('translations')->insert([
            'key' => "name",
            'value' => "Red",
            'localable_id' => 1,
            'localable_type' => \App\Modules\Option\Models\OptionValue::class,
            'language_code' => 'us',
        ]);
        DB::table('translations')->insert([
            'key' => "name",
            'value' => "Красный",
            'localable_id' => 1,
            'localable_type' => \App\Modules\Option\Models\OptionValue::class,
            'language_code' => 'ru',
        ]);
        /* ---------- */

        /* Color:black */
        DB::table('option_values')->insert([
            'sort_order' => random_int(0, 10),
            'option_id' => 1, // Color
        ]);

        DB::table('translations')->insert([
            'key' => "name",
            'value' => "Black",
            'localable_id' => 2,
            'localable_type' => \App\Modules\Option\Models\OptionValue::class,
            'language_code' => 'us',
        ]);
        DB::table('translations')->insert([
            'key' => "name",
            'value' => "Чёрный",
            'localable_id' => 2,
            'localable_type' => \App\Modules\Option\Models\OptionValue::class,
            'language_code' => 'ru',
        ]);
        /* ------------ */

        /* Color:white */
        DB::table('option_values')->insert([
            'sort_order' => random_int(0, 10),
            'option_id' => 1, // Color
        ]);

        DB::table('translations')->insert([
            'key' => "name",
            'value' => "White",
            'localable_id' => 3,
            'localable_type' => \App\Modules\Option\Models\OptionValue::class,
            'language_code' => 'us',
        ]);
        DB::table('translations')->insert([
            'key' => "name",
            'value' => "Белый",
            'localable_id' => 3,
            'localable_type' => \App\Modules\Option\Models\OptionValue::class,
            'language_code' => 'ru',
        ]);
        /* --------- */

        /* Provider:official */
        DB::table('option_values')->insert([
            'sort_order' => random_int(0, 10),
            'option_id' => 2, // Color
        ]);

        DB::table('translations')->insert([
            'key' => "name",
            'value' => "Official",
            'localable_id' => 4,
            'localable_type' => \App\Modules\Option\Models\OptionValue::class,
            'language_code' => 'us',
        ]);
        DB::table('translations')->insert([
            'key' => "name",
            'value' => "Официальный",
            'localable_id' => 4,
            'localable_type' => \App\Modules\Option\Models\OptionValue::class,
            'language_code' => 'ru',
        ]);
        /* --------------- */

        /* Provider:black market */
        DB::table('option_values')->insert([
            'sort_order' => random_int(0, 10),
            'option_id' => 2, // Color
        ]);

        DB::table('translations')->insert([
            'key' => "name",
            'value' => "Black Market",
            'localable_id' => 5,
            'localable_type' => \App\Modules\Option\Models\OptionValue::class,
            'language_code' => 'us',
        ]);
        DB::table('translations')->insert([
            'key' => "name",
            'value' => "Контрабанда",
            'localable_id' => 5,
            'localable_type' => \App\Modules\Option\Models\OptionValue::class,
            'language_code' => 'ru',
        ]);
        /* ---------------------- */

        /* Complectation:full */
        DB::table('option_values')->insert([
            'sort_order' => random_int(0, 10),
            'option_id' => 3, // Color
        ]);

        DB::table('translations')->insert([
            'key' => "name",
            'value' => "Full",
            'localable_id' => 6,
            'localable_type' => \App\Modules\Option\Models\OptionValue::class,
            'language_code' => 'us',
        ]);
        DB::table('translations')->insert([
            'key' => "name",
            'value' => "Полный",
            'localable_id' => 6,
            'localable_type' => \App\Modules\Option\Models\OptionValue::class,
            'language_code' => 'ru',
        ]);
        /* ------------------ */

        /* Complectation:cutted */
        DB::table('option_values')->insert([
            'sort_order' => random_int(0, 10),
            'option_id' => 3, // Color
        ]);

        DB::table('translations')->insert([
            'key' => "name",
            'value' => "Cutted off",
            'localable_id' => 7,
            'localable_type' => \App\Modules\Option\Models\OptionValue::class,
            'language_code' => 'us',
        ]);
        DB::table('translations')->insert([
            'key' => "name",
            'value' => "Урезанный",
            'localable_id' => 7,
            'localable_type' => \App\Modules\Option\Models\OptionValue::class,
            'language_code' => 'ru',
        ]);
        /* ------------------- */

        /* Complectation:with additions */
        DB::table('option_values')->insert([
            'sort_order' => random_int(0, 10),
            'option_id' => 3, // Color
        ]);

        DB::table('translations')->insert([
            'key' => "name",
            'value' => "With additions",
            'localable_id' => 8,
            'localable_type' => \App\Modules\Option\Models\OptionValue::class,
            'language_code' => 'us',
        ]);
        DB::table('translations')->insert([
            'key' => "name",
            'value' => "С дополнительными плюшками",
            'localable_id' => 8,
            'localable_type' => \App\Modules\Option\Models\OptionValue::class,
            'language_code' => 'ru',
        ]);
        /* --------------------------- */
    }
}
