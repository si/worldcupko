<?php if($json=='') : ?>
  <p>No fixtures currently available. Please try again shortly.</p>
  <code class="php">
  <?php var_dump($_SERVER); ?>
  </code>
<?php else: ?>
  <?php 
    foreach($json->events as $event) : 
      if( $date != date('l j F Y', strtotime($event->start)) ) :
        $date = date('l j F Y', strtotime($event->start));
      ?>
      <h2 class="date" data-date="<?php echo date('j F Y', strtotime($event->start)); ?>">
        <a href="<?php echo url('date', date('j F Y', strtotime($event->start))); ?>"><?php echo $date; ?></a>
      </h2>
      <?php
      endif;
      ?>
      <div class="event <?php echo 'team-' . normalise($event->home_team->name) . ' team-' . normalise($event->away_team->name) . ' venue-' . normalise($event->location) . ' ' . ' date-' . normalise(date('j F Y', strtotime($event->start))) . ' ' . normalise(((strlen($event->group)==1) ? 'Group ' : '') . $event->group); ?>">
        <h3>
          <?php if($event->home_team->name!='') : ?>
            <a href="<?php echo url('team', $event->home_team->name); ?>" class="team <?php echo strtolower(str_replace(' ','-',$event->home_team->name)); ?>">
              <?php echo $event->home_team->name; ?>
            </a><span class="vs"> v </span><a href="<?php echo url('team', $event->away_team->name); ?>" class="team <?php echo strtolower(str_replace(' ','-',$event->away_team->name)); ?>">
              <?php echo $event->away_team->name; ?>
            </a>
          <?php else: ?>
            <?php echo $event->summary; ?>
          <?php endif; ?>
        </h3>
        <p class="detail">
          <span class="time" data-timestamp="<?php echo $event->start; ?>">
            <i class="icon" data-icon="&#xe094;"></i>
            <?php echo date('ga', strtotime($event->start)); ?>
          </span>
          <span class="location">
            <i class="icon icon-geolocalizator"></i>
            <a href="<?php echo url('location', $event->location); ?>"><?php echo $event->location; ?></a>
          </span>
          <span class="group">
            <i class="icon icon-list"></i>
            <a href="<?php echo url('group', $event->group); ?>"><?php echo ((strlen($event->group)==1) ? 'Group ' : '') . $event->group; ?></a>
          </span>
        </p>
        <div class="actions">
          <a href="<?php echo $event->ics_url; ?>">Add to calendar</a>
          <a href="<?php echo url('event',$event->summary); ?>">Tell your friends</a>
        </div>
      </div>
  <?php endforeach; ?>

<?php endif; ?>
