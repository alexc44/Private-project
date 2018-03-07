<?php
/**
 * @file
 * Contains \Drupal\facebook\Controller\FacebookController.
 */
namespace Drupal\facebook\Controller;

use Facebook;

require_once DRUPAL_ROOT . '/modules/custom/facebook/Facebook/autoload.php';

class FacebookController {

    public function facebookPage() {

        $appId = null;
        $appSecret = null;

        $config = \Drupal::config('facebook.settings');
        if ($config) {
            $appId = $config->get('facebook_app_id');
            $appSecret = $config->get('facebook_app_secret');
        }

        $fb = new Facebook\Facebook([
            'app_id' => $appId,
            'app_secret' => $appSecret,
            'default_graph_version' => 'v2.12',
        ]);

        $helper = $fb->getJavaScriptHelper();

        /*try {
            $accessToken = $helper->getAccessToken();
        } catch(Facebook\Exceptions\FacebookResponseException $e) {
            // When Graph returns an error
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch(Facebook\Exceptions\FacebookSDKException $e) {
            // When validation fails or other local issues
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }

        if (! isset($accessToken)) {
            echo 'No cookie set or no OAuth data could be obtained from cookie.';
            exit;
        }

        // Logged in
        echo '<h3>Access Token</h3>';
        var_dump($accessToken->getValue());*/

        /*$tempstore = \Drupal::service('user.private_tempstore')->get('facebook');
        $tempstore->set('access_token', (string) $accessToken);*/

        return array(
            '#type' => 'markup',
            '#markup' => t('Facebook!'),
        );
    }
}