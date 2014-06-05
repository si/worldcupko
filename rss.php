<?php
date_default_timezone_set('UTC');

// Require
require('_includes/global.php');
require('_includes/data.php');

// Set some constants
$base_url = 'http://' . $_SERVER['SERVER_NAME'];
$feed_url = $base_url . $_SERVER['REQUEST_URI'];

// Check for URL parameters
$before = (isset($_GET['before'])) ? $_GET['before'] : 'tomorrow';
$team = (isset($_GET['team'])) ? $_GET['team'] : '';
$group = (isset($_GET['group'])) ? $_GET['group'] : '';

// HTTP header
header('content-type:application/rss+xml; charset=UTF-8');

// Create RSS root node
$xml = new SimpleXMLElement('<rss/>');
$xml->addAttribute("version", "2.0");
$xml->addAttribute('xmlns:xmlns:atom', "http://www.w3.org/2005/Atom");

// Create RSS CHANNEL node
$channel = $xml->addChild("channel");
$channel->addChild("title", (($team!='') ? ucwords($team) . ' - ' : '') . 'World Cup 2014 Kick Off');
$channel->addChild("link", 'http://www.worldcupkickoff.com');
$channel->addChild("description", 'All the World Cup 2014 kick off times' . (($team!='') ? ' for ' . ucwords($team) : '') . ', direct from Brazil to your device');
$channel->addChild("language", "en-GB");
$channel->addChild('ttl','120');
$channel->addChild('lastBuildDate', date('r', time()));

$atom_link = $channel->addChild('atom:atom:link');
$atom_link->addAttribute('rel', 'self');
$atom_link->addAttribute('type', 'application/rss+xml');
$atom_link->addAttribute('href', $feed_url);

// $rss->setImage('World Cup 2014 Kick Off', 'img/world-cup-2014-kick-off.png', 'http://www.worldcupkickoff.com/');

// Loop through events for each ITEM
foreach($json->events as $event) : 

  // Check if the event happens within the Before parameter
  if(strtotime($event->start) < strtotime($before)) { 
  
    // Filter by team if defined
    if(
      ( $team=='' && $group=='' )
      || ( strtolower($event->home_team->name) == strtolower($team) || strtolower($event->away_team->name) == strtolower($team) )
      || ( strtolower($event->group) == strtolower($group) )
    ) {

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