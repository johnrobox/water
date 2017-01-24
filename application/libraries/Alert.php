<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Alert{
    
    public function dangerAlert($message){
        $alert = $this->alertDiv('alert-danger', 'fa-times').$message.'</div>';
        return $alert;
    }
    public function warningAlert($message){
        $alert = $this->alertDiv('alert-warning', 'fa-warning').$message.'</div>';
        return $alert;
    }
    public function successAlert($message){
        $alert = $this->alertDiv('alert-success', 'fa-check').$message.'</div>';
        return $alert;
    }
    public function infoAlert($message){
        $alert = $this->alertDiv('alert-info', 'fa-info').$message.'</div>';
        return $alert;
    }
    
    private function alertDiv($alert,$font){
        $alertStyle = '<div class="alert '.$alert.'" role="alert">'
                . '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'
                . '<span class="fa '.$font.'"></span> ';
        return $alertStyle;
    }
    
}