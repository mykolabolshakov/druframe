<?php

namespace Drupal\druframe_offer\SeedData;

use Drupal\user\Entity\User;

/**
 * Class SeedGenerator
 * @package Drupal\druframe_offer
 */
Class SeedDataGenerator {

  /**
   * Function to create the Seed data
   *
   * @param string $entity
   * The type of entity that needs to be created.
   *
   * @return int|null $count
   * The number of entities created.
   * @throws \Drupal\Core\Entity\EntityStorageException
   */
  public function Generate(string $entity): ?int {
    $count = 0;
    switch ($entity) {
      case 'user':
        // USER SEEDS
        $user = User::create();
        $user->setUsername('test');
        $user->setPassword('test');
        $user->setEmail('test@mail.com');
        $user->activate();
        $user->enforceIsNew();
        if($user->save()) {
          $count += 1;
          return $count;
        }
        break;

      default:
        return null;
    }
    return null;
  }
}
