<?php

use Illuminate\Database\Seeder;

class PaymentTableSeeder extends Seeder
{
    /**
     * @throws Exception
     */
    public function run()
    {
        /* PayPal */
        DB::table('payments')->insert([
            'sort_order' => random_int(1, 10),
        ]);

        DB::table('translations')->insert([
            'key' => "name",
            'value' => "PayPal",
            'localable_id' => 1,
            'localable_type' => \App\Modules\Payment\Models\Payment::class,
            'language_code' => 'us',
        ]);

        DB::table('translations')->insert([
            'key' => "name",
            'value' => "Платёжная система PayPal",
            'localable_id' => 1,
            'localable_type' => \App\Modules\Payment\Models\Payment::class,
            'language_code' => 'ru',
        ]);
        /* -------- */

        /* PayPal */
        DB::table('payments')->insert([
            'sort_order' => random_int(1, 10),
        ]);

        DB::table('translations')->insert([
            'key' => "name",
            'value' => "Visa / Mastercard",
            'localable_id' => 2,
            'localable_type' => \App\Modules\Payment\Models\Payment::class,
            'language_code' => 'us',
        ]);

        DB::table('translations')->insert([
            'key' => "name",
            'value' => "Перевод с карты Visa / Mastercard",
            'localable_id' => 2,
            'localable_type' => \App\Modules\Payment\Models\Payment::class,
            'language_code' => 'ru',
        ]);
        /* -------- */

        /* PayPal */
        DB::table('payments')->insert([
            'sort_order' => random_int(1, 10),
        ]);

        DB::table('translations')->insert([
            'key' => "name",
            'value' => "Privat 24 banking system",
            'localable_id' => 3,
            'localable_type' => \App\Modules\Payment\Models\Payment::class,
            'language_code' => 'us',
        ]);

        DB::table('translations')->insert([
            'key' => "name",
            'value' => "Приват 24",
            'localable_id' => 3,
            'localable_type' => \App\Modules\Payment\Models\Payment::class,
            'language_code' => 'ru',
        ]);
        /* -------- */
    }
}
