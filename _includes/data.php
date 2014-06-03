<?php
$endpoint = 'http://dev.kickoffcalendars.com/calendars/view/5.json';

// create a new cURL resource
$ch = curl_init();

// set URL and other appropriate options
curl_setopt($ch, CURLOPT_URL, $endpoint);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$data = curl_exec($ch);
$json = ($data!='') ? json_decode($data) : '';

// close cURL resource, and free up system resources
curl_close($ch);


