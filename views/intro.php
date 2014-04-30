  <section id="intro">

    <header>
      <h1>World Cup 2014 Kick Off</h1>
      <h2>Don't miss a single World Cup kick off from Brazil</h2>
    </header>
    
    <div class="actions">
    
      <div id="download">
        <i class="icon" data-icon="&#xe082;"></i>
        <a href="#">
          Download the kick off times to your calendar
          <small>for Windows, Mac or mobile</small>
        </a>
      </div>

  		<form id="newsletter">
  		  <i class="icon" data-icon="&#xe038;"></i>
  			<label for="email">Get the fixtures by email</label>
  			<input type="email" name="email-address" id="email" placeholder="Your email address" />
  			<button type="submit">Subscribe</button>
  		</form>
  		
  		<section id="social">
        <i class="icon" data-icon="&#xe05e;"></i>
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
  
    <div id="next">
      <p>
        Next kick off in 
        <strong title="<?php echo ($next->start); ?>"><?php echo (strtotime($next->start) - strtotime('now'))/60/60/24  . ' days'; ?></strong>
      </p>
      <p><?php echo $next->summary . ', Group ' . $next->group . ', ' . $next->location; ?></p>
    </div>
    
    <?php endif; ?>
  </section>
