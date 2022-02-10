<?php
class Writing2 extends Controller{
    public $CategoryModel;
    public function __construct(){
        $this->CategoryModel = $this->model("Writing2Model");
    }
    function allfiles(){
        if ($this->getSession('Account')) {            
            $this->view('home', 'index2', ["load"=>"<script>$(document).ready(function() {loadWrt2()})</script>"]);
        } else {
            $this->redirect('user/signin');
        }             
    }
    function show(){
        $all = $this->CategoryModel->getAllfiles();
        $data = [];
        $row ='<div class="title"><h2>Writing task 2</h2></div>';
        $data[] = $row;
        $row1 = '<ul>';
        foreach ($all as $val) {            
            $row1 .= '<li><div class="row"><div id_more="'.$val['id_essay'].'" class="col-sm-10"><strong class="more-wrt2">Writing task 2 #'.$val['id_essay'].'</strong></div>';
            $row1 .= '<div class="col-sm-2">';
            $row1 .= '<a href="'.BASEURL.'/writing2/infoWrt2/'.$val['id_essay'].'"><button class="big-button">Modify</button></a></div></div></li>';
        }
        $row1 .= '</ul>';
        $data[] = $row1;
        echo json_encode($data);
    }
    function Readmore(){
        $id_essay = $_POST['id_essay'];
        $all = $this->CategoryModel->getWrt2ById($id_essay);
        $data = [];
        foreach ($all as $val){
            $row = '<div class="detail"><strong>'.$val['title'].'</strong><br>';            
            $string = nl2br($val['content_essay']);
            $row .= $string;
            $row .= '<br>Band: '.$val['band'];
            if($val['id_topic']!='1')
            {
                $row .= '<br>TOPICS '.$val['topic'];
            }
            $row .= "</div>";
        }
        $data = $row;
        echo json_encode($data);
    }
    function NewWrt2(){               
        $title = $_POST['title'];
        $band = $_POST['band'];
        $essay = $_POST['essay'];        
        $topic = $_POST['topic'];        
        $rs = $this->CategoryModel->InsertNewWrt2($title, $band, $essay, $topic);
        return json_encode($rs);
    }
    function infoWrt2($id_essay){
        $all = $this->CategoryModel->getWrt2ById($id_essay);
        $tp = $this->CategoryModel->getAllTopics();
        $this->view('Info-edit', "Info-edit",[
            "pages"=>"p-infoWrt2",
            "info"=> $all,
            "topic"=> $tp
        ]);
    }
    function EditWrt2(){
        $id_essay = $_POST['id'];
        $title = $_POST['title'];        
        $essay = $_POST['essay'];
        $band  = $_POST['band'];        
        $topic = $_POST['topic'];
        $rs = $this->CategoryModel->EditWrt2($id_essay, $title, $essay, $band, $topic);
        return json_encode($rs);
    }
}    
?>