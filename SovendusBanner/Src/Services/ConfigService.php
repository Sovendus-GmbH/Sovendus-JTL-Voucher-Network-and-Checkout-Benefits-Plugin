<?php

namespace Plugin\SovendusBanner\Src\Services;

use JTL\Plugin\Helper;


class ConfigService
{
    const API_DEVELOPMENT_URL = 'http://localhost:3000/api/v1/';

    private $config;
    private $plugin;

    public function __construct()
    {
        $this->plugin = Helper::getPluginById('SovendusBanner');
        $this->config = $this->plugin->getConfig();
    }

    public function getConfig()
    {
        return $this->config;
    }
    public function getPluginVersion()
    {
        return $this->plugin->getCurrentVersion()->getOriginalVersion();
    }

    public function getSovendusConfig(string $countryCode)
    {
        $sovendusEnabled = false;
        $sovendusTrafficSourceNumber = 0;
        $sovendusTrafficMediumNumber = 0;
        switch ($countryCode) {
            case "DE":
                $sovendusTrafficSourceNumber = $this->config->getValue("de_sovendus_traffic_source_number");
                $sovendusTrafficMediumNumber = $this->config->getValue("de_sovendus_traffic_medium_number");
                $sovendusEnabled = $this->config->getValue("de_sovendus_enabled") === "1" && $sovendusTrafficSourceNumber && $sovendusTrafficMediumNumber;
                break;
            case "AT":
                $sovendusTrafficSourceNumber = $this->config->getValue("at_sovendus_traffic_source_number");
                $sovendusTrafficMediumNumber = $this->config->getValue("at_sovendus_traffic_medium_number");
                $sovendusEnabled = $this->config->getValue("at_sovendus_enabled") === "1" && $sovendusTrafficSourceNumber && $sovendusTrafficMediumNumber;
                break;
            case "NL":
                $sovendusTrafficSourceNumber = $this->config->getValue("nl_sovendus_traffic_source_number");
                $sovendusTrafficMediumNumber = $this->config->getValue("nl_sovendus_traffic_medium_number");
                $sovendusEnabled = $this->config->getValue("nl_sovendus_enabled") === "1" && $sovendusTrafficSourceNumber && $sovendusTrafficMediumNumber;
                break;
            case "CH":
                $sovendusTrafficSourceNumber = array(
                    "de" => $this->config->getValue("ch_de_sovendus_traffic_source_number"),
                    "fr" => $this->config->getValue("ch_fr_sovendus_traffic_source_number")
                );
                $sovendusTrafficMediumNumber = array(
                    "de" => $this->config->getValue("ch_de_sovendus_traffic_medium_number"),
                    "fr" => $this->config->getValue("ch_fr_sovendus_traffic_medium_number")
                );
                $sovendusEnabled = array(
                    "de" => $this->config->getValue("ch_de_sovendus_enabled") === "1",
                    "fr" => $this->config->getValue("ch_fr_sovendus_enabled") === "1"
                );
                break;
            case "FR":
                $sovendusTrafficSourceNumber = $this->config->getValue("fr_sovendus_traffic_source_number");
                $sovendusTrafficMediumNumber = $this->config->getValue("fr_sovendus_traffic_medium_number");
                $sovendusEnabled = $this->config->getValue("fr_sovendus_enabled") === "1" && $sovendusTrafficSourceNumber && $sovendusTrafficMediumNumber;
                break;
            case "IT":
                $sovendusTrafficSourceNumber = $this->config->getValue("it_sovendus_traffic_source_number");
                $sovendusTrafficMediumNumber = $this->config->getValue("it_sovendus_traffic_medium_number");
                $sovendusEnabled = $this->config->getValue("it_sovendus_enabled") === "1" && $sovendusTrafficSourceNumber && $sovendusTrafficMediumNumber;
                break;
            case "IE":
                $sovendusTrafficSourceNumber = $this->config->getValue("ie_sovendus_traffic_source_number");
                $sovendusTrafficMediumNumber = $this->config->getValue("ie_sovendus_traffic_medium_number");
                $sovendusEnabled = $this->config->getValue("ie_sovendus_enabled") === "1" && $sovendusTrafficSourceNumber && $sovendusTrafficMediumNumber;
                break;
            case "UK":
                $sovendusTrafficSourceNumber = $this->config->getValue("uk_sovendus_traffic_source_number");
                $sovendusTrafficMediumNumber = $this->config->getValue("uk_sovendus_traffic_medium_number");
                $sovendusEnabled = $this->config->getValue("uk_sovendus_enabled") === "1" && $sovendusTrafficSourceNumber && $sovendusTrafficMediumNumber;
                break;
            case "DK":
                $sovendusTrafficSourceNumber = $this->config->getValue("dk_sovendus_traffic_source_number");
                $sovendusTrafficMediumNumber = $this->config->getValue("dk_sovendus_traffic_medium_number");
                $sovendusEnabled = $this->config->getValue("dk_sovendus_enabled") === "1" && $sovendusTrafficSourceNumber && $sovendusTrafficMediumNumber;
                break;
            case "SE":
                $sovendusTrafficSourceNumber = $this->config->getValue("se_sovendus_traffic_source_number");
                $sovendusTrafficMediumNumber = $this->config->getValue("se_sovendus_traffic_medium_number");
                $sovendusEnabled = $this->config->getValue("se_sovendus_enabled") === "1" && $sovendusTrafficSourceNumber && $sovendusTrafficMediumNumber;
                break;
            case "ES":
                $sovendusTrafficSourceNumber = $this->config->getValue("es_sovendus_traffic_source_number");
                $sovendusTrafficMediumNumber = $this->config->getValue("es_sovendus_traffic_medium_number");
                $sovendusEnabled = $this->config->getValue("es_sovendus_enabled") === "1" && $sovendusTrafficSourceNumber && $sovendusTrafficMediumNumber;
                break;
            case "BE":
                $sovendusTrafficSourceNumber = array(
                    "nl" => $this->config->getValue("be_nl_sovendus_traffic_source_number"),
                    "fr" => $this->config->getValue("be_fr_sovendus_traffic_source_number")
                );
                $sovendusTrafficMediumNumber = array(
                    "nl" => $this->config->getValue("be_nl_sovendus_traffic_medium_number"),
                    "fr" => $this->config->getValue("be_fr_sovendus_traffic_medium_number")
                );
                $sovendusEnabled = array(
                    "nl" => $this->config->getValue("be_nl_sovendus_enabled") === "1",
                    "fr" => $this->config->getValue("be_fr_sovendus_enabled") === "1"
                );
                break;
            case "PL":
                $sovendusTrafficSourceNumber = $this->config->getValue("pl_sovendus_traffic_source_number");
                $sovendusTrafficMediumNumber = $this->config->getValue("pl_sovendus_traffic_medium_number");
                $sovendusEnabled = $this->config->getValue("pl_sovendus_enabled") === "1" && $sovendusTrafficSourceNumber && $sovendusTrafficMediumNumber;
                break;
            default:
                break;
        }
        return array(
            $sovendusEnabled,
            $sovendusTrafficSourceNumber,
            $sovendusTrafficMediumNumber,
        );
    }
}
