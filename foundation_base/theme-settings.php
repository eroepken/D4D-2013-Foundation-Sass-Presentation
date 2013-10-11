<?php
/**
 * @file
 * This file contains the theme setting variables for Foundation Base.
 */

/**
 * Implements hook_form_FORMID_alter().
 */
function foundation_base_form_system_theme_settings_alter(&$form, &$form_state) {
  // List the scripts and their settings for use later.
  $scripts = array(
    'abide' => array(
      'name' => 'Abide',
      'url' => 'http://foundation.zurb.com/docs/components/abide.html',
      'description' => t('Foundation\'s form validation plugin.'),
      ),
    'alerts' => array(
      'name' => 'Alerts',
      'url' => 'http://foundation.zurb.com/docs/components/alert-boxes.html',
      'description' => t('A Javascript dependency for Foundation\'s alert boxes.'),
      ),
    'clearing' => array(
      'name' => 'Clearing',
      'url' => 'http://foundation.zurb.com/docs/components/clearing.html',
      'description' => t('A Foundation plugin to create responsive lightboxes.'),
      ),
    'cookie' => array(
      'name' => 'Cookie',
      'description' => t('A dependency for Joyride, if a Joyride component should be disabled for a period of time.'),
      ),
    'dropdown' => array(
      'name' => 'Dropdown',
      'url' => 'http://foundation.zurb.com/docs/components/dropdown.html',
      'description' => t('A plugin that allows a tooltip-type dropdown box to show on text or buttons.'),
      ),
    'forms' => array(
      'name' => 'Forms',
      'url' => 'http://foundation.zurb.com/docs/components/custom-forms.html',
      'description' => t('A dependency for form UI styles that don\'t work in all browsers.'),
      ),
    'interchange' => array(
      'name' => 'Interchange',
      'url' => 'http://foundation.zurb.com/docs/components/interchange.html',
      'description' => t('A Foundation plugin for responsive images.'),
      ),
    'joyride' => array(
      'name' => 'Joyride',
      'url' => 'http://foundation.zurb.com/docs/components/joyride.html',
      'description' => t('A plugin that allows a step-by-step type operation on a page.'),
      ),
    'magellan' => array(
      'name' => 'Magellan',
      'url' => 'http://foundation.zurb.com/docs/components/magellan.html',
      'description' => t('A navigation script that sticks to the top of the page and highlights links as the user scrolls down past anchors.'),
      ),
    'orbit' => array(
      'name' => 'Orbit',
      'url' => 'http://foundation.zurb.com/docs/components/orbit.html',
      'description' => t('Foundation\'s slideshow plugin.'),
      ),
    'placeholder' => array(
      'name' => 'Placeholder',
      'description' => t('A script that is necessary to support the HTML 5 placeholder attribute in browsers that don\'t support it.'),
      ),
    'reveal' => array(
      'name' => 'Reveal',
      'url' => 'http://foundation.zurb.com/docs/components/reveal.html',
      'description' => t('Foundation\'s modal box plugin.'),
      ),
    'section' => array(
      'name' => 'Section',
      'url' => 'http://foundation.zurb.com/docs/components/section.html',
      'description' => t('A tabular- or accordion-type plugin that allows sections to be hidden and shown.'),
      ),
    'tooltips' => array(
      'name' => 'Tooltips',
      'url' => 'http://foundation.zurb.com/docs/components/tooltips.html',
      'description' => t('Foundation\'s tooltip plugin.'),
      ),
    'topbar' => array(
      'name' => 'Topbar',
      'url' => 'http://foundation.zurb.com/docs/components/top-bar.html',
      'description' => t('A script that gives dropdown menu functionality and responsive functionality for a navigation bar.'),
      ),
    'respond' => array(
      'name' => 'Respond',
      'url' => 'https://github.com/scottjehl/Respond',
      'description' => t('A polyfill that gives support for responsive layouts in browsers that don\'t support media queries.'),
      ),
  );

  /* Get the setting before we start printing the checkboxes, due to some
  scripts depending on others. */
  foreach ($scripts as $key => $script) {
    $scripts[$key]['value'] = theme_get_setting('foundation_base_js_' . $key);
  }

  /* Setup the Javascript Plugins container, which holds the toggles for
  Foundation and non-Foundation scripts. */
  $form['foundation_js'] = array(
    '#type' => 'fieldset',
    '#title' => t('Javascript Plugins'),
    '#description' => t('Select which Javascript plugins you would like to have included on front end pages. Click on the script name to read the documentation. (The scripts toggled here will be included on every page load on the front end. If you only want to include certain scripts on certain pages, add the includes in a sub theme or module.)'),
    '#collapsible' => FALSE,
    '#collapsed' => FALSE,
    '#weight' => 0,
  );

  // Go through the scripts and add each of their toggles to the form.
  foreach ($scripts as $key => $script) {
    // Set the title to just the script name unless a url is present.
    $title = t($script['name']);
    if(isset($script['url'])) {
      $title = l($title, $script['url'], array('attributes' => array('target' => '_blank')));
    }

    // Add the checkbox to the form.
    $form['foundation_js']['foundation_base_js_' . $key] = array(
      '#type' => 'checkbox',
      '#title' => $title,
      '#default_value' => $script['value'],
    );

    // If the script settings contain a description, add it under the toggle.
    if (!empty($script['description'])) {
      $form['foundation_js']['foundation_base_js_' . $key]['#description'] = $script['description'];
    }
  }
}