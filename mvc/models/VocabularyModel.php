<?php
class VocabularyModel extends DB{
    public function InsertNewVocab($vocab, $classifier, $mean, $band, $syn, $ex, $topic){
        $sql = "INSERT INTO vocabulary VALUES('','$vocab','$classifier','$topic','$band','$mean','$syn','$ex')";
        if (mysqli_query($this->conn, $sql)) {
            echo "1";
        } else {
            echo "0";
        }
    }
    public function DeleteClientById($id){
        $sql = "delete from khachhang where id_kh = '$id'";
        if (mysqli_query($this->conn, $sql)) {
            echo "1";
        } else {
            echo "0";
        }
    }
    public function getVocabById($id_vocab){
        $sql = "select * from vocabulary v join topic t on v.id_topic = t.id_topic where id_vocab = '$id_vocab'";
        $rs = mysqli_query($this->conn, $sql);
        return $rs;
    }
    public function getVocabByName($vocab){
        $sql = "select * from vocabulary v join topic t on v.id_topic = t.id_topic where vocab = '$vocab'";
        $rs = mysqli_query($this->conn, $sql);
        return $rs;
    }
    public function getAllVocabs(){
        $sql = "select * from vocabulary";
        $rs = mysqli_query($this->conn, $sql);
        return $rs;
    }
    public function getAllTopics(){
        $sql = "select * from topic";
        $rs = mysqli_query($this->conn, $sql);
        return $rs;
    } 
    public function EditVocab($id_vocab, $vocab, $classifier, $mean, $band, $syn, $ex, $topic){
        $sql = "update vocabulary set synonym='$syn', vocab = '$vocab', classifier='$classifier', mean_vocab='$mean', band='$band', example='$ex', id_topic='$topic' where id_vocab='$id_vocab'";
        if (mysqli_query($this->conn, $sql)) {
            echo "1";
        } else {
            echo "0";
        }
    }
    public function Sort($band,$tp){
        $sql = "select * from vocabulary where band ='$band' and id_topic='$tp'";
        $rs = mysqli_query($this->conn, $sql);
        return $rs;
    }
    public function SortTP($tp){
        $sql = "select * from vocabulary where id_topic='$tp'";
        $rs = mysqli_query($this->conn, $sql);
        return $rs;
    }
    public function SortBand($band){
        $sql = "select * from vocabulary where band ='$band'";
        $rs = mysqli_query($this->conn, $sql);
        return $rs;
    }
    public function SortC2(){
        $sql = "select * from vocabulary where band ='C2'";
        $rs = mysqli_query($this->conn, $sql);
        return $rs;
    }
}
?>