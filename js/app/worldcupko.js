$(document).ready(function(){

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

});