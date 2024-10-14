<?php
class LoginModel extends Model
{
    function __construct(){
        parent::__construct();
    }
    public function user($username, $password){
        $sql = "SELECT * FROM login WHERE usuario = '$username' AND password = '$password'";
        $data = $this->conn->ConsultaArray($sql);
        return $data;
    }
}
?>