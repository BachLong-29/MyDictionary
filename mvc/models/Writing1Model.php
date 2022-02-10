<?php
class Writing1Model extends DB{
    public function getAllfiles(){
        $sql = "select * from writing_1";
        $rs = mysqli_query($this->conn, $sql);
        return $rs;
    }
    public function getWrt1ById($id_report){
        $sql = "select * from writing_1 w join topic t on w.id_topic = t.id_topic where id_report = '$id_report'";
        $rs = mysqli_query($this->conn, $sql);
        return $rs;
    }
    public function InsertNewWrt1($title, $band, $report, $p_chart, $topic){
        $sql = "INSERT INTO writing_1 VALUES('','$title','$p_chart', '$report','$band','$topic')";
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
    public function EditWrt1($id_report, $title, $p_chart, $report, $band, $topic){
        $sql = "update writing_1 set title='$title', p_chart='$p_chart', content_rep='$report', band='$band', id_topic='$topic' where id_report='$id_report'";
        if (mysqli_query($this->conn, $sql)) echo '1';
        else echo '0';
    }
}
?>