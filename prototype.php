<?php
include_once('data.php');
?>
<!doctype html>
<html>
<head>
	<title>World Cup 2014 Kick Off</title>
 	<link href="stylesheets/screen.css" media="screen, projection" rel="stylesheet" type="text/css" />
  	<link href="stylesheets/print.css" media="print" rel="stylesheet" type="text/css" />
	<!--[if IE]>
		<link href="/stylesheets/ie.css" media="screen, projection" rel="stylesheet" type="text/css" />
	<![endif]-->
</head>
<body>
	<div class="container">

	<h1>World Cup 2014 Kick Off</h1>

	<p>All the football kick off times from Brazil at your finger tips</p>

	<?php foreach($fixtures as $fixture) : ?>
	<div class="match">
		<h2 class="summary"><?php echo $fixture['summary']; ?></h2>
		<small class="meta">
			<span class="dtstart" data-timestamp="<?php echo $fixture['dtstart']; ?>"><?php echo date('d M Y H:i',strtotime($fixture['dtstart'])); ?></span>
			<span class="location"><?php echo $fixture['location']; ?></span>
			<span class="group">TBC</span>
		</small>
		<ul class="options">
			<li><a href="#">Save</a></li>
			<li><a href="#">Remind</a></li>
			<li><a href="#">Share</a></li>
		</ul>
	</div>
	<?php endforeach; ?>

	</div>
</body>
</html>