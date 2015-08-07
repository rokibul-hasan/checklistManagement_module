<?php

namespace Checklist;

class Utility{
   
    public function debug($arg){
        echo "<pre>";
        var_dump( $arg );
        echo "</pre>";
        echo "<br>";
    }
}
