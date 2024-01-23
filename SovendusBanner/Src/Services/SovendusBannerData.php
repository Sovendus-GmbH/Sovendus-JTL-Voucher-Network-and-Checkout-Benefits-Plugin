<?php

namespace Plugin\SovendusBanner\Src\Services;

use JTL\Checkout\Bestellung;
use JTL\Shop;
use Plugin\SovendusBanner\Src\Services\ConfigService;

class SovendusBannerData
{
    public function __construct(Bestellung $oBestellung)
    {
        $smarty = Shop::Smarty();
        // TODO multi language countries
        // $language = Shop::Lang();
        // echo(json_encode($language));
        $configService = new ConfigService();

        list(
            $sovendusEnabled,
            $sovendusTrafficSourceNumber,
            $sovendusTrafficMediumNumber
        ) = $configService->getSovendusConfig($oBestellung->oRechnungsadresse->cLand);
        $smarty->assign('sovendusIsEnabled', $sovendusEnabled);
        if ($sovendusEnabled) {
            $sovendusConsumerPhone = $oBestellung->Lieferadresse->cTel || $oBestellung->Lieferadresse->cMobil;
            $netOrdervalue = $oBestellung->fGesamtsummeNetto - $oBestellung->fVersandNetto;
            $orderCurrency = explode(" ", $oBestellung->cBestellwertLocalized)[1];
            $smarty->assign(
                'sovendusBannerData',
                array(
                    'consumerPhone' => $sovendusConsumerPhone,
                    'pluginVersion' => $configService->getPluginVersion(),
                    'trafficSourceNumber' => $sovendusTrafficSourceNumber,
                    'trafficMediumNumber' => $sovendusTrafficMediumNumber,
                    'netOrdervalue' => $netOrdervalue,
                    'orderCurrency' => $orderCurrency,
                    'orderData' => $oBestellung,
                    'timestamp' => time(),
                    'usedCouponCode' => $_SESSION["usedCouponCode"],
                    'vorname' => $oBestellung->oRechnungsadresse->cVorname,
                    'nachname' => $oBestellung->oRechnungsadresse->cNachname,
                    'mail' => $oBestellung->oRechnungsadresse->cMail,
                    'strasse' => $oBestellung->oRechnungsadresse->cStrasse,
                    'hausnummer' => $oBestellung->oRechnungsadresse->cHausnummer,
                    'pLZ' => $oBestellung->oRechnungsadresse->cPLZ,
                    'ort' => $oBestellung->oRechnungsadresse->cOrt,
                    'land' => $oBestellung->oRechnungsadresse->cLand,
                    'session' => $oBestellung->cSession,
                    'bestellNr' => $oBestellung->cBestellNr,
                )
            );
        }
    }
}