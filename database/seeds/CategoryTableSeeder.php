<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * @throws Exception
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('categories')->insert([
                'created_at' => now(),
            ]);
            $lastRootCategory = \App\Modules\Category\Models\Category::orderBy('id', 'desc')->first();
            for ($k = 1; $k <= random_int(1, 5); $k++) {
                DB::table('categories')->insert([
                    'parent_id' => $lastRootCategory->id,
                    'created_at' => now(),
                ]);
                $lastSubRootCategory = \App\Modules\Category\Models\Category::orderBy('id', 'desc')->first();
                for ($z = 1; $z <= random_int(1, 5); $z++) {
                    DB::table('categories')->insert([
                        'parent_id' => $lastSubRootCategory->id,
                        'created_at' => now(),
                    ]);
                    $lastSubSubRootCategory = \App\Modules\Category\Models\Category::orderBy('id', 'desc')->first();
                    for ($j = 1; $j <= random_int(1, 5); $j++) {
                        DB::table('categories')->insert([
                            'parent_id' => $lastSubSubRootCategory->id,
                            'created_at' => now(),
                        ]);
                    }
                }
            }
        }
    }
}
