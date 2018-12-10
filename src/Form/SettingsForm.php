<?php

namespace Drupal\imd_social_media\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\State\StateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class SettingsForm extends FormBase
{
    /**
     * The state.
     *
     * @var \Drupal\Core\State\StateInterface
     */
    protected $state;

    /**
     * Constructor.
     *
     * @param \Drupal\Core\State\StateInterface $state
     *   The state.
     */
    public function __construct(StateInterface $state) {
        $this->state = $state;
    }

    /**
     * {@inheritdoc}
     */
    public static function create(ContainerInterface $container) {
        return new static(
            $container->get('state')
        );
    }

    public function getFormId()
    {
        return 'imd_social_media_settings_form';
    }

    public function buildForm(array $form, FormStateInterface $form_state)
    {
        $form['facebook_url'] = [
            '#type' => 'url',
            '#title' => 'Facebook URL',
            '#default_value' => $this->state->get('imd_social_media.facebook_url'),
        ];
        $form['twitter_url'] = [
            '#type' => 'url',
            '#title' => 'Twitter URL',
            '#default_value' => $this->state->get('imd_social_media.twitter_url'),
        ];
        $form['linkedin_url'] = [
            '#type' => 'url',
            '#title' => 'Linkedin URL',
            '#default_value' => $this->state->get('imd_social_media.linkedin_url'),
        ];
        $form['instagram_url'] = [
            '#type' => 'url',
            '#title' => 'Instagram URL',
            '#default_value' => $this->state->get('imd_social_media.instagram_url'),
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
        $this->state->set('imd_social_media.facebook_url', $form_state->getValue('facebook_url'));
        $this->state->set('imd_social_media.twitter_url', $form_state->getValue('twitter_url'));
        $this->state->set('imd_social_media.linkedin_url', $form_state->getValue('linkedin_url'));
        $this->state->set('imd_social_media.instagram_url', $form_state->getValue('instagram_url'));
        \Drupal::messenger()->addMessage('De Social media links zijn succesvol opgeslagen');
    }
}
