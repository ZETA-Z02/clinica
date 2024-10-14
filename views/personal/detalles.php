<?php include 'views/header.php';?>
<div class="grid-container fluid">
    <div class="grid-x align-center">
        <h1>Detalles Personal: <?php echo $this->data['nombre'];?></h1>
    </div>
    <div class="grid-x align-center">
        <form action="" method="POST" class="grid-x callout" id="form-update">
            <input type="text" name="idpersonal" id="idpersonal" value="<?php echo $this->data['idpersonal'];?>" readonly hidden style="display:none;">
            <div class="cell inputs">
                <label for="nombre" class="">Nombre: </label>
                <input type="text" name="nombre" id="nombre" value="<?php echo $this->data['nombre'];?>" readonly>
            </div>
            <div class="cell inputs">
                <label for="apellidos" class="">Apellidos: </label>
                <input type="text" name="apellidos" id="apellidos" value="<?php echo $this->data['apellidos'];?>" readonly>
            </div>
            <div class="cell inputs">
                <label for="dni" class="">DNI: </label>
                <input type="text" name="dni" id="dni" value="<?php echo $this->data['dni'];?>" readonly>
            </div>
            <div class="cell inputs">
                <label for="telefono" class="">Telefono: </label>
                <input type="text" name="telefono" id="telefono" value="<?php echo $this->data['telefono'];?>">
            </div>
            <div class="cell inputs">
                <label for="sexo" class="">sexo: </label>
                <input type="text" name="sexo" id="sexo" value="<?php echo $this->data['sexo'];?>">
            </div>
            <div class="cell inputs">
                <label for="fechaNac" class="">fecha Nacimiento: </label>
                <input type="date" name="fechaNac" id="fechaNac" value="<?php echo $this->data['fechaNac'];?>">
            </div>
            <div class="cell inputs">
                <label for="email" class="">email: </label>
                <input type="text" name="email" id="email" value="<?php echo $this->data['email'];?>">
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
