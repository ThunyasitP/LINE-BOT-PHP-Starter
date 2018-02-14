<?php
$access_token = '2D9ta27vlNRhzGAyFTsrrkahVFo8lrVd0VEpzTGR626H2BXI7jhIdOpxo33pf9G0s8J3zIrzpA6pTOodfqQNBVduDQA4x4jmxYI57a4+PMFz/sfPwyLCtEPCUWiOmrfBSHTam/xjueQxWRvAruE/cgdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;

?>