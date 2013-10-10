<?php
/**
 * @file
 * This file contains functionality that the theme requires.
 */

/**
 * Implements hook_js_alter().
 */
function foundation_base_js_alter(&$javascript) {
  // Use the latest version of jQuery so we can use Foundation.
  $javascript['misc/jquery.js']['data'] = drupal_get_path('theme', 'webster') . '/js/vendor/jquery.js';
  $javascript['misc/jquery.js']['version'] = '1.10.2';
}

/**
 * Implements hook_preprocess_page().
 */
function foundation_base_preprocess_page(&$variables) {
  global $base_url, $base_path;

  // These are required by Foundation to be in the footer.
  $theme_path = $base_url . $base_path . drupal_get_path('theme', 'webster');

  // Add respond.js for IE 8 grid support.
  drupal_add_js($theme_path . '/js/respond.min.js');

  /* Start off with the inline JS for Foundation, because it needs to be
  included before all other Foundation JS. */
  $js_options = array(
    'type' => 'inline',
    'scope' => 'footer',
    'group' => JS_THEME,
  );

  // Add inline JS from Foundation that determines if Zepto or jQuery should be loaded.
  drupal_add_js('document.write("<script src=" + ("__proto__" in {} ? "' . $theme_path . '/js/vendor/zepto" : "") + ".js><\/script>")', $js_options);

  // Change the type to file and include the Foundation base JS file.
  $js_options['type'] = 'file';
  drupal_add_js($theme_path . '/js/foundation.min.js', $js_options);

  // Include the Foundation JS plugins under here.
}
