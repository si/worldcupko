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
      <p class="date">
        <a href="<?php echo url('date', date('j F Y', strtotime($event->start))); ?>"><?php echo $date; ?></a>
      </p>
      <?php
      endif;
      ?>
      <div class="event <?php echo normalise($event->summary) . ' venue-' . normalise($event->location) . ' ' . ' date-' . normalise(date('j F Y', strtotime($event->start))) . ' ' . normalise(((strlen($event->group)==1) ? 'Group ' : '') . $event->group); ?>">
        <h2>
          <?php if($event->home_team->name!='') : ?>
            <span class="team <?php echo strtolower(str_replace(' ','-',$event->home_team->name)); ?>"><?php echo $event->home_team->name; ?></span><span class="vs"> v </span><span class="team <?php echo strtolower(str_replace(' ','-',$event->away_team->name)); ?>"><?php echo $event->away_team->name; ?></span>
          <?php else: ?>
            <?php echo $event->summary; ?>
          <?php endif; ?>
        </h2>
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
