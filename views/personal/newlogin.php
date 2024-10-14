<?php include 'views/header.php';?>
<div class="grid-container fluid">
    <div class="grid-x align-center">
        <h1>Modificar Login</h1>
    </div>
    <div class="grid-x align-center">
        <form action="" method="POST" class="grid-x callout" id="form-login-update">
            <input type="text" name="idpersonal" id="idpersonal" value="<?php echo $this->data['idpersonal'];?>" hidden style="display:none;">
            <div class="cell inputs">
                <label for="usuario" class="">Nombre de usuario: </label>
                <input type="text" name="usuario" id="usuario" value="<?php echo $this->data['usuario'];?>">
            </div>
            <div class="cell inputs">
                <label for="password" class="">Password de usuario: </label>
                <input type="password" name="password" id="password" value="<?php echo $this->data['password'];?>">
            </div>
            <div class="cell inputs">
                <label for="estado" class="">Estado de usuario: </label>
                <select name="estado" id="estado">
                    <option value="1" <?php echo $this->data['estado'] == 1 ? 'selected' : '';?>>Activo</option>
                    <option value="0" <?php echo $this->data['estado'] == 0 ? 'selected' : '';?>>Inactivo</option>
                </select>
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
