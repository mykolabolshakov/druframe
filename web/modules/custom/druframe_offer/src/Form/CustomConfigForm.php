<?php

namespace Drupal\druframe_offer\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Configure druframe_offer settings for this site.
 */
class CustomConfigForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'druframe_offer_custom_config_form';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['druframe_offer.custom_config_form'];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('druframe_offer.custom_config_form');

    $form['analytics'] = [
      '#type' => 'details',
      '#title' => $this->t('Marketing & analytics'),
      '#open' => TRUE,
    ];

    $form['analytics']['tagmanager'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Tagmanager code'),
      '#default_value' => $config->get('tagmanager'),
      '#maxlength' => NULL,
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    if (!$form_state->getValue('tagmanager')) {
      $form_state->setErrorByName('tagmanager', $this->t('The value is not correct or absent.'));
    }
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);

    $this->config('druframe_offer.custom_config_form')
      ->set('tagmanager', $form_state->getValue('tagmanager'))
      ->save();
  }

}
