<?php

namespace Drupal\mb_entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface defining a mb entity entity type.
 */
interface MbEntityInterface extends ContentEntityInterface, EntityOwnerInterface, EntityChangedInterface {

}
