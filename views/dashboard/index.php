<?php include 'views/header.php';?>
<link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/dashboard.css">
<div class="grid-container fluid">
    <div class="grid-x grid-margin-x cards" id="cards">
        <div class="cell large-4 medium-6 small-12">
            <div class="card text-center">
                <h1><?php echo $this->data['clientes'];?></h1>
                <div class="card-section">
                    <p class="lead">Clientes Satisfechos</p>
                </div>
            </div>
        </div>
        <div class="cell large-4 medium-6 small-12">
            <div class="card text-center">
                <h1><?php echo $this->data['pagos'];?></h1>
                <div class="card-section">
                    <p class="lead">Pagos Completados</p>
                </div>
            </div>
        </div>
        <div class="cell large-4 medium-6 small-12">
            <div class="card text-center">
                <h1><?php echo $this->data['recaudado'];?></h1>
                <div class="card-section">
                    <p class="lead">Dinero Recaudado</p>
                </div>
            </div>
        </div>
    </div>
    <div class="grid-x grid-margin-x botones" id="botones">
        <div class="cell large-4 small-12 text-center">
            <a href="<?php echo constant('URL') ?>pagos" class="button warning lead">ir a Pagos</a>
        </div>
        <div class="cell large-4 small-12 text-center">
            <button id="abrir-nuevo-cliente" class="button success lead">Nuevo Cliente</button>
        </div>
        <div class="cell large-4 small-12 text-center">
            <a href="<?php echo constant('URL') ?>personal" class="button alert lead">ir a Clientes</a>
        </div>
    </div>
    <div class="grid-x graficos" id="graficos">
        <div class="cell graficos">
            <canvas id="bar"></canvas>
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
</div>
<script src="<?php echo constant('URL') ?>public/js/dashboard.js"></script>
<?php include 'views/footer.php';?>
