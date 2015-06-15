<?php
/**
 * Teaser
 */
?>
<?php if ($view_mode == 'teaser'): ?>
<?php if (drupal_is_front_page()): ?>
<div class="col-md-4">
<article class="node-evento teaser">
<header>
<h1 class="h4"><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h1>
<?php print render($content['field_foto_evento']); ?>
</header>
<?php hide($content['links']); ?>
<?php print render($content); ?>
<?php print render($content['links']); ?>
</article>
</div>
<?php endif; ?>
<?php endif; ?>

<?php if (($view_mode == 'teaser') && !drupal_is_front_page()): ?>
<article class="node-evento teaser">
<header>
<h1 class="h4"><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h1>
</header>
<?php hide($content['links']); ?>
<?php print render($content); ?>
<?php print render($content['links']); ?>
</article>
<?php endif; ?>

<?php
/**
 * Full
 */
?>
<?php if ($view_mode == 'full'): ?>
<article class="node-evento">
<?php if (!$page): ?>
<header>
<h1><?php print $title; ?></h1>
</header>
<?php endif; ?>
<?php hide($content['links']); ?>
<?php print render($content); ?>
<?php print render($content['links']); ?>
</article>
<?php endif; ?>
