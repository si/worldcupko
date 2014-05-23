<?php
$endpoint = 'http://alpha.kickoffcalendars.com/calendars/view/5.json';
$facebook_endpoint = 'http://graph.facebook.com/http://www.worldcupkickoff.com';

// create a new cURL resource
$ch = curl_init();

// set URL and other appropriate options
curl_setopt($ch, CURLOPT_URL, $endpoint);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$data = curl_exec($ch);
$json = ($data!='') ? json_decode($data) : '';

// set URL and other appropriate options
curl_setopt($ch, CURLOPT_URL, $facebook_endpoint);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$facebook_response = curl_exec($ch);
$facebook_data = ($facebook_response!='') ? json_decode($facebook_response) : '';

// close cURL resource, and free up system resources
curl_close($ch);


