<?php
$ret = array();

function cal_dateTime_diff($dateStart, $dateStop) {
    // Declare and define two dates 
    $date1 = strtotime($dateStart);  
    $date2 = strtotime($dateStop);  

    if ($date1 > $date2) { 
        $ret = array("result" => true,
            "item" => '');
        return $ret; 
    }
    
    // Formulate the Difference between two dates 
    $diff = abs($date2 - $date1);  

    // To get the year divide the resultant date into 
    // total seconds in a year (365*60*60*24) 
    $years = floor($diff / (365*60*60*24));  

    if ($years > 0) { 
        $ret = array("result" => false,
                    "item" => $years . " ปีกว่า");
        return $ret; 
    } 
    
    // To get the month, subtract it with years and 
    // divide the resultant date into 
    // total seconds in a month (30*60*60*24) 
    $months = floor(($diff - $years * 365*60*60*24) 
                                / (30*60*60*24));  
    
    if ($months > 0) { 
        // $ret = array("result" => false,
        //             "item" => "%d เดือน", $months);
        $ret = array("result" => false,
            "item" => $months . " เดือนกว่า");
        return $ret; 
    }
    
    // To get the day, subtract it with years and  
    // months and divide the resultant date into 
    // total seconds in a days (60*60*24) 
    $days = floor(($diff - $years * 365*60*60*24 -  
                $months*30*60*60*24)/ (60*60*24)); 

    if ($days > 0) { 
        // $ret = array("result" => false,
        //             "item" => "%d เดือน %d วัน", $months, $days);
        $ret = array("result" => false,
            "item" => $days . " วัน");
        return $ret; 
    }
    
    // To get the hour, subtract it with years,  
    // months & seconds and divide the resultant 
    // date into total seconds in a hours (60*60) 
    $hours = floor(($diff - $years * 365*60*60*24  
        - $months*30*60*60*24 - $days*60*60*24) 
                                    / (60*60));  
    
    if ($hours > 0) { 
        $ret = array("result" => false,
            "item" => $hours . " ชั่วโมง");
        return $ret; 
    }

    // To get the minutes, subtract it with years, 
    // months, seconds and hours and divide the  
    // resultant date into total seconds i.e. 60 
    $minutes = floor(($diff - $years * 365*60*60*24  
            - $months*30*60*60*24 - $days*60*60*24  
                            - $hours*60*60)/ 60);  
    
    if ($minutes > 0) { 
        $ret = array("result" => false,
            "item" => $minutes . " นาที");
            
        return $ret; 
    }

    // To get the minutes, subtract it with years, 
    // months, seconds, hours and minutes  
    $seconds = floor(($diff - $years * 365*60*60*24  
            - $months*30*60*60*24 - $days*60*60*24 
                    - $hours*60*60 - $minutes*60));  
    
    if ($seconds > 0) { 
        $ret = array("result" => false,
            "item" => $seconds . " วินาที");
        return $ret; 
    }

    $ret = array("result" => true,
                    "item" => '');
        return $ret; 
}
?> 