<?php 
/**
 * Implements theme_menu_link()
 *
 * This function modifies the output of the menu links to be compatible with Foundation's
 * top navigation bar.
 * 
 * @param $variables The list of menu links that will be sent in.
 */
 function galvinsteele_menu_link(array $variables) {
  $element = $variables['element'];
  $sub_menu = '';
  $sub_menu_class = '';

  if ($element['#below']) {
    $sub_menu = drupal_render($element['#below']);
    array_push($element['#attributes']['class'], "has-dropdown"); 
  }
  array_push($element['#attributes']['class'], "large-2", "column");
  $sub_menu_class = drupal_attributes($element['#attributes']);
  $output = l($element['#title'], $element['#href'], array($element['#localized_options']));
  return '<li' . $sub_menu_class . '>' . $output . $sub_menu . "</li>\n";
 }

/**
 * Implements theme_menu_link()
 *
 * This function modifies the output of the menu tree to be compatible with Foundation's
 * top navigation bar.
 * 
 * @param $variables The list of menu links that will be sent in.
 */
function galvinsteele_menu_tree__navigation(array $variables){
  $nav_class = drupal_attributes(array('class' => array("main-nav")));
  $ul_class = drupal_attributes(array('class' => array("row")));
  $html = "<nav ". $nav_class ."><ul" . $ul_class . ">" . $variables['tree'] . "</ul></nav>";
  return $html;
}