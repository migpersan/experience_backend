<?php

namespace Drupal\form_contacto\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class FormContacto extends FormBase {
 public function buildForm(array $form, FormStateInterface $form_state) {
    $form['name'] = [
        '#type' => 'textfield',
        '#title' => $this->t('Name'),
        '#size' => 100
    ];

    $form['Email'] = [
        '#type' => 'email',
        '#title' => $this->t('Email'),
        '#required' => TRUE,
        '#size' => 100
    ];
    $form['Teléfono'] = [
        '#type' => 'tel',
        '#title' => $this->t('Telephone'),
        '#required' => TRUE,
        '#pattern' => '[0-9]{9}',
        '#size' => 100
    ];
    $form['Asunto'] = [
        '#type' => 'textfield',
        '#title' => $this->t('Asunto'),
        '#required' => TRUE,
        '#size' => 100
    ];

    $form['mensaje'] = [
        '#type' => 'textarea',
        '#title' => $this->t('Message'),
        '#required' => TRUE,
        '#size' => 100,
        '#placeholder' => 'Cuentanos que necesitas. Mientras más detalles mejor'
    ];
    $form['check'] = [
        '#type' => 'checkbox',
        '#title' => $this->t('Acepto ser contactado por alguno de los medios facilitados.'),
        '#required' => TRUE,
        '#size' => 100
    ];

    $form['enviar']=[
        '#type' => 'submit',
        '#value' => $this->t('Submit'),
        '#size' => 100
    ];

    return $form;
 }

 public function getFormId() {
    return 'contacto_form_form ';
 }

 public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->messenger()->addStatus($this->t('Mensaje enviado @fullname', ['@fullname' => $form_state->getValue('Name')]));
}

}
