<?php
class Topic extends Controller{
    public $CategoryModel;
    public function __construct(){
        $this->CategoryModel = $this->model("TopicModel");
    }
    function alltopics(){
        if ($this->getSession('Account')) {            
            $this->view('home', 'index3', ["load"=>"<script>$(document).ready(function() {loadTopics()})</script>"]);
        } else {
            $this->redirect('user/signin');
        }             
    }
    function show(){
        $all = $this->CategoryModel->getAllTopics();
        $data = [];        
        $row = '';
        foreach($all as $val)
        {
            if($val['img']!=null)
            {
                $row .= '<div class="card"><div class="box"><div class="imgBx">';
                $row .= '<img src="'.$val['img'].'"/></div>';
                $row .= '<div class="contentBx"><div><h1>'.$val['topic'].'</h1>';
                $row .= '<span><a href="'.BASEURL.'/Topic/selectall/'.$val['id_topic'].'">Select all</a></span>';
                $row .= '<span><a href="'.BASEURL.'/Topic/allVocab/'.$val['id_topic'].'">Vocabulary</a></span>';
                $row .= '<span><a href="'.BASEURL.'/Topic/allIdm/'.$val['id_topic'].'">Idiom</a></span>';
                $row .= '<span><a href="'.BASEURL.'/Topic/allCollo/'.$val['id_topic'].'">Collocation</a></span>';
                $row .= '<span><a href="'.BASEURL.'/Topic/infoTopic/'.$val['id_topic'].'">Edit</a></span>';
                $row .= '<span><a href="'.BASEURL.'/Topic/allC1/'.$val['id_topic'].'">C1</a></span><span><a href="'.BASEURL.'/Topic/allC2/'.$val['id_topic'].'">C2</a></span>';                
                $row .= '<span>Writing task 1</span><span>Writing task 2</span>';
                $row .= '</div></div></div></div>';
            }
        }
        $data[] = $row;
        echo json_encode($data);
    }
    function allVocab($id_topic){
        $vocab = $this->CategoryModel->getallVC($id_topic);
        $this->view('topic', 't-typeTopic', [
            "pages"=> "p-typeTopic",            
            "type" => $vocab,
            "more-type" => 'more-vocab',
            "id-type" =>"id_vocab",
            "s-type" => "vocab",
            "controller" => "vocabulary",
            "function" => "infoVocab"
        ]);
    }
    function allIdm($id_topic){
        $idm = $this->CategoryModel->getallIdm($id_topic);
        $this->view('topic', 't-typeTopic', [
            "pages"=> "p-typeTopic",            
            "type" => $idm,
            "more-type" => 'more-idm',
            "id-type" =>"id_idm",
            "s-type" => "idiom",
            "controller" => "idiom",
            "function" => "infoIdm"
        ]);
    }
    function allCollo($id_topic){
        $collo = $this->CategoryModel->getallCollo($id_topic);
        $this->view('topic', 't-typeTopic', [
            "pages"=> "p-typeTopic",            
            "type" => $collo,
            "more-type" => 'more-collo',
            "id-type" =>"id_collo",
            "s-type" => "collocation",
            "controller" => "collocation",
            "function" => "infoCollo"
        ]);
    }
    function formX(){
        $all = $this->CategoryModel->getAllTopics();
        $choice = $_POST["choice"];
        $data = [];                    
        if($choice == "Collocation")
        {            
            require_once "./mvc/views/form/f-formCollo.php";                                                 
            $row = show_message();
            $row .= '<div class="row100"><div class="col"><div class="inputBox"><select class="category">';
            foreach ($all as $val) {            
                $row .= '<option value="'.$val['id_topic'].'">'.$val['topic'].'</option>';                
            }
            $row .= '</select><span class="text">Topic</span><span class="line"></span></div></div></div><div class="row100"><div class="col"><button class="big-submit" id="s-collo">Submit</button></div></div>';
            $row .= '<div id="result"><h2></h2></div></div>';
            $data[] = $row;
        }
        if($choice == "Vocabulary")
        {            
            require_once "./mvc/views/form/f-formVocab.php";                                     
            $row = show_message();
            $row .= '<div class="row100"><div class="col"><div class="inputBox"><select class="category">';
            foreach ($all as $val) {            
                $row .= '<option value="'.$val['id_topic'].'">'.$val['topic'].'</option>';                
            }
            $row .= '</select><span class="text">Topic</span><span class="line"></span></div></div></div><div class="row100"><div class="col"><button class="big-submit" id="s-vocab">Submit</button></div></div>';
            $row .= '<div id="result"><h2></h2></div></div>';
            $data[] = $row;
        }
        if($choice == "Idiom")
        {            
            require_once "./mvc/views/form/f-formIdm.php";                                                 
            $row = show_message();
            $row .= '<div class="row100"><div class="col"><div class="inputBox"><select class="category">';
            foreach ($all as $val) {            
                $row .= '<option value="'.$val['id_topic'].'">'.$val['topic'].'</option>';                
            }
            $row .= '</select><span class="text">Topic</span><span class="line"></span></div></div></div><div class="row100"><div class="col"><button class="big-submit" id="s-idm">Submit</button></div></div>';
            $row .= '<div id="result"><h2></h2></div></div>';
            $data[] = $row;
        }
        if($choice == "Writing Task 1")
        {            
            require_once "./mvc/views/form/f-formWrt1.php";                                                 
            $row = show_message();
            $row .= '<div class="row100"><div class="col"><div class="inputBox"><select class="category">';
            foreach ($all as $val) {            
                $row .= '<option value="'.$val['id_topic'].'">'.$val['topic'].'</option>';                
            }
            $row .= '</select><span class="text">Topic</span><span class="line"></span></div></div></div><div class="row100"><div class="col"><button class="big-submit" id="s-wrt1">Submit</button></div></div>';
            $row .= '<div id="result"><h2></h2></div></div>';
            $data[] = $row;
        }
        if($choice == "Writing Task 2")
        {            
            require_once "./mvc/views/form/f-formWrt2.php";                                                 
            $row = show_message();              
            $row .= '<div class="row100"><div class="col"><div class="inputBox"><select class="category">';      
            foreach ($all as $val) {            
                $row .= '<option value="'.$val['id_topic'].'">'.$val['topic'].'</option>';                
            }
            $row .= '</select><span class="text">Topic</span><span class="line"></span></div></div></div><div class="row100"><div class="col"><button class="big-submit" id="s-wrt2">Submit</button></div></div>';
            $row .= '<div id="result"><h2></h2></div></div>';
            $data[] = $row;
        }
        if($choice == "Topic")
        {            
            require_once "./mvc/views/form/f-formTopic.php";                                                 
            $row = show_message();
            $row .= '<div class="row100"><div class="col"><button class="big-submit" id="s-topic">Submit</button></div></div>';
            $row .= '<div id="result"><h2></h2></div></div>';
            $data[] = $row;
        }
        echo json_encode($data);
    }
    function NewTopic(){
        $topic = $_POST['topic'];                        
        $img = $_POST['img'];
        $rs = $this->CategoryModel->InsertTopic($topic, $img);
        return json_encode($rs);
    }
    function infoTopic($id){
        $all = $this->CategoryModel->getTopicById($id);        
        $this->view('Info-edit', "Info-edit",[
            "pages"=>"p-infoTopic",
            "info"=> $all
        ]);
    }
    function EditTopic(){
        $id = $_POST['id'];
        $img = $_POST['img'];
        $topic = $_POST['topic'];
        $rs = $this->CategoryModel->EditTopic($id, $topic, $img);
        return json_encode($rs);
    }
    function selectall($id_topic){
        $vocab = $this->CategoryModel->getVocabbyTopic($id_topic);
        $collo = $this->CategoryModel->getCollobyTopic($id_topic);
        $idm = $this->CategoryModel->getIdmbyTopic($id_topic);
        $this->view('topic', 't-reTopic', [
            "pages"=> "p-reTopic",
            "vocab"=> $vocab,
            "collo"=> $collo,
            "idm"=> $idm
        ]);
    }
    function allC1($id_topic){
        $vocab = $this->CategoryModel->getAllVCC1($id_topic);
        $collo = $this->CategoryModel->getAllCLC1($id_topic);
        $idm = $this->CategoryModel->getAllIDMC1($id_topic);
        $this->view('topic', 't-reTopic', [
            "pages"=> "p-reTopic",
            "vocab"=> $vocab,
            "collo"=> $collo,
            "idm"=> $idm
        ]);
    }
    function allC2($id_topic){
        $vocab = $this->CategoryModel->getAllVCC2($id_topic);
        $collo = $this->CategoryModel->getAllCLC2($id_topic);
        $idm = $this->CategoryModel->getAllIDMC2($id_topic);
        $this->view('topic', 't-reTopic', [
            "pages"=> "p-reTopic",
            "vocab"=> $vocab,
            "collo"=> $collo,
            "idm"=> $idm
        ]);
    }
}    
?>