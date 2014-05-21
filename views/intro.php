  <section id="intro">

    <header>
      <h1><a href="/">World Cup 2014 Kick Off</a></h1>
      <h2>Never miss a single World Cup kick off from Brazil</h2>
    </header>
    
    <div class="actions">
    
      <div id="download">
        <a href="<?php echo (isset($json->calendar->ics_url)) ? $json->calendar->ics_url : ''; ?>">
          <i class="icon" data-icon="&#xe082;"></i>
          <span>Download kick off times to your calendar
          <small>for Windows, Mac or mobile</small></span>
        </a>
      </div>

  		<form id="newsletter" action="http://unstyled.us5.list-manage.com/subscribe/post?u=72272c8bc5aca2779d7c6c61f&amp;id=d759ec2579" method="post" name="mc-embedded-subscribe-form" target="_blank">
  			<label for="mce-email">
    			<i class="icon" data-icon="&#xe038;"></i>
    			<span>Get fixtures by email daily</span>
    			<input type="email"  name="EMAIL" id="mce-email" required placeholder="Your email address" />
    			<button type="submit" name="subscribe">Subscribe</button>
  			</label>
  		</form>
  		
  		<div id="social">
        <i class="icon" data-icon="&#xe02a;"></i>
        <span>Share the love for football</span>
        <ul class="share">
          <li class="facebook">
            <div class="fb-like" data-href="http://www.worldcupkickoff.com" data-send="false" data-layout="button_count" data-width="100" data-show-faces="true"></div>
          </li>
          <li class="twitter">
            <a href="https://twitter.com/share" class="twitter-share-button" data-url="http://twitter.com/worldcupko" data-count="horizontal">Tweet</a>
            <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
          </li>
          <li class="google-plus">
            <div class="g-plusone" data-size="medium" data-href="http://alpha.worldcupkickoff.com"></div>
          </li>
        </ul>
        
        <script type="text/javascript">
            (function() {
              var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
              po.src = 'https://apis.google.com/js/plusone.js';
              var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
            })();
        </script>  			
        
  		</div>
    		
    </div>
    
    <?php if(count($json->events)>0) : 
      $next = $json->events[0];
    ?>
  
    <div id="next">
      <i class="icon" data-icon="&#xe083"></i>
      <p>
        Next kick off  
        <strong title="<?php echo ($next->start); ?>">
          <?php echo $next->start; ?>
        </strong>
      </p>
      <p class="details"><?php echo $next->summary. ', ' . $next->location . ', Group ' . $next->group; ?></p>
    </div>
    
    <?php endif; ?>
    
    <div class="ad">
      <a href="#">Your ad can go here</a>
    </div>
    
  </section>
