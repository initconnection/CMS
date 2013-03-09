<?php
    
    function redirect($location) {
         header("Location: " .  ABSOLUTE_PATH . $location);
    }
