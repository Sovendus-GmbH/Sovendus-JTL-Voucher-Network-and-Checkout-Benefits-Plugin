{block name='checkout-order-completed-include-inc-paymentmodules'}
  {if $sovendusIsEnabled}
    <div id="sovendus-inegration-container"></div>
    <script>
      let isActive = false;
      let trafficSourceNumber = "";
      let trafficMediumNumber = "";
      const multiLangCountries = ["CH", "BE"]
      if (multiLangCountries.includes("{$sovendusBannerData.land}")){
        const lang = document.documentElement.lang.split("-")[0];
        isActive = JSON.parse('{$sovendusBannerData.enabled}')[lang];
        trafficSourceNumber = JSON.parse('{$sovendusBannerData.trafficSourceNumber}')[lang];
        trafficMediumNumber = JSON.parse('{$sovendusBannerData.trafficMediumNumber}')[lang];
      }
      else {
        trafficSourceNumber = {$sovendusBannerData.trafficSourceNumber};
        trafficMediumNumber = {$sovendusBannerData.trafficMediumNumber};
        isActive = true;
      }
      if (isActive && Number(trafficSourceNumber) > 0 && Number(trafficMediumNumber) > 0) {
        window.sovIframes = window.sovIframes || [];
        window.sovIframes.push({
          trafficSourceNumber: trafficSourceNumber,
          trafficMediumNumber: trafficMediumNumber,
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
        var script = document.createElement("script");
        script.type = "text/javascript";
        script.async = true;
        script.src =
          window.location.protocol +
          "//api.sovendus.com/sovabo/common/js/flexibleIframe.js";
        script.setAttribute('data-usercentrics', 'Sovendus');
        document.head.appendChild(script);
      };
    </script>
  {/if}
  {$smarty.block.parent}
{/block}