<?php include 'views/header.php';?>
<div class="grid-container fluid">
    <div class="grid-x align-center">
        <h1>Detalles de Clientes</h1>
    </div>
    <div class="grid-x align-center">
        <form action="" method="POST" class="grid-x" id="form-update">
            <input type="text" value="<?php echo $this->data['idcliente'];?>" name="id" hidden style="display: none;">
            <div class="cell inputs">
                <label for="nombres" class="">Nombres: </label>
                <input type="text" name="nombres" id="nombres" value="<?php echo $this->data['nombre'];?>" readonly>
            </div>
            <div class="cell inputs">
                <label for="apellidos" class="">Apellidos: </label>
                <input type="text" name="apellidos" id="apellidos" value="<?php echo $this->data['apellidos'];?>" readonly>
            </div>
            <div class="cell inputs">
                <label for="dni" class="">Dni: </label>
                <input type="text" name="dni" id="dni" value="<?php echo $this->data['dni'];?>" readonly>
            </div>
            <div class="cell inputs">
                <label for="sexo" class="">sexo: </label>
                <input type="text" name="sexo" id="sexo" value="<?php echo $this->data['sexo'];?>">
            </div>
            <div class="cell inputs">
                <label for="ciudad" class="">ciudad: </label>
                <input type="text" name="ciudad" id="ciudad" value="<?php echo $this->data['ciudad'];?>">
            </div>
            <div class="cell inputs">
                <label for="telefono" class="">telefono: </label>
                <input type="text" name="telefono" id="telefono" value="<?php echo $this->data['telefono'];?>">
            </div>
            <div class="cell inputs">
                <label for="email" class="">email: </label>
                <input type="text" name="email" id="email" value="<?php echo $this->data['email'];?>">
            </div>
            <div class="cell inputs">
                <label for="direccion" class="">direccion: </label>
                <input type="text" name="direccion" id="direccion" value="<?php echo $this->data['direccion'];?>">
            </div>
            <div class="cell inputs">
                <label for="fecha Creacion" class="">fecha Creacion: </label>
                <input type="text" name="fechaCreacion" id="fecha Creacion" value="<?php echo $this->data['feCreate'];?>">
            </div>
            <div class="cell grid-x align-center">
                <button class="button">Actualizar</button>
            </div>
        </form>
    </div>
    <div class="grid-x align-right">
        <div class="cell">
            <a href="<?php echo constant('URL') ?>clientes" class="button">Volver</a>
        </div> 
    </div>
</div>
<script src="<?php echo constant('URL') ?>public/js/clientes.js"></script>
<?php include 'views/footer.php';?>
