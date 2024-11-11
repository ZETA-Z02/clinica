<?php include 'views/header.php'; ?>
<link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/clientes.css">
<div class="grid-container fluid">
    <div class="grid-x align-center">
        <h1>Registro de Clientes</h1>
    </div>
    <div class="grid-x align-spaced">
        <button class="button success" id="btn-nuevo-cliente">Nuevo Cliente</button>
    </div>
    <hr>
    <div class="grid-x tabla-datos-clientes" id="tabla-datos-clientes">
        <div class="grid-x cell shadow padding-1">
            <span>Buscador</span><input type="text" class="search" id="search">
        </div>
        <hr>
        <div class="cell grid-x margin-top-1 shadow">
            <table class="stack">
                <thead>
                    <tr>
                        <th>Detalles</th>
                        <th>Nombres</th>
                        <th>Celular</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody class="data" id="data">
                    <tr>
                        <td>0</td>
                        <td>Sin registros</td>
                        <td>Sin registros</td>
                        <td><a href="http://${host}/clinica/clientes/detalles/0" class="button">Detalles</a></td>
                    <td><button class="button warning" id="btn-pago" id-data="0">Nuevo Pago</button></td>
                    </tr>
                </tbody>
            </table>
            <div id="clientes-paginador"></div>
        </div>
    </div>
    <div class="grid-x formulario-nuevo-cliente callout" id="formulario-nuevo-cliente">
        <div class="grid-x cell align-center">
            <h4>Registrar Nuevo Cliente</h4>
        </div>
        <form action="" method="POST" class="grid-x cell" id="form-cliente">
            <div class="cell inputs">
                <label for="dni" class="">DNI: </label>
                <input type="text" name="dni" id="dni" required>
            </div>
            <div class="cell inputs">
                <label for="telefono" class="">Telefono: </label>
                <input type="text" name="telefono" id="telefono" required>
            </div>
            <div class="cell inputs">
                <label for="nombre" class="">Nombre: </label>
                <input type="text" name="nombre" id="nombre" readonly>
            </div>
            <div class="cell inputs">
                <label for="apellidos" class="">Apellidos: </label>
                <input type="text" name="apellidos" id="apellidos" readonly>
            </div>
            <div class="cell inputs">
                <label for="monto-total" class="">Monto total: </label>
                <input type="text" name="monto-total" id="monto-total" required>
            </div>
            <div class="cell inputs">
                <label for="pago" class="">Primer Pago: </label>
                <input type="text" name="pago" id="pago">
            </div>
            <div class="cell grid-x align-center">
                <button class="button">Crear</button>
            </div>
        </form>
        <div class="grid-x cell">
            <button class="button warning" id="btn-cancelar-cliente">Atras</button>
        </div>
    </div>
    <div class="grid-x align-center formulario-nuevo-pago callout" id="formulario-nuevo-pago">
        <div class="grid-x cell align-center">
            <h4>Registrar nuevo pago</h4>
        </div>
        <div class="cell text-center">
            <h5>Cliente:</h5><p class="cliente-name" id="cliente-name"></p>
        </div>
        <form action="" method="POST" class="grid-x" id="form-pago">
            <div class="cell inputs">
                <input type="text" name="idcliente" id="idcliente" hidden style="display:none;">
            </div>
            <div class="cell inputs">
                <label for="monto" class="">Monto: </label>
                <input type="text" name="monto" id="monto" required>
            </div>
            <div class="cell inputs">
                <label for="concepto" class="">concepto: </label>
                <input type="text" name="concepto" id="concepto" required>
            </div>
            <div class="cell grid-x align-center">
                <button class="button">Crear</button>
            </div>
        </form>
        <div class="grid-x cell">
            <button class="button warning" id="btn-cancelar-pago">Atras</button>
        </div>
    </div>
</div>
<script src="<?php echo constant('URL') ?>public/js/clientes.js"></script>
<?php include 'views/footer.php'; ?>