<?php

// Add the Following Lines to your _config.php file
//if(Member::currentUser() && Member::currentUser()->LocaleCode) i18n::set_locale(Member::currentUser()->LocaleCode);
//elseif(Session::get('LocaleCode')) i18n::set_locale(Session::get('LocaleCode'));
//elseif(($Locale = LocaleGeoip::countryCode2Locale(Geoip::ip2country($_SERVER[Geoip::get_default_server_var()], true)))) i18n::set_locale($Locale);
//elseif(($Locale = LocaleGeoip::countryCode2Locale(Geoip::get_default_country_code()))==true) i18n::set_locale($Locale);
//else i18n::set_locale(LocaleGeoip::get_default_locale_code());