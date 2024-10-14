<?php include 'views/header.php';?>
<link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/pagos.css">
<div class="grid-container full">
    <div class="grid-x" id="pagos">
        <div class="cell grid-x align-center">
            <h1>Pagos de Clientes</h1>
        </div>
        <div class="grid-x cell">
            <span>Buscador</span><input type="text" class="search" id="search">
        </div>
        <div class="cell grid-x table-scroll shadow">
            <table class="table-scroll table-pagos">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Cliente</th>
                        <th>Total a Pagar</th>
                        <th>Saldo</th>
                        <th>Cancelado</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody id="tabla-pagos">
                    <td>1</td>
                    <td>nombre</td>
                    <td>300</td>
                    <td>100</td>
                    <td>200</td>
                    <td><a class="button success" href="#">Nuevo Pago</a></td>
                </tbody>
            </table>
            <div id="pagos-paginador"></div>
        </div>
    </div>
    <div class="grid-x align-center formulario-nuevo-pago callout" id="formulario-nuevo-pago">
        <div class="grid-x cell align-center">
            <h2>Registrar nuevo pago</h2>
        </div>
        <form action="" method="POST" class="grid-x" id="form-pago">
            <input type="text" name="idpago" id="idpago" hidden style="display:none;">
            <div class="cell inputs">
                <label for="monto" class="">Monto: </label>
                <input type="text" name="monto" id="monto">
            </div>
            <div class="cell inputs">
                <label for="concepto" class="">Concepto: </label>
                <input type="text" name="concepto" id="concepto">
            </div>
            <div class="cell grid-x align-center">
                <button class="button">Crear</button>
            </div>
        </form>
        <div class="grid-x cell">
            <button class="button warning" id="btn-cancelar-pago">Cancelar</button>
        </div>
    </div>
    <div class="grid-x callout pagos-detalles-container" id="pagos-detalles">
        <div class="cell grid-x align-center titulo-detalles">
            <h2>Detalles de Pagos</h2>
        </div>
        <div class="cell grid-x">
            <table class="table-scroll">
                <thead>
                    <tr>
                        <th>Concepto</th>
                        <th>Monto</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody id="data-pagos-detalles">
                    <tr>
                        <th>Pago numero 2</th>
                        <th>140</th>
                        <th>02-11-2003</th>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="cell grid-x align-left">
            <button class="button" id="btn-cerrar-detalles">Cerrar</button>
        </div>
    </div>
</div>
<script src="<?php echo constant('URL') ?>public/js/pagos.js"></script>
<?php include 'views/footer.php';?>
