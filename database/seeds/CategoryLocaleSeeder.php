<?php

use Illuminate\Database\Seeder;

class CategoryLocaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = \App\Modules\Category\Models\Category::orderBy('id')->first()->id;
             $i <= \App\Modules\Category\Models\Category::all()->count() + \App\Modules\Category\Models\Category::orderBy('id')->first()->id;
             $i++) {
            DB::table('translations')->insert([
                'key' => "description",
                'value' => "Category$i description",
                'localable_id' => $i,
                'localable_type' => \App\Modules\Category\Models\Category::class,
                'language_code' => 'us',
            ]);
            DB::table('translations')->insert([
                'key' => "name",
                'value' => "Category$i name",
                'localable_id' => $i,
                'localable_type' => \App\Modules\Category\Models\Category::class,
                'language_code' => 'us',
            ]);
            DB::table('translations')->insert([
                'key' => "description",
                'value' => "Категория$i описание",
                'localable_id' => $i,
                'localable_type' => \App\Modules\Category\Models\Category::class,
                'language_code' => 'ru',
            ]);
            DB::table('translations')->insert([
                'key' => "name",
                'value' => "Категория$i имя",
                'localable_id' => $i,
                'localable_type' => \App\Modules\Category\Models\Category::class,
                'language_code' => 'ru',
            ]);
        }
    }
}
