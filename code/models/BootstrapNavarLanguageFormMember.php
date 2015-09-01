<?php
/**
 * Adds attributes to Member model
 * @module bootstrap_navbar_languageform
 */
class BootstrapNavbarLanguageFormMember extends DataExtension {
  
    private static $db = array(
        "Locale" => "Varchar(10)"
    );
}