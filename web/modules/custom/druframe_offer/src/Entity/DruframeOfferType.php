<?php

namespace Drupal\druframe_offer\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBundleBase;

/**
 * Defines the DruFrame Offer type configuration entity.
 *
 * @ConfigEntityType(
 *   id = "druframe_offer_type",
 *   label = @Translation("DruFrame Offer type"),
 *   label_collection = @Translation("DruFrame Offer types"),
 *   label_singular = @Translation("druframe offer type"),
 *   label_plural = @Translation("druframe offers types"),
 *   label_count = @PluralTranslation(
 *     singular = "@count druframe offers type",
 *     plural = "@count druframe offers types",
 *   ),
 *   handlers = {
 *     "form" = {
 *       "add" = "Drupal\druframe_offer\Form\DruframeOfferTypeForm",
 *       "edit" = "Drupal\druframe_offer\Form\DruframeOfferTypeForm",
 *       "delete" = "Drupal\Core\Entity\EntityDeleteForm",
 *     },
 *     "list_builder" = "Drupal\druframe_offer\DruframeOfferTypeListBuilder",
 *     "route_provider" = {
 *       "html" = "Drupal\Core\Entity\Routing\AdminHtmlRouteProvider",
 *     }
 *   },
 *   admin_permission = "administer druframe offer types",
 *   bundle_of = "druframe_offer",
 *   config_prefix = "druframe_offer_type",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid"
 *   },
 *   links = {
 *     "add-form" = "/admin/structure/druframe_offer_types/add",
 *     "edit-form" = "/admin/structure/druframe_offer_types/manage/{druframe_offer_type}",
 *     "delete-form" = "/admin/structure/druframe_offer_types/manage/{druframe_offer_type}/delete",
 *     "collection" = "/admin/structure/druframe_offer_types"
 *   },
 *   config_export = {
 *     "id",
 *     "label",
 *     "uuid",
 *   }
 * )
 */
class DruframeOfferType extends ConfigEntityBundleBase {

  /**
   * The machine name of this druframe offer type.
   *
   * @var string
   */
  protected $id;

  /**
   * The human-readable name of the druframe offer type.
   *
   * @var string
   */
  protected $label;

}
