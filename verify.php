<?php
$access_token = 'ReF0AR0oFYk7HmSfwtb4ekzh2I8aFrUdqKli+fyN9iFU9Az8f2jDqkawE0UMeGd/Wh+Rwhyl5x4s4rvzyOwdcT5b9LrjcQrUh6tQYkiRjOCzV/hRTR/YwzcXomtzV6vohGjblhCkvF/7pEQA8cuPIAdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;