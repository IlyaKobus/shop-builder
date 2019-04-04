<?php

use Illuminate\Database\Seeder;

class AttributeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* Screen Size */
        DB::table('attributes')->insert([
            'attribute_group_id' => 1,
        ]);

        DB::table('translations')->insert([
            'key' => "name",
            'value' => "Screen Size",
            'localable_id' => 1,
            'localable_type' => \App\Modules\Attribute\Models\Attribute::class,
            'language_code' => 'us',
        ]);
        DB::table('translations')->insert([
            'key' => "name",
            'value' => "Размер экрана",
            'localable_id' => 1,
            'localable_type' => \App\Modules\Attribute\Models\Attribute::class,
            'language_code' => 'ru',
        ]);
        /* ------------ */

        /* Matrix */
        DB::table('attributes')->insert([
            'attribute_group_id' => 1,
        ]);

        DB::table('translations')->insert([
            'key' => "name",
            'value' => "Matrix",
            'localable_id' => 2,
            'localable_type' => \App\Modules\Attribute\Models\Attribute::class,
            'language_code' => 'us',
        ]);
        DB::table('translations')->insert([
            'key' => "name",
            'value' => "Тип матрицы",
            'localable_id' => 2,
            'localable_type' => \App\Modules\Attribute\Models\Attribute::class,
            'language_code' => 'ru',
        ]);
        /* ----- */

        /* Availability */
        DB::table('attributes')->insert([
            'attribute_group_id' => 2,
        ]);

        DB::table('translations')->insert([
            'key' => "name",
            'value' => "Availability",
            'localable_id' => 3,
            'localable_type' => \App\Modules\Attribute\Models\Attribute::class,
            'language_code' => 'us',
        ]);
        DB::table('translations')->insert([
            'key' => "name",
            'value' => "Доступность",
            'localable_id' => 3,
            'localable_type' => \App\Modules\Attribute\Models\Attribute::class,
            'language_code' => 'ru',
        ]);
        /* ----------- */

        /* Warranty Type */
        DB::table('attributes')->insert([
            'attribute_group_id' => 3,
        ]);

        DB::table('translations')->insert([
            'key' => "name",
            'value' => "Warranty Type",
            'localable_id' => 4,
            'localable_type' => \App\Modules\Attribute\Models\Attribute::class,
            'language_code' => 'us',
        ]);
        DB::table('translations')->insert([
            'key' => "name",
            'value' => "Тип гарантии",
            'localable_id' => 4,
            'localable_type' => \App\Modules\Attribute\Models\Attribute::class,
            'language_code' => 'ru',
        ]);
        /* -------------- */

        /* Warranty Term */
        DB::table('attributes')->insert([
            'attribute_group_id' => 3,
        ]);

        DB::table('translations')->insert([
            'key' => "name",
            'value' => "Warranty Term",
            'localable_id' => 5,
            'localable_type' => \App\Modules\Attribute\Models\Attribute::class,
            'language_code' => 'us',
        ]);
        DB::table('translations')->insert([
            'key' => "name",
            'value' => "Срок гарантии",
            'localable_id' => 5,
            'localable_type' => \App\Modules\Attribute\Models\Attribute::class,
            'language_code' => 'ru',
        ]);
        /* ------------ */
    }
}
