<?php

namespace Drupal\imd_social_media\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Defines a social menu block.
 *
 * @Block(
 *  id = "imd_social_media_block",
 *  admin_label = @Translation("Social media"),
 * )
 */
class SocialMediaBlock extends BlockBase {

    /**
     * {@inheritdoc}
     */
    public function build() {
        return [
            '#theme' => 'social-media',
            '#facebook_url' => \Drupal::state()->get('imd_social_media.facebook_url')
        ];
    }

}
