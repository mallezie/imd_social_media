<?php

namespace Drupal\imd_social_media\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\State\StateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Defines a social menu block.
 *
 * @Block(
 *  id = "imd_social_media_block",
 *  admin_label = @Translation("Social media"),
 * )
 */
class SocialMediaBlock extends BlockBase implements ContainerFactoryPluginInterface {

    /**
     * The state.
     *
     * @var \Drupal\Core\State\StateInterface
     */
    protected $state;

    /**
     * Constructor.
     *
     * @param array $configuration
     *   A configuration array containing information about the plugin instance.
     * @param string $plugin_id
     *   The plugin_id for the plugin instance.
     * @param mixed $plugin_definition
     *   The plugin implementation definition.
     * @param \Drupal\Core\State\StateInterface $state
     *   The state.
     */
    public function __construct(array $configuration, $plugin_id, $plugin_definition, StateInterface $state) {
        parent::__construct($configuration, $plugin_id, $plugin_definition);
        $this->state = $state;
    }

    /**
     * {@inheritdoc}
     */
    public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
        return new static(
            $configuration,
            $plugin_id,
            $plugin_definition,
            $container->get('state')
        );
    }

    /**
     * {@inheritdoc}
     */
    public function build() {
        return [
            '#theme' => 'social-media',
            '#facebook_url' => $this->state->get('imd_social_media.facebook_url'),
            '#twitter_url' => $this->state->get('imd_social_media.twitter_url'),
            '#linkedin_url' => $this->state->get('imd_social_media.linkedin_url'),
            '#instagram_url' => $this->state->get('imd_social_media.instagram_url'),
        ];
    }

}
