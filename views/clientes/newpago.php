<?php include 'views/header.php';?>
<link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/clientes.css">
<div class="grid-container fluid">
    <div class="grid-x align-center">
        <h1>Registrar nuevo pago</h1>
    </div>
    <div class="grid-x align-center">
        <form action="" method="POST" class="grid-x" id="form-pago">
            <div class="cell inputs">
                <label for="dni" class="">Cliente: </label>
                <input list="clientes-search-response" name="clientes-search" id="clientes-search">
                <datalist id="clientes-search-response">
                    <option value="cliente1">Algo</option>
                    <option value="cliente2">Cliente 2</option>
                    <option value="cliente3">Clietne 3</option>
                </datalist>
            </div>
            <div class="cell inputs">
                <label for="monto" class="">Monto: </label>
                <input type="text" name="monto" id="monto">
            </div>
            <div class="cell inputs">
                <label for="concepto" class="">concepto: </label>
                <input type="text" name="concepto" id="concepto">
            </div>
            <div class="cell grid-x align-center">
                <button class="button">Crear</button>
            </div>
        </form>
    </div>
    <div class="grid-x align-center">
        <a href="<?php echo constant('URL'); ?>clientes" class="button warning">Volver</a>
    </div>
</div>
<script src="<?php echo constant('URL') ?>public/js/clientes.js"></script>
<?php include 'views/footer.php';?>
