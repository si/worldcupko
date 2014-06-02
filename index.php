<?php
include('_includes/global.php');
include('_includes/data.php');


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
	<title>World Cup 2014 kick off times from Brazil to your device</title>

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<meta name="description" content="All the World Cup kick off times from Brazil to your device" />
	<meta name="keywords" content="world cup 2014, kick off times, calendar, brazil, email" />
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

  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto" type="text/css">

	<link rel="stylesheet" href="/css/brasilia.css" />
	<link rel="stylesheet" href="/css/icons.css" />

  <!-- TradeDoubler site verification 2414386 -->
  
</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&appId=1498133113743918&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

  <?php include('views/intro.php'); ?>
  <?php include('views/stories.php'); ?>
  <?php include('views/footer.php'); ?>
  

  <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-91583-7', 'worldcupkickoff.com');
  ga('send', 'pageview');

  </script>
  
  <script src="/js/libs/jquery-2.0.3.min.js"></script>
  <script src="/js/libs/moment.min.js"></script>
	<script src="/js/plugins/jquery.countdown.min.js"></script>
  <script src="/js/app/worldcupko.js"></script>
  
</body>
</html>