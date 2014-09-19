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
<div class="panel-heading">
  <h4 class="panel-title">
    <a data-toggle="collapse" data-parent="#albergues-accordion" href="#<?php print $row->nid; ?>"><?php print $output; ?></a>
  <?php if ($row->field_field_camino_de_santiago[0]['raw']['value']): ?>
  <?php print '<img src="' . base_path() . path_to_theme() . '/images/iconos/Santiago.png" width="32" title="Camino de Santiago" />'; ?>
  <?php endif; ?>
  </h4>
</div>
