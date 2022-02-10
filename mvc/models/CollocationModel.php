<?php
class CollocationModel extends DB{
    public function getAllCollos(){
        $sql = "select * from collocation";
        $rs = mysqli_query($this->conn, $sql);
        return $rs;
    }
    public function InsertNewCollo($collocation, $meaning_coll, $example, $topic){
        $sql = "INSERT INTO collocation VALUES('','$collocation','$meaning_coll','$example','$topic')";        
        if (mysqli_query($this->conn, $sql)) {
            echo "1";
        } else {
            echo "0";
        }
    }
    public function getColloById($id_collo){
        $sql = "select * from collocation c join topic t on c.id_topic = t.id_topic where id_collo = '$id_collo'";
        $rs = mysqli_query($this->conn, $sql);
        return $rs;
    }
    public function getColloByName($collo){
        $sql = "select * from collocation v join topic t on v.id_topic = t.id_topic where collocation = '$collo'";
        $rs = mysqli_query($this->conn, $sql);
        return $rs;
    }
    public function getAllTopics(){
        $sql = "select * from topic";
        $rs = mysqli_query($this->conn, $sql);
        return $rs;
    } 
    public function EditCollo($id_collo, $collocation, $meaning_coll, $example, $topic){
        $sql = "update collocation set collocation='$collocation', meaning_coll='$meaning_coll', example='$example', id_topic='$topic' where id_collo='$id_collo'";
        if(mysqli_query($this->conn, $sql))
        {
            echo "1";
        }
        else echo "0";
    }
    public function SortCollo($tp){
        $sql = "select * from collocation where id_topic='$tp'";
        $rs = mysqli_query($this->conn, $sql);
        return $rs;
    }
}
?>