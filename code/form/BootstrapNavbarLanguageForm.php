<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class BootstrapNavbarLanguageForm extends Form {
 
    public function __construct($controller, $name, $fields = null, $actions = null) {
        
        $Laguages = array();
            
        foreach(LocaleGeoip::get_available_languages() as $Locale => $Language){
            $Languages[$Locale] = _t('BootstrapNavbarLanguageForm.'.$Language, $Language);
        }

        // Create fields
        $fields = new FieldList(
            $locale = new DropdownField('Locale', "", $Languages, i18n::get_locale())
        );
        
        if(self::config()->submitOnChange) $locale->setAttribute('onchange', 'this.form.submit();');
        //$locale->addExtraClass('col-md-2');
        // Create actions
        $actions = new FieldList(
            $submit = new BootstrapLoadingFormAction('updateLang', _t('BootstrapNavbarLanguageForm.SUBMIT','BootstrapNavbarLanguageForm.SUBMIT'))
        );
        $submit->addExtraClass('btn btn-default');

        parent::__construct(
            $controller,
            $name,
            $fields,
            $actions
        );
    }

    public function updateLang(array $data){

        if($o_Member = Member::currentUser()) {

            $o_Member->Locale = $data['Locale'];

            $o_Member->write();
        }
            
        i18n::set_locale($data['Locale']);
            
        Session::set('Locale', $data['Locale']);
        
        Controller::curr()->redirectBack();
    }
}