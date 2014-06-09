$(document).ready(function(){

  /*
  Initiate Next Game Countdown
  */
  var element = $('#next .countdown'),
      timestamp = element.attr('title'),
      kickoff;

  kickoff = moment(timestamp).format('YYYY/MM/DD HH:mm');
  
  $(element).countdown(
    kickoff, 
    function(event) {
      $(this).html(event.strftime(
        '<span><strong>%D</strong> days</span> '
        + '<span><strong>%H</strong> hours</span> '
        + '<span><strong>%M</strong> minutes</span> '
        + '<span><strong>%S</strong> seconds</span> '
      ));
    }
  );
  
  /* Localise all times */
  localiseTimes = function() {
      
    ko_locale = new Unitime();
    
    $('.event .detail .time').each( function(e) {

      timestamp_utc = $(this).data('timestamp');
      console.log(timestamp_utc);

      time_local = ko_locale.convertUtcToLocalTimeDisplay(timestamp_utc);
      console.log(time_local);

      $(this).text(time_local);

    });
    
  }();
  
  /*
  Filter events based on URL
  */
  var url = window.location.pathname,
      selector,
      description;
      
  // Identify filter type (summary, date, location, group)
  if(url!='/') {
    selector = url.substring(1);
    selector = description = selector.replace('/','-');
    selector = '.' + selector;

    description = description.replace('team-','');
    description = description.replace('venue-','');
    description = description.replace('date-','');
    description = description.replace('-',' ');
    description = description.capitalize();
    description += ' games - ';
    console.log(description);
    $('title').text(description + $('title').text());
    
    
    // Hide all, show filter
    $('.event, .date').hide();
    $(selector).slideDown('slow');
    $(selector).closest('.day').children('.date').slideDown('slow');
  }

});

String.prototype.capitalize = function() {
    return this.replace(/(?:^|\s)\S/g, function(a) { return a.toUpperCase(); });
};
