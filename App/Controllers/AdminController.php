<?php
namespace App\Controllers;
class AdminController extends BaseController{
    function __construct(){
    
    }
    function dashboard(){
        $this->titlepage="Admin";
        $this->renderView("backend/dashboard",$this->titlepage,$this->data);
    }
}
?> 