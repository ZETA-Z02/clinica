<?php include 'views/header.php';?>
<div class="grid-container fluid">
    <div class="grid-x align-center">
        <h1>Tratamientos</h1>
    </div>
    <div class="grid-x">
        <form action="" method="POST" class="grid-x" id="form-cliente">
            <div class="cell inputs">
                <label for="dni" class="">Tratamiento: </label>
                <input type="text" name="dni" id="dni">
            </div>
            <div class="cell inputs">
                <label for="telefono" class="">observacion: </label>
                <input type="text" name="telefono" id="telefono">
            </div>
            <div class="cell inputs">
                <label for="nombre" class="">Fecha: </label>
                <input type="text" name="nombre" id="nombre">
            </div>
            <div class="cell grid-x align-center">
                <button class="button">Crear</button>
            </div>
        </form>
    </div>
</div>
<?php include 'views/footer.php';?>
