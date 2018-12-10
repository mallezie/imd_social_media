<?php

namespace Drupal\imd_social_media\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class SettingsForm extends FormBase
{

    public function getFormId()
    {
        return 'imd_social_media_settings_form';
    }

    public function buildForm(array $form, FormStateInterface $form_state)
    {
        $form['facebook_url'] = [
            '#type' => 'url',
            '#title' => 'Facebook URL',
            '#default_value' => \Drupal::state()->get('imd_social_media.facebook_url'),
        ];
        $form['twitter_url'] = [
            '#type' => 'url',
            '#title' => 'Twitter URL',
            '#default_value' => \Drupal::state()->get('imd_social_media.twitter_url'),
        ];
        $form['linkedin_url'] = [
            '#type' => 'url',
            '#title' => 'Linkedin URL',
            '#default_value' => \Drupal::state()->get('imd_social_media.linkedin_url'),
        ];
        $form['instagram_url'] = [
            '#type' => 'url',
            '#title' => 'Instagram URL',
            '#default_value' => \Drupal::state()->get('imd_social_media.instagram_url'),
        ];
        $form['submit'] = [
            '#type' => 'submit',
            '#value' => 'Opslaan',
            '#button_type' => 'primary',
        ];

        return $form;
    }

    public function submitForm(array &$form, FormStateInterface $form_state)
    {
        \Drupal::state()->set('imd_social_media.facebook_url', $form_state->getValue('facebook_url'));
        \Drupal::state()->set('imd_social_media.twitter_url', $form_state->getValue('twitter_url'));
        \Drupal::state()->set('imd_social_media.linkedin_url', $form_state->getValue('linkedin_url'));
        \Drupal::state()->set('imd_social_media.instagram_url', $form_state->getValue('instagram_url'));
        \Drupal::messenger()->addMessage('De Social media links zijn succesvol opgeslagen');
    }
}
