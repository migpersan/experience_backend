<?php

namespace Drupal\drupalup_controller\Controller;

class ArticleController {

  public function page() {

    $items = array(
      array('name' => 'Article one',
             'descripcion' => 'Descripcion 1'),
      array('name' => 'Article two',
             'descripcion' => 'Descripcion 2'),
      array('name' => 'Article three',
             'descripcion' => 'Descripcion 3'),
      array('name' => 'Article four',
             'descripcion' => 'Descripcion 4'),
    );

    return array(
      '#theme' => 'articulos',
      '#items' => $items,
      '#title' => 'Our article list'
    );
  }
}
