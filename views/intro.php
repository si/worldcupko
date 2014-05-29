  <section id="intro">

    <header>
      <h1><a href="/">World Cup 2014 Kick Off</a></h1>
      <h2>All the World Cup kick off times, directly from Brazil to your device</h2>
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
            <a href="http://www.facebook.com/worldcupkickoff" class="fb-like" data-href="http://www.worldcupkickoff.com" data-send="false" data-layout="button_count" data-width="100" data-show-faces="true">Like</a>
          </li>
          <li class="twitter">
            <a href="https://twitter.com/share" class="twitter-share-button" data-url="http://twitter.com/worldcupko" data-count="horizontal">Tweet</a>
            <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
          </li>
          <li class="google">
            <a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>" class="g-plusone" data-size="medium" data-href="http://http://<?php echo $_SERVER['SERVER_NAME']; ?>">+1</a>
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
      <p class="countdown">
        <strong title="<?php echo ($next->start); ?>">
          <?php echo $next->start; ?>
        </strong>
      </p>
      <p class="details">
        <strong><?php echo $next->summary; ?></strong>
        <?php echo $next->location . ', Group ' . $next->group; ?>
      </p>
    </div>
    
    <?php endif; ?>
    
    <div class="ad">
      <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
      <ins class="adsbygoogle"
           data-ad-client="ca-pub-2350797824472723"
           data-ad-slot="9714592443"
           data-ad-format="auto">
      </ins>
      <script>
      (adsbygoogle = window.adsbygoogle || []).push({});
      </script>
    </div>
    
  </section>
