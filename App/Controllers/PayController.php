<?php
namespace App\Controllers;
use App\Models\PayModel;

class PayController extends BaseController{
    function __construct(){
        $this->pay = new PayModel;
    }
    function momo(){
        
        // var_dump($_REQUEST); die();
        
        $this->renderView("pay",$this->titlepage,$this->data);
    }
}
?> 