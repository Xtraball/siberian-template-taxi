<?php
$init = function($bootstrap) {
    # Registering layout_taxi
    Siberian_Assets::registerAssets('TemplateTaxi', '/app/local/modules/TemplateTaxi/resources/var/apps/');
    Siberian_Assets::addJavascripts([
        'modules/layout/home/layout_taxi/hooks.js'
    ]);
    Siberian_Assets::addStylesheets([
        'modules/layout/home/layout_taxi/style.css'
    ]);
};