<?php 

class PagosModel extends Model{
    function __construct(){
        parent::__construct();
    }
    public function Get(){
        $sql = "SELECT CONCAT(c.nombre,' ',c.apellidos) as nombres,c.dni,p.idcliente,p.idpago,p.monto,p.saldo,p.total FROM pagos p JOIN clientes c ON p.idcliente = c.idcliente ORDER BY p.idpago DESC;";
        $data = $this->conn->ConsultaCon($sql);
        return $data;
    }
    // para la tabla detalles de pagos y para la boleta
    public function GetPagos($id){
        $sql = "SELECT pd.* FROM pago_detalles pd JOIN pagos p ON pd.idpago = p.idpago WHERE pd.idpago = '$id';";
        $data = $this->conn->ConsultaCon($sql);
        return $data;
    }
    public function Read(){

    }
    public function GetOnePago($idpago){
        $sql = "SELECT * FROM pagos WHERE idpago = '$idpago';";
        $data = $this->conn->ConsultaArray($sql);
        return $data;
    }
    public function updatePago($idpago,$monto,$saldo){
        $sql = "UPDATE pagos SET monto = '$monto',saldo = '$saldo' WHERE idpago = '$idpago';";
        $data = $this->conn->ConsultaSin($sql);
        return $data;
    }
    public function Create($idpago,$monto,$concepto,$fecha){
        $pago = $this->GetOnePago($idpago);
        $monto_nuevo = $pago['monto'] + $monto;
        $saldo_nuevo = $pago['saldo'] - $monto;
        $this->updatePago($idpago,$monto_nuevo,$saldo_nuevo);
        $sql = "INSERT INTO pago_detalles (idpago,monto,concepto) VALUES ('$idpago','$monto','$concepto');";
        $response = $this->conn->ConsultaSin($sql);
        return $response;
    }
    public function Update(){

    }
    public function Delete(){

    }
    public function Search($nombre){
        $sql = "SELECT CONCAT(c.nombre,' ',c.apellidos) as nombres,p.idcliente,p.idpago,p.monto,p.saldo,p.total FROM pagos p JOIN clientes c ON p.idcliente = c.idcliente WHERE c.nombre LIKE '%$nombre%' OR c.apellidos LIKE '%$nombre%' OR c.dni LIKE '%$nombre%';";
        $data = $this->conn->ConsultaCon($sql);
        return $data;
    }
    public function BoletaDatos($idpago){
        $sql = "SELECT CONCAT(c.nombre,' ',c.apellidos) as nombres, p.idpago, p.monto, p.saldo,p.igv,p.total from pagos p join clientes c on c.idcliente = p.idcliente where idpago = '$idpago';";
        $data = $this->conn->ConsultaArray($sql);
        return $data;
    }
}
?>