<?php

/**
 * @file
 * This template is used to print a single field in a view.
 *
 * It is not actually used in default Views, as this is registered as a theme
 * function which has better performance. For single overrides, the template is
 * perfectly okay.
 *
 * Variables available:
 * - $view: The view object
 * - $field: The field handler object that can process the input
 * - $row: The raw SQL result that can be used
 * - $output: The processed output that will normally be used.
 *
 * When fetching output from the $row, this construct should be used:
 * $data = $row->{$field->field_alias}
 *
 * The above will guarantee that you'll always get the correct data,
 * regardless of any changes in the aliasing that might happen if
 * the view is modified.
 */
?>

<?php
//http://drupal.stackexchange.com/questions/79037/get-translated-term-name/81047#81047
//
$tree = taxonomy_get_tree($row->taxonomy_term_data_vid); // Your taxonomy id
foreach ($tree as $term) {
  if (module_exists('i18n_taxonomy') && ($term->tid == $row->tid)) { //To not break your site if module is not installed
    $term = i18n_taxonomy_localize_terms($term); // The important part!
    $output = '<a href="#filter=.tid-' . $row->tid . '">' . $term->name . '</a>';
  }
  //print l($term->name, 'taxonomy/term/' . $term->tid); //print the terms
}
//}
?>
<?php print $output; ?>
  
