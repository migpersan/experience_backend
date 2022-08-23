<?php
namespace Drupal\nuevo_modulo\Controller;

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
            '#theme' => 'article_list',
            '#items' => $items,
            '#title' => 'Mi articulo'
        );
    }
}