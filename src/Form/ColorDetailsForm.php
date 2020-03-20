<?php

/**
 * @file
 * Contains \Drupal\d8learning\Form\ColorDetailsForm.
 */

namespace Drupal\d8learning\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class colordetailsForm.
 */
class ColorDetailsForm extends ConfigFormBase{
	
  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames()
  {
	return [
	  'd8learning.colordetails',
	];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId()
  {
	return 'color_details_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state)
  {
	$config = $this->config('d8learning.colordetails');
	$form['color_codes'] = [
	  '#type' => 'textarea',
	  '#title' => $this->t('Color Codes'),
	  '#description' => $this->t('Please enter the color codes.'),
	  '#default_value' => $config->get('color_codes'),
	];
	
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state)
  {
	$this->config('d8learning.colordetails')
		->set('color_codes', $form_state->getValue('color_codes'))
		->save();
	drupal_set_message(t('Your configurations saved successfully'));
  }
}