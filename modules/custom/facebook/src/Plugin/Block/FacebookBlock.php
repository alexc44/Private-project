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

        $config = $this->getConfiguration();

        return array(
            '#markup' => 'okokok',
        );
    }

}