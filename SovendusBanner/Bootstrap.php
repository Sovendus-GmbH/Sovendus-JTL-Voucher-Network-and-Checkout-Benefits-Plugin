<?php

declare(strict_types=1);

namespace Plugin\SovendusBanner;

use JTL\Events\Dispatcher;
use JTL\Plugin\Bootstrapper;
use Plugin\SovendusBanner\Src\Services\SovendusBannerData;


/**
 * Class Bootstrap
 * @package Plugin\SovendusBanner
 */
class Bootstrap extends Bootstrapper
{
    /**
     * @inheritdoc
     */
    public function boot(Dispatcher $dispatcher)
    {

        parent::boot($dispatcher);
        $dispatcher->listen(
            'shop.hook.' . \HOOK_BESTELLABSCHLUSS_PAGE,
            function (array $args) {
                $this->confirmationPageHook($args);
            },
            10
        );
        $dispatcher->listen(
            'shop.hook.' . \HOOK_BESTELLABSCHLUSS_PAGE_ZAHLUNGSVORGANG,
            function (array $args) {
                $this->confirmationPageHook($args);
            },
            10
        );
        $dispatcher->listen(
            'shop.hook.' . \HOOK_BESTELLVORGANG_PAGE_STEPBESTAETIGUNG,
            function () {
                $this->cacheCouponCode();
            },
            10
        );
    }

    protected function cacheCouponCode()
    {
        if (isset($_SESSION['NeukundenKupon'])) {
            $_SESSION["usedCouponCode"] = $_SESSION['NeukundenKupon']->cCode;
        } else if (isset($_SESSION['Kupon'])) {
            $_SESSION["usedCouponCode"] = $_SESSION['Kupon']->cCode;
        }
    }

    protected function confirmationPageHook(array $args)
    {
        new SovendusBannerData($args["oBestellung"]);
    }
}
