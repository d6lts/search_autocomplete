<?php

/**
 * @file
 * Contains Drupal\search_autocomplete\Form\AutocompletionConfigurationAddForm.
 */

namespace Drupal\search_autocomplete\Form;

use Drupal\Core\Form\FormStateInterface;

/**
 * Class AutocompletionConfigurationAddForm.
 *
 * Provides the add form for our autocompletion_configuration entity.
 *
 * @package Drupal\search_autocomplete\Form
 *
 * @ingroup search_autocomplete
 */
class AutocompletionConfigurationAddForm extends AutocompletionConfigurationFormBase {

  /**
   * Returns the actions provided by this form.
   *
   * For our add form, we only need to change the text of the submit button.
   *
   * @param array $form
   *   An associative array containing the structure of the form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   An associative array containing the current state of the form.
   *
   * @return array
   *   An array of supported actions for the current entity form.
   */
  protected function actions(array $form, FormStateInterface $form_state) {
    $actions = parent::actions($form, $form_state);
    $actions['submit']['#value'] = $this->t('Create Autocompletion Configuration');
    return $actions;
  }


  /**
   * Overrides Drupal\Core\Entity\EntityFormController::form() and
   * Drupal\search_autocomplete\Form\AutocompletionConfigurationFormBase::form()
   *
   * Builds the entity add form.
   *
   * @param array $form
   *   An associative array containing the structure of the form.
   * @param array $form_state
   *   An associative array containing the current state of the form.
   *
   * @return array
   *   An associative array containing the autocompletion_configuration
   *   add/edit form.
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    // Get anything we need from the base class.
    $form = parent::buildForm($form, $form_state);

    // Build the form.

    // Selector
    $form['selector'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('ID selector this configuration should apply to'),
      '#description' => 'Enter a valid query selector for this configuration. This should be an ID or a class targeting an input field.',
      '#default_value' => $this->entity->getSelector(),
      '#required' => TRUE,
    );

    // Return the form.
    return $form;
  }

}