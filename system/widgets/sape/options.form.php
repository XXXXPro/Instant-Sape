<?php
class formWidgetSapeOptions extends cmsForm {
    public function init() {
        return array(
            array(
                'type' => 'fieldset',
                'title' => LANG_OPTIONS,
                'childs' => array(
                    new fieldString('options:code', array(
                        'title' => LANG_WD_SAPE_USER,
                        'default' => "a3dc9....",
                    )),
                    new fieldNumber('options:count', array(
                        'title' => LANG_WD_SAPE_LINKS,
                        'default' => 3
                    )),
                    new fieldCheckbox('options:force_show_code', array(
                      'title' => LANG_WD_SAPE_FORCE_SHOW_CODE,
                      'default' => false,
                  )),                    
                )
            ),
        );
    }
}