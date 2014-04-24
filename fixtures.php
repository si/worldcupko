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
    
    <div class="actions">

      <a href="#" class="download">
        Download the kick off times to your calendar
        <small>for Windows, Mac or mobile</small>
      </a>

  		<form id="newsletter" class="email">
  			<label for="email">Get the fixtures by email</label>
  			<input type="email" name="email-address" id="email" placeholder="Your email address" />
  			<button>Subscribe</button>
  		</form>
  		
  		<section class="social" id="social">
  
        <div class="twitter">
          <a href="https://twitter.com/worldcupko" class="twitter-follow-button" data-show-count="true" data-show-screen-name="true">Follow @worldcupko</a>
          <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
        </div>
        
        <div class="facebook">
          <div id="fb-root"></div>
          <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=252313181472957";
            fjs.parentNode.insertBefore(js, fjs);
          }(document, 'script', 'facebook-jssdk'));</script>
          
          <a href="http://www.facebook.com/worldcupkickoff" class="fb-like-box" data-href="http://www.facebook.com/worldcupkickoff" data-width="250" data-height="100" data-colorscheme="light" data-show-faces="false" data-header="false" data-stream="false" data-show-border="false">Like on Facebook</a>
          
        </div>
  			
        <div class="google">      
  
          <a href="//plus.google.com/115685022501320155518" class="g-follow" data-annotation="bubble" data-height="20" data-href="//plus.google.com/115685022501320155518" data-rel="author">+1 on Google</a>
          
          <script type="text/javascript">
            (function() {
              var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
              po.src = 'https://apis.google.com/js/plusone.js';
              var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
            })();
          </script>
          
        </div>			
  			
  		</section>
  		

    </div>
    
    <?php if(count($json->events)>0) : 
      $next = $json->events[0];
    ?>
  
    <div>
      <p>Next kick off in <strong title="<?php echo ($next->start); ?>"><?php echo (strtotime($next->start) - strtotime('now'))/60/60/24  . ' days'; ?></strong></p>
      <p><?php echo $next->summary . ', Group ' . $next->group . ', ' . $next->location; ?></p>
    </div>
  
  </section>
  
  <section class="timeline">
  
    <ol class="posts">
      <?php 
        foreach($json->events as $event) : 
        
          if( $date != date('D j M', strtotime($event->start)) ) :
            $date = date('D j M', strtotime($event->start));
          ?>
            <li class="year"><?php echo $date; ?></li>
        <?php
          endif;
        ?>
      <li class="event">
        <span class="time" data-timestamp="<?php echo $event->start; ?>"><?php echo date('ga', strtotime($event->start)); ?></span>
        <h2>
          <?php if($event->home_team->name!='') : ?>
            <span class="team"><?php echo $event->home_team->name; ?></span> v <span class="team"><?php echo $event->away_team->name; ?></span>
          <?php else: ?>
            <?php echo $event->summary; ?>
          <?php endif; ?>
        </h2>
        <p class="detail">
          <span class="location"><?php echo $event->location; ?></span>,
          <span class="group"><?php echo ((strlen($event->group)==1) ? 'Group ' : '') . $event->group; ?></span>
        </p>
        <a href="#">Remind me</a>
      </li>
      <?php endforeach; ?>
    </ol>
  
  </section>
  
  <?php endif; ?>
  
  <footer>
    
    <p>Another <a href="http://kickoffcalendars.com/">KickOff Calendar</a> by <a href="http://twitter.com/Si">Si</a></p>
    <p>World Cup 2014 is managed by FIFA. All data is republished in openly available data formats. Source control by Github</p>
  
  </footer>
  
  <script src="/js/libs/jquery-2.0.3.min.js"></script>
  <script src="/js/libs/moment.min.js"></script>
  
</body>
</html>