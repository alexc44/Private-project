<?php

namespace Drupal\facebook\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Defines a form that configures forms module settings.
 */
class FacebookConfigurationForm extends ConfigFormBase {

    /**
     * {@inheritdoc}
     */
    public function getFormId() {
        return 'facebook_admin_settings';
    }

    /**
     * {@inheritdoc}
     */
    protected function getEditableConfigNames() {
        return [
            'facebook.settings',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(array $form, FormStateInterface $form_state) {
        $config = $this->config('facebook.settings');

        $form['facebook_app'] = array(
            '#type' => 'fieldset',
            '#title' => $this
                ->t('Facebook app configuration'),
        );
        $form['facebook_app']['facebook_app_id'] = array(
            '#type' => 'textfield',
            '#title' => $this->t('Facebook app id'),
            '#default_value' => $config->get('facebook_app_id'),
        );

        $form['facebook_app']['facebook_app_secret'] = array(
            '#type' => 'textfield',
            '#title' => $this->t('Facebook app secret'),
            '#default_value' => $config->get('facebook_app_secret'),
        );
        return parent::buildForm($form, $form_state);
    }

    /**
     * {@inheritdoc}
     */
    public function submitForm(array &$form, FormStateInterface $form_state) {
        $values = $form_state->getValues();
        $this->config('facebook.settings')
            ->set('your_message', $values['your_message'])
            ->save();
    }

}