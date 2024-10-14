<?php 
class Dashboard extends Controller{
    function __construct(){
        parent::__construct();
    }
    public function render(){
        $recaudado = $this->model->GetRecaudado();
        $pagos = $this->model->GetPagos();
        $clientes = $this->model->GetClientes();
        $data = array('recaudado'=>$recaudado['recaudado'],'pagos'=>$pagos['total'],'clientes'=>$clientes['total']);
        $this->view->data = $data;
        $this->view->Render('dashboard/index');
    }
    public function get(){
        $data = $this->model->Get();
        while($row = mysqli_fetch_assoc($data)){
            $json[] = array(
                "anio"=>$row["anio"],
                "mes"=>$row["mes"],
                "total_clientes"=>$row["total_clientes"],
            );
        }
        echo json_encode($json);
    }
    public function read(){

    }
    public function create(){
        
    }
    public function update(){

    }
    public function delete(){

    }
}
?>