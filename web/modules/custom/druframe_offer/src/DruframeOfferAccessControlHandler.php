<?php

namespace Drupal\druframe_offer;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;

/**
 * Defines the access control handler for the druframe offer entity type.
 */
class DruframeOfferAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {

    return match ($operation) {
      'view' => AccessResult::allowedIfHasPermission($account, 'view druframe offer'),
      'update' => AccessResult::allowedIfHasPermissions(
        $account,
        ['edit druframe offer', 'administer druframe offer'],
        'OR',
      ),
      'delete' => AccessResult::allowedIfHasPermissions(
        $account,
        ['delete druframe offer', 'administer druframe offer'],
        'OR',
      ),
      default => AccessResult::neutral(),
    };

  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL): \Drupal\Core\Access\AccessResultReasonInterface|AccessResult|\Drupal\Core\Access\AccessResultInterface {
    return AccessResult::allowedIfHasPermissions(
      $account,
      ['create druframe offer', 'administer druframe offer'],
      'OR',
    );
  }

}
