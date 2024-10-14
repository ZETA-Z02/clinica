<?php include 'views/header.php';?>
<div class="grid-container fluid">
    <div class="grid-x align-center">
        <h1>Crear Nuevo Clientes</h1>
    </div>
    <div class="grid-x">
        <form action="" method="POST" class="grid-x" id="form-cliente">
            <div class="cell inputs">
                <label for="dni" class="">DNI: </label>
                <input type="text" name="dni" id="dni">
            </div>
            <div class="cell inputs">
                <label for="telefono" class="">Telefono: </label>
                <input type="text" name="telefono" id="telefono">
            </div>
            <div class="cell inputs">
                <label for="nombre" class="">Nombre: </label>
                <input type="text" name="nombre" id="nombre" readonly>
            </div>
            <div class="cell inputs">
                <label for="apellidos" class="">Apellidos: </label>
                <input type="text" name="apellidos" id="apellidos" readonly>
            </div>
            <div class="cell grid-x align-center">
                <button class="button">Crear</button>
            </div>
        </form>
    </div>
    <div class="grid-x align-right">
        <a href="<?php echo constant('URL'); ?>clientes" class="button warning">Volver</a>
    </div>
</div>
<script src="<?php echo constant('URL') ?>public/js/clientes.js"></script>
<?php include 'views/footer.php';?>
