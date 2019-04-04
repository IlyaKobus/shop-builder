<?php

use Illuminate\Database\Seeder;

class CustomerGroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customer_groups')->insert([
            'sort_order' => 0,
        ]);

        DB::table('translations')->insert([
            'key' => "name",
            'value' => "Default",
            'localable_id' => 1,
            'localable_type' => \App\Modules\Customer\Models\CustomerGroup::class,
            'language_code' => 'us',
        ]);
        DB::table('translations')->insert([
            'key' => "name",
            'value' => "По-умолчанию",
            'localable_id' => 1,
            'localable_type' => \App\Modules\Customer\Models\CustomerGroup::class,
            'language_code' => 'ru',
        ]);

        DB::table('customer_groups')->insert([
            'sort_order' => 1,
        ]);

        DB::table('translations')->insert([
            'key' => "name",
            'value' => "VIP",
            'localable_id' => 2,
            'localable_type' => \App\Modules\Customer\Models\CustomerGroup::class,
            'language_code' => 'us',
        ]);
        DB::table('translations')->insert([
            'key' => "name",
            'value' => "Привелегированные",
            'localable_id' => 2,
            'localable_type' => \App\Modules\Customer\Models\CustomerGroup::class,
            'language_code' => 'ru',
        ]);
    }
}
