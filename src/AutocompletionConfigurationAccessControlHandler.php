<?php

/**
 * @file
 *
 * Sponsored by: www.drupal-addict.com
 */

namespace Drupal\search_autocomplete;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Defines an access controller for the autocompletion_configuration entity.
 *
 * We set this class to be the access controller in Robot's entity annotation.
 *
 * @see \Drupal\search_autocomplete\Entity\Robot
 *
 * @ingroup search_autocomplete
 */
class AutocompletionConfigurationAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  public function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    if ($operation == 'update' && !$entity->getEditable()) {
      return AccessResult::forbidden()->cacheUntilEntityChanges($entity);
    }
    if ($operation == 'delete' && !$entity->getDeletable()) {
      return AccessResult::forbidden()->cacheUntilEntityChanges($entity);
    }
    return parent::checkAccess($entity, $operation, $account);
  }
}
