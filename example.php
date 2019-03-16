<?php
header('Content-type: text/plain');

$apikey = '';
$platform = 'PC';
$player = 'HeyImLIFELINE';

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'http://api.apexlegendsstatus.com/bridge?platform='.$platform.'&player='.$player.'&auth='.$apikey);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close ($ch);

print_r($result);
