<?php

namespace Drupal\druframe_offer\Commands;

use Drush\Commands\DrushCommands;
use Drupal\druframe_offer\SeedData\SeedDataGenerator;
use Drush\Drush;

/**
 * Class SeedGeneratorCommand
 * @package Drupal\druframe_offer\Commands
 */
class SeedGeneratorCommand extends DrushCommands {

  /**
   * Runs the OfferCreateSeeds command. Will create all data for
   * the Offer platform.
   *
   * @command druframe-offer-create-seeds
   * @aliases druframe-offers
   * @usage drush druframe-offer-create-seeds
   * Display 'Seed data created'
   * @throws \Drupal\Core\Entity\EntityStorageException
   */
  public function OfferCreateSeeds() {
    $seed = new SeedDataGenerator();
    $count = $seed->Generate('user');
    Drush::output()->writeln($count . ' user(s) created');
  }
}
