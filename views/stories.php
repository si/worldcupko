<?php if($json=='') : ?>
  <p>No fixtures currently available. Please try again shortly.</p>
<?php else: ?>
  <?php if(count($json->Event)==0) : ?>
    <p class="info">That's it for another four years. See you in Russia!</p>
  <?php 
    else:
    foreach($json->Event as $event) : 
      if( $date != date('l j F Y', strtotime($event->start)) ) :
        
        if( $date != '' ) echo '</div>';
        $date = date('l j F Y', strtotime($event->start));
      ?>
      <div class="day">
      <h2 class="date" data-date="<?php echo date('j F Y', strtotime($event->start)); ?>">
        <a href="<?php echo url('date', date('j F Y', strtotime($event->start))); ?>"><?php echo $date; ?></a>
      </h2>
      <?php
      endif;
      ?>
      <div class="event <?php echo normalise($event->home_team->name) . '-v-' . normalise($event->away_team->name) . ' team-' . normalise($event->home_team->name) . ' team-' . normalise($event->away_team->name) . ' venue-' . normalise($event->location) . ' ' . ' date-' . normalise(date('j F Y', strtotime($event->start))) . ' ' . normalise(((strlen($event->group)==1) ? 'Group ' : '') . $event->group); ?>">
        <h3>
          <?php if($event->home_team->name!='') : ?>
            <a href="<?php echo url('team', $event->home_team->name); ?>" class="team <?php echo strtolower(str_replace(' ','-',$event->home_team->name)); ?>">
              <span><?php echo $event->home_team->name; ?></span>
            </a><span class="vs"> v </span><a href="<?php echo url('team', $event->away_team->name); ?>" class="team <?php echo strtolower(str_replace(' ','-',$event->away_team->name)); ?>">
              <span><?php echo $event->away_team->name; ?></span>
            </a>
          <?php else: ?>
            <span class="no-teams"><?php echo $event->summary; ?></span>
          <?php endif; ?>
        </h3>
        <p class="detail">
          <span class="location">
            <i class="icon icon-geolocalizator"></i>
            <a href="<?php echo url('location', $event->location); ?>"><?php echo $event->location; ?></a>
          </span>

          <span class="group">
            <i class="icon icon-list"></i>
            <a href="<?php echo url('group', $event->group); ?>"><?php echo ((strlen($event->group)==1) ? 'Group ' : '') . $event->group; ?></a>
          </span>

          <span class="time" title="<?php echo $event->start; ?> UTC" data-timestamp="<?php echo date('Y-m-d\TH:i:s',strtotime($event->start)); ?>+00:00">
            <i class="icon" data-icon="&#xe094;"></i>
            <?php echo date('ga', strtotime($event->start)); ?>
          </span>
          <a class="action" href="<?php echo str_replace('http://','webcal://',$event->ics_url); ?>">Add to calendar</a>

        </p>
      </div>
  <?php 
    endforeach; 
  endif;
  ?>

<?php endif; ?>
