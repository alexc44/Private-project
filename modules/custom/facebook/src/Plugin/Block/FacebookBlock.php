<?php

namespace Drupal\facebook\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Facebook;

require_once DRUPAL_ROOT . '/modules/custom/facebook/Facebook/autoload.php';

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
        $appId = null;
        $appSecret = null;
        $config = \Drupal::config('facebook.settings');

        if ($config) {
            $appId = $config->get('facebook_app_id');
            $appSecret = $config->get('facebook_app_secret');
        }

        if ($appId && $appSecret) {
            $this->_connect_facebook(strval($appId), strval($appSecret));
        }

        return array(
            '#theme' => 'block-facebook',
            '#class' => 'facebook_wrapper',
            '#attached' => array(
                'library' => array(
                    'facebook/facebook-libraries',
                ),
            ),
        );
    }

    protected function _connect_facebook($appId, $appSecret) {
        $loginUrl = null;

        $fb = new Facebook\Facebook([
            'app_id' => $appId,
            'app_secret' => $appSecret,
            'default_graph_version' => 'v2.12',
        ]);

        $helper = $fb->getRedirectLoginHelper();

        //$loginUrl = $helper->getLoginUrl( 'http://drupalvm.test/modules/custom/facebook/login.php');

        return $loginUrl;
    }



}