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

  <section id="intro">
    <header>
      <h1>World Cup 2014 Kick Off</h1>
      <h2>Don't miss a single World Cup kick off from Brazil</h2>
    </header>
    
    <div>
      <a href="#">Download the times to your calendar</a>
    </div>
    
    <?php if(count($json->events)>0) : ?>
  
    <div>
      <p>Next kick off in <strong title="<?php echo ($json->events[0]->start); ?>"><?php echo (strtotime($json->events[0]->start) - strtotime('now'))/60/60/24  . ' days'; ?></strong></p>
    </div>
  
  </section>
  
  <ol class="timeline">
    <?php foreach($json->events as $event) : ?>
    <li>
      <span class="time" data-timestamp="<?php echo $event->start; ?>"><?php echo date('ga', strtotime($event->start)); ?></span>
      <h2>
        <?php if($event->home_team->name!='') : ?>
          <span class="team"><?php echo $event->home_team->name; ?></span> v <span class="team"><?php echo $event->away_team->name; ?></span>
        <?php else: ?>
          <?php echo $event->summary; ?>
        <?php endif; ?>
      </h2>
      <p><?php echo $event->location; ?></p>
      <a href="#">Remind me</a>
    </li>
    <?php endforeach; ?>
  </ol>
  
  <?php endif; ?>
  
  <script src="/js/libs/jquery-2.0.3.min.js"></script>

</body>
</html>