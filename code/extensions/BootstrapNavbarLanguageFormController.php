<?php

/**
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class BootstrapNavbarLanguageFormController extends Extension {
    
    private static $allowed_actions = array(
        'BootstrapNavbarLanguageForm'
    );
    
    public function onBeforeInit(){
        // Allow to set Locale by GET Parameter
        if(isset($_GET['Locale']) && key_exists($_GET['Locale'], Config::inst()->get('i18n', 'all_locales'))){
            Session::set('Locale', $_GET['Locale']);
            Cookie::set('Locale', $_GET['Locale']);
        }
        
        if(Member::currentUser() && Member::currentUser()->Locale) i18n::set_locale(Member::currentUser()->Locale);
        elseif(Session::get('Locale')) i18n::set_locale(Session::get('Locale'));
        elseif(Cookie::get('Locale')) i18n::set_locale(Cookie::get('Locale'));
        elseif(($Locale = LocaleGeoip::countryCode2Locale(Geoip::ip2country($_SERVER[Geoip::get_default_server_var()], true)))) i18n::set_locale($Locale);
        elseif(($Locale = LocaleGeoip::countryCode2Locale(Geoip::get_default_country_code()))==true) i18n::set_locale($Locale);
        else i18n::set_locale(LocaleGeoip::get_default_locale_code());
        
    }
    
    public function BootstrapNavbarLanguageForm(){        
        $LanguageForm = Object::create("BootstrapNavbarLanguageForm", $this->owner, "BootstrapNavbarLanguageForm");
        return $LanguageForm;
    }
}
