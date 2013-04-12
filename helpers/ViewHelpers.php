<?php
    function getDay($datetime) {
        return getFormattedDate("d", $datetime);
    }
    
    function getMonthName($datetime) {
        return getFormattedDate("F", $datetime);
    }
    
    function getFormattedDate($format, $datetime) {
        return date($format, strtotime($datetime));
    }
    
