<?php

require_once __DIR__ . '/../settings/get-settings.php';

$jsFilePath = __DIR__ . '/test.js';
$jsContent = file_get_contents($jsFilePath);
$countryCode = "de";
list(
    $sovendusEnabled,
    $sovendusTrafficSourceNumber,
    $sovendusTrafficMediumNumber
) = get_sovendus_settings($countryCode);

echo "
<script>
    const settings = '{$sovendusEnabled}'
    {$jsContent}

</script>";
