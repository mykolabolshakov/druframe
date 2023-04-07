<?php

namespace Drupal\mb_entity\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Form controller for the mb entity entity edit forms.
 */
class MbEntityForm extends ContentEntityForm {

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $result = parent::save($form, $form_state);

    $entity = $this->getEntity();

    $message_arguments = ['%label' => $entity->toLink()->toString()];
    $logger_arguments = [
      '%label' => $entity->label(),
      'link' => $entity->toLink($this->t('View'))->toString(),
    ];

    switch ($result) {
      case SAVED_NEW:
        $this->messenger()->addStatus($this->t('New mb entity %label has been created.', $message_arguments));
        $this->logger('mb_entity')->notice('Created new mb entity %label', $logger_arguments);
        break;

      case SAVED_UPDATED:
        $this->messenger()->addStatus($this->t('The mb entity %label has been updated.', $message_arguments));
        $this->logger('mb_entity')->notice('Updated mb entity %label.', $logger_arguments);
        break;
    }

    $form_state->setRedirect('entity.mb_entity.canonical', ['mb_entity' => $entity->id()]);

    return $result;
  }

}
