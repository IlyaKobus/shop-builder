<?php

use Illuminate\Database\Seeder;

class OrderStatusTableSeeder extends Seeder
{
    const STATUSES = [
        'en' => [
            'pending',
            'canceled',
            'processing',
            'denied',
            'shipped',
        ],
        'ru' => [
            'Отложен',
            'Отменён',
            'В процессе',
            'Отказан',
            'Доставлен',
        ]
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Modules\Order\Models\OrderStatus::class, 5)->create()->each(function ($status, $index) {
            $status->updateLocales([
                'us' => [
                    'name' => self::STATUSES['en'][$index],
                ],
                'ru' => [
                    'name' => self::STATUSES['ru'][$index],
                ]
            ]);
        });
    }
}
