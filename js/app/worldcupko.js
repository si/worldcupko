$(document).ready(function(){

  /*
  Initiate Next Game Countdown
  */
  var element = $('#next').find('strong'),
      timestamp = element.attr('title'),
      kickoff;

  kickoff = moment(timestamp).format('YYYY/MM/DD HH:mm');
  
  $(element).countdown(
    kickoff, 
    function(event) {
      $(this).html(event.strftime(
        '<span><em>%D</em> days</span> '
        + '<span><em>%H</em> hours</span> '
        + '<span><em>%M</em> minutes</span> '
        + '<span><em>%S</em> seconds</span> '
      ));
    }
  );
  
  /*
  Filter events based on URL
  */
  var url = window.location.pathname,
      selector;
      
  // Identify filter type (summary, date, location, group)
  if(url!='/') {
    selector = url.substring(1);
    selector = selector.replace('/','-');
    selector = '.' + selector;
    console.log(selector);
    
    // Hide all, show filter
    $('.event, .date').hide();
    $(selector).slideDown('slow');
    $(selector).closest('.day').children('.date').slideDown('slow');
  }

});