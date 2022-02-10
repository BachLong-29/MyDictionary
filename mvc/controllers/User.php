<?php
class User extends Controller{
    public $CategoryModel;
    public function __construct(){
        $this->CategoryModel = $this->model("UserModel");
    }
    public function signin(){
        $this->view('user', "user",[
            "pages_1"=>"p-user-in",
            "pages_2"=>"p-user-up"
        ]);
    }
    public function signup(){
        $this->view('user', "user",[
            "pages_1"=>"p-user-up",
            "pages_2"=>"p-user-in"
        ]);
    }
    public function signout(){
        $this->unsetSession('Account');
        $this->view('user', "user",[
            "pages_1"=>"p-user-in",
            "pages_2"=>"p-user-up"
        ]);
    }
    function NewUser(){        
        $username = $_POST['username'];
        $email = $_POST['email'];
        $crpassword = $_POST['crpassword'];        
        $cfpassword = $_POST['cfpassword']; 
        $old_user = $this->CategoryModel->getUserByName($username);
        if($crpassword != $cfpassword){
            echo json_encode("Error-Password");
        }
        else if($old_user > 0){
            echo json_encode("Error-Username");
        }
        else{
            $rs = $this->CategoryModel->NewUser($username, $email, $crpassword);
            return json_encode($rs);
        }        
    }
    public function login(){        
            $username = $_POST["username"];
            $password = $_POST["password"];
            $rs = $this->CategoryModel->CheckPassword($username, $password);
            if($rs == true){                
                $this->setSession('Account', $username);
                $this->redirect('');                
            }
            $this->view('home', 'index', [
                'name'=>$username
            ]);        
    }
}    
?>