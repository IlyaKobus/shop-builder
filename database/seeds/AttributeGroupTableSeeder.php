<?php

use Illuminate\Database\Seeder;

class AttributeGroupTableSeeder extends Seeder
{
    /**
     * @throws Exception
     */
    public function run()
    {
        /* Screens */
        DB::table('attribute_groups')->insert([
            'sort_order' => random_int(0, 10),
        ]);

        DB::table('translations')->insert([
            'key' => "name",
            'value' => "Screens",
            'localable_id' => 1,
            'localable_type' => \App\Modules\Attribute\Models\AttributeGroup::class,
            'language_code' => 'us',
        ]);
        DB::table('translations')->insert([
            'key' => "name",
            'value' => "Экраны",
            'localable_id' => 1,
            'localable_type' => \App\Modules\Attribute\Models\AttributeGroup::class,
            'language_code' => 'ru',
        ]);
        /* -------- */

        /* Products */
        DB::table('attribute_groups')->insert([
            'sort_order' => random_int(0, 10),
        ]);

        DB::table('translations')->insert([
            'key' => "name",
            'value' => "Products",
            'localable_id' => 2,
            'localable_type' => \App\Modules\Attribute\Models\AttributeGroup::class,
            'language_code' => 'us',
        ]);
        DB::table('translations')->insert([
            'key' => "name",
            'value' => "Товары",
            'localable_id' => 2,
            'localable_type' => \App\Modules\Attribute\Models\AttributeGroup::class,
            'language_code' => 'ru',
        ]);
        /* ----------- */

        /* Warranties */
        DB::table('attribute_groups')->insert([
            'sort_order' => random_int(0, 10),
        ]);

        DB::table('translations')->insert([
            'key' => "name",
            'value' => "Warranties",
            'localable_id' => 3,
            'localable_type' => \App\Modules\Attribute\Models\AttributeGroup::class,
            'language_code' => 'us',
        ]);
        DB::table('translations')->insert([
            'key' => "name",
            'value' => "Гарантия",
            'localable_id' => 3,
            'localable_type' => \App\Modules\Attribute\Models\AttributeGroup::class,
            'language_code' => 'ru',
        ]);
        /* ----------- */
    }
}
