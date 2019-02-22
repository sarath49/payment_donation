<?php

namespace Drupal\payment_donation\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class PaymentDonationForm extends FormBase {

  /**
   * {@inheritDoc}
   */
  public function getFormId() {
    return 'payment_donation_form';
  }

  public function buildForm(array $form, FormStateInterface $form_state) {

    $form['payment_donation_amount'] = array(
      '#currency_code' => '',
      '#title' => t('Amount'),
      '#type' => 'currency_amount',
    );

    return $form;
  }

  public function validateForm(array &$form, FormStateInterface $form_state) {

  }

  public function submitForm(array &$form, FormStateInterface $form_state) {

  }

}