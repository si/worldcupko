<?php
date_default_timezone_set('UTC');

// Require
require('_includes/CyrilPerrinRss.php');
require('_includes/global.php');
require('_includes/data.php');

// HTTP header
header('content-type:application/rss+xml');

// Example
$rss = new CyrilPerrin\Rss\Rss(
    'World Cup 2014 Kick Off', 'http://www.worldcupkickoff.com', 'All the World Cup 2014 kick off times, direct from Brazil to your device', 'en', '120', time()
);
$rss->setImage('World Cup 2014 Kick Off', 'img/world-cup-2014-kick-off.png', 'http://www.worldcupkickoff.com/');


foreach($json->events as $event) : 

  $date = date('l j F Y', strtotime($event->start));

  $rss->addItem(
      '1', // GUID
      $event->summary, // Title
      url('event',$event->summary), // URL
      date('ga', strtotime($event->start)) . ', ' . $event->location . ', ' . ((strlen($event->group)==1) ? 'Group ' : '') . $event->group, // Description
      ((strlen($event->group)==1) ? 'Group ' : '') . $event->group, // Category (Group)
      'World Cup Kick Off', // Author
      strtotime($event->start), // Publish time
      '', // Comments
      'http://www.worldcupkickoff.com/'  // Source
  );
  
endforeach;

echo $rss;