<?php
/**
 * @file
 * This file contains functionality that the Foundation Base theme requires.
 */

/**
 * Implements hook_js_alter().
 */
function foundation_base_js_alter(&$javascript) {
  // Use the latest version of jQuery so we can use Foundation.
  $javascript['misc/jquery.js']['data'] = drupal_get_path('theme', 'foundation_base') . '/js/vendor/jquery.js';
  $javascript['misc/jquery.js']['version'] = '1.10.2';
}

/**
 * Implements hook_preprocess_page().
 */
function foundation_base_preprocess_page(&$variables) {
  global $base_url, $base_path;

  // Create the theme path to use in JS include paths.
  $theme_path = $base_url . $base_path . drupal_get_path('theme', 'foundation_base');

  /* Add inline JS from Foundation that determines if Zepto or jQuery should be
  loaded. Since we're already loading jQuery, just test to load Zepto. */
  drupal_add_js('document.write("<script src=" + ("__proto__" in {} ? "' . $theme_path . '/js/vendor/zepto" : "") + ".js><\/script>")', array(
    'type' => 'inline',
    'scope' => 'footer',
    'group' => JS_THEME,
    ));

  // Setup the JS options array for all following file includes.
  $js_options = array(
    'type' => 'file',
    'scope' => 'footer',
    'group' => JS_THEME,
  );

  // Include the Foundation base JS file.
  drupal_add_js($theme_path . '/js/foundation.min.js', $js_options);

  drupal_add_js('$(document).foundation();', array(
    'type' => 'inline',
    'scope' => 'footer',
    'group' => JS_THEME,
  ));

  /* If the following plugins are checked on in the theme settings, include 
  their script. */
  $scripts = array('abide','alerts','clearing','cookie','dropdown','forms','interchange','joyride','magellan','orbit','placeholder','reveal','section','tooltips','topbar',
  );

  /* This looks for the theme setting toggle for each of the script names 
  listed above and includes the file if the toggle is on. */
  foreach ($scripts as $script) {
    if (theme_get_setting('foundation_base_js_' . $script)) {
      drupal_add_js($theme_path . '/js/foundation/foundation.' . $script . '.js', $js_options);
    }
  }

  /* Add respond.min.js if it's toggled on. This one is separate due to it's
  different name structure and location. */
  if (theme_get_setting('foundation_base_js_respond')) {
    drupal_add_js($theme_path . '/js/respond.min.js', $js_options);
  }
}
