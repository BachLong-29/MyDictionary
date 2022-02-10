<?php
class Home extends Controller{
    public $CategoryModel;
    public function __construct(){
        $this->CategoryModel = $this->model("ClientsModel");
    }
    function SayHi(){
        $this->view("login");
    }
    function Show(){
        if ($this->getSession('Account')) {            
            $this->view("home", "index");
        } else {
            $this->redirect('user/signin');
        }        
    }
}    
?>