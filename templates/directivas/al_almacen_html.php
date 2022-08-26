<?php
namespace html;

use gamboamartin\almacen\controllers\controlador_al_almacen;
use gamboamartin\errores\errores;
use gamboamartin\system\html_controler;
use PDO;
use stdClass;

class al_almacen_html extends html_controler {
    private function asigna_inputs(controlador_al_almacen $controler, stdClass $inputs): array|stdClass
    {
        $controler->inputs->select = new stdClass();
        $controler->inputs->select->org_sucursal_id = $inputs->selects->org_sucursal_id;
        $controler->inputs->select->dp_calle_pertenece_id = $inputs->selects->dp_calle_pertenece_id;

        $controler->inputs->exterior = $inputs->texts->exterior;
        $controler->inputs->interior = $inputs->texts->interior;
        $controler->inputs->telefono_1 = $inputs->texts->telefono_1;
        $controler->inputs->telefono_2 = $inputs->texts->telefono_2;
        $controler->inputs->telefono_3 = $inputs->texts->telefono_3;


        return $controler->inputs;
    }

    public function genera_inputs_alta(controlador_al_almacen $controler, PDO $link): array|stdClass
    {
        $inputs = $this->init_alta(link: $link);
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al generar inputs',data:  $inputs);

        }
        $inputs_asignados = $this->asigna_inputs(controler:$controler, inputs: $inputs);
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al asignar inputs',data:  $inputs_asignados);
        }

        return $inputs_asignados;
    }

    public function genera_inputs_modifica(controlador_al_almacen $controler, PDO $link, stdClass $params = new stdClass()): array|stdClass
    {
        $inputs = $this->init_modifica(link: $link, row_upd: $controler->row_upd, params: $params);
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al generar inputs',data:  $inputs);
        }

        $inputs_asignados = $this->asigna_inputs(controler:$controler, inputs: $inputs);
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al asignar inputs',data:  $inputs_asignados);
        }

        return $inputs_asignados;
    }


    private function init_alta(PDO $link): array|stdClass
    {
        $selects = $this->selects_alta(link: $link);
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al generar selects',data:  $selects);
        }
        $texts = $this->texts_alta(row_upd: new stdClass(), value_vacio: true);
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al generar texts',data:  $texts);
        }

        $alta_inputs = new stdClass();
        $alta_inputs->selects = $selects;
        $alta_inputs->texts = $texts;

        return $alta_inputs;
    }

    private function init_modifica(PDO $link, stdClass $row_upd, stdClass $params = new stdClass()): array|stdClass
    {
        $selects = $this->selects_modifica(link: $link, row_upd: $row_upd);
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al generar selects',data:  $selects);
        }

        $texts = $this->texts_alta(row_upd: $row_upd, value_vacio: false, params: $params);
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al generar texts',data:  $texts);
        }

        $alta_inputs = new stdClass();
        $alta_inputs->selects = $selects;
        $alta_inputs->texts = $texts;

        return $alta_inputs;
    }

    private function selects_alta(PDO $link): array|stdClass
    {
        $selects = new stdClass();

        $select = (new org_sucursal_html(html:$this->html_base))->select_org_sucursal_id(
            cols: 12, con_registros:true, id_selected:-1,link: $link);
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al generar select',data:  $select);
        }
        $selects->org_sucursal_id = $select;

        $select = (new dp_calle_pertenece_html(html:$this->html_base))->select_dp_calle_pertenece_id(
            cols: 12, con_registros:true, id_selected:-1,link: $link);
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al generar select',data:  $select);
        }
        $selects->dp_calle_pertenece_id = $select;

        return $selects;
    }

    private function selects_modifica(PDO $link, stdClass $row_upd): array|stdClass
    {
        $selects = new stdClass();

        $select = (new org_sucursal_html(html:$this->html_base))->select_org_sucursal_id(
            cols: 6, con_registros:true, id_selected:$row_upd->org_sucursal_id,link: $link);
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al generar select',data:  $select);
        }
        $selects->org_sucursal_id = $select;

        $select = (new dp_calle_pertenece_html(html:$this->html_base))->select_dp_calle_pertenece_id(
            cols: 12, con_registros:true, id_selected:$row_upd->dp_calle_pertenece_id,link: $link);
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al generar select',data:  $select);
        }
        $selects->dp_calle_pertenece_id = $select;

        return $selects;
    }

    private function texts_alta(stdClass $row_upd, bool $value_vacio, stdClass $params = new stdClass()): array|stdClass
    {
        $cols_codigo = $params->codigo->cols ?? 6;
        $disabled_codigo = $params->codigo->disabled ?? false;

        $texts = new stdClass();

        $in_text = $this->input_create(cols: 4,row_upd:  $row_upd,value_vacio:  $value_vacio, name: 'exterior', place_holder: 'Exterior');
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al generar input',data:  $in_text);
        }
        $texts->exterior = $in_text;

        $in_text = $this->input_create(cols: 4,row_upd:  $row_upd,value_vacio:  $value_vacio, name: 'interior', place_holder: 'Interior');
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al generar input',data:  $in_text);
        }
        $texts->interior = $in_text;

        $in_text = $this->input_create(cols: 4,row_upd:  $row_upd,value_vacio:  $value_vacio, name: 'telefono_1', place_holder: 'Telefono_1');
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al generar input',data:  $in_text);
        }
        $texts->telefono_1 = $in_text;

        $in_text = $this->input_create(cols: 4,row_upd:  $row_upd,value_vacio:  $value_vacio, name: 'telefono_2', place_holder: 'Telefono_2');
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al generar input',data:  $in_text);
        }
        $texts->telefono_2 = $in_text;

        $in_text = $this->input_create(cols: 4,row_upd:  $row_upd,value_vacio:  $value_vacio, name: 'telefono_3', place_holder: 'Telefono_3');
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al generar input',data:  $in_text);
        }
        $texts->telefono_3 = $in_text;

        return $texts;
    }

    public function input_create(int $cols, stdClass $row_upd, bool $value_vacio, bool $disabled = false, string $name = '',
                                    string $place_holder = ''): array|string
    {
        $valida = $this->directivas->valida_cols(cols: $cols);
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al validar columnas', data: $valida);
        }

        $html =$this->directivas->input_text_required(disable: $disabled,name: $name,place_holder: $place_holder,
            row_upd: $row_upd, value_vacio: $value_vacio);
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al generar input', data: $html);
        }

        $div = $this->directivas->html->div_group(cols: $cols,html:  $html);
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al integrar div', data: $div);
        }

        return $div;
    }



}
