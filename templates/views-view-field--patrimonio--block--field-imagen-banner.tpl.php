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
if (!empty($row->field_field_imagen_banner)) {
  //$img_url = file_create_url($row->field_field_imagen_banner[0]['raw']['uri']);
  $img_uri = $row->field_field_imagen_banner[0]['raw']['uri'];
  print '<p><img src="' . image_style_url('miniatura_80_ancho', $img_uri) .'" class="img-responsive" /></p>';
}
?>
<?php //print $output; ?>