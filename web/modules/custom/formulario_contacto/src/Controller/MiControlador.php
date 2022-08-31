<?php
namespace Drupal\formulario_contacto\Controller;

class MiControlador{
    public function page(){
        $items = array(
            array('name' =>'Articulo 1'),
            array('name' =>'Articulo 2'),
            array('name' =>'Articulo 3'),
            array('name' =>'Articulo 4')
        );
        // echo '<pre>';
        // print_r($items);
        // echo '</pre>';
        return array(
            '#theme' => 'vista_formulario_contacto',
            '#items' => $items,
            '#title' => 'Formulario de contacto'
        );
    }
}