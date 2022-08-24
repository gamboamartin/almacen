<?php /** @var  \gamboamartin\almacen\controllers\controlador_al_almacen $controlador  controlador en ejecucion */ ?>
<?php use config\views; ?>
<?php //var_dump($controlador->inputs); exit(); ?>
<?php echo $controlador->inputs->select->org_sucursal_id; ?>
<?php echo $controlador->inputs->select->dp_calle_pertenece_id; ?>
<?php echo $controlador->inputs->codigo; ?>
<?php echo $controlador->inputs->codigo_bis; ?>
<?php echo $controlador->inputs->descripcion; ?>
<?php echo $controlador->inputs->alias; ?>
<?php echo $controlador->inputs->descripcion_select; ?>
<?php echo $controlador->inputs->exterior; ?>
<?php echo $controlador->inputs->interior; ?>
<?php echo $controlador->inputs->telefono_1; ?>
<?php echo $controlador->inputs->telefono_2; ?>
<?php echo $controlador->inputs->telefono_3; ?>
<?php include (new views())->ruta_templates.'botons/submit/alta_bd.php';?>
