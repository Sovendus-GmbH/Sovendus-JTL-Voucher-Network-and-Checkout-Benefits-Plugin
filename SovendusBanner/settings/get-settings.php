<?php

require_once __DIR__ . '/../sovendus-plugins-commons/settings/app-settings.php';
require_once __DIR__ . '/../sovendus-plugins-commons/settings/sovendus-countries.php';
require_once __DIR__ . 'settings-keys.php';
require_once __DIR__ . '/../sovendus-plugins-commons/settings/get-settings-helper.php';

use JTL\Plugin\Helper;

function get_sovendus_settings(string|null $countryCode) //: Sovendus_App_Settings
{
    // return "Test";
    $get_option = Helper::getPluginById('SovendusBanner')->getConfig();

    // $sovendusTrafficSourceNumber = $get_option->getValue("{$countryCode}_sovendus_traffic_source_number");
    // $sovendusTrafficMediumNumber = $get_option->getValue("{$countryCode}_sovendus_traffic_medium_number");
    // $sovendusEnabled = $get_option->getValue("{$countryCode}_sovendus_enabled") === "1" && $sovendusTrafficSourceNumber && $sovendusTrafficMediumNumber;

    // return array(
    //     $sovendusEnabled,
    //     $sovendusTrafficSourceNumber,
    //     $sovendusTrafficMediumNumber,
    // );
    return Get_Settings_Helper::get_settings(
        countryCode: $countryCode,
        get_option_callback: 'get_option->getValue',
        settings_keys: SETTINGS_KEYS
    );
}
