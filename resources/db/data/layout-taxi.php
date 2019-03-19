<?php

use Siberian\Json;
use Siberian\Feature;
use Application_Model_Layout_Category as LayoutCategory;
use Application_Model_Layout_Homepage as LayoutHomepage;

// LayoutCinema!
$defaultOptions = Json::encode(
    [
        'sidebarWidthUnit' => 'percentage',
        'sidebarWidth' => '70',
    ]
);

$defaultLayoutCategory = (new LayoutCategory())
    ->find('default', 'code');

$data = [
    'name' => 'Layout Taxi',
    'category_id' => $defaultLayoutCategory->getId(),
    'visibility' => LayoutHomepage::VISIBILITY_TOGGLE,
    'code' => 'layout_taxi',
    'preview' => '/customization/layout/homepage/layout_taxi.png',
    'preview_new' => '/customization/layout/homepage/layout_taxi_new.png',
    'use_more_button' => 0,
    'use_horizontal_scroll' => 0,
    'number_of_displayed_icons' => 0,
    'position' => 'left',
    'order' => 1,
    'can_uninstall' => 1,
    'is_active' => 1,
    'use_subtitle' => 1,
    'use_homepage_slider' => 0,
    'options' => $defaultOptions,
];

Feature::installApplicationLayout($data);