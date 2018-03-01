<?php

namespace Drupal\facebook\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'Facebook' Block.
 *
 * @Block(
 *   id = "facebook_block",
 *   admin_label = @Translation("Facebook block"),
 *   category = @Translation("Facebook block"),
 * )
 */
class FacebookBlock extends BlockBase {

    /**
     * {@inheritdoc}
     */
    public function build() {

        $config = \Drupal::config('facebook.settings');

        return array(
            '#theme' => 'block-facebook',
            '#class' => 'facebook_wrapper',
            '#attached' => array(
                'library' => array(
                    'facebook/facebook-libraries',
                ),
            ),
            '#facebook_conf' => $config,
        );
    }

}