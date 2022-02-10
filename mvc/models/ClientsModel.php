<?php
class ClientsModel extends DB{
    public function InsertNewClient($hoten, $ngsinh, $sohc, $ngaycap, $noicap, $ngayhh, $qt){
        $sql = "INSERT INTO khachhang VALUES('','$hoten','$ngsinh','$sohc','$ngaycap','$noicap','$ngayhh','$qt')";
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
    public function getByName($hoten){
        $sql = "select * from khachhang where hoten = '$hoten'";
        $rs = mysqli_query($this->conn, $sql);
        return $rs;
    }
    public function getAllClients(){
        $sql = "select * from khachhang";
        $rs = mysqli_query($this->conn, $sql);
        return $rs;
    }
    public function getAllVocab(){
        $sql = "select * from vocabulary";
        $rs = mysqli_query($this->conn, $sql);
        return $rs;
    }
    public function ModifyClient($hoten, $ngsinh, $sohc, $ngaycap, $noicap, $ngayhh, $qt, $id){
        $sql = "update khachhang set hoten = '$hoten', ngaysinh = '$ngsinh', soHC = '$sohc', ngaycap = '$ngaycap', noicap = '$noicap', ngayhethan = '$ngayhh', quoctich = '$qt' where id_kh = '$id' ";
        if (mysqli_query($this->conn, $sql)) {
            echo "1";
        } else {
            echo "0";
        }
    }
    public function getClientByid($id){
        $sql = "select * from khachhang where id_kh = '$id'";
        $rs = mysqli_query($this->conn, $sql);
        return $rs;
    }
    public function CheckPassword($username, $password){
        $sql = "select username, password from users where password = $password and username = $username";
        $result = false;
        if( mysqli_query($this->conn, $sql) ){
            $result = true;
        }
        return json_encode($result);
    }
}
?>