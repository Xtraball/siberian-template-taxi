<?php

/**
 * Class TemplateTaxi_Form_LayoutTaxiOptions
 */
class TemplateTaxi_Form_LayoutTaxiOptions extends Siberian_Form_Options_Abstract
{
    /**
     * @throws Zend_Form_Exception
     */
    public function init()
    {
        parent::init();

        /** Bind as a create form */
        self::addClass("create", $this);
        self::addClass("form-layout-options", $this);
;
        $this->addSimpleImage(
            "navBackground",
            p__("template_taxi", "Menu background"),
            [
                "width" => 460,
                "height" => 340
            ]
        );

        $this->addNav("submit", __("Save"), false, false);

        self::addClass("btn-sm", $this->getDisplayGroup("submit")->getElement(__("Save")));

    }

}