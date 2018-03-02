/**
 * @file
 *
 */

(function ($, Drupal, drupalSettings) {

    'use strict';

    Drupal.behaviors.facebook = {};

    Drupal.behaviors.facebook.initFacebook =
        function() {
            window.fbAsyncInit = function() {
                FB.init({
                    appId            : '184014295543749',
                    autoLogAppEvents : true,
                    xfbml            : true,
                    version          : 'v2.12'
                });
            }

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

        };

        Drupal.behaviors.facebook.attach =
            function () {
                const script = Drupal.behaviors.facebook.initFacebook();
                $('.facebook-js').append(script);
            };

})(jQuery, Drupal, drupalSettings);