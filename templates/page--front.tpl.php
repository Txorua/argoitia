<?php
/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see bootstrap_preprocess_page()
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see bootstrap_process_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup themeable
 */
?>
<!-- The Header -->
<header class="container-fluid">

<div class="navbar-wrapper">
  <div class="row white">

    <div id="logo" class="col-xs-3 col-sm-2 col-md-3">
        <a class="" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
          <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" class="img-responsive" />
        </a>
    </div>


    <div class="col-xs-12 col-sm-8 col-md-7">
      <div class="hidden-xs col-sm-12 clearfix">
        <nav class="header-links">
          <ul class="nav nav-pills nav-top pull-right h5">
            <li><a href="<?php global $language, $base_url; print $base_url . '/' . $language->language; ?>/contact"><span class="glyphicon glyphicon-envelope">&nbsp;</span><?php print t('Contact'); ?></a></li>
            <li class="phone"><a href="#"><span class="glyphicon glyphicon-earphone">&nbsp;</span>+34 943 14 09 57</a></li>
            <?php
              $translations = translation_node_get_translations(142);
              $path      = drupal_get_path_alias('node/' . $translations[$language->language]->nid, $language->language);
              $name      = '<span class="glyphicon glyphicon-map-marker">&nbsp;</span>' . t('How to reach');
              $options   = array('attributes' => array('language' => $language->language), 'html' => true);
              $link      = l($name, $path, $options);
            ?>
            <li><?php print $link; ?></li>
          </ul>
        </nav>
      </div>
      <div class="col-xs-12 pull-right">
        <nav class="header-links">
          <ul class="nav nav-pills nav-top pull-right h5">
            <?php if (!empty($language_links)): ?>
            <?php print $language_links; ?>
            <?php endif ?>
          </ul>
        </nav>
        <div class="hidden-xs pull-right" style="margin-bottom: 1em; margin-right: 5%; max-width: 64px;">
        <?php
              global $language;
              $url = '';
              switch ($language->language) {
                case 'es':
                  $url = "http://www.costavasca.org/encrucijada-de-sabores";
                  break;
                case 'eu':
                  $url = "http://kostaldea.eu/zaporeen-bidegurutzeak";
                  break;
                case 'en':
                  $url = "http://en.costavasca.org/a-crossroad-of-flavours";
                  break;
                case 'fr':
                  $url = 'http://fr.costavasca.org/un-carrefour-de-saveurs';
                  break;
                default:
                  $url = "http://www.costavasca.org/encrucijada-de-sabores";
              }
          ?>
            <a class="" href="<?php print $url; ?>" title="Costa Vasca" target="_blank">
            <img src="<?php print base_path(); ?>sites/default/files/Kosta-gastronomika.png" alt="Kosta Gastronomika" class="img-responsive pull-right" />
          </a>
        </div>
      </div>
    </div>

    <div class="hidden-xs col-sm-2 col-md-2">
      <a class="col-sm-6" href="http://www.getaria.eus" title="Getariako Udala" style="padding: 1em 0;">
        <img src="<?php print base_path(); ?>sites/default/files/logo-udala.png" alt="Getariako Udala" class="img-responsive pull-right" />
      </a>
      <a class="col-sm-6" href="http://www.juansebastianelkano.com" title="Juan Sebastián Elkano" style="padding: 1em 0;">
        <img src="<?php print base_path(); ?>sites/default/files/logo-elkano.png" alt="Juan Sebastián Elkano" class="img-responsive pull-right" />
      </a>
    </div>

  </div><!-- fin row -->

  <div class="row">
    <div id="navbar" role="navigation" class="<?php print $navbar_classes; ?>">
      <div class="navbar-header">
        <?php if ($logo): ?>
        <!--<a class="logo navbar-btn pull-left" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
          <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" class="img-responsive" />
        </a>-->
        <?php endif; ?>
        <?php if (!empty($site_name)): ?>
        <a class="name navbar-brand hidden-sm hidden-md hidden-lg" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"><?php print $site_name; ?></a>
        <?php endif; ?>
        <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>
      <?php if (!empty($primary_nav) || !empty($secondary_nav) || !empty($page['navigation'])): ?>
      <div class="navbar-collapse collapse pull-right" style="padding-right: 60px">
        <?php if (!empty($primary_nav)): ?>
        <?php print render($primary_nav); ?>
        <?php endif; ?>
        <?php if (!empty($secondary_nav)): ?>
        <?php print render($secondary_nav); ?>
        <?php endif; ?>
        <?php if (!empty($language_links)): ?>
        <?php //print $language_links; ?>
        <?php endif; ?>
        <?php if (!empty($page['navigation'])): ?>
        <?php print render($page['navigation']); ?>
        <?php endif; ?>
      </div>
      <?php endif; ?>
    </div>
  </div>
</div><!-- End Nav -->

</header><!-- End of The Header -->

