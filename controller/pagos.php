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
    public function boleta($nparam=null){
        require_once __DIR__.'/../vendor/autoload.php';
        //require '/srv/http/clinica/vendor/autoload.php';
        $id = $nparam[0];
        $boletaDatos = $this->model->BoletaDatos($id);
        $boletaPagos = $this->model->GetPagos($id);
        $igv = $boletaDatos['igv'] - $boletaDatos['total'];
        $subtotal = $boletaDatos['igv'] - $igv; 
        $pagos ='';
        $fecha = date('d-m-Y');
        while($row = mysqli_fetch_assoc($boletaPagos)){
            $pagos .= "<tr>
                        <td>1</td>
                        <td>".$row['concepto']."</td>
                        <td>".$row['monto']."</td>
                        <td>".$row['monto']."</td>
                       </tr> 
                        ";   
        }
        
        // Crear nuevo PDF en formato A5
        $pdf = new TCPDF('P', 'mm', 'A5', true, 'UTF-8', false);
        // Configurar información del documento
        $pdf->SetCreator(PDF_CREATOR);$pdf->SetAuthor('Tu Empresa');$pdf->SetTitle('Boleta de Venta');
        $pdf->SetSubject('Boleta');$pdf->SetKeywords('TCPDF, PDF, boleta, A5');
        // Eliminar la cabecera y pie de página predeterminados
        $pdf->setPrintHeader(false);$pdf->setPrintFooter(false);
        // Establecer márgenes
        $pdf->SetMargins(10, 10, 10);  
        // Izquierda, arriba, derecha
        $pdf->SetAutoPageBreak(TRUE, 10);  
        // Margen inferior
        // Añadir una página
        $pdf->AddPage();
        // Establecer fuente
        $pdf->SetFont('helvetica', '', 12);
        // Contenido de la boleta (diseño básico)
        $html = '
        <h1 style="text-align: center;">Boleta de Venta</h1>
        <table cellpadding="5" cellspacing="0" border="0" style="width: 100%;">    
        <tr>
            <td><strong>Cliente:</strong></td>
            <td>'.$boletaDatos['nombres'].'</td>
        </tr>    
        <tr>
            <td><strong>Fecha:</strong></td>
            <td>'.$fecha.'</td>
        </tr>
        <tr>
        <td><strong>Boleta Nº:</strong></td>
        <td>0010'.$boletaDatos['idpago'].'</td>
        </tr>
        </table><br><br><table border="1" cellpadding="5" cellspacing="0" style="width: 100%;">    
        <thead>
            <tr>
                <th><strong>Cantidad</strong></th>
                <th><strong>Descripción</strong></th>
                <th><strong>Precio Unitario</strong></th>
                <th><strong>Total</strong></th>
            </tr>
        </thead>
        <tbody>
            '.$pagos.'
            <tr>
                <td colspan="3" align="right"><strong>Subtotal</strong></td>
                <td>'.$subtotal.'</td>
            </tr> 
            <tr>
                <td colspan="3" align="right"><strong>IGV (18%)</strong></td>
                <td>'.$igv.'</td>
            </tr>
            <tr>
                <td colspan="3" align="right"><strong>Total</strong></td>            
                <td><strong>'.$boletaDatos['total'].'</strong></td>        
            </tr>    
        </tbody>
        </table><br><br>
        <p><strong>Gracias por su compra!</strong></p>';
        // Escribir contenido HTML en el PDF
        $pdf->writeHTML($html, true, false, true, false, '');
        // Salida del PDF (se descarga automáticamente)
        $pdf->Output('boleta_a5.pdf', 'I');
    }
}
?>