<?php
$endpoint = 'http://local.kickoffcalendars.com/calendars/view/5.json';

// create a new cURL resource
$ch = curl_init();

// set URL and other appropriate options
curl_setopt($ch, CURLOPT_URL, $endpoint);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$data = curl_exec($ch);

$json = json_decode($data);

// close cURL resource, and free up system resources
curl_close($ch);

?>
<!DOCTYPE html>
<html lang="">
<head>
  <meta charset="utf-8">
	<title>World Cup 2014 Kick Off</title>
	<meta name="description" content="" />
  <meta name="keywords" content="" />
	<meta name="robots" content="" />
	<link rel="stylesheet" href="/css/brasilia.css" />
</head>
<body>

  <h1>World Cup 2014 Kick Off</h1>
  <h2>Don't miss a single World Cup kick-off from Brazil</h2>

  <?php if(count($json->events)>0) : ?>

  <h2>Next kick-off in <?php echo $json->events[0]->start; ?></h2>

  <ol class="timeline">
    <?php foreach($json->events as $event) : ?>
    <li>
      <span class="time" data-timestamp="<?php echo $event->start; ?>"><?php echo date('ha', strtotime($event->start)); ?></span>
      <h2><span class="team"><?php echo $event->home_team->name; ?></span> v <span class="team"><?php echo $event->away_team->name; ?></span></h2>
      <p><?php echo $event->location; ?></p>
    </li>
    <?php endforeach; ?>
  </ol>
  
  <?php endif; ?>
  
  <script src="/js/libs/jquery-2.0.3.min.js"></script>

</body>
</html>