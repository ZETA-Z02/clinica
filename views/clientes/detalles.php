<?php include 'views/header.php'; ?>
<div class="grid-container fluid">
    <div class="grid-x align-center">
        <h1>Detalles de Clientes</h1>
    </div>
    <div class="grid-x align-center">
        <form action="" method="POST" class="grid-x grid-margin-x" id="form-update">
            <input type="text" id="id" value="<?php echo $this->data['idcliente']; ?>" name="id" hidden style="display: none;">
            <div class="cell large-6 inputs">
                <label for="nombres" class="">Nombres: </label>
                <input type="text" name="nombres" id="nombres" value="<?php echo $this->data['nombre']; ?>" readonly>
            </div>
            <div class="cell large-6 inputs">
                <label for="apellidos" class="">Apellidos: </label>
                <input type="text" name="apellidos" id="apellidos" value="<?php echo $this->data['apellidos']; ?>"
                    readonly>
            </div>
            <div class="cell large-6 inputs">
                <label for="dni" class="">Dni: </label>
                <input type="text" name="dni" id="dni" value="<?php echo $this->data['dni']; ?>" readonly>
            </div>
            <div class="cell large-6 inputs">
                <label for="sexo" class="">sexo: </label>
                <select name="sexo" id="sexo">
                    <option value="masculino" <?php echo $this->data['sexo'] == 'masculino' ? 'selected' : ''; ?>>Masculino
                    </option>
                    <option value="femenino" <?php echo $this->data['sexo'] == 'femenino' ? 'selected' : ''; ?>>Femenino
                    </option>
                </select>
            </div>
            <div class="cell large-6 inputs">
                <label for="ciudad" class="">ciudad: </label>
                <input type="text" name="ciudad" id="ciudad" value="<?php echo $this->data['ciudad']; ?>">
            </div>
            <div class="cell large-6 inputs">
                <label for="telefono" class="">telefono: </label>
                <input type="text" name="telefono" id="telefono" value="<?php echo $this->data['telefono']; ?>">
            </div>
            <div class="cell large-6 inputs">
                <label for="email" class="">email: </label>
                <input type="text" name="email" id="email" value="<?php echo $this->data['email']; ?>">
            </div>
            <div class="cell large-6 inputs">
                <label for="direccion" class="">direccion: </label>
                <input type="text" name="direccion" id="direccion" value="<?php echo $this->data['direccion']; ?>">
            </div>
            <div class="cell large-6 inputs">
                <label for="fecha Creacion" class="">fecha Creacion: </label>
                <input type="text" name="fechaCreacion" id="fecha Creacion"
                    value="<?php echo $this->data['feCreate']; ?>">
            </div>
            <div class="cell large-6 inputs">
                Agregar detalles de pago tambien en esta seccion
            </div>
            <div class="cell grid-x align-center">
                <button class="button">Actualizar</button>
            </div>
        </form>
    </div>
    <div class="grid-x align-right">
        <div class="cell">
            <a href="<?php echo constant('URL') ?>pagos" class="button">Volver</a>
        </div>
    </div>
    <div class="grid-x">
        <div class="cell">
            <details>
                <summary>Detalles de Pagos</summary>
                <div class="cell">
                    <table class="table-scroll">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>concepto</th>
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
                <div class="grid-x align-right">
                    <div class="cell large-8"></div>
                    <div class="cell large-4">
                        <label for="">Monto Pagado</label>
                        <input type="text" value="<?php echo $this->data['monto']; ?>" disabled>
                    </div>
                    <div class="cell large-8"></div>
                    <div class="cell large-4">
                        <label for="">Salgo por pagar</label>
                        <input type="text" value="<?php echo $this->data['saldo']; ?>" disabled>
                    </div>
                    <div class="cell large-8"></div>
                    <div class="cell large-4">
                        <label for="">Total</label>
                        <input type="text" value="<?php echo $this->data['total']; ?>" disabled>
                    </div>
                </div>
            </details>
        </div>
    </div>
</div>
<script src="<?php echo constant('URL') ?>public/js/clientes.js"></script>
<?php include 'views/footer.php'; ?>