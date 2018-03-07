/**
 * @file
 */

(function ($, Drupal, drupalSettings) {

    'use strict';

    Drupal.behaviors.facebookConnect = {
        attach: function (context, settings) {

            function statusChangeCallback(response) {
                if (response.status === 'connected') {
                    testAPI();

                } else if (response.status === 'not_authorized') {
                    FB.login(function (response) {
                        statusChangeCallback2(response);
                    }, {scope: 'public_profile,email'});

                } else {
                    //
                }
            }

            function statusChangeCallback2(response) {
                if (response.status === 'connected') {
                    testAPI();

                } else if (response.status === 'not_authorized') {
                    FB.login();

                } else {
                    //
                }
            }

            function checkLoginState() {
                FB.getLoginStatus(function (response) {
                    statusChangeCallback(response);
                });
            }

            function testAPI() {
                console.log('Welcome!  Fetching your information.... ');
                FB.api('/me', function (response) {
                    console.log('Successful login for: ' + response.name);
                    document.getElementById('status').innerHTML =
                        'Thanks for logging in, ' + response.name + '!';
                });
            }

            window.fbAsyncInit = function() {
                const appId = drupalSettings.facebook.facebook_app_id;
                if (appId) {
                    FB.init({
                        appId: appId,
                        cookie: true,
                        version: 'v2.2'
                    });
                    checkLoginState();
                }
            };

            (function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) {
                    return;
                }
                js = d.createElement(s);
                js.id = id;
                js.src = "https://connect.facebook.net/en_US/sdk.js";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        }
    };
})(jQuery, Drupal, drupalSettings);