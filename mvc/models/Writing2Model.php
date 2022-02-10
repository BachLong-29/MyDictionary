<?php
class Writing2Model extends DB{
    public function getAllfiles(){
        $sql = "select * from writing_2";
        $rs = mysqli_query($this->conn, $sql);
        return $rs;
    }
    public function getWrt2ById($id_essay){
        $sql = "select * from writing_2 w join topic t on w.id_topic = t.id_topic where id_essay = '$id_essay'";
        $rs = mysqli_query($this->conn, $sql);
        return $rs;
    }
    public function InsertNewWrt2($title, $band, $essay, $topic){
        $sql = "INSERT INTO writing_2 VALUES('','$essay','$band', '$topic','$title')";
        if (mysqli_query($this->conn, $sql)) {
            echo "1";
        } else {
            echo "0";
        }
    }
    public function getAllTopics(){
        $sql = "select * from topic";
        $rs = mysqli_query($this->conn, $sql);
        return $rs;
    }
    public function EditWrt2($id_essay, $title, $essay, $band, $topic){
        $sql = "update writing_2 set title='$title', content_essay='$essay', band='$band', id_topic='$topic' where id_essay='$id_essay'";
        if (mysqli_query($this->conn, $sql)) echo '1';
        else echo '0';
    }
}
?>