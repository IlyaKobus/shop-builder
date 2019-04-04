<?php

use Illuminate\Database\Seeder;

class ModuleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* Featured Manufacturers */
        DB::table('modules')->insert([
            'name' => "Featured Manufacturers",
            'extension_id' => 1, // Select
        ]);

        DB::table('module_options')->insert([
            'name' => "manufacturers",
            'module_id' => 1,
            'value' => '1,2,4',
        ]);
        /* --------------------  */

        /* Black List of Manufacturers */
        DB::table('modules')->insert([
            'name' => "Black List of Manufacturers",
            'extension_id' => 1, // Select
        ]);

        DB::table('module_options')->insert([
            'name' => "manufacturers",
            'module_id' => 2,
            'value' => '3,5',
        ]);
        /* --------------------------- */

        /* Data block with variously width and height */
        DB::table('modules')->insert([
            'name' => "Data block with variously width and height",
            'extension_id' => 2, // WidthHeight
        ]);

        DB::table('module_options')->insert([
            'name' => "width",
            'module_id' => 3,
            'value' => 480,
        ]);

        DB::table('module_options')->insert([
            'name' => "height",
            'module_id' => 3,
            'value' => 340,
        ]);
        /* ------------------------------------------- */
    }
}
