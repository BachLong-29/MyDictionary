<?php
class Collocation extends Controller{
    public $CategoryModel;
    public function __construct(){
        $this->CategoryModel = $this->model("CollocationModel");
    }
    function show(){
        $tp = $this->CategoryModel->getAllTopics();
        $all = $this->CategoryModel->getAllCollos();
        $data = [];
        $row ='<div class="title"><div class="row"><div class="col-sm-2"></div>';
        $row .= '<div class="col-sm-8"><h2>Collocation</h2></div>';
        $row .= '<div class="col-sm-2"><div id="mySidepanel" class="sidepanel">
        <a href="javascript:void(0)" class="closebtn" onclick="closesNav()">×</a>        
        <h3><i onclick="dropdownTP()" class="fas fa-plus-circle"></i>Topic</h3>
        <form id="myDropdownTP">
        <p>
            <input type="radio" class="cb-topic" value="all" id="all" name="topic" checked>
            <label for="all">Select all</label>
        </p>';
        foreach ($tp as $val) {            
            if($val['id_topic']!='1')
            {
                $row .= '<p><input type="radio" class="cb-topic" name="topic" value="'.$val['id_topic'].'" id="'.$val['topic'].'"><label for="'.$val['topic'].'">'.$val['topic'].'</label></p>';
            }
        }  
        $row .= '</form>
        <button class="done" onclick="closesNav()">Done</button>
        </div><h2><i class="fas fa-filter" onclick="opensNav()"></h2></i></div></div></div>';
        $data[] = $row;
        $row1 = '<ul>';
        foreach ($all as $val) {            
            $row1 .= '<li><div class="row"><div id_more="'.$val['id_collo'].'" class="col-sm-10"><strong class="more-collo">'.$val['collocation'].'</strong></div>';            
            $row1 .= '<div class="col-sm-2">';
            $row1 .= '<a href="'.BASEURL.'/collocation/infoCollo/'.$val['id_collo'].'"><button class="big-button">Modify</button></a></div></div></li>';
        }
        $row1 .= '</ul>';
        $data[] = $row1;
        echo json_encode($data);
    }
    function allcollos(){
        if ($this->getSession('Account')) {            
            $this->view('home', 'index2', ["load"=>"<script>$(document).ready(function() {loadCollos()})</script>"]);
        } else {
            $this->redirect('user/signin');
        }     
        
    }
    function NewCollo(){
        $collocation = $_POST['collocation'];
        $meaning_coll = $_POST['meaning_coll'];
        $ex = $_POST['example'];
        $example = $this->insert_text($ex);        
        $topic = $_POST['topic'];
        $rs = $this->CategoryModel->InsertNewCollo($collocation, $meaning_coll, $example, $topic);
        return json_encode($rs);
    }
    function Readmore(){
        $id_collo = $_POST['id_collo'];
        $all = $this->CategoryModel->getColloById($id_collo);
        $data = [];
        foreach ($all as $val){
            $row = '<div class="header"><h1>'.$val['collocation'].'</h1>';
            $row .= '</div>';            
            $row .= '<div class="content"><i class="fas fa-star"></i>';
            $row .= '<span> '.$val['meaning_coll'].'</span><label>Example:</label>';            
            $row .= '<p>'.nl2br($val['example']).'</p></div>';
            $row .= '<div class="footer">';
            if($val['id_topic']!='1')
            {
                $row .= '<label>TOPICS</label><a href="#">'.$val['topic'].'</a>';                
            }
            $row .= '</div>';
        }
        $data = $row;
        echo json_encode($data);
    }
    function infoCollo($id_collo){
        $all = $this->CategoryModel->getColloById($id_collo);
        $tp = $this->CategoryModel->getAllTopics();
        $this->view('Info-edit', "Info-edit",[
            "pages"=>"p-infoCollo",
            "info"=> $all,
            "topic"=> $tp
        ]);
    }
    function EditCollo(){
        $id_collo = $_POST['id'];
        $collocation = $_POST['collocation'];        
        $meaning_coll = $_POST['meaning_coll'];        
        $ex = $_POST['example'];
        $example = $this->insert_text($ex);        
        $topic = $_POST['topic'];
        $rs = $this->CategoryModel->EditCollo($id_collo, $collocation, $meaning_coll, $example, $topic);
        return json_encode($rs);
    }
    function infoCollocationName($collo){
        $all = $this->CategoryModel->getColloByName($collo);
        $tp = $this->CategoryModel->getAllTopics();
        $this->view('Info-edit', "Info-edit",[
            "pages"=>"p-infoCollo",
            "info"=> $all,
            "topic"=> $tp
        ]);
    }
    function Sort(){
        $tp = $_POST['topic'];
        if($tp=="all") $all = $this->CategoryModel->getAllCollos();    
        else $all = $this->CategoryModel->SortCollo($tp);
        $data = [];        
        $row = '';
        foreach ($all as $val) {            
            $row .= '<li><div class="row"><div id_more="'.$val['id_collo'].'" class="col-sm-10"><strong class="more-collo">'.$val['collocation'].'</strong></div>';            
            $row .= '<div class="col-sm-2">';
            $row .= '<a href="'.BASEURL.'/collocation/infoCollo/'.$val['id_collo'].'"><button class="big-button">Modify</button></a></div></div></li>';
        }        
        $data[] = $row;
        echo json_encode($data); 
    }
}    
?>