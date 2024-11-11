<?php 
class ClientesModel extends Model{
    function __construct(){
        parent::__construct();
    }
    public function Get(){
        $sql="SELECT * FROM clientes ORDER BY idcliente DESC;";
        $data = $this->conn->ConsultaCon($sql);
        return $data;
    }
    public function GetOne($id){
        $sql="SELECT c.*, p.* FROM clientes c join pagos p on c.idcliente = p.idcliente WHERE c.idcliente = '$id';";
        $data = $this->conn->ConsultaArray($sql);
        return $data;
    }
    public function GetCliente($nombre){
        $sql="SELECT * FROM clientes WHERE nombre LIKE '%$nombre%' OR apellidos LIKE '%$nombre%' OR dni LIKE '%$nombre%';";
        $data = $this->conn->ConsultaCon($sql);
        return $data;
    }
    public function Read(){

    }
    public function Create($nombres,$apellidos,$dni,$telefono,$fechaCreacion,$monto_total,$pago){
        $this->conn->conn->begin_transaction();
        try {
            $sql = "INSERT INTO clientes (nombre,apellidos,dni,telefono,feCreate) VALUES ('$nombres','$apellidos','$dni','$telefono','$fechaCreacion');";        
            $result = $this->conn->ConsultaSin($sql);
            $idcliente = $this->conn->conn->insert_id;
            $saldo = $monto_total - $pago;
            $igv = ($monto_total * 0.18) + $monto_total;
            $sql_pago = "INSERT INTO pagos VALUES (null,1,'$idcliente','$pago','$fechaCreacion','$saldo','$igv','$monto_total');";
            $result = $this->conn->ConsultaSin($sql_pago);
            $idpago = $this->conn->conn->insert_id;
            $sql_pago_detalle= "INSERT INTO pago_detalles VALUES (null,'$idpago','$pago','pago inicial','$fechaCreacion');";
            $result = $this->conn->ConsultaSin($sql_pago_detalle);
            $this->conn->conn->commit();
            return $result;
        } catch (Exception $e) {
            $this->conn->conn->rollback();
            echo "Error: " . $e->getMessage();
        }
        $this->conn->conn->close();

    }
    public function Update($id,$sexo,$ciudad,$telefono,$email,$direccion,$fechaUpdate){
        $sql = "UPDATE clientes SET sexo = '$sexo',ciudad = '$ciudad',telefono = '$telefono',email = '$email',direccion = '$direccion',feUpdate = '$fechaUpdate' WHERE idcliente = '$id';";
        $result = $this->conn->ConsultaSin($sql);
        return $result;
    }
    public function Delete(){

    }
    public function GetOnePago($idcliente){
        $sql = "SELECT * FROM pagos WHERE idcliente = '$idcliente';";
        $data = $this->conn->ConsultaArray($sql);
        return $data;
    }
    public function updatePago($idcliente,$monto,$saldo){
        $sql = "UPDATE pagos SET monto = '$monto',saldo = '$saldo' WHERE idcliente = '$idcliente';";
        $data = $this->conn->ConsultaSin($sql);
        return $data;
    }
    public function nuevoPago($idcliente,$monto,$concepto,$fecha){
        $pago = $this->GetOnePago($idcliente);
        $idpago = $pago['idpago'];
        $monto_nuevo = $pago['monto'] + $monto;
        $saldo_nuevo = $pago['saldo'] - $monto;
        $this->updatePago($idcliente,$monto_nuevo,$saldo_nuevo);
        $sql = "INSERT INTO pago_detalles VALUES (null,'$idpago','$monto','$concepto','$fecha');";
        $result = $this->conn->ConsultaSin($sql);
        return $result;
    }
    public function GetPagos($id){
        $sql = "SELECT pd.* FROM pago_detalles pd JOIN pagos p ON pd.idpago = p.idpago WHERE p.idcliente = '$id';";
        $data = $this->conn->ConsultaCon($sql);
        return $data;
    }
}
?>