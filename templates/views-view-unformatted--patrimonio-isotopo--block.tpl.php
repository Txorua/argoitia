<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>
<?php //dsm($variables); ?>
<?php if (!empty($title)): ?>
  <h3><?php print $title; ?></h3>
<?php endif; ?>
<?php foreach ($rows as $id => $row): ?>
<?php
  global $language;
  $tid = '';
  $link = '';
  if (!empty($variables['view']->result[$id]->field_field_categoria_monumento)) {
    $tid = $variables['view']->result[$id]->field_field_categoria_monumento[0]['raw']['tid'];
  }
  $link = drupal_get_path_alias('node/' . $variables['view']->result[$id]->nid, $language->language);
  //dsm($link);
?>
<div<?php if ($classes_array[$id]) { print ' class="' . $classes_array[$id] .' col-xs-12 col-sm-4 col-md-4 col-lg-4 isotope-item tid-' . $tid . '"';  } ?>>
  <div class="">
  <a href="/<?php print $language->language . '/' . $link; ?>">
    <?php print $row; ?>
    </a>
  </div>
</div>
<?php endforeach; ?>
