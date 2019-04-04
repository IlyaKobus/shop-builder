<?php

use Illuminate\Database\Seeder;

class ShipmentTableSeeder extends Seeder
{
    /**
     * @throws Exception
     */
    public function run()
    {
        /* DHL */
        DB::table('shipments')->insert([
            'sort_order' => random_int(1, 10),
        ]);

        DB::table('translations')->insert([
            'key' => "name",
            'value' => "DHL",
            'localable_id' => 1,
            'localable_type' => \App\Modules\Shipment\Models\Shipment::class,
            'language_code' => 'us',
        ]);

        DB::table('translations')->insert([
            'key' => "name",
            'value' => "Международные перевозки DHL",
            'localable_id' => 1,
            'localable_type' => \App\Modules\Shipment\Models\Shipment::class,
            'language_code' => 'ru',
        ]);
        /* -------- */

        /* Nova Poshta */
        DB::table('shipments')->insert([
            'sort_order' => random_int(1, 10),
        ]);

        DB::table('translations')->insert([
            'key' => "name",
            'value' => "Nova Poshta",
            'localable_id' => 2,
            'localable_type' => \App\Modules\Shipment\Models\Shipment::class,
            'language_code' => 'ru',
        ]);

        DB::table('translations')->insert([
            'key' => "name",
            'value' => "Нова Пошта",
            'localable_id' => 2,
            'localable_type' => \App\Modules\Shipment\Models\Shipment::class,
            'language_code' => 'us',
        ]);
        /* -------- */

        /* Avia Sales */
        DB::table('shipments')->insert([
            'sort_order' => random_int(1, 10),
        ]);

        DB::table('translations')->insert([
            'key' => "name",
            'value' => "Avia Sales",
            'localable_id' => 3,
            'localable_type' => \App\Modules\Shipment\Models\Shipment::class,
            'language_code' => 'us',
        ]);

        DB::table('translations')->insert([
            'key' => "name",
            'value' => "Доставка грузов Avia Sales",
            'localable_id' => 3,
            'localable_type' => \App\Modules\Shipment\Models\Shipment::class,
            'language_code' => 'ru',
        ]);
        /* -------- */
    }
}
