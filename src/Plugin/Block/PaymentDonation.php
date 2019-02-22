<?php

namespace Drupal\payment_donation\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides block for payment donation.
 *
 * @Block(
 *   id = "payment_donation",
 *   admin_label = @Translation("Payment donation form")
 * )
 */
class PaymentDonation extends BlockBase {

  /**
   * {@inheritDoc}
   */
  public function defaultConfiguration() {
    return [
      'payment_donation_payment_currency_code' => '',
      'payment_donation_payment_description' => '',
      'payment_donation_pmid' => 0,
      'payment_donation_block_body' => [
        'format' => '',
        'value' => '',
      ],
    ];
  }

  /**
   * {@inheritDoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {

    $form['payment_donation_payment_currency_code'] = [
      '#default_value' => $this->configuration['payment_donation_payment_currency_code'],
      '#options' => currency_options(),
      '#required' => TRUE,
      '#title' => t('Currency'),
      '#type' => 'select',
    ];
    $form['payment_donation_payment_description'] = [
      '#default_value' => $this->configuration['payment_donation_payment_description'],
      '#required' => TRUE,
      '#title' => t('Payment description'),
      '#type' => 'textfield',
    ];
    $form['payment_donation_pmid'] = [
      '#default_value' => $this->configuration['payment_donation_pmid'],
      '#options' => payment_method_options(),
      '#required' => TRUE,
      '#title' => t('Payment method'),
      '#type' => 'select',
    ];
    $block_body = $this->configuration['payment_donation_block_body'];
    $form['payment_donation_block_body'] = [
      '#default_value' => $block_body['value'],
      '#format' => $block_body['format'] ? $block_body['format'] : filter_default_format(),
      '#title' => t('Payment form description'),
      '#type' => 'text_format',
    ];

    return $form;
  }

  /**
   * {@inheritDoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->configuration['payment_donation_pmid']
      = $form_state->getValue('payment_donation_pmid');
    $this->configuration['payment_donation_payment_currency_code']
      = $form_state->getValue('payment_donation_payment_currency_code');
    $this->configuration['payment_donation_payment_description']
      = $form_state->getValue('payment_donation_payment_description');
    $this->configuration['payment_donation_block_body']
      = $form_state->getValue('payment_donation_block_body');
  }

  /**
   * {@inheritdoc}
   */
  public function build() {

  }
}