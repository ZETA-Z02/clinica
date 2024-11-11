<?php include 'views/header.php'; ?>
<link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/pagos.css">
<div class="grid-container full">
    <!-- BUSCADOR Y TABLA DE PAGOS -->
    <div class="grid-x" id="pagos">
        <div class="cell grid-x align-center">
            <h1>Pagos de Clientes</h1>
        </div>
        <div class="grid-x cell callout">
            <span class="lead">BUSCADOR: NOMBRE - APELLIDOS - DNI</span><input type="text" class="search" id="search">
        </div>
        <div class="cell grid-x table-scroll shadow">
            <table class="table-scroll table-pagos">
                <thead>
                    <tr>
                        <th>Datos</th>
                        <th>Cliente</th>
                        <th>DNI</th>
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
    <!-- BUSCADOR Y TABLA DE PAGOS -->
    <!-- NUEVO PAGO -->
    <div class="grid-x formulario-nuevo-pago callout" id="formulario-nuevo-pago">
        <div class="grid-x cell align-center">
            <h2>Registrar nuevo pago</h2>
        </div>
        <div class="grid-x cell">
            <div class="cell tabla-detalles">
                <form action="" method="POST" id="form-pago">
                <table class="table-scroll" id="tabla-nuevo-pago">
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Monto Total</th>
                            <th>Importe</th>
                            <th>Deuda</th>
                            <th>Concepto</th>
                        </tr>
                    </thead>
                    <tbody id="data-nuevo-pago">
                    </tbody>
                    <tfoot>
                        <tr>
                            <input type="text" name="idpago" id="idpago" hidden style="display:none;" value="">
                            <td>Nuevo Registro:</td>
                            <td id="mostrar-total">0</td>
                            <td><input type="text" name="monto" id="input-pago" placeholder="Nuevo Pago"></td>
                            <td id="mostrar-deuda">0</td>
                            <td><input type="text" name="concepto" id="input-concepto" placeholder="Concepto"></td>
                        </tr>
                    </tfoot>
                </table>
                <div class="cell grid-x align-center">
                    <button class="button success">Confirmar Nuevo Pago</button>
                </div>
                </form>
            </div>
            <!-- <div class="cell">
                <form action="" method="POST" class="cell large-5" id="form-pago">
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
            </div> -->
        </div>
        <div class="grid-x cell">
            <button class="button warning" id="btn-cancelar-pago">Cancelar</button>
        </div>
    </div>
    <!-- NUEVO PAGO END -->
    <!-- DETALLES DE PAGO -->
    <div class="grid-x callout pagos-detalles-container" id="pagos-detalles">
        <div class="cell grid-x align-center titulo-detalles">
            <h2>Detalles de Pagos</h2>
        </div>
        <div class="cell grid-x">
            <table class="table-scroll">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Concepto</th>
                        <th>Importe</th>
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
        <div class="cell large-6 grid-x align-left">
            <button class="button" id="btn-cerrar-detalles">Cerrar</button>
        </div>
        <div class="cell large-6 grid-x align-right">
            <a class="button success" id="btn-boleta" target="_blank">Imprimir Boleta</a>
        </div>
    </div>
    <!-- DETALLES DE PAGO END-->
</div>
<script src="<?php echo constant('URL') ?>public/js/pagos.js"></script>
<?php include 'views/footer.php'; ?>