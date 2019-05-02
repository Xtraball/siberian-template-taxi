<?php

use Siberian\Hook;
use Siberian\Assets;
use Siberian\Feature;

/**
 * @param $payload
 * @return mixed
 */
function enforceToggle ($payload)
{
    if ($payload["featureBlock"]["layout_code"] === "layout_taxi") {
        $payload["featureBlock"]["layout"]["visibility"] = "toggle";
        $payload["featureBlock"]["layout"]["layout_options"] = [
            "sidebarWidthUnit" => "percentage",
            "sidebarWidth" => "70"
        ];
    }

    return $payload;
}

$init = function($bootstrap) {
    # Registering layout_taxi
    Assets::registerAssets('TemplateTaxi', '/app/local/modules/TemplateTaxi/resources/var/apps/');
    Assets::addJavascripts([
        'modules/layout/home/layout_taxi/hooks.js'
    ]);
    Assets::addStylesheets([
        'modules/layout/home/layout_taxi/style.css'
    ]);

    Hook::listen("app.init.ready", "layout_taxi_enforce_toggle", "enforceToggle");

    //Feature::registerLayoutOptionsCallbacks("layout_taxi", "TemplateTaxi_Form_LayoutTaxiOptions", function($data) {
    //    $options = [
    //        "navBackground" => $data["navBackground"],
    //    ];
//
    //    return $options;
    //});
//
    //Feature::registerDataProcessorForLayout("layout_taxi", function ($data, $application) {
    //    unset($data["MAX_FILE_SIZE"]);
    //    $data["navBackground"] = Feature::moveUploadedIcon($application->getId(), $data["navBackground"]);
//
    //    return $data;
    //});
};