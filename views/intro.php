  <section id="intro">

    <header>
      <h1><a href="/"><img src="/img/world-cup-2014-kick-off.png" alt="World Cup 2014 Kick Off" width="200"></a></h1>
      <h2>All the World Cup kick off times, directly from Brazil to your device</h2>
    </header>
    
    <div class="actions">
    
      <div id="download">
        <a href="<?php echo (isset($json->calendar->ics_url)) ? str_replace('http://','webcal://',$json->calendar->ics_url) : ''; ?>">
          <i class="icon" data-icon="&#xe082;"></i>
          <span>Download kick off times to your calendar
          <small>for Windows, Mac or mobile</small></span>
        </a>
      </div>

  		<form id="newsletter" action="http://worldcupkickoff.us8.list-manage.com/subscribe/post?u=bf6b27ef9d1cf4839476ae2eb&amp;id=b91f04a74d" method="post" name="mc-embedded-subscribe-form" class="validate" target="_blank">
  			<label for="mce-email">
    			<i class="icon" data-icon="&#xe038;"></i>
    			<span>Get fixtures by email daily</span>
    			<input type="email"  name="EMAIL" id="mce-EMAIL" required class="required email" placeholder="Your email address" />
    			<button id="mc-embedded-subscribe" type="submit" name="subscribe">Subscribe</button>
  			</label>
      	<div id="mce-responses" class="clear">
      		<div class="response" id="mce-error-response" style="display:none"></div>
      		<div class="response" id="mce-success-response" style="display:none"></div>
      	</div>
      	<!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
      	<div style="position: absolute; left: -5000px;"><input type="text" name="b_bf6b27ef9d1cf4839476ae2eb_b91f04a74d" tabindex="-1" value=""></div>
  		</form>


  		
  		<div id="social">
        <i class="icon" data-icon="&#xe02a;"></i>
        <span>Share the love for football</span>
        <ul class="share">
          <li class="facebook">
            <div class="fb-like" data-href="http://www.worldcupkickoff.com" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
          </li>
          <li class="twitter">
            <a href="https://twitter.com/share" class="twitter-share-button" data-url="http://www.worldcupkickoff.com" data-count="horizontal">Tweet</a>
            <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
          </li>
          <li class="google">
            <a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>" class="g-plusone" data-size="medium" data-href="http://www.worldcupkickoff.com">+1</a>
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
      foreach($json->events as $event) {
        if(strtotime($event->start) > strtotime('Now')) {
          $next = $event;
          break;
        }
      }
    ?>
  
    <div id="next">
      <h2>Next up</h2>
      <p class="countdown" title="<?php echo ($next->start); ?>+00:00">
        <?php echo $next->start; ?>
      </p>
      <p class="details">
        <span>
          <strong><?php echo $next->summary; ?></strong>
          <?php echo $next->location . ', Group ' . $next->group; ?>
        </span>
      </p>
    </div>
    
    <?php endif; ?>

    <p class="info">All times on the site are <abbr title="Coordinated Universal Time">UTC</abbr> – your calendar will automatically update to your timezone</p>
  
    
    <div class="ad">

      <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
      <!-- WCKO Main -->
      <ins class="adsbygoogle"
           style="display:block"
           data-ad-client="ca-pub-2350797824472723"
           data-ad-slot="9714592443"
           data-ad-format="horizontal"></ins>
      <script>
      (adsbygoogle = window.adsbygoogle || []).push({});
      </script>

      <a href="mailto:updates@worldcupkickoff.com">Email us to get your brand in front of thousands of global football fans</a></ins>
    </div>
    


  </section>
