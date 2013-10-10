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

  /* Setup the JS options array and start off with type 'inline' for the 
  jQuery/Zepto check below. */
  $js_options = array(
    'type' => 'inline',
    'scope' => 'footer',
    'group' => JS_THEME,
  );

  /* Add inline JS from Foundation that determines if Zepto or jQuery should be
  loaded. Since we're already loading jQuery, just test to load Zepto. */
  drupal_add_js('document.write("<script src=" + ("__proto__" in {} ? "' . $theme_path . '/js/vendor/zepto" : "") + ".js><\/script>")', $js_options);

  // Change the type to 'file' and include the Foundation base JS file.
  $js_options['type'] = 'file';
  drupal_add_js($theme_path . '/js/foundation.min.js', $js_options);

  /* If the following plugins are checked on in the theme settings, include the
  script. */
  // Abide: http://foundation.zurb.com/docs/components/abide.html
  if (theme_get_setting('foundation_base_js_abide')) {
    drupal_add_js($theme_path . '/js/foundation/foundation.abide.js', $js_options);
  }
  // Alerts: http://foundation.zurb.com/docs/components/alert-boxes.html
  if (theme_get_setting('foundation_base_js_alerts')) {
    drupal_add_js($theme_path . '/js/foundation/foundation.alerts.js', $js_options);
  }
  // Clearing: http://foundation.zurb.com/docs/components/clearing.html
  if (theme_get_setting('foundation_base_js_clearing')) {
    drupal_add_js($theme_path . '/js/foundation/foundation.clearing.js', $js_options);
  }
  // Cookie: Optional, only if Joyride is selected.
  if (theme_get_setting('foundation_base_js_cookie')) {
    drupal_add_js($theme_path . '/js/foundation/foundation.cookie.js', $js_options);
  }
  // Dropdown: http://foundation.zurb.com/docs/components/dropdown.html
  if (theme_get_setting('foundation_base_js_dropdown')) {
    drupal_add_js($theme_path . '/js/foundation/foundation.dropdown.js', $js_options);
  }
  // Forms: http://foundation.zurb.com/docs/components/custom-forms.html
  if (theme_get_setting('foundation_base_js_forms')) {
    drupal_add_js($theme_path . '/js/foundation/foundation.forms.js', $js_options);
  }
  // Interchange: http://foundation.zurb.com/docs/components/interchange.html
  if (theme_get_setting('foundation_base_js_interchange')) {
    drupal_add_js($theme_path . '/js/foundation/foundation.interchange.js', $js_options);
  }
  // Joyride: http://foundation.zurb.com/docs/components/joyride.html
  if (theme_get_setting('foundation_base_js_joyride')) {
    drupal_add_js($theme_path . '/js/foundation/foundation.joyride.js', $js_options);
  }
  // Magellan: http://foundation.zurb.com/docs/components/magellan.html
  if (theme_get_setting('foundation_base_js_magellan')) {
    drupal_add_js($theme_path . '/js/foundation/foundation.magellan.js', $js_options);
  }
  // Orbit: http://foundation.zurb.com/docs/components/orbit.html
  if (theme_get_setting('foundation_base_js_orbit')) {
    drupal_add_js($theme_path . '/js/foundation/foundation.orbit.js', $js_options);
  }
  // Orbit: http://foundation.zurb.com/docs/components/orbit.html
  if (theme_get_setting('foundation_base_js_orbit')) {
    drupal_add_js($theme_path . '/js/foundation/foundation.orbit.js', $js_options);
  }
  // Placeholder: Support for HTML 5 placeholder attributes in older browsers.
  if (theme_get_setting('foundation_base_js_placeholder')) {
    drupal_add_js($theme_path . '/js/foundation/foundation.placeholder.js', $js_options);
  }
  // Reveal: http://foundation.zurb.com/docs/components/reveal.html
  if (theme_get_setting('foundation_base_js_reveal')) {
    drupal_add_js($theme_path . '/js/foundation/foundation.reveal.js', $js_options);
  }
  // Section: http://foundation.zurb.com/docs/components/section.html
  if (theme_get_setting('foundation_base_js_section')) {
    drupal_add_js($theme_path . '/js/foundation/foundation.section.js', $js_options);
  }
  // Tooltips: http://foundation.zurb.com/docs/components/tooltips.html
  if (theme_get_setting('foundation_base_js_tooltips')) {
    drupal_add_js($theme_path . '/js/foundation/foundation.tooltips.js', $js_options);
  }
  // Topbar: http://foundation.zurb.com/docs/components/top-bar.html
  if (theme_get_setting('foundation_base_js_topbar')) {
    drupal_add_js($theme_path . '/js/foundation/foundation.topbar.js', $js_options);
  }
  // Respond: https://github.com/scottjehl/Respond
  if (theme_get_setting('foundation_base_js_respond')) {
    drupal_add_js($theme_path . '/js/respond.min.js');
  }
}

/**
 * Implements hook_form_FORMID_alter().
 */
function foundation_base_form_system_theme_settings_alter(&$form, &$form_state) {
  // Add the fields to the theme settings form.
  // $form['theme_settings']['your_option'] = array(
  //   '#type' => 'checkbox',
  //   '#title' => t('Your Option'),
  //   '#default_value' => theme_get_setting('your_option'),
  // );
}
