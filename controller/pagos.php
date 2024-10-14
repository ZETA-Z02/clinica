<?php 
class Pagos extends Controller{
    function __construct(){
        parent::__construct();
    }
    public function render(){
        $this->view->Render('pagos/index');
    }
    public function get(){
        $data = $this->model->Get();
        while($row = mysqli_fetch_assoc($data)){
            $json[] = array(
                'idcliente' => $row['idcliente'],
                'idpago' => $row['idpago'],
                'nombres' => $row['nombres'],
                'monto' => $row['monto'],
                'saldo' => $row['saldo'],
                'total' => $row['total'],
            );
        }
        echo json_encode($json);
    }
    public function getPagos($nparam=null){
        $id = $_POST['id'];
        //$id = $nparam[0];
        $data = $this->model->GetPagos($id);
        while($row = mysqli_fetch_assoc($data)){
            $json[] = array(
                'monto' => $row['monto'],
                'concepto' => $row['concepto'],
                'fecha' => $row['fecha'],
            );
        }
        echo json_encode($json);
    }
    public function search(){
        $nombre = $_GET['nombre'];
        $data = $this->model->Search($nombre);
        while($row = mysqli_fetch_assoc($data)){
            $json[] = array(
                'idcliente' => $row['idcliente'],
                'idpago' => $row['idpago'],
                'nombres' => $row['nombres'],
                'monto' => $row['monto'],
                'saldo' => $row['saldo'],
                'total' => $row['total'],
            );
        }
        echo json_encode($json);
    }
    public function read(){

    }
    public function create(){
        $idpago = $_POST['idpago'];
        $monto = $_POST['monto'];
        $concepto = $_POST['concepto'];
        $fecha = date('Y-m-d');
        if($this->model->Create($idpago,$monto,$concepto,$fecha)){
            echo "SUCCES CREATE";
        }else{
            echo "ERROR CREATE";
        }
    }
    public function update(){

    }
    public function delete(){

    }
}
?>