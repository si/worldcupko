  <section id="intro">

    <header>
      <h1>World Cup 2014 Kick Off</h1>
      <h2>Don't miss a single World Cup kick off from Brazil</h2>
    </header>
    
    <div class="actions">
    
      <div id="download">
        <a href="#">
          <i class="icon" data-icon="&#xe082;"></i>
          Download kick off times to your calendar
          <small>for Windows, Mac or mobile</small>
        </a>
      </div>

  		<form id="newsletter">
  			<label for="email">
    			<i class="icon" data-icon="&#xe038;"></i>
    			Get fixtures by daily email
  			</label>
  			<input type="email" name="email-address" id="email" placeholder="Your email address" />
  			<button type="submit">Subscribe</button>
  		</form>
  		
  		<section id="social">
        <i class="icon" data-icon="&#xe02a;"></i>
        <div class="twitter">
          <a href="https://twitter.com/worldcupko" class="twitter-follow-button" data-show-count="true" data-show-screen-name="true">Follow @worldcupko</a>
          <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
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
  			
        <div class="facebook">
          <div id="fb-root"></div>
          <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=252313181472957";
            fjs.parentNode.insertBefore(js, fjs);
          }(document, 'script', 'facebook-jssdk'));</script>
          <a href="http://www.facebook.com/worldcupkickoff" class="fb-like" data-href="https://www.facebook.com/worldcupkickoff" data-layout="standard" data-colorscheme="dark" data-action="recommend" data-show-faces="true" data-share="false">Like us on Facebook</a>
        </div>
  			
  		</section>
    		
    </div>
    
    <?php if(count($json->events)>0) : 
      $next = $json->events[0];
    ?>
  
    <div id="next">
      <i class="icon" data-icon="&#xe083"></i>
      <p>
        Next kick off 
        <strong title="<?php echo ($next->start); ?>">
          <?php echo floor((strtotime($next->start) - strtotime('now'))/60/60/24)  . ' days'; ?>
        </strong>
      </p>
      <p class="details"><?php echo $next->summary . ', Group ' . $next->group . ', ' . $next->location; ?></p>
    </div>
    
    <?php endif; ?>
  </section>
