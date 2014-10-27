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
<!-- The Header -->
<header class="container-fluid">

<div class="navbar-wrapper">
  <div class="row white">

    <div id="logo" class="col-sm-2 col-md-3 hidden-xs">
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
      <div class="col-xs-12">
        <nav class="header-links">
          <ul class="nav nav-pills nav-top pull-right h5">
            <?php if (!empty($language_links)): ?>
            <?php print $language_links; ?>
            <?php endif ?>
          </ul>
        </nav>
      </div>
    </div>

    <div class="hidden-xs col-sm-2 col-md-2">
      <a class="col-sm-6" href="http://www.getaria.net" title="Getariako Udala" style="padding: 1em 0;">
        <img src="<?php print base_path(); ?>sites/default/files/logo-udala.png" alt="Getariako Udala" class="img-responsive pull-right" />
      </a>
      <a class="col-sm-6" href="http://elkano.txorua.com" title="Juan Sebastián Elkano" style="padding: 1em 0;">
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

  <?php if (!empty($site_slogan)): ?>
  <div class="row">
    <div class="home-intro center-block">
      <img src="<?php print base_path() . path_to_theme(); ?>/images/banner-generico-getaria.jpg" alt="..." style="margin-top: -20px; width: 100%;" />
      <p class="lead text-center"><?php print $site_slogan; ?></p>
    </div>
  </div>
  <?php endif; ?>
</header><!-- End of The Header -->


<!-- Main Content -->
<div class="main-container container">

  <header role="banner" id="page-header">
    <?php print render($page['header']); ?>
  </header> <!-- /#page-header -->

  <div class="row">

    <?php if (!empty($page['sidebar_first'])): ?>
      <aside class="col-sm-3" role="complementary">
        <?php print render($page['sidebar_first']); ?>
      </aside>  <!-- /#sidebar-first -->
    <?php endif; ?>

    <section<?php print $content_column_class; ?>>
      <?php if (!empty($page['highlighted'])): ?>
        <div class="highlighted jumbotron"><?php print render($page['highlighted']); ?></div>
      <?php endif; ?>
      <?php if (!empty($breadcrumb)): print $breadcrumb; endif;?>
      <a id="main-content"></a>
      <?php print render($title_prefix); ?>
      <?php if (!empty($title)): ?>
        <h1 class="page-header"><?php print $title; ?></h1>
      <?php endif; ?>
      <?php print render($title_suffix); ?>
      <?php print $messages; ?>
      <?php if (!empty($tabs)): ?>
        <?php print render($tabs); ?>
      <?php endif; ?>
      <?php if (!empty($page['help'])): ?>
        <?php print render($page['help']); ?>
      <?php endif; ?>
      <?php if (!empty($action_links)): ?>
        <ul class="action-links"><?php print render($action_links); ?></ul>
      <?php endif; ?>
      <?php print render($page['content']); ?>
    </section>

    <?php if (!empty($page['sidebar_second'])): ?>
      <aside class="col-sm-3" role="complementary">
        <?php print render($page['sidebar_second']); ?>
      </aside>  <!-- /#sidebar-second -->
    <?php endif; ?>

  </div>

  <?php if (!empty($page['after_content'])): ?>
  <br>
  <div class="row">
    <aside class="col-sm-12" role="complementary">
      <?php print render($page['after_content']); ?>
    </aside>
  </div>
  <?php endif; ?>

</div>

<footer>
  <div class="container">
    <div class="row">
      <div class='footer-ribon'>
        <span>GETARIA3D <a href="http://www.getaria3d.com"><img src="<?php print base_path() . drupal_get_path('theme', 'argoitia'); ?>/images/earth-icon-x18.png" align="absmiddle"></a></span>
      </div>
    </div>

    <div class='row'>
      <?php print render($page['footer']); ?>
    </div>

    <div class='footer-copyright'>
      <div class='row'>
        <div class='col-md-12'>
          <p class="text-center"><img src="<?php print base_path() . drupal_get_path('theme', 'argoitia'); ?>/images/getariako-logos.png" usemap="#Map">
            <map name="Map">
              <area shape="rect" coords="109,9,224,59" href="#" target="http://www.getaria.net">
              <area shape="rect" coords="242,7,341,59" href="#" target="http://www.juansebastianelkano.com">
            </map>
            <img src="<?php print base_path() . drupal_get_path('theme', 'argoitia'); ?>/images/getariako-sponsors.png" alt="">
           
          </p>
        </div>
      </div>
<hr>
    <div class="row">
      <div class='col-md-5 col-md-offset-1'>
        <div class='contact-details'>
          <p class="text-info lead"><span class="glyphicon glyphicon-info-sign">&nbsp;</span>Getariako Udala</p>
          <ul class='contact list-unstyled'>
            <li><span class="glyphicon glyphicon-home">&nbsp;</span>Gudarien Enparantza, 1  20808 GETARIA, Gipuzkoa</li>
            <li><i class='glyphicon glyphicon-earphone'>&nbsp;</i><?php print t('Phone'); ?> :  (+34) 943 89 60 24 </li>
            <li><i class='glyphicon glyphicon-envelope'>&nbsp;</i>Email : <a href='mailto:turismogetaria@euskalnet.net'><span style="unicode-bidi:bidi-override; direction: rtl;" class="email-obfuscator-unreverse">gro.airateg@aladu</a></li>
          </ul>
        </div>
      </div>
	  
	     <div class='col-md-5'>
        <div class='contact-details'>
          <p class="text-info lead"><span class="glyphicon glyphicon-info-sign">&nbsp;</span>Getariako Turimo Bulegoa</p>
          <ul class='contact list-unstyled'>
            <li><span class="glyphicon glyphicon-home">&nbsp;</span>Aldamar parkea 2 20808 GETARIA, Gipuzkoa</li>
            <li><i class='glyphicon glyphicon-earphone'>&nbsp;</i><?php print t('Phone'); ?> :  (+34) 943 14 09 57 </li>
            <li><i class='glyphicon glyphicon-envelope'>&nbsp;</i>Email : <a href='mailto:turismogetaria@euskalnet.net'><span style="unicode-bidi:bidi-override; direction: rtl;" class="email-obfuscator-unreverse">ten.tenlaksue@airategomsirut</a></li>
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
            <li class='facebook'><a href='#' target='_blank' data-placement='bottom' rel='tooltip' title='Facebook'>Facebook</a></li>
            <li class='twitter'><a href='#' target='_blank' data-placement='bottom' rel='tooltip' title='Twitter'>Twitter</a></li>
          </ul>
        </div>
      </div>

      <div class='col-md-4 pull-right'>
          <nav id='sub-menu'>
            <ul class="list-inline">
            <li><a href="#"><?php print t('Map'); ?></a> </li>
            <li><a href="#"><?php print t('Legal'); ?></a></li>
            <li><a href="#"><?php print t('Privacy'); ?></a></li>
            <li><a href="/<?php print $language->language; ?>/contact"><?php print t('Contact'); ?></a></li>
            </ul>
          </nav>
        </div>
      </div>

    </div>

  </div>
</footer>
