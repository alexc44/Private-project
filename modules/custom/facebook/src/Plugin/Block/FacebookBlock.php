<?php

namespace Drupal\facebook\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'Facebook' Block.
 *
 * @Block(
 *   id = "facebook_block",
 *   admin_label = @Translation("Facebook block"),
 *   category = @Translation("Facebook World"),
 * )
 */
class FacebookBlock extends BlockBase {

    /**
     * {@inheritdoc}
     */
    public function build() {
        return array(
            '#theme' => 'facebook_template',
            '#class' => 'facebook_wrapper',
            '#attached' => array(
                'library' => array(
                    'facebook/facebook-libraries',
                ),
            ),
        );
    }

}