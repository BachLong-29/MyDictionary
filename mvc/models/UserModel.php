<?php
class UserModel extends DB{
    public function NewUser($username, $email, $crpassword){
        $sql = "insert into user values('','$username','$email','$crpassword')";
        if (mysqli_query($this->conn, $sql)) {
            echo "1";
        } else {
            echo "0";
        }
    }
    public function getUserByName($username){
        $sql = "select * from user where username = '$username'";
        $rs = mysqli_query($this->conn, $sql);
        return mysqli_num_rows($rs);
    }
    public function CheckPassword($username, $password){
        $sql = "select * from user where password = $password and username = $username";
        $result = false;
        if( mysqli_query($this->conn, $sql) ){
            $result = true;
        }
        return json_encode($result);
    }
}
?>