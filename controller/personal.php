<?php 
class Personal extends Controller{
    function __construct(){
        parent::__construct();
    }
    public function render(){
        $this->view->Render('personal/index');
    }
    public function newpersonal(){
        $this->view->Render('personal/newpersonal');
    }
    public function detalles($nparam=null){
        $id = $nparam[0];
        $data = $this->model->GetOne($id);
        $this->view->data = $data;
        $this->view->Render('personal/detalles');
    }
    public function newlogin($nparam=null){
        $id = $nparam[0];
        $data = $this->model->GetOneLogin($id);
        $this->view->data = $data;
        $this->view->Render('personal/newlogin');
    }
    public function get(){
        $data = $this->model->Get();
        while($row = mysqli_fetch_assoc($data)){
            $json[] = array(
                "id"=>$row["idpersonal"],
                "nombres"=>$row["nombre"],
                "apellidos"=>$row["apellidos"],
                "telefono"=>$row['telefono'],
            );
        }
        echo json_encode($json);
    }
    public function read(){

    }
    public function create(){
        $dni = $_POST["dni"];
        $nombres = $_POST["nombre"];
        $apellidos = $_POST["apellidos"];
        $telefono = $_POST["telefono"];
        $usuario = $_POST["usuario"];
        $password = $_POST["password"];
        $fechaCreacion = date('Y-m-d H:i:s');
        if($this->model->Create($nombres,$apellidos,$dni,$telefono,$fechaCreacion,$usuario,$password)){
            echo "SUCCESS";
        }else{
            echo "ERROR";
        }
    }
    public function update(){
        $id = $_POST['idpersonal'];
        $sexo = $_POST['sexo'];
        $telefono = $_POST['telefono'];
        $fechaNac = $_POST['fechaNac'];
        $email = $_POST['email'];
        $fechaUpdate = date('Y-m-d');
        //echo $id." ".$sexo." ".$telefono." ".$fechaNac." ".$email." ".$fechaUpdate;
        if($this->model->Update($id,$sexo,$telefono,$fechaNac,$email,$fechaUpdate)){
            echo "EXITO UPDATE";
        }else{
            echo "ERROR UPDATE";
        }
    }
    public function updateLogin(){
        $id = $_POST['idpersonal'];
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];
        $estado = $_POST['estado'];
        $fechaUpdate = date('Y-m-d');
        if($this->model->UpdateLogin($id,$usuario,$password,$estado)){
            echo "EXITO UPDATE";
        }else{
            echo "ERROR UPDATE";
        }
    }
    public function delete(){

    }
}
?>