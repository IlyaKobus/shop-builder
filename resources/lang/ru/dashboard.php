<?php

return [
    'drivers' => [
        'groups' => [
            'not_verified' => 'Неверифіковані',
            'active' => 'Активні',
            'blocked' => 'Заблоковані',
        ],
        'states' => [
            'not_verified' => 'Неверифікований',
            'active' => 'Верифікований',
            'blocked' => 'Заблоковано',
        ]
    ],
    'managers' => [
        'groups' => [
            'active' => 'Активні',
            'blocked' => 'Заблоковані',
        ],
        'states' => [
            'active' => 'Активний',
            'blocked' => 'Заблоковано',
        ],
    ],
    'orders' => [
        'groups' => [
            'in_progress' => 'Виконується',
            'active' => 'Активні',
            'archive' => 'Архів',
        ],
        'states' => [
            'in_progress' => 'Виконується',
            'not_performed' => 'Не виконано',
            'active' => 'Активний',
            'completed' => 'Виконано',
            'canceled' => 'Скасовано',
            'blocked' => 'Заблоковано',
        ],
    ],
    'requests' => [
        'groups' => [
            'service_station_call' => 'Виклик допомоги',
            'help' => 'Взаємодопомога',
        ],
        'states' => [
            'active' => 'Активний',
            'denied' => 'Неактивний',
        ]
    ],
];