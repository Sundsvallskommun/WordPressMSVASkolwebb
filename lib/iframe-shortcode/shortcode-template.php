<?php if ($atts !== null): ?>
<iframe src="<?=$atts['src']?>" style="<?=(($atts['width'])?'width:'.$atts['width'].';':'')?><?=(($atts['height'])?'height:'.$atts['height'].';':'')?>"></iframe>
<?php endif; ?>