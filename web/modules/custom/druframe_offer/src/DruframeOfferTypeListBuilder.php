<?php

namespace Drupal\druframe_offer;

use Drupal\Core\Config\Entity\ConfigEntityListBuilder;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Url;

/**
 * Defines a class to build a listing of druframe offer type entities.
 *
 * @see \Drupal\druframe_offer\Entity\DruframeOfferType
 */
class DruframeOfferTypeListBuilder extends ConfigEntityListBuilder {

  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    $header['title'] = $this->t('Label');

    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    $row['title'] = [
      'data' => $entity->label(),
      'class' => ['menu-label'],
    ];

    return $row + parent::buildRow($entity);
  }

  /**
   * {@inheritdoc}
   */
  public function render() {
    $build = parent::render();

    $build['table']['#empty'] = $this->t(
      'No druframe offer types available. <a href=":link">Add druframe offer type</a>.',
      [':link' => Url::fromRoute('entity.druframe_offer_type.add_form')->toString()]
    );

    return $build;
  }

}
