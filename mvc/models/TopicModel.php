<?php
class TopicModel extends DB{
    public function getAllTopics(){
        $sql = "select * from topic";
        $rs = mysqli_query($this->conn, $sql);
        return $rs;
    }
    public function getTopicById($id){
        $sql = "select * from topic where id_topic = '$id'";
        $rs = mysqli_query($this->conn, $sql);
        return $rs;
    }  
    public function InsertTopic($topic, $img){
        $sql = "insert into topic values('','$topic','$img')";
        if (mysqli_query($this->conn, $sql)) {
            echo "1";
        } else {
            echo "0";
        }
    }
    public function EditTopic($id, $topic, $img){
        $sql ="update topic set topic='$topic', img='$img' where id_topic='$id'";
        if (mysqli_query($this->conn, $sql)) {
            echo "1";
        } else {
            echo "0";
        }
    }
    public function getVocabbyTopic($id_topic){
        $sql = "select * from vocabulary where id_topic = '$id_topic'";
        $rs = mysqli_query($this->conn, $sql);
        return $rs;
    }
    public function getCollobyTopic($id_topic){
        $sql = "select * from collocation where id_topic = '$id_topic'";
        $rs = mysqli_query($this->conn, $sql);
        return $rs;
    }
    public function getIdmbyTopic($id_topic){
        $sql = "select * from idiom where id_topic = '$id_topic'";
        $rs = mysqli_query($this->conn, $sql);
        return $rs;
    }
    public function getAllVCC1($id_topic){
        $sql = "select * from vocabulary where band = 'C1' and id_topic = '$id_topic'";
        $rs = mysqli_query($this->conn, $sql);
        return $rs;
    }
    public function getAllCLC1($id_topic){
        $sql = "select * from collocation where id_collo = '0'";
        $rs = mysqli_query($this->conn, $sql);
        return $rs;
    }
    public function getAllIDMC1($id_topic){
        $sql = "select * from idiom where band = 'C1' and id_topic = '$id_topic'";
        $rs = mysqli_query($this->conn, $sql);
        return $rs;
    }
    public function getAllVCC2($id_topic){
        $sql = "select * from vocabulary where band = 'C2' and id_topic = '$id_topic'";
        $rs = mysqli_query($this->conn, $sql);
        return $rs;
    }
    public function getAllCLC2($id_topic){
        $sql = "select * from collocation where id_collo = '0'";
        $rs = mysqli_query($this->conn, $sql);
        return $rs;
    }
    public function getAllIDMC2($id_topic){
        $sql = "select * from idiom where band = 'C2' and id_topic = '$id_topic'";
        $rs = mysqli_query($this->conn, $sql);
        return $rs;
    }
    public function getallVC($id_topic){
        $sql = "select * from vocabulary where id_topic = '$id_topic'";
        $rs = mysqli_query($this->conn, $sql);
        return $rs;
    }
    public function getallIdm($id_topic){
        $sql = "select * from idiom where id_topic = '$id_topic'";
        $rs = mysqli_query($this->conn, $sql);
        return $rs;
    }
    public function getallCollo($id_topic){
        $sql = "select * from collocation where id_topic = '$id_topic'";
        $rs = mysqli_query($this->conn, $sql);
        return $rs;
    }
}
?>