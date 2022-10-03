<?php
  function longdate($timestamp)
  {
    $temp = date("l F jS Y", $timestamp);
    echo "The date is $temp";
  }
?>
