<?php
class Controller{
    public function model($model){
        require_once "./mvc/models/".$model.".php";
        return new $model;
    }
    public function view($folder, $view, $data=[]){
        require_once "./mvc/views/".$folder."/".$view.".php";
    }
    public function input($inputName){
        if($_SERVER['REQUEST_METHOD'] == "POST" || $_SERVER['REQUEST_METHOD'] == 'post'){
            return $_POST[$inputName];
        } else if($_SERVER['REQUEST_METHOD'] == 'GET' || $_SERVER['REQUEST_METHOD'] == 'get'){
            return $_GET[$inputName];
        }
    }
    public function insert_text($inputName){
        $inputName = str_replace("'", "''", $inputName);
        return $inputName;
    }
    // Set session
    public function setSession($sessionName, $sessionValue){
        if(isset($sessionName) && isset($sessionValue)){
            $_SESSION[$sessionName] = $sessionValue;
        }
    }

    // Get session
    public function getSession($sessionName){
        if(isset($_SESSION[$sessionName])){
            return $_SESSION[$sessionName];
        }
    }
    // Unset session
    public function unsetSession($sessionName){
        if(isset($sessionName)){
            unset($_SESSION[$sessionName]);
        }
    }
    // Destroy whole sessions
    public function destroy(){
        session_destroy();
    }

    public function redirect($path){
        header("location:" . BASEURL . "/".$path);
    }
}
?>