<?php

class Utils
{

  function combineParameters($param, $array)
  {
    $outputArray = array();
    for($i=0; $i<count($array); $i++)
    {
      $outputArray[$array[$i]] = $param[$i];
    }
    return $outputArray;
  }
}

?>
