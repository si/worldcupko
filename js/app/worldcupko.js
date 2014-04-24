function Event(data) {
  
  var self = this;
  
  self.id = ko.observable(data.Event ? data.Event.id : '');
  self.summary = ko.observable(data.Event ? data.Event.summary : '');
  self.starts = ko.observable(data.Event ? data.Event.starts : '');
  self.ends = ko.observable(data.Event ? data.Event.ends : '');
  self.location = ko.observable(data.Event ? data.Event.location : '');
  self.group = ko.observable(data.Event ? data.Event.group : '');
  self.home_team = ko.observable(data.HomeTeam ? data.HomeTeam.name : '');
  self.away_team = ko.observable(data.AwayTeam ? data.AwayTeam.name : '');

/*
  self.averageScore = ko.computed(function() {
      total = parseInt(self.category1()) + parseInt(self.category2()) + parseInt(self.category3()) + parseInt(self.category4()) + parseInt(self.category5());
      return (total > 0) ? Math.round(total / 5) : 0;
  });
*/
  
}


function EventViewModel() {

  var self = this,
      endPoint = 'http://local.kickoffcalendars.com/calendars/view/5.json?callback=?';
      
  self.events = ko.observableArray([]);

  $.getJSON(endPoint, function(data) {
  
    var mappedEvents = $.map(data.events, function(item) { 
      return new Event(item);
    });
    self.events(mappedEvents);

/*
    var start = new Date(),
        formattedDate;
    formattedDate = start.getDate() + '/' + (start.getMonth()+1) + '/' + start.getFullYear() + ' ' + start.getHours() + ':' + start.getMinutes();

*/
  });
          
}

ko.applyBindings(new EventViewModel());

