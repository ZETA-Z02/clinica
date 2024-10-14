<?php include 'views/header.php';?>
<div class="grid-container fluid new-personal">
    <div class="grid-x align-center">
        <h1>Personal</h1>
    </div>
    <div class="grid-x align-center">
        <form action="" method="POST" class="grid-x callout" id="form-personal">
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
            <div class="cell inputs">
                <label for="usuario" class="">Nombre de usuario para ingresar al sistema: </label>
                <input type="text" name="usuario" id="usuario" value="<?php echo $this->data['usuario'];?>">
            </div>
            <div class="cell inputs">
                <label for="password" class="">Password de usuario: </label>
                <input type="password" name="password" id="password" value="<?php echo $this->data['password'];?>">
            </div>
            <div class="cell grid-x align-center">
                <button class="button">Crear</button>
            </div>
        </form>
    </div>
    <div class="grid-x align-right">
        <div class="cell">
            <a href="<?php echo constant('URL') ?>personal" class="button">Volver</a>
        </div> 
    </div>
</div>

<script src="<?php echo constant('URL') ?>public/js/personal.js"></script>
<?php include 'views/footer.php';?>
