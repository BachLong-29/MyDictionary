<?php
class Writing1 extends Controller{
    public $CategoryModel;
    public function __construct(){
        $this->CategoryModel = $this->model("Writing1Model");
    }
    function allfiles(){
        if ($this->getSession('Account')) {            
            $this->view('home', 'index2', ["load"=>"<script>$(document).ready(function() {loadWrt1()})</script>"]);
        } else {
            $this->redirect('user/signin');
        }             
    }
    function show(){
        $all = $this->CategoryModel->getAllfiles();
        $data = [];
        $row ='<div class="title"><h2>Writing task 1</h2></div>';
        $data[] = $row;
        $row1 = '<ul>';
        foreach ($all as $val) {            
            $row1 .= '<li><div class="row"><div id_more="'.$val['id_report'].'" class="col-sm-10"><strong class="more-wrt1">Writing task 1 #'.$val['id_report'].'</strong></div>';
            $row1 .= '<div class="col-sm-2">';
            $row1 .= '<a href="'.BASEURL.'/writing1/infoWrt1/'.$val['id_report'].'"><button class="big-button">Modify</button></a></div></div></li>';
        }
        $row1 .= '</ul>';
        $data[] = $row1;
        echo json_encode($data);
    }
    function Readmore(){
        $id_report = $_POST['id_report'];
        $all = $this->CategoryModel->getWrt1ById($id_report);
        $data = [];
        foreach ($all as $val){
            $row = '<div class="detail"><h1>'.$val['title'].'</h1><br>';            
            $row  .= '<img src="'.$val['p_chart'].'"/><br>';            
            $row .= '<p>'.nl2br($val['content_rep']).'</p>';      
            if($val['id_topic']=='1')
            {                
                $row .= '<span>'.$val['band'].'</span></div>';
            }            
        }
        $data = $row;
        echo json_encode($data);
    }
    function NewWrt1(){               
        $title = $_POST['title'];
        $p_chart = $_POST['p_chart'];
        $band = $_POST['band'];
        $report = $_POST['report'];
        $p_chart  = $_POST['p_chart'];
        $topic = $_POST['topic'];        
        $rs = $this->CategoryModel->InsertNewWrt1($title, $band, $report, $p_chart, $topic);
        return json_encode($rs);
    }
    function infoWrt1($id_report){
        $all = $this->CategoryModel->getWrt1ById($id_report);
        $tp = $this->CategoryModel->getAllTopics();
        $this->view('Info-edit', "Info-edit",[
            "pages"=>"p-infoWrt1",
            "info"=> $all,
            "topic"=> $tp
        ]);
    }
    function EditWrt1(){
        $id_report = $_POST['id'];
        $title = $_POST['title'];
        $p_chart = $_POST['p_chart'];
        $report = $_POST['report'];
        $band  = $_POST['band'];        
        $topic = $_POST['topic'];
        $rs = $this->CategoryModel->EditWrt1($id_report, $title, $p_chart, $report, $band, $topic);
        return json_encode($rs);
    }
}    
?>