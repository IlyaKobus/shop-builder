<?php

use Illuminate\Database\Seeder;

class BlogCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* News */
        DB::table('blog_categories')->insert([
            'slug' => 'news',
        ]);

        DB::table('translations')->insert([
            'key' => "title",
            'value' => "News",
            'localable_id' => 1,
            'localable_type' => \App\Modules\Blog\Models\BlogCategory::class,
            'language_code' => 'us',
        ]);

        DB::table('translations')->insert([
            'key' => "title",
            'value' => "Новости",
            'localable_id' => 1,
            'localable_type' => \App\Modules\Blog\Models\BlogCategory::class,
            'language_code' => 'ru',
        ]);
        /* ---- */

        /* Partners */
        DB::table('blog_categories')->insert([
            'slug' => 'partners',
        ]);

        DB::table('translations')->insert([
            'key' => "title",
            'value' => "Partners",
            'localable_id' => 2,
            'localable_type' => \App\Modules\Blog\Models\BlogCategory::class,
            'language_code' => 'us',
        ]);

        DB::table('translations')->insert([
            'key' => "title",
            'value' => "Наши партнёры",
            'localable_id' => 2,
            'localable_type' => \App\Modules\Blog\Models\BlogCategory::class,
            'language_code' => 'ru',
        ]);
        /* -------- */

        /* Discounts */
        DB::table('blog_categories')->insert([
            'slug' => 'discounts',
        ]);

        DB::table('translations')->insert([
            'key' => "title",
            'value' => "Discounts",
            'localable_id' => 3,
            'localable_type' => \App\Modules\Blog\Models\BlogCategory::class,
            'language_code' => 'us',
        ]);

        DB::table('translations')->insert([
            'key' => "title",
            'value' => "акции и скидки",
            'localable_id' => 3,
            'localable_type' => \App\Modules\Blog\Models\BlogCategory::class,
            'language_code' => 'ru',
        ]);
        /* -------- */
    }
}
