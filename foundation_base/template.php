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

    /* If the following plugins are checked on in the theme settings, include the
  script. */
  // Abide: http://foundation.zurb.com/docs/components/abide.html
  drupal_add_js($theme_path . '/js/foundation/foundation.abide.js', $js_options);
  
  // Alerts: http://foundation.zurb.com/docs/components/alert-boxes.html
  drupal_add_js($theme_path . '/js/foundation/foundation.alerts.js', $js_options);
  
  // Clearing: http://foundation.zurb.com/docs/components/clearing.html
  drupal_add_js($theme_path . '/js/foundation/foundation.clearing.js', $js_options);
  
  // Cookie: Optional, only if Joyride is selected.
  drupal_add_js($theme_path . '/js/foundation/foundation.cookie.js', $js_options);
  
  // Dropdown: http://foundation.zurb.com/docs/components/dropdown.html
  drupal_add_js($theme_path . '/js/foundation/foundation.dropdown.js', $js_options);
  
  // Forms: http://foundation.zurb.com/docs/components/custom-forms.html
  drupal_add_js($theme_path . '/js/foundation/foundation.forms.js', $js_options);
  
  // Interchange: http://foundation.zurb.com/docs/components/interchange.html
  drupal_add_js($theme_path . '/js/foundation/foundation.interchange.js', $js_options);
  
  // Joyride: http://foundation.zurb.com/docs/components/joyride.html
  drupal_add_js($theme_path . '/js/foundation/foundation.joyride.js', $js_options);
  
  // Magellan: http://foundation.zurb.com/docs/components/magellan.html
  drupal_add_js($theme_path . '/js/foundation/foundation.magellan.js', $js_options);
  
  // Orbit: http://foundation.zurb.com/docs/components/orbit.html
  drupal_add_js($theme_path . '/js/foundation/foundation.orbit.js', $js_options);
  
  // Orbit: http://foundation.zurb.com/docs/components/orbit.html
  drupal_add_js($theme_path . '/js/foundation/foundation.orbit.js', $js_options);
  
  // Placeholder: Support for HTML 5 placeholder attributes in older browsers.
  drupal_add_js($theme_path . '/js/foundation/foundation.placeholder.js', $js_options);
  
  // Reveal: http://foundation.zurb.com/docs/components/reveal.html
  drupal_add_js($theme_path . '/js/foundation/foundation.reveal.js', $js_options);
  
  // Section: http://foundation.zurb.com/docs/components/section.html
  drupal_add_js($theme_path . '/js/foundation/foundation.section.js', $js_options);
  
  // Tooltips: http://foundation.zurb.com/docs/components/tooltips.html
  drupal_add_js($theme_path . '/js/foundation/foundation.tooltips.js', $js_options);
  
  // Topbar: http://foundation.zurb.com/docs/components/top-bar.html
  drupal_add_js($theme_path . '/js/foundation/foundation.topbar.js', $js_options);

  // Respond: https://github.com/scottjehl/Respond
  drupal_add_js($theme_path . '/js/respond.min.js');
}