<main>
<?php print theme_render_template(path_to_theme() . '/templates/partials/slider-revolution.tpl.php', $variables = array()); ?>
<section id="eventos">
<div class="container">
<?php //print render($page['content']); ?>
</div>
</section>
<section style="padding-top: 50px; padding-bottom: 50px;">
  <div class="container">
    <div class="row">
      <div class="col-xs-10 col-xs-push-1 col-md-6 col-md-push-3">
        <style>
          /* Vídeos */
          .YTvideos {
            position: relative;
            padding-bottom: 50%;
            padding-top: 30px; height: 0; overflow: hidden;
          }
          .YTvideos iframe,
          .YTvideos object,
          .YTvideos embed {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
          }
        </style>
      	<div class="YTvideos">
          <iframe src="https://player.vimeo.com/video/277336592" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
        </div>
    	</div>
    </div>
  </div>
</section>
</main>

<footer>
  <div class="container">
    <div class='row'>
      <?php print render($page['footer']); ?>
    </div>
    <div class='footer-copyright'>
      <div class='row text-center'>
        <img src="<?php print base_path() . drupal_get_path('theme', 'argoitia'); ?>/images/getariaturismo.png">
        <a href="http://www.getaria.eus" target="_blank"><img src="<?php print base_path() . drupal_get_path('theme', 'argoitia'); ?>/images/getariakoudala.png"></a>
        <a href="http://www.juansebastianelkano.com" target="_blank"><img src="<?php print base_path() . drupal_get_path('theme', 'argoitia'); ?>/images/elkano.png"></a>
        <a href="http://turismo.euskadi.eus" target="_blank"><img src="<?php print base_path() . drupal_get_path('theme', 'argoitia'); ?>/images/euskadibasquecountry.png"></a>
        <img src="<?php print base_path() . drupal_get_path('theme', 'argoitia'); ?>/images/calidadturistica.png">
        <img src="<?php print base_path() . drupal_get_path('theme', 'argoitia'); ?>/images/euskadigastronomika.png">
        <img src="<?php print base_path() . drupal_get_path('theme', 'argoitia'); ?>/images/surfingeuskadi.png">
      </div>
      <hr>
      <div class="row">
        <div class='col-md-5 col-md-offset-1'>
          <div class='contact-details'>
            <p class="text-info lead"><span class="glyphicon glyphicon-info-sign">&nbsp;</span>Getariako Udala</p>
            <ul class='contact list-unstyled'>
              <li><span class="glyphicon glyphicon-home">&nbsp;</span>Gudarien Enparantza, 1  20808 GETARIA, Gipuzkoa</li>
              <li><i class='glyphicon glyphicon-earphone'>&nbsp;</i><?php print t('Phone'); ?> :  (+34) 943 89 60 24 </li>
              <li><i class='glyphicon glyphicon-envelope'>&nbsp;</i>Email : <a href='mailto:udala@getaria.eus'><span style="unicode-bidi:bidi-override; direction: rtl;" class="email-obfuscator-unreverse">sue.airateg@aladu</a></li>
            </ul>
          </div>
        </div>
	      <div class='col-md-5'>
          <div class='contact-details'>
            <p class="text-info lead"><span class="glyphicon glyphicon-info-sign">&nbsp;</span>Getariako Turismo Bulegoa</p>
            <ul class='contact list-unstyled'>
              <li><span class="glyphicon glyphicon-home">&nbsp;</span>Aldamar parkea 2 20808 GETARIA, Gipuzkoa</li>
              <li><i class='glyphicon glyphicon-earphone'>&nbsp;</i><?php print t('Phone'); ?> :  (+34) 943 14 09 57 </li>
              <li><i class='glyphicon glyphicon-envelope'>&nbsp;</i>Email : <a href='mailto:info@getariaturismo.eus'><span style="unicode-bidi:bidi-override; direction: rtl;" class="email-obfuscator-unreverse">sue.omsirutairateg@ofni</a></li>
            </ul>
          </div>
        </div>
	     </div>
       <hr>
       <div class="row">
         <div class='col-md-3'>
          <div class='social-icons'>
            <ul class='list-inline'>
              <span class="h4"><?php print t('Follow us'); ?>&hellip;</span>
              <li class='facebook'><a href='https://www.facebook.com/pages/Getaria-Turismoa/834482493271795?sk=timeline' target='_blank' data-placement='bottom' rel='tooltip' title='Facebook'>Facebook</a></li>
            </ul>
          </div>
        </div>
        <div class='col-md-4 pull-right'>
          <nav id='sub-menu'>
            <?php
              global $language;
              $lang= $language->language;

              $legales = translation_node_get_translations(583);
              $nid = $legales[$lang]->nid;
              $legal = drupal_get_path_alias('node/' . $nid);

              $cookies = translation_node_get_translations(587);
              $nid = $cookies[$lang]->nid;
              $cookie = drupal_get_path_alias('node/' . $nid);
            ?>
            <ul class="list-inline">
              <li><a href="#"><?php print t('Map'); ?></a> </li>
              <li><a href="<?php print "/" . $lang . '/' . $legal; ?>"><?php print t('Legal'); ?></a></li>
              <li><a href="<?php print "/" . $lang . '/' . $cookie; ?>"><?php print t('Privacy'); ?></a></li>
              <li><a href="/<?php print $language->language; ?>/contact"><?php print t('Contact'); ?></a></li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
</footer>
