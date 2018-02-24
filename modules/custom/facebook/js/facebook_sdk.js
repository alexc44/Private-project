/**
 * @file
 *
 */

(function ($, Drupal, drupalSettings) {

    'use strict';


    Drupal.behaviors.jsFacebook = {
        attach: function (context, settings) {
            $('facebook_wrapper').css('yellow');
        }
    };
})(jQuery, Drupal, drupalSettings);