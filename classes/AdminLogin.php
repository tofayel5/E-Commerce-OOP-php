<?php
include '../lib/Session.php';
Session::checkLogin();
include_once '../lib/Database.php';
include_once '../helpers/Format.php';
?>
<?php


class AdminLogin
{
    private $db;
    private $fm;
    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function adminLogin($user_name, $password){
        $name = $this->fm->validation($user_name);
        $password = $this->fm->validation($password);
        $name = mysqli_real_escape_string($this->db->link, $name);
        $password = mysqli_real_escape_string($this->db->link, $password);
        if (empty($name) || empty($password)) {
            $msg = "User or password must not be empty!";
            return $msg;
        }else {
            $query = "SELECT * FROM users WHERE user_name = '$name' AND password = '$password'";
            $result = $this->db->select($query);
//            var_dump($result);
            if ($result != false){
                $value = $result->fetch_assoc();
                Session::set("login", true);
                Session::set("user_id", $value['id']);
                Session::set("user_name", $value['user_name']);
                Session::set("full_name", $value['full_name']);
                header('Location:dashboard.php');
            } else {
                $msg = "User name or password not match!";
                return $msg;
            }
        }
    }

}