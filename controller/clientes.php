<?php 
class Clientes extends Controller{
    function __construct(){
        parent::__construct();
    }
    public function render(){
        $this->view->Render('clientes/index');
    }
    public function newcliente(){
        $this->view->Render('clientes/newcliente');
    }
    public function newpago(){
        $this->view->Render('clientes/newpago');
    }
    public function getCliente(){
        $nombre = $_GET['nombre'];
        $data = $this->model->GetCliente($nombre);
        while($row = mysqli_fetch_assoc($data)){
            $json[] = array(
                "id"=>$row["idcliente"],
                "nombres"=>$row["nombre"]." ".$row["apellidos"],
                "telefono"=>$row['telefono'],
            );
        }
        echo json_encode($json);
    }
    public function get(){
        $data = $this->model->Get();
        while($row = mysqli_fetch_assoc($data)){
            $json[] = array(
                "id"=>$row["idcliente"],
                "nombres"=>$row["nombre"]." ".$row["apellidos"],
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
        $monto_total = $_POST["monto-total"];
        $pago = $_POST["pago"];
        $fechaCreacion = date('Y-m-d H:i:s');
        if($this->model->Create($nombres,$apellidos,$dni,$telefono,$fechaCreacion,$monto_total,$pago)){
            echo "SUCCESS";
        }else{
            echo "ERROR";
        }
    }
    public function update(){
        $id = $_POST['id'];
        $sexo = $_POST['sexo'];
        $ciudad = $_POST['ciudad'];
        $telefono = $_POST['telefono'];
        $email = $_POST['email'];
        $direccion = $_POST['direccion'];
        $fechaUpdate = date('Y-m-d H:i:s');
        if($this->model->update($id,$sexo,$ciudad,$telefono,$email,$direccion,$fechaUpdate)){
            echo "SUCCESS UPDATE";
            //echo json_encode("SUCCESS UPDATE");
        }else{
            echo json_encode("ERROR UPDATE");
        }
    }
    public function delete(){

    }
    public function detalles($nparam=null){
        $id = $nparam[0];
        $data = $this->model->GetOne($id);
        $this->view->data = $data;
        $this->view->Render('clientes/detalles');
    }
    public function dni()
    {
        // Datos
        $token = 'apis-token-8574.bPsef4wHOYjVwA7bFoDMZqLLrNrAMKiY';
        $dni = $_POST["dni"];
        // Iniciar llamada a API
        $curl = curl_init();
        // Buscar dni
        curl_setopt_array(
            $curl,
            array(
                CURLOPT_URL => 'https://api.apis.net.pe/v2/reniec/dni?numero=' . $dni,
                CURLOPT_SSL_VERIFYPEER => 0,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_SSL_VERIFYPEER => 0,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 2,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(
                    'Referer: https://apis.net.pe/consulta-dni-api',
                    'Authorization: Bearer ' . $token
                ),
            )
        );
        $response = curl_exec($curl);
        if (curl_errno($curl)) {
            echo 'error del scraper: ' . curl_error($curl);
            exit;
        }
        curl_close($curl);
        // Datos listos para usar
        echo $response;


    }
    public function nuevoPago(){
        $id = $_POST['idcliente'];
        $monto = $_POST['monto'];
        $concepto = $_POST['concepto'];
        $fecha = date('Y-m-d H:i:s');
        if($this->model->NuevoPago($id,$monto,$concepto,$fecha)){
            echo "SUCCESS";
        }else{
            echo "ERROR";
        }
    }
}
?>