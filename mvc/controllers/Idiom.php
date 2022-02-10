<?php
class Idiom extends Controller{
    public $CategoryModel;
    public function __construct(){
        $this->CategoryModel = $this->model("IdiomModel");
    }
    function allidioms(){
        if ($this->getSession('Account')) {            
            $this->view("home", "index2", ["load"=>"<script>$(document).ready(function() {loadIdms()})</script>"]);
        } else {
            $this->redirect('user/signin');
        }             
    }
    function show(){
        $tp = $this->CategoryModel->getAllTopics();
        $all = $this->CategoryModel->getAllIdms();
        $data = [];
        $row ='<div class="title"><div class="row"><div class="col-sm-2"></div>';
        $row .= '<div class="col-sm-8"><h2>Idiom</h2></div>';
        $row .= '<div class="col-sm-2"><div id="mySidepanel" class="sidepanel">
        <a href="javascript:void(0)" class="closebtn" onclick="closesNav()">×</a>
        <h3><i onclick="dropdown()" class="fas fa-plus-circle"></i>Band</h3>
        <form id="myDropdown">
        <p>
            <input type="radio" class="cb-band" value="all" id="all" name="radio-group" checked>
            <label for="all">Select all</label>
        </p>
        <p>
        <input type="radio" class="cb-band" value="C1" id="C1" name="radio-group">
            <label for="C1">C1</label>  
        </p>
        <input type="radio" class="cb-band" value="C2" id="C2" name="radio-group">
            <label for="C2">C2</label>  
        </p>
        </form>
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
            $row1 .= '<li><div class="row"><div id_more="'.$val['id_idm'].'" class="col-sm-10"><strong class="more-idm">'.$val['idiom'].'</strong></div>';
            $row1 .= '<div class="col-sm-2">';
            $row1 .= '<a href="'.BASEURL.'/idiom/infoIdm/'.$val['id_idm'].'"><button class="big-button">Modify</button></a></div></div></li>';
        }
        $row1 .= '</ul>';
        $data[] = $row1;
        echo json_encode($data);
    }
    function NewIdm(){
        $idiom = $_POST['idiom'];
        $meaning_idm = $_POST['meaning_idm'];        
        $band = $_POST['band'];
        $ex = $_POST['example'];
        $example = $this->insert_text($ex); 
        $topic = $_POST['topic'];
        $rs = $this->CategoryModel->InsertNewIdm($idiom, $meaning_idm, $band, $example, $topic);
        return json_encode($rs);
    }
    function Readmore(){
        $id_idm = $_POST['id_idm'];
        $all = $this->CategoryModel->getIdmById($id_idm);
        $data = [];
        foreach ($all as $val){
            $row = '<div class="header"><h1>'.$val['idiom'].'</h1>';
            $row .= '</div>';
            if($val['id_topic']=='1')
            {
                if($val['band']!='---')
                {
                    $row .= '<div class="sub-content"><span><i class="fas fa-key"></i>'.$val['band'].'</span></div>';
                }
            }
            $row .= '<div class="content"><i class="fas fa-star"></i>';
            $row .= '<span> '.$val['meaning_idm'].'</span><label>Example:</label>';            
            $row .= '<p>'.nl2br($val['example']).'</p></div>';
            $row .= '<div class="footer">';
            if($val['id_topic']!='1')
            {
                $row .= '<label>TOPICS</label><a href="#">'.$val['topic'].'</a>';
                if($val['band']!='---')
                {
                    $row .= '<span>'.$val['band'].'</span></div>';
                }            
            }
            $row .= '</div>';
        }
        $data = $row;
        echo json_encode($data);
    }
    function infoIdm($id_idm){
        $all = $this->CategoryModel->getIdmById($id_idm);
        $tp = $this->CategoryModel->getAllTopics();
        $this->view('Info-edit', "Info-edit",[
            "pages"=>"p-infoIdm",
            "info"=> $all,
            "topic"=> $tp
        ]);
    }
    function EditIdm(){
        $id_idm = $_POST['id'];
        $idiom = $_POST['idiom'];                
        $band = $_POST['band'];
        $meaning_idm = $_POST['meaning_idm'];        
        $ex = $_POST['example'];
        $example = $this->insert_text($ex); 
        $topic = $_POST['topic'];
        $rs = $this->CategoryModel->EditIdm($id_idm, $idiom, $band, $meaning_idm, $example, $topic);
        return json_encode($rs);
    }
    function infoIdiomName($idm){
        $all = $this->CategoryModel->getIdmByName($idm);
        $tp = $this->CategoryModel->getAllTopics();
        $this->view('Info-edit', "Info-edit",[
            "pages"=>"p-infoIdm",
            "info"=> $all,
            "topic"=> $tp
        ]);
    }
    function Sort(){
        $band = $_POST['band'];
        $tp = $_POST['topic'];
        if($band=='all')
        {
            if($tp=='all') $all = $this->CategoryModel->getAllIdms();
            else $all = $this->CategoryModel->SortTP($tp);   
        }
        else
        {
            if($tp=='all') $all = $this->CategoryModel->SortBand($band);            
            else $all = $this->CategoryModel->Sort($band,$tp);            
        }
        $data = [];        
        $row = '';
        foreach ($all as $val) {            
            $row .= '<li><div class="row"><div id_more="'.$val['id_idm'].'" class="col-sm-10"><strong class="more-idm">'.$val['idiom'].'</strong></div>';
            $row .= '<div class="col-sm-2">';
            $row .= '<a href="'.BASEURL.'/idiom/infoIdm/'.$val['id_idm'].'"><button class="big-button">Modify</button></a></div></div></li>';
        }        
        $data[] = $row;
        echo json_encode($data);
    }
}    
?>