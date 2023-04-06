<?php

/**
 * @file
 * Contains Drupal\druframe_offer\Form\DruframeOfferForm.
 */

namespace Drupal\druframe_offer\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Form controller for the offer entity edit forms.
 *
 * @ingroup content_entity_example
 */
class DruframeOfferForm extends ContentEntityForm {
  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state)
  {
    /* @var $entity \Drupal\druframe_offer\Entity\DruframeOffer */
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   * @throws \Drupal\Core\Entity\EntityStorageException
   */
  public function save(array $form, FormStateInterface $form_state): void {
    // Redirect to offer list after save.
    $form_state->setRedirect('entity.druframe_offer.collection');
    $entity = $this->getEntity();
    $entity->save();
  }

}
