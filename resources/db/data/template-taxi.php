<?php

$ionicColors = [
    'background' => [
        'background_color' => '#707487',
    ],
    'header' => [
        'color' => '#303030',
        'background_color' => '#ffc850',
        'border_color' => '#ffc850',
    ],
    'homepage' => [
        'color' => '#303030',
        'background_color' => '#ffffff',
        'border_color' => '#707487',
        'image_color' => '#303030',
    ],
    'list_item_divider' => [
        'color' => '#303030',
        'background_color' => '#ffc850',
    ],
    'list_item' => [
        'color' => '#303030',
        'background_color' => '#ffffff',
    ],
    'card_item_divider' => [
        'color' => '#303030',
        'background_color' => '#ffc850',
    ],
    'card_item' => [
        'color' => '#303030',
        'background_color' => '#fff',
    ],
    'buttons' => [
        'color' => '#f0f0f0',
        'background_color' => '#5b5d6e',
        'border_color' => '#5b5d6e',
    ],
    'buttons_light' => [
        'color' => '#444',
        'background_color' => '#dddddd',
        'border_color' => '#dddddd',
    ],
    'buttons_positive' => [
        'color' => '#303030',
        'background_color' => '#ffc850',
        'border_color' => '#ffc850',
    ],
    'buttons_calm' => [
        'color' => '#ffffff',
        'background_color' => '#2990ad',
        'border_color' => '#2990ad',
    ],
    'buttons_balanced' => [
        'color' => '#ffffff',
        'background_color' => '#629441',
        'border_color' => '#629441',
    ],
    'buttons_energized' => [
        'color' => '#ffffff',
        'background_color' => '#e67f00',
        'border_color' => '#e67f00',
    ],
    'buttons_assertive' => [
        'color' => '#ffffff',
        'background_color' => '#ad3830',
        'border_color' => '#ad3830',
    ],
    'buttons_royal' => [
        'color' => '#ffffff',
        'background_color' => '#886aea',
        'border_color' => '#886aea',
    ],
    'buttons_dark' => [
        'color' => '#ffffff',
        'background_color' => '#2b2b2b',
        'border_color' => '#2b2b2b',
    ],
    'badges' => [
        'color' => '#f0f0f0',
        'background_color' => '#5b5d6e',
    ],
    'badges_light' => [
        'color' => '#444',
        'background_color' => '#dddddd',
    ],
    'badges_positive' => [
        'color' => '#303030',
        'background_color' => '#ffc850',
    ],
    'badges_calm' => [
        'color' => '#ffffff',
        'background_color' => '#2990ad',
    ],
    'badges_balanced' => [
        'color' => '#ffffff',
        'background_color' => '#629441',
    ],
    'badges_energized' => [
        'color' => '#ffffff',
        'background_color' => '#e67f00',
    ],
    'badges_assertive' => [
        'color' => '#ffffff',
        'background_color' => '#ad3830',
    ],
    'badges_royal' => [
        'color' => '#ffffff',
        'background_color' => '#886aea',
    ],
    'badges_dark' => [
        'color' => '#ffffff',
        'background_color' => '#2b2b2b',
    ],
    'util' => [
        'color' => '#5b5d6e',
        'background_color' => '#5b5d6e',
        'border_color' => '#5b5d6e',
    ],
    'util_light' => [
        'color' => '#dddddd',
        'background_color' => '#dddddd',
        'border_color' => '#dddddd',
    ],
    'util_positive' => [
        'color' => '#ffc850',
        'background_color' => '#ffc850',
        'border_color' => '#ffc850',
    ],
    'util_calm' => [
        'color' => '#2990ad',
        'background_color' => '#2990ad',
        'border_color' => '#2990ad',
    ],
    'util_balanced' => [
        'color' => '#629441',
        'background_color' => '#629441',
        'border_color' => '#629441',
    ],
    'util_energized' => [
        'color' => '#e67f00',
        'background_color' => '#e67f00',
        'border_color' => '#e67f00',
    ],
    'util_assertive' => [
        'color' => '#ad3830',
        'background_color' => '#ad3830',
        'border_color' => '#ad3830',
    ],
    'util_royal' => [
        'color' => '#886aea',
        'background_color' => '#886aea',
        'border_color' => '#886aea',
    ],
    'util_dark' => [
        'color' => '#2b2b2b',
        'background_color' => '#2b2b2b',
        'border_color' => '#2b2b2b',
    ],
    'checkbox_general' => [
        'color' => '#444',
        'background_color' => '#707487',
    ],
    'checkbox_on' => [
        'color' => '#303030',
        'background_color' => '#ffc850',
    ],
    'checkbox_off' => [
        'background_color' => '#d0d0d0',
    ],
    'radio' => [
        'color' => '#444',
        'background_color' => '#fff',
    ],
    'toggle_on' => [
        'background_color' => '#ffc850',
    ],
    'tooltip' => [
        'color' => '#303030',
        'background_color' => '#ffc850',
    ],
    'spinner_ios_text' => [
        'background_color' => '#ffc850',
    ],
    'spinner_android_text' => [
        'background_color' => '#ffc850',
    ],
    'dialog_text' => [
        'color' => '#303030',
    ],
    'dialog_bg' => [
        'color' => '#ffc850',
    ],
    'dialog_button' => [
        'color' => '#303030',
    ],
];


$features = [
    'cabride' => [
        'name' => 'Cab-Ride',
    ],
    'push_notification' => [
        'name' => 'Notifications',
        'icon' => '/push_notifications/push3-flat.png'
    ],
    'contact' => [
        'name' => 'About us',
        'icon' => '/contact/contact3-flat.png'
    ]
];

\Siberian\Template::installOrUpdate(
    'TemplateTaxi',
    'Taxi',
    'taxi',
    'layout_taxi',
    ['Local Business'],
    $ionicColors,
    $features
);