  <div>
    <i class="icon" data-icon="&#xe065;"></i>
    Filter
  </div>

  <?php if($json=='') : ?>
  <p>No fixtures currently available. Please try again shortly.</p>
  
  <?php else: ?>
  <section class="timeline">
  
    <ol class="posts">
      <?php 
        foreach($json->events as $event) : 
        
          if( $date != date('D j M', strtotime($event->start)) ) :
            $date = date('D j M', strtotime($event->start));
          ?>
            <li class="year"><?php echo $date; ?></li>
        <?php
          endif;
        ?>
      <li class="event">
        <i class="icon" data-icon="&#xe094;"></i>
        <span class="time" data-timestamp="<?php echo $event->start; ?>"><?php echo date('ga', strtotime($event->start)); ?></span>
        <h2>
          <?php if($event->home_team->name!='') : ?>
            <span class="team <?php echo strtolower(str_replace(' ','-',$event->home_team->name)); ?>"><?php echo $event->home_team->name; ?></span> 
            v 
            <span class="team <?php echo strtolower(str_replace(' ','-',$event->away_team->name)); ?>"><?php echo $event->away_team->name; ?></span>
          <?php else: ?>
            <?php echo $event->summary; ?>
          <?php endif; ?>
        </h2>
        <p class="detail">
          <span class="location"><?php echo $event->location; ?></span>,
          <span class="group"><?php echo ((strlen($event->group)==1) ? 'Group ' : '') . $event->group; ?></span>
        </p>
        <a href="<?php echo $event->ics_url; ?>">Remind me</a>
      </li>
      <?php endforeach; ?>
    </ol>
  
  </section>
  <?php endif; ?>
