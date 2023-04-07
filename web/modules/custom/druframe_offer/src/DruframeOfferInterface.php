<?php

namespace Drupal\druframe_offer;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface defining a druframe offer entity type.
 */
interface DruframeOfferInterface extends ContentEntityInterface, EntityOwnerInterface, EntityChangedInterface {

}
