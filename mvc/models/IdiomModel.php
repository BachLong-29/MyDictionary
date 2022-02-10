<?php
class IdiomModel extends DB{
    public function getAllIdms(){
        $sql = "select * from idiom";
        $rs = mysqli_query($this->conn, $sql);
        return $rs;
    }
    public function InsertNewIdm($idiom, $meaning_idm, $band, $example, $topic){
        $sql = "INSERT INTO idiom VALUES('','$idiom', '$meaning_idm', '$topic','$band','$example')";
        if (mysqli_query($this->conn, $sql)) {
            echo "1";
        } else {
            echo "0";
        }
    }    
    public function getIdmById($id_idm){
        $sql = "select * from idiom i join topic t on i.id_topic = t.id_topic where id_idm = '$id_idm'";
        $rs = mysqli_query($this->conn, $sql);
        return $rs;
    }
    public function getIdmByName($idm){
        $sql = "select * from idiom v join topic t on v.id_topic = t.id_topic where idiom = '$idm'";
        $rs = mysqli_query($this->conn, $sql);
        return $rs;
    }
    public function getAllTopics(){
        $sql = "select * from topic";
        $rs = mysqli_query($this->conn, $sql);
        return $rs;
    }
    public function Sort($band,$tp){
        $sql = "select * from idiom where band ='$band' and id_topic='$tp'";
        $rs = mysqli_query($this->conn, $sql);
        return $rs;
    }
    public function SortTP($tp){
        $sql = "select * from idiom where id_topic='$tp'";
        $rs = mysqli_query($this->conn, $sql);
        return $rs;
    }
    public function SortBand($band){
        $sql = "select * from idiom where band ='$band'";
        $rs = mysqli_query($this->conn, $sql);
        return $rs;
    }
    public function EditIdm($id_idm, $idiom, $band, $meaning_idm, $example, $topic){
        $sql = "update idiom set idiom='$idiom', meaning_idm='$meaning_idm', id_topic='$topic', band='$band', example='$example' where id_idm='$id_idm'";
        if (mysqli_query($this->conn, $sql)) {
            echo "1";
        } else {
            echo "0";
        }
    }
}
?>