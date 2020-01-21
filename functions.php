<?php
/**
  * Escapes HTML for output
  *
  */

  
function escape($html) {
  return htmlspecialchars($html, ENT_QUOTES | ENT_SUBSTITUTE, "UTF-8");
}

function convertDate($date) {
    $date = str_replace("/", "-", $date);

    $date = explode("-", $date);

    return $date[2]."-".$date[0]."-".$date[1];
}

function convertTimestamp($date) {
    $date = str_replace("/", "-", $date);

    $datetime = explode(" ", $date);
    $date = explode("-", $datetime[0]);
    $time = explode(':', $datetime[1]);

    $return = $date[2]."-".$date[0]."-".$date[1]." ".$time[0].":".$time[1].":00";

    if ($datetime[2] == 'PM' && $time[0] > 12) {
        $return = date('Y-m-d H:i:s', strtotime('+12 hours', strtotime($return)));
    }elseif ($datetime[2] == 'AM' && $time[0] == 12) {
        $return = date('Y-m-d H:i:s', strtotime('-12 hours', strtotime($return)));
    }

    return $return;
}