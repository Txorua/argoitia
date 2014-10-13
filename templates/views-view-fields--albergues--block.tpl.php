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
<?php //dsm($row); ?>
<?php foreach ($fields as $id => $field): ?>
  <?php if (!empty($field->separator)): ?>
    <?php print $field->separator; ?>
  <?php endif; ?>

  <?php print $field->wrapper_prefix; ?>
    <?php print $field->label_html; ?>
    <?php print $field->content; ?>
  <?php print $field->wrapper_suffix; ?>
<?php endforeach; ?>

<div class="col-xs-12">
<div class="panel panel-default">
  <div class="panel-heading">
    <h4>
      <span class="h3"><span class="icon fontello icon-h-sigh text-primary"> </span></span>
      <div style="display: inline-block">
        <?php
          if ($row->field_field_categoria_alojamiento[0]['raw']['value'] > 0) {
            print $row->field_field_categoria_alojamiento[0]['rendered']['#markup'];
          }
        ?>
      </div>
      <strong class="h3"><?php print $row->field_title_field[0]['raw']['value']; ?></strong>
      <?php if ($row->field_field_camino_de_santiago[0]['raw']['value'] == 1): ?>
      <span class="icon fontello icon-santiago"></span>
      <?php endif; ?>
      <?php if (!empty($row->field_field_calidad_turistica)): ?>
      <ul class="list-inline list-unstyled pull-right">
      <?php
        foreach($row->field_field_calidad_turistica as $key => $sello) {
          $clave = $sello['raw']['value'];
          $icono = ($clave) ? "icon-icon-calidad-turistica" : "icon-icon-q-turistica";
          print '<li><span class="icon fontello ' . $icono . ' text-primary pull-right h6"> ' . $row->field_field_calidad_turistica_1[$key]['rendered']['#markup'] . '</span></li>';
        }
      ?>
      </ul>
      <?php endif; ?>
    </h4>
    <div class="row">
      <div class="col-xs-12">
        <?php if (!empty($row->field_field_servicios_alojamiento)): ?>
        <?php
          foreach($row->field_field_servicios_alojamiento as $key => $servicio) {
            $clave = $servicio['raw']['value'];
            $nombre = $servicio['rendered']['#markup'];
            //print '<div class="col-xs-1">';
            print '<span class="text-hide">' . $nombre . '"></span>';
            //if ($clave == 2) {
            //print '<img class="img-responsive" src="' . base_path() . path_to_theme() . '/images/iconos/icon-tv.jpg" />';
            //} else {
            print '<span class="icon fontello ' . $variables['servicios'][$clave] . ' text-primary" title="' . $nombre . '">&nbsp;</span>';
            //}
            //print '</div>';
          }
        ?>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <div class="panel-body">
    <div class="row">

      <div class="col-sm-7 col-md-7 col-lg-7">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 clearfix">
          <?php if (!empty($row->field_field_direccion_alojamiento)): ?>
            <p class="h4"><?php print $row->field_field_direccion_alojamiento[0]['raw']['thoroughfare']; ?></p>
            <p class="h4"><?php print $row->field_field_direccion_alojamiento[0]['raw']['postal_code']; ?>
            <?php print $row->field_field_direccion_alojamiento[0]['raw']['locality']; ?></p>
            <br/>
            <span class="hidden-xs h4"><?php print $row->field_field_direccion_alojamiento[0]['raw']['phone_number']; ?></span>
            <span class="visible-xs h4"><a href="tel:<?php print $row->field_field_direccion_alojamiento[0]['raw']['phone_number']; ?>"><?php print $row->field_field_direccion_alojamiento[0]['raw']['phone_number']; ?></a></span>
            <?php if (!empty($row->field_field_email)): ?>
            <br/> 
            <span class="h4"><?php print $row->field_field_email[0]['rendered']['#markup']; ?></span>
            <?php endif; ?>
            <?php if (!empty($row->field_field_web)): ?>
            <br/>
            <span class="h4"><a href="<?php print $row->field_field_web[0]['raw']['url']; ?>"><?php print $row->field_field_web[0]['raw']['url']; ?></a></span>
            <?php endif; ?>
          <hr>
          <?php endif; ?>
          </div>
          <div class="col-sm-12 col-md-12 col-lg-12 clearfix">
          <?php if (!empty($row->field_field_geo)): ?>
            <?php print $row->field_field_geo[0]['rendered']['#markup']; ?>
          <?php endif; ?>
          </div>
          <hr>
          <div class="col-xs-6 col-xs-offset-3 visible-xs">
          <?php if (!empty($row->field_field_galeria_fotos)): ?>
            <div id="carousel-fotos-xs-<?php print $row->nid; ?>" class="carousel carousel-hotel slide" data-ride="carousel">
              <ol class="carousel-indicators">
              <?php
                for ($i = 0; $i < count($row->field_field_galeria_fotos); $i++) {
                  if ($i == 0) {
                    $active = 'active';
                  } else {
                    $active = '';
                  } 
                  print '<li data-target="#carousel-fotos-xs-' . $row->nid . '" data-slide-to="' . $i . '" class="' . $active . '"></li>';
                }
              ?>
              </ol>
              <div class="carousel-inner">
              <?php
                for ($i = 0; $i < count($row->field_field_galeria_fotos); $i++) {
                  $img_uri = $row->field_field_galeria_fotos[$i]['raw']['uri'];
                  if ($i == 0) {
                    $active = 'active';
                  } else {
                    $active = '';
                  }
                  print '<div class="item ' . $active . '">';
                  print '<img src="' . image_style_url('miniatura_447x300',$img_uri) . '" alt="Foto Hotel" class="img-responsive" typeof="foaf:Image" />';
                  print '</div>';
                }
              ?>
              </div>
            </div><!-- Fin fotos -->
          <?php endif; ?>
          </div>
        </div><!-- Fin 1row md8 -->

        
      </div><!-- Fin md8 -->

      <div class="col-sm-5 col-md-5">
        <div class="row">

          <div class="col-md-12">

            <div class="hidden">
            <?php if (!empty($row->field_field_geo)): ?>
              <?php print $row->field_field_geo[0]['rendered']['#markup']; ?>
            <?php endif; ?>
            </div>

            <?php if (!empty($row->field_field_galeria_fotos)): ?>
            <div id="carousel-fotos-<?php print $row->nid; ?>" class="carousel carousel-hotel slide hidden-xs" data-ride="carousel">
              <ol class="carousel-indicators">
              <?php
              for ($i = 0; $i < count($row->field_field_galeria_fotos); $i++) {
                if ($i == 0) {
                  $active = 'active';
                } else {
                  $active = '';
                } 
                print '<li data-target="#carousel-fotos-' . $row->nid . '" data-slide-to="' . $i . '" class="' . $active . '"></li>';
              }
              ?>
              </ol>
              <div class="carousel-inner">
              <?php
                for ($i = 0; $i < count($row->field_field_galeria_fotos); $i++) {
                  $img_uri = $row->field_field_galeria_fotos[$i]['raw']['uri'];
                  if ($i == 0) {
                    $active = 'active';
                  } else {
                    $active = '';
                  }
                  print '<div class="item ' . $active . '">';
                  print '<img src="' . image_style_url('miniatura_447x300',$img_uri) . '" alt="Foto Hotel" class="img-responsive" typeof="foaf:Image" />';
                  print '</div>';
                }
              ?>
              </div>
            </div>
            <?php endif; ?>

          </div>
        </div>

        
      </div><!-- Fin md4 -->
    </div>
  </div>
</div>
</div>
