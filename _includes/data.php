<?php
$endpoint = 'http://alpha.kickoffcalendars.com/calendars/view/5.json';

// create a new cURL resource
$ch = curl_init();

// set URL and other appropriate options
curl_setopt($ch, CURLOPT_URL, $endpoint);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$data = curl_exec($ch);
$json = ($data!='') ? json_decode($data) : '';

// close cURL resource, and free up system resources
curl_close($ch);

/*
if(count($_GET)>0) {

  if(isset($_GET['group'])) {
    $key = 'group';
    $value = $_GET['group'];
  }

  if(isset($_GET['venue'])) {
    $key = 'venue';
    $value = $_GET['venue'];
  }

  if(isset($_GET['date'])) {
    $key = 'start';
    $value = $_GET['date'];
  }

  if(isset($_GET['team'])) {
    $key = 'team';
    $value = $_GET['team'];
  }

  foreach($json->events as $event) {
    
    if($key = 'group' && $event->group != $value) {
      unset($event);
    }
    
  }
  
  var_dump($json->events);

}
*/