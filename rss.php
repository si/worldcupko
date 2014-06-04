<?php
date_default_timezone_set('UTC');

// Require
require('_includes/global.php');
require('_includes/data.php');

$base_url = 'http://' . $_SERVER['SERVER_NAME'];
$feed_url = $base_url . '/rss.php';

$before = (isset($_GET['before'])) ? $_GET['before'] : 'tomorrow';
$team = (isset($_GET['team'])) ? $_GET['team'] : '';

// HTTP header
header('content-type:application/rss+xml; charset=UTF-8');

$xml = new SimpleXMLElement('<rss/>');
$xml->addAttribute("version", "2.0");
$xml->addAttribute('xmlns:xmlns:atom', "http://www.w3.org/2005/Atom");

$channel = $xml->addChild("channel");
 
$channel->addChild("title", 'World Cup 2014 Kick Off');
$channel->addChild("link", 'http://www.worldcupkickoff.com');
$channel->addChild("description", 'All the World Cup 2014 kick off times, direct from Brazil to your device');
$channel->addChild("language", "en-GB");
$channel->addChild('ttl','120');
$channel->addChild('lastBuildDate', date('r', time()));

$atom_link = $channel->addChild('atom:atom:link');
$atom_link->addAttribute('rel', 'self');
$atom_link->addAttribute('type', 'application/rss+xml');
$atom_link->addAttribute('href', $feed_url);

// $rss->setImage('World Cup 2014 Kick Off', 'img/world-cup-2014-kick-off.png', 'http://www.worldcupkickoff.com/');


foreach($json->events as $event) : 

  if(strtotime($event->start) < strtotime($before)) { 
  
    if($team=='' || (strtolower($event->home_team->name) == $team || strtolower($event->away_team->name) == $team)) {

      $item = $channel->addChild("item");
      $item->addChild("guid", $base_url . url('event',$event->summary));
      $item->addChild("title", $event->summary);
      $item->addChild("link", $base_url . url('event',$event->summary));
      $item->addChild("description",  'Kick off at <span class="time">' . date('ga', strtotime($event->start)) . '</span>, <span class="location">' . $event->location . '</span>, <span class="group">' . ((strlen($event->group)==1) ? 'Group ' : '') . $event->group) . '</span>';
      $item->addChild("pubDate", date('r', strtotime($event->start)));
      $item->addChild('category', ((strlen($event->group)==1) ? 'Group ' : '') . $event->group);

    }
  }
  
endforeach;

echo $xml->asXML();