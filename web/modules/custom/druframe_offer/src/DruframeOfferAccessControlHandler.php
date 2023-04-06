<?php

namespace Drupal\druframe_offer;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;

/**
 * Access controller for the offer entity. Controls create/edit/delete access for entity and fields.
 *
 * @see \Drupal\druframe_offer\Entity\DruframeOffer.
 */
class DruframeOfferAccessControlHandler extends EntityAccessControlHandler {
  /**
   * {@inheritdoc}
   *
   * Link the activities to the permissions. checkAccess is called with the
   * $operation as defined in the routing.yml file.
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account): \Drupal\Core\Access\AccessResultForbidden|\Drupal\Core\Access\AccessResultNeutral|AccessResult|\Drupal\Core\Access\AccessResultAllowed|\Drupal\Core\Access\AccessResultInterface {
    $access = AccessResult::forbidden();
    switch ($operation) {
      case 'view':
        if ($account->hasPermission('administer own offers')) {
          $access = AccessResult::allowedIf($account->id() ==
            $entity->getOwnerId())->cachePerUser()->addCacheableDependency($entity);
        }
        break;
      case 'update': // Shows the edit buttons in operations
        if ($account->hasPermission('administer own offers')) {
          $access = AccessResult::allowedIf($account->id() ==
            $entity->getOwnerId())->cachePerUser()->addCacheableDependency($entity);
        }
        break;
      case 'edit': // Lets me in on the edit-page of the entity
        if ($account->hasPermission('administer own offers')) {
          $access = AccessResult::allowedIf($account->id() ==
            $entity->getOwnerId())->cachePerUser()->addCacheableDependency($entity);
        }
        break;
      case 'delete': // Shows the delete buttons + access to delete thi entity
        if ($account->hasPermission('administer own offers')) {
          $access = AccessResult::allowedIf($account->id() ==
            $entity->getOwnerId())->cachePerUser()->addCacheableDependency($entity);
        }
        break;
    }
    return $access;
  }

  /**
   * {@inheritdoc}
   *
   * Separate from the checkAccess because the entity does not yet exist,
  it
   * will be created during the 'add' process.
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL): \Drupal\Core\Access\AccessResultReasonInterface|AccessResult|\Drupal\Core\Access\AccessResultInterface {
    return AccessResult::allowedIfHasPermission($account, 'administer own offers');
  }

}
