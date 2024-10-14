<?php include 'views/header.php';?>
<link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/personal.css">
<div class="grid-container fluid">
    <div class="grid-x align-center">
        <h1>Personal</h1>
    </div>
    <div class="grid-x botones">
        <div class="cell text-center">
            <a href="<?php echo constant('URL')?>personal/newpersonal" class="button success">Crear Personal</a>
        </div>
        <!-- <div class="cell large-6 text-center">
            <button class="button">Crear Personal</button>
        </div> -->
    </div>
    <div class="grid-x tabla">
        <div class="cell text-center">
            <h3>Personal Activo</h3>
        </div>
        <div class="cell table-scroll shadow">
            <table class="cell">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>nombre</th>
                        <th>apellidos</th>
                        <th>Telefono</th>
                        <th colspan="2" class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody class="data" id="data">
                    <tr>
                        <td>1</td>
                        <td>alberto </td>
                        <td>velasquez</td>
                        <td>987655431</td>
                        <td>Detalles</td>
                        <td>Login</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="<?php echo constant('URL') ?>public/js/personal.js"></script>
<?php include 'views/footer.php';?>
