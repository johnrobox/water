<?php

 class DateFormater {
     
     public function __construct() {
         date_default_timezone_set("Asia/Manila");   
     }
     
     public function getOverdueDate() {
        $today = date('Y-m-d');
        $date = strtotime($today .' -1 months');
        $get_date = date('m-Y', $date);
        return $get_date;
     }
     
 }