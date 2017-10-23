<?php

/**
 * Class containing various handy functions.
 * 
 * @author Jaay
 *
 */
class Utils
{

    /**
    * Load all the needed classes, this method should be called upon startup.
    */
    public static function loadClasses()
    {
        include("PersistentAbstraction.class.php");
    }
}

?>
