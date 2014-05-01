$(document).ready(function(){
  var element = $('#next').find('strong'),
      kickoff = element.attr('title');

  $(element).html(moment(kickoff).fromNow());

});