<?php
/**
 * @author Martin Gamboa Vazquez
 * @version 1.0.0
 * @created 2022-05-14
 * @final En proceso
 *
 */
namespace gamboamartin\almacen\controllers;

use config\generales;
use gamboamartin\errores\errores;
use gamboamartin\system\links_menu;
use gamboamartin\system\system;
use gamboamartin\template\html;
use html\al_almacenista_html;
use html\gt_tipo_solicitud_html;
use models\al_almacenista;
use models\gt_tipo_solicitud;
use PDO;
use stdClass;

class controlador_al_almacenista extends system {

    public function __construct(PDO $link, stdClass $paths_conf = new stdClass()){
        $modelo = new al_almacenista(link: $link);
        $html_base = new html();
        $html = new al_almacenista_html(html: $html_base);
        $obj_link = new links_menu($this->registro_id);
        parent::__construct(html:$html, link: $link,modelo:  $modelo, obj_link: $obj_link, paths_conf: $paths_conf);

        $this->titulo_lista = 'Almacenista';

    }
}
