<?php 
class DashboardModel extends Model{
    function __construct(){
        parent::__construct();
    }
    public function Get(){
        $sql = "SELECT YEAR(feCreate) AS anio,MONTHNAME(feCreate) AS mes,COUNT(*) AS total_clientes 
        FROM clientes WHERE feCreate >= DATE_SUB(CURDATE(), INTERVAL 1 YEAR) GROUP BY anio, mes ORDER BY anio DESC, mes DESC;";
        $data = $this->conn->ConsultaCon($sql);
        return $data;
    }
    public function Read(){

    }
    public function Create(){
        
    }
    public function Update(){

    }
    public function Delete(){

    }
    public function GetRecaudado(){
        $sql = "SELECT SUM(saldo) AS recaudado FROM pagos;";
        $data = $this->conn->ConsultaArray($sql);
        return $data;
    }
    public function GetPagos(){
        $sql = "SELECT COUNT(*) AS total FROM pagos WHERE saldo = 0 OR saldo < 0;";
        $data = $this->conn->ConsultaArray($sql);
        return $data;
    }
    public function GetClientes(){
        $sql = "SELECT COUNT(*) AS total FROM clientes;";
        $data = $this->conn->ConsultaArray($sql);
        return $data;
    }
}
?>