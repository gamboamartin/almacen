<?php /** @var  \gamboamartin\almacen\controllers\controlador_al_almacen $controlador  controlador en ejecucion */ ?>
<?php use config\views; ?>
<?php //var_dump($controlador->inputs); exit(); ?>
<div class="control-group col-sm-6">
    <label class="control-label" for="codigo">Codigo </label>
    <?php echo $controlador->inputs->codigo; ?>
</div>
<div class="control-group col-sm-6">
    <label class="control-label" for="codigo_bis">Codigo Bis </label>
    <?php echo $controlador->inputs->codigo_bis; ?>
</div>
<div class="control-group col-sm-6">
    <label class="control-label" for="descripcion">Descripcion </label>
    <?php echo $controlador->inputs->descripcion; ?>
</div>
<div class="control-group col-sm-6">
    <label class="control-label" for="alias">Alias </label>
    <?php echo $controlador->inputs->alias; ?>
</div>
<div class="control-group col-sm-6">
    <label class="control-label" for="descripcion_select">Descripcion Select </label>
    <?php echo $controlador->inputs->descripcion_select; ?>
</div>
<div class="control-group col-sm-6">
    <label class="control-label" for="exterior">Exterior </label>
    <?php echo $controlador->inputs->exterior; ?>
</div>
<div class="control-group col-sm-6">
    <label class="control-label" for="interior">Interior </label>
    <?php echo $controlador->inputs->interior; ?>
</div>
<div class="control-group col-sm-6">
    <label class="control-label" for="telefono_1">Telefono 1 </label>
    <?php echo $controlador->inputs->telefono_1; ?>
</div>
<div class="control-group col-sm-6">
    <label class="control-label" for="telefono_2">Telefono 2 </label>
    <?php echo $controlador->inputs->telefono_2; ?>
</div>
<div class="control-group col-sm-6">
    <label class="control-label" for="telefono_3">Telefono 3 </label>
    <?php echo $controlador->inputs->telefono_3; ?>
</div>
<div class="control-group col-sm-6">
    <label class="control-label" for="dp_calle_pertenece_id">Calle </label>
    <div class="controls">
        <?php echo $controlador->inputs->select->dp_calle_pertenece_id; ?>
    </div>
</div>
<div class="control-group col-sm-6">
    <label class="control-label" for="org_sucursal_id">Sucursal </label>
    <div class="controls">
        <?php echo $controlador->inputs->select->org_sucursal_id; ?>
    </div>
</div>

<?php include (new views())->ruta_templates.'botons/submit/alta_bd_otro.php';?>
