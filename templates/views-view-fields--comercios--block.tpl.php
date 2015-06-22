
<?php

/**
 * @file
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->wrapper_prefix: A complete wrapper containing the inline_html to use.
 *   - $field->wrapper_suffix: The closing tag for the wrapper.
 *   - $field->separator: an optional separator that may appear before a field.
 *   - $field->label: The wrap label text to use.
 *   - $field->label_html: The full HTML of the label to use including
 *     configured element type.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */
?>
<div class="col-xs-12">
  <div class="panel panel-default vcard">

    <div class="panel-heading">
      <h4 class="panel-title fn">
        <a data-toggle="collapse" data-parent="#comercios-accordion" href="#comercios-accordion-<?php print $row->nid; ?>"><?php print $fields['title_field']->content; ?></a>
      </h4>
    </div>

    <div id="comercios-accordion-<?php print $row->nid; ?>" class="panel-collapse in">
      <div class="panel-body">
      <?php if ($fields['field_descripcion']->content): ?>
      <div class="h4 breadcrumb">
        <?php print $fields['field_descripcion']->content; ?>
      </div>
      <?php endif; ?>
      <?php if ($row->field_field_direccion): ?>
        <div class="h4">
          <p class="street-address"><?php print $row->field_field_direccion[0]['raw']['thoroughfare']; ?></p>
          <p><span class="postal-code"><?php print $row->field_field_direccion[0]['raw']['postal_code']; ?></span> &mdash; <span class="locality"><?php print $row->field_field_direccion[0]['raw']['locality']; ?></span></p>
          <p class="tel" title="<?php print $row->field_field_direccion[0]['raw']['phone_number']; ?>"><?php print $row->field_field_direccion[0]['raw']['phone_number']; ?></p>
          <p class="fax" title="<?php print $row->field_field_direccion[0]['raw']['fax_number']; ?>"><?php print $row->field_field_direccion[0]['raw']['fax_number']; ?></p>
          <p class="tel" title="<?php print $row->field_field_direccion[0]['raw']['mobile_number']; ?>"><?php print $row->field_field_direccion[0]['raw']['mobile_number']; ?></p>
        </div>
      <?php endif; ?>
      <?php if ($row->field_field_email): ?>
        <p class="h4"><a class="email" href="mailto:<?php print $row->field_field_email[0]['raw']['email']; ?>"><?php print $row->field_field_email[0]['raw']['email']; ?></a></p>
      <?php endif; ?>
      <?php if ($row->field_field_web): ?>
        <p class="h4"><a href="<?php print $row->field_field_web[0]['raw']['url']; ?>"><?php print str_replace("http://","",$row->field_field_web[0]['raw']['url']); ?></a></p>
      <?php endif; ?>
      <?php if ($row->field_field_galeria_fotos): ?>
         <div class="container">
           <div class="row fotos">
          <?php foreach($row->field_field_galeria_fotos as $id => $photo): ?>
            <div class="col-xs-4">
            <img class="photo img-responsive" src="<?php print file_create_url($photo['raw']['uri']); ?>" typeof="foaf:Image" />
            </div>
          <?php endforeach; ?>
          </div>
         </div>
      <?php endif; ?>
      <?php if ($fields['field_geo']): ?>
        <!--<div class="geo">-->
        <?php //print $fields['field_geo']->content; ?>
        <!--</div>-->
      <?php endif; ?>
      </div>
    </div>

  </div>
</div>


