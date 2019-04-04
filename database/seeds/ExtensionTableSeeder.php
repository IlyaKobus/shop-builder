<?php

use Illuminate\Database\Seeder;

class ExtensionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('extensions')->insert([
            'name' => "Select",
            'status' => \App\Modules\Extension\Enums\ExtensionStatusEnum::ENABLED,
        ]);

        DB::table('extensions')->insert([
            'name' => "WidthHeight",
            'status' => \App\Modules\Extension\Enums\ExtensionStatusEnum::ENABLED,
        ]);
    }
}
