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
      	<div style="position: absolute; left: -5000px;"><input type="text" name="b_bf6b27ef9d1cf4839476ae2eb_b91f04a74d" tabindex="-1" value=""></div>
  		</form>


  		
  		<div id="social">
        <i class="icon" data-icon="&#xe02a;"></i>
        <span>Follow us for updates</span>
        <ul class="share">
          <li class="twitter">
            <a href="https://twitter.com/worlcupko">Twitter</a>
          </li>
          <li class="facebook">
            <a href="https://www.facebook.com/worlcupkickoff">Facebook</a>
          </li>
          <li class="google">
            <a href="http://plus.google.com/+worldcupkickoff">Google+</a>
          </li>
        </ul>
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
  
    

  </section>
