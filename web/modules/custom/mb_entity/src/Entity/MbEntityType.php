<?php

namespace Drupal\mb_entity\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBundleBase;

/**
 * Defines the Mb entity type configuration entity.
 *
 * @ConfigEntityType(
 *   id = "mb_entity_type",
 *   label = @Translation("Mb entity type"),
 *   label_collection = @Translation("Mb entity types"),
 *   label_singular = @Translation("mb entity type"),
 *   label_plural = @Translation("mb entities types"),
 *   label_count = @PluralTranslation(
 *     singular = "@count mb entities type",
 *     plural = "@count mb entities types",
 *   ),
 *   handlers = {
 *     "form" = {
 *       "add" = "Drupal\mb_entity\Form\MbEntityTypeForm",
 *       "edit" = "Drupal\mb_entity\Form\MbEntityTypeForm",
 *       "delete" = "Drupal\Core\Entity\EntityDeleteForm",
 *     },
 *     "list_builder" = "Drupal\mb_entity\MbEntityTypeListBuilder",
 *     "route_provider" = {
 *       "html" = "Drupal\Core\Entity\Routing\AdminHtmlRouteProvider",
 *     }
 *   },
 *   admin_permission = "administer mb entity types",
 *   bundle_of = "mb_entity",
 *   config_prefix = "mb_entity_type",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid"
 *   },
 *   links = {
 *     "add-form" = "/admin/structure/mb_entity_types/add",
 *     "edit-form" = "/admin/structure/mb_entity_types/manage/{mb_entity_type}",
 *     "delete-form" = "/admin/structure/mb_entity_types/manage/{mb_entity_type}/delete",
 *     "collection" = "/admin/structure/mb_entity_types"
 *   },
 *   config_export = {
 *     "id",
 *     "label",
 *     "uuid",
 *   }
 * )
 */
class MbEntityType extends ConfigEntityBundleBase {

  /**
   * The machine name of this mb entity type.
   *
   * @var string
   */
  protected $id;

  /**
   * The human-readable name of the mb entity type.
   *
   * @var string
   */
  protected $label;

}
