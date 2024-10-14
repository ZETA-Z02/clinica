<?php 
class PersonalModel extends Model{
    function __construct(){
        parent::__construct();
    }
    public function Get(){
        $sql="SELECT * FROM personal;";
        $data = $this->conn->ConsultaCon($sql);
        return $data;
    }
    public function GetOne($id){
        $sql="SELECT * FROM personal WHERE idpersonal = $id;";
        $data = $this->conn->ConsultaArray($sql);
        return $data;
    }
    public function GetOneLogin($id){
        $sql="SELECT * FROM login WHERE idpersonal = $id;";
        $data = $this->conn->ConsultaArray($sql);
        return $data;
    }
    public function Read(){

    }
    public function Create($nombres,$apellidos,$dni,$telefono,$fechaCreacion,$usuario,$password){
        $this->conn->conn->begin_transaction();
        try {
            $sql = "INSERT INTO personal (nombre,apellidos,dni,telefono,feCreate) VALUES ('$nombres','$apellidos','$dni','$telefono','$fechaCreacion');";      
            $result = $this->conn->ConsultaSin($sql);
            error_log($result);
            $idpersonal = $this->conn->conn->insert_id;
            $sqlLogin = "INSERT INTO login VALUES (null,'$idpersonal','$usuario','$password','1');";
            $result = $this->conn->ConsultaSin($sqlLogin);
            error_log("reslutado 2: ".$result);
            $this->conn->conn->commit();
            return $result;
        } catch (Exception $e) {
            $this->conn->conn->rollback();
            echo "Error: " . $e->getMessage();
        }
        $this->conn->conn->close();
    }
    public function Update($id,$sexo,$telefono,$fechaNac,$email,$fechaUpdate){
        $sql = "UPDATE personal SET sexo = '$sexo',telefono = '$telefono',fechaNac = '$fechaNac',email='$email',feUpdate = '$fechaUpdate' WHERE idpersonal = '$id';";
        $response = $this->conn->ConsultaSin($sql);
        return $response;
    }
    public function UpdateLogin($id,$usuario,$password,$estado){
        $sql = "UPDATE login SET usuario = '$usuario',password = '$password',estado = '$estado' WHERE idpersonal = '$id';";
        $response = $this->conn->ConsultaSin($sql);
        return $response;
    }
    public function Delete(){

    }
}
?>