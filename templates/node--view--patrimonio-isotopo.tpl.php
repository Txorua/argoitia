<li class="col-md-3 isotope-item 
<?php print str_replace('&amp;', 'and', str_replace(',-', ' ', str_replace(' ', '-',strip_tags(render($content['field_categoria']))))); ?>">
	<div class="thumbnail">
		<a href="<?php print $node_url; ?>" class="thumb-info">

<?php
//dsm($variables);
$img_uri = $variables['field_miniatura_monumento']['und'][0]['uri'];
hide($content['field_miniatura_monumento']);
?>
			<?php //print render ($content['field_miniatura_monumento']); ?>
			<img class="img-responsive" src="<?php print image_style_url('miniatura_447x300',$img_uri); ?>">
			<span class="thumb-info-title">
				<span class="thumb-info-inner"><?php print $title; ?></span>
				<span class="thumb-info-type"><?php print str_replace('-', ' ', strip_tags(render($content['field_categoria']))); ?></span>
			</span>
			<span class="thumb-info-action">
				<span title="Universal" href="#" class="thumb-info-action-icon"><span class="glyphicon glyphicon-link"></i></span>
			</span>
		</a>
	</div>
</li>


