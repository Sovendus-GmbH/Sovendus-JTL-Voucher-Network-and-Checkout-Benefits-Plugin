{block name='checkout-order-completed-include-inc-paymentmodules'}
  {if $sovendusIsEnabled}
    <div id="sovendus-inegration-container"></div>
    <script>
      window.sovIframes = window.sovIframes || [];
      window.sovIframes.push({
        trafficSourceNumber: "{$sovendusBannerData.trafficSourceNumber}",
        trafficMediumNumber: "{$sovendusBannerData.trafficMediumNumber}",
        iframeContainerId: 'sovendus-inegration-container',
        timestamp: '{$sovendusBannerData.timestamp}',
        sessionId: '{$sovendusBannerData.session}',
        orderId: '{$sovendusBannerData.bestellNr}',
        orderValue: '{$sovendusBannerData.netOrdervalue}',
        orderCurrency: '{$sovendusBannerData.orderCurrency}',
        integrationType: "jtl-{$sovendusBannerData.pluginVersion}",
        usedCouponCode: '{$sovendusBannerData.usedCouponCode}',
      });
      window.sovConsumer = {
        consumerSalutation: '',
        consumerFirstName: '{$sovendusBannerData.vorname}',
        consumerLastName: '{$sovendusBannerData.nachname}',
        consumerEmail: '{$sovendusBannerData.mail}',
        consumerPhone: '{$sovendusBannerData.consumerPhone}',
        consumerStreet: '{$sovendusBannerData.strasse}',
        consumerStreetNumber: '{$sovendusBannerData.hausnummer}',
        consumerZipcode: '{$sovendusBannerData.pLZ}',
        consumerCity: '{$sovendusBannerData.ort}',
        consumerCountry: '{$sovendusBannerData.land}',
      };
    </script>
    <script type="text/javascript" src="https://api.sovendus.com/sovabo/common/js/flexibleIframe.js" async=true></script>
  {/if}
  {$smarty.block.parent}
{/block}