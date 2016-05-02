<?php

function argoitia_process_html(&$variables) {
  $variables['head'] .= '<link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light">';
  $variables['head'] .= '<link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Permanent+Marker">';
}

function argoitia_preprocess_page(&$variables) {
  // Add information about the number of sidebars.
  if (!empty($variables['page']['sidebar_first']) && !empty($variables['page']['sidebar_second'])) {
    $variables['content_column_class'] = ' class="col-sm-6"';
  }
  elseif (!empty($variables['page']['sidebar_first']) || !empty($variables['page']['sidebar_second'])) {
    $variables['content_column_class'] = ' class="col-sm-9"';
  }
  else {
    $variables['content_column_class'] = ' class="col-sm-12"';
  }

  // Primary nav.
  $variables['primary_nav'] = FALSE;
  if ($variables['main_menu']) {
    // Build links.
    $variables['primary_nav'] = menu_tree(variable_get('menu_main_links_source', 'main-menu'));
    // Provide default theme wrapper function.
    $variables['primary_nav']['#theme_wrappers'] = array('menu_tree__primary');
  }

  // Secondary nav.
  $variables['secondary_nav'] = FALSE;
  if ($variables['secondary_menu']) {
    // Build links.
    $variables['secondary_nav'] = menu_tree(variable_get('menu_secondary_links_source', 'user-menu'));
    // Provide default theme wrapper function.
    $variables['secondary_nav']['#theme_wrappers'] = array('menu_tree__secondary');
  }

  // Language nav
  if (drupal_multilingual()) {
    $variables['language_links'] = _argoitia_language_list_2();
  }

  $variables['navbar_classes_array'] = array('navbar');

  if (theme_get_setting('bootstrap_navbar_position') !== '') {
    $variables['navbar_classes_array'][] = 'navbar-' . theme_get_setting('bootstrap_navbar_position');
  }
  else {
    $variables['navbar_classes_array'][] = 'container-fluid';
  }
  if (theme_get_setting('bootstrap_navbar_inverse')) {
    $variables['navbar_classes_array'][] = 'navbar-inverse';
  }
  else {
    $variables['navbar_classes_array'][] = 'navbar-default';
  }

  // Revolution Slider
  if ($variables['is_front']) {

    // JS at footer for front page
    $options = array(
      'group' => JS_THEME,
      'scope' => 'footer',
    );
    drupal_add_js(path_to_theme() . '/js/slider-revolution/js/jquery.themepunch.plugins.min.js', $options);
    drupal_add_js(path_to_theme() . '/js/slider-revolution/js/jquery.themepunch.revolution.min.js', $options);
  }

  // Page Suggestions
  if (isset($variables['node'])) {
    $suggest = 'page__' . str_replace('_', '--', $variables['node']->type);
    $variables['theme_hook_suggestions'][] = $suggest;
  }

	/**
	* Add Javascript for enable/disable Isotope Javascript.
	*/
	//if (theme_get_setting('isotope_js_include', 'argoitia')) {

	drupal_add_js(drupal_get_path('theme', 'argoitia') .'/js/isotope/jquery.isotope.js', array('preprocess' => false));
	drupal_add_js(drupal_get_path('theme', 'argoitia') .'/js/jquery.ba-bbq.min.js', array('preprocess' => false));	
	drupal_add_css(drupal_get_path('theme', 'argoitia') . '/js/isotope/jquery.isotope.css');


  $all = t('All');
	drupal_add_js('
		jQuery(document).ready(function($) {

	    $(window).load(function() {

        $(".filters").fadeIn("slow");
        $(".filter-items").fadeIn("slow");
        var container = $(".filter-items"),
        filters= $(".filters");

        container.isotope({
            itemSelector: ".isotope-item",
            layoutMode : "sloppyMasonry",
            filter: "*"
        });

		$(".filters").prepend( "<li class=\"active\"><a href=\"#filter=*\">' . $all . '</a></li>" );

		filters.find("a").click(function(){

			var href = $(this).attr("href").replace( /^#/, "" ),
			option = $.deparam( href, true );

            filters.find("li.active").removeClass("active");
            $(this).parent().addClass("active");

			$.bbq.pushState( option );
			return false;
		});

		$(window).bind( "hashchange", function( event ){

			var hashOptions = $.deparam.fragment();

			container.isotope( hashOptions );
		}).trigger("hashchange");
	    
	    });

		});',array('type' => 'inline', 'scope' => 'footer', 'weight' => 2)
	);

	//}
	//EOF:Javascript
}

function argoitia_field__field_fecha_evento__evento(&$variables) {
  $output = '<div style="margin-bottom: 3em;"><span>' . t('Published on') . '</span>: ' . $variables['items'][0]['#markup'] . '</div>';
  return $output;
}

function argoitia_preprocess_views_view(&$variables) {
  if (isset($variables['view']->name)) {
    $function = 'argoitia_preprocess_views_view__'.$variables['view']->name; 
    if (function_exists($function)) {
      $function($variables);
    }
  }
}

function argoitia_preprocess_views_view__eventos(&$variables) {
  if($variables['display_id'] == 'block') {
   $variables['more'] = l(t('Full list'), 'eventos', array('attributes' => array('class' => array('btn', 'btn-default', 'pull-right'))));
   /*$variables['pager'] = '<div class="flexslider flexslider-top-title unstyled flexslider-init flexslider-control-nav flexslider-direction-nav" data-plugin-options="{" directionnav\':="" false,="" \'animationloop\':="" true,="" \'animation\':\'slide\'}\'="">

                <ul class="slides">
                </ul>

                <ol class="flex-control-nav flex-control-paging">
                </ol>

		<ul class="flex-direction-nav">

		  <li>
                    <a class="flex-prev" href="http://www.lazurriola.com/getaria_turismo_2014/web/#">Previous</a>
                  </li>

                  <li>
                    <a class="flex-next" href="http://www.lazurriola.com/getaria_turismo_2014/web/#">Next</a>
                  </li>

                </ul>

		</div>
    ';*/
  }
}

function argoitia_preprocess_views_view_fields(&$variables) {
  $view = $variables['view'];
  
  if (($view->name == 'eventos' || $view->name == 'eventos_pasados') && $view->field['field_fecha_evento']) {
    $field = $view->field['field_fecha_evento'];
    if ($field->field_info['type'] == 'date') {
      $timezone = variable_get('date_default_timezone', @date_default_timezone_get());
      $fecha = new DateTime($variables['fields']['field_fecha_evento']->content, new DateTimeZone($timezone));
      $dia = format_date($fecha->getTimeStamp(), 'custom', 'd');
      $mes = format_date($fecha->getTimeStamp(), 'custom', 'M');
      $field_output = '<div class="date">';
      $field_output .= '<span class="day">' . $dia . '</span>';
      $field_output .= '<span class="month">' . substr($mes,0,3) . '</span>';
      $field_output .= '</div>';
      $variables['fields']['field_fecha_evento']->content = $field_output;
    }
  }

  $tipos = array('hoteles', 'agroturismos', 'pensiones', 'casas_rurales', 'albergues');
  if (in_array($variables['view']->name, $tipos)) {
    $servicios = array(
      'icon-wheelchair',
      'icon-paw',
      'icon-tv',
      'icon-icon-tv-saloon',
      'icon-icon-reunion-sala',
      'icon-icon-temp-cal',
      'icon-snow',
      'icon-music',
      'icon-cab',
      'icon-food',
      'icon-glass',
      'icon-basket',
      'icon-globe',
      'icon-icon-parkea',
      'icon-swimming',
      'icon-h-sigh',
      'icon-tennis',
      'icon-garden',
      'icon-golf',
      'icon-h-sigh',
      'icon-icon-sukalde',
      'icon-h-sigh',
      'icon-credit-card',
      'icon-h-sigh',
      'icon-signal-1',
      'icon-picture',
    );
    $accesibilidad = array (
      'text-danger',
      'text-warning',
      'text-success',
    );
    $variables['servicios'] = $servicios;
    $variables['accesibilidad'] = $accesibilidad;
  }

}

function argoitia_preprocess_block(&$variables) {
  $block = $variables['block'];

  if ($variables['is_front'] && $block->delta == 'main') {
    $variables['content'] = '<div class="row">' . $variables['content'] . '</div>';
  }
}

/*function argoitia_preprocess_views_view_field(&$variables) {

  if (($variables['view']->name == 'hoteles') && (property_exists($variables['field'],'field_info')) && ($variables['field']->field_info['field_name'] == 'field_servicios_alojamiento')) {
    $servicios = array(
      'icon-wheelchair',
      'icon-desktop',
      'icon-glass',
      'icon-music',
      'icon-certificate',
      'icon-h-sigh',
      'icon-h-sigh',
      'icon-h-sigh',
      'icon-h-sigh',
      'icon-h-sigh',
      'icon-h-sigh',
      'icon-h-sigh',
      'icon-h-sigh',
      'icon-h-sigh',
      'icon-h-sigh',
      'icon-h-sigh',
      'icon-h-sigh',
      'icon-h-sigh',
      'icon-h-sigh',
      'icon-h-sigh',
      'icon-h-sigh',
      'icon-h-sigh',
      'icon-h-sigh',
      'icon-h-sigh',
      'icon-h-sigh',
      'icon-h-sigh',
    );
    $variables['servicios'] = $servicios;
  }
}*/

function _argoitia_language_list() {
  $path = drupal_is_front_page() ? '<front>' : $_GET['q'];
  $links = language_negotiation_get_switch_links('language', $path);
  global $language;
  // an array of list items
  $output  = '<ul class="menu nav navbar-nav"><li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">';
  $output .= t('Languages');
  $output .= ' <span class="caret"></span></a>';
  $items = array();
  foreach($links->links as $lang => $info) {
    //$name     = $info['language']->native;
    $name     = $info['title'];
    $href     = isset($info['href']) ? $info['href'] : '';
    //$li_classes   = array('list-item-class');
    $li_classes   = array('');
    // if the global language is that of this item's language, add the active class
    if($lang === $language->language){
      $li_classes[] = 'active';
    }
    $link_classes = array();
    $options = array('attributes' => array('class'    => $link_classes),
      'language' => $info['language'],
      'html'     => true
    );
    $link = l($name, $href, $options);
    // display only translated links
    if ($href) $items[] = array('data' => $link, 'class' => $li_classes);
  }
  // output
  $attributes = array('class' => array('dropdown-menu'), 'id' => 'lang-switcher');
  $output .= theme('item_list', array('items' => $items,
    'type'  => 'ul',
    'attributes' => $attributes
  ));
  $output .='</li></ul>';
  return $output;
}
function _argoitia_language_list_2() {
  $abbrs = array("eu" => "Eus", "es" => "Cas", "en" => "Eng", "fr" => "Fr");
  $path = drupal_is_front_page() ? '<front>' : $_GET['q'];
  $links = language_negotiation_get_switch_links('language', $path);
  global $language;
  // an array of list items
  $output = '<li><a href="#" style="padding-right: 7px;"><i class="glyphicon glyphicon-flag"></i></a></li>';
  $items = array();
  foreach($links->links as $lang => $info) {
    //$name     = $info['language']->native;
    //$name     = $info['title'];
    //$name     = $lang;
    $name     = (isset($abbrs[$lang])) ? $abbrs[$lang] : $lang;
    $href     = isset($info['href']) ? $info['href'] : '';
    $li_classes   = array('');
    $output .= '<li ';
    // if the global language is that of this item's language, add the active class
    if($lang === $language->language){
      $output .= 'class="active"';
    }
    $output .= '>';
    $link_classes = array();
    $options = array('attributes' => array('class'    => $link_classes),
      'language' => $info['language'],
      'html'     => true
    );
    $link = l($name, $href, $options);
    $output .= $link . '</li>';
  }
  // output
  return $output;
}

function _argoitia_node_translations($nid, $lang) {
  $translations = translation_node_get_translations($nid);
  $path      = drupal_get_path_alias('node/' . $translations[$lang]->nid, $lang);
  return $lang . '/' . $path;
}
