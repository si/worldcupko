<?php
date_default_timezone_set('UTC');

// Require
require('_includes/global.php');
require('_includes/data.php');

// HTTP header
header('content-type:application/rss+xml; charset=UTF-8');

$xml = new SimpleXMLElement('<rss/>');
$xml->addAttribute("version", "2.0");

$channel = $xml->addChild("channel");
 
$channel->addChild("title", 'World Cup 2014 Kick Off');
$channel->addChild("link", 'http://www.worldcupkickoff.com');
$channel->addChild("description", 'All the World Cup 2014 kick off times, direct from Brazil to your device');
$channel->addChild("language", "en-GB");
$channel->addChild('ttl','120');
$channel->addChild('lastBuildDate', date('r', time()));

// $rss->setImage('World Cup 2014 Kick Off', 'img/world-cup-2014-kick-off.png', 'http://www.worldcupkickoff.com/');


foreach($json->events as $event) : 

  $date = date('l j F Y', strtotime($event->start));

  $item = $channel->addChild("item");

  $item->addChild("guid", 'WCKO2014' . $event->event_id);
  $item->addChild("title", $event->summary);
  $item->addChild("link", url('event',$event->summary));
  $item->addChild("description",  date('ga', strtotime($event->start)) . ', ' . $event->location . ', ' . ((strlen($event->group)==1) ? 'Group ' : '') . $event->group);
  $item->addChild("pubDate", date('r', strtotime($event->start)));
  $item->addChild('category', ((strlen($event->group)==1) ? 'Group ' : '') . $event->group);
    
endforeach;

echo $xml->asXML();