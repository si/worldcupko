<?php

$endpoint = ($_SERVER['SERVER_ADDR']=='127.0.0.1') 
              ? 'http://local.kickoffcalendars.com/calendars/view/5.json' 
              : 'http://alpha.kickoffcalendars.com/calendars/export/5/json';
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



?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
	<title>World Cup 2014 Kick Off</title>

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="humans.txt">

	<link rel="shortcut icon" href="favicon.png" type="image/x-icon" />

	<!-- Facebook Metadata /-->
	<meta property="fb:page_id" content="" />
	<meta property="og:image" content="" />
	<meta property="og:description" content=""/>
	<meta property="og:title" content=""/>

	<!-- Google+ Metadata /-->
	<meta itemprop="name" content="">
	<meta itemprop="description" content="">
	<meta itemprop="image" content="">

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">

	<link rel="stylesheet" href="/css/brasilia.css" />
	<link rel="stylesheet" href="/css/icons.css" />

</head>
<body>

  <?php include('views/intro.php'); ?>
  <?php include('views/stories.php'); ?>
  
  
  <footer>
    
    <p>Another <a href="http://kickoffcalendars.com/">KickOff Calendar</a> by <a href="http://twitter.com/Si">Si</a></p>
    <p>World Cup 2014 is managed by FIFA. All data is republished in openly available data formats. Source control by Github</p>
  
  </footer>
  
  <script src="/js/libs/jquery-2.0.3.min.js"></script>
  <script src="/js/libs/moment.min.js"></script>
	<script src="/js/plugins/jquery.countdown.min.js"></script>
  <script src="/js/app/worldcupko.js"></script>
  
</body>
</html>