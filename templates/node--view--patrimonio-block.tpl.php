<li class="col-md-4 isotope-item 
<?php print str_replace('&amp;', 'and', str_replace(',-', ' ', str_replace(' ', '-',strip_tags(render($content['field_categoria']))))); ?>">
	<div class="thumbnail">
		<a href="<?php print $node_url; ?>" class="thumb-info">
			<?php print render ($content['field_miniatura_monumento']); ?>
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


