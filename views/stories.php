<?php if($json=='') : ?>
  <p>No fixtures currently available. Please try again shortly.</p>
  <code class="php">
  <?php var_dump($_SERVER); ?>
  </code>
<?php else: ?>
  <?php 
    foreach($json->events as $event) : 
      if( $date != date('D j M', strtotime($event->start)) ) :
        $date = date('D j M', strtotime($event->start));
      ?>
      <p class="date"><?php echo $date; ?></p>
      <?php
      endif;
      ?>
      <div class="event">
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
            <?php echo $event->location; ?>
          </span>
          <span class="group">
            <i class="icon icon-list"></i>
            <?php echo ((strlen($event->group)==1) ? 'Group ' : '') . $event->group; ?>
          </span>
        </p>
        <div class="actions">
          <a href="<?php echo $event->ics_url; ?>">Add to calendar</a>
        </div>
      </div>
  <?php endforeach; ?>

<?php endif; ?>
