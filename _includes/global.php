<?php
function normalise($text) {
  return str_replace(' ', '-', strtolower($text));
}

function url($type, $text) {
  switch($type) {
    case 'date':
      return '/date/' . normalise($text);
      break;
    case 'location':
      return '/venue/' . normalise($text);
      break;
    case 'team':
      return '/team/' . normalise($text);
      break;
    default:
      return '/' . normalise($text);
      break;
  }
}