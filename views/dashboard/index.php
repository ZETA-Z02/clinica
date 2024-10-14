<?php include 'views/header.php';?>
<link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/dashboard.css">
<div class="grid-container fluid">
    <div class="grid-x grid-margin-x cards">
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
    <div class="grid-x">
        <div class="cell graficos">
            <canvas id="bar"></canvas>
        </div>
    </div>
    <hr>
    <div class="grid-x grid-margin-x">
        <div class="cell large-4 small-12 text-center">
            <a href="<?php echo constant('URL') ?>pagos" class="button success">ir a Pagos</a>
        </div>
        <div class="cell large-4 small-12 text-center">
            <a href="<?php echo constant('URL') ?>clientes" class="button warning">ir a Clientes</a>
        </div>
        <div class="cell large-4 small-12 text-center">
            <a href="<?php echo constant('URL') ?>personal" class="button alert">ir a Personal</a>
        </div>
    </div>
</div>
<script src="<?php echo constant('URL') ?>public/js/dashboard.js"></script>
<?php include 'views/footer.php';?>
