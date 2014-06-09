var Unitime = function () {};

var regexMatchForIso8601Date = /[0-9]T[0-9]/;
var invalidDateMessage = 'Invalid date';
var dateFormat = 'YYYY-M-D H:mm:ss';
var date = new Unitime();

Unitime.prototype.convertUtcToLocalDisplay = function (value) {
  // Check the date is not in ISO 8601 format.
  // If not, add post fix so can be converted to UTC
  if (!regexMatchForIso8601Date.test(value)) value = value + ' UTC';
  if (!moment(value).isValid()) return invalidDateMessage;
  return moment(value).format(dateFormat).toLocaleString();
}

Unitime.prototype.convertUtcToLocalDateDisplay = function (value) {
  return date.convertUtcToLocal(value).toLocaleDateString();
}

Unitime.prototype.convertUtcToLocalTimeDisplay = function (value) {
  return date.convertUtcToLocal(value).toLocaleTimeString();
}

Unitime.prototype.convertUtcToLocal = function (value) {
  return new Date(date.convertUtcToLocalDisplay(value));
}

Unitime.prototype.getOffsetHours = function() {
  return date.getOffsetMins() * 60;
}

Unitime.prototype.getOffsetMins = function() {
  return -1 * new Date().getTimezoneOffset();
}