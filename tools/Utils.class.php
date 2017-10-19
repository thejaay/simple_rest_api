<?php

/**
 * Class containing various handy functions
 * 
 * @author Jaay
 *
 */
class Utils
{

  /**
   * Combine 2 array to make one associative array. This isused to fill parameters
   * from a given URL
   * 
   * @param array $param Array containing the parameters
   * @param array $keys Array containing the keys
   * @return array Associative array combining the 2 arrays
   */
  function combineParameters($param, $keys)
  {
    $outputArray = array();
    for($i=0; $i<count($keys); $i++)
    {
      $outputArray[$keys[$i]] = $param[$i];
    }
    return $outputArray;
  }
}

?>
