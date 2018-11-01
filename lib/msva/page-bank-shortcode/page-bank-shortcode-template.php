<div class="card card--keep-padding full-height">
	<div class="card-block pagebank">
		<h5>nyttobank</h5>
		<div class="two-col col-sm-12">
		<?php foreach ($grouped_pages as $group => $pages) : ?>
			<div class="group">
				<span class="title"><?php echo $group; ?></span>
				<ul>
					<?php foreach($pages as $page) : ?>

						<li>
							<a href="<?php echo get_permalink($page); ?>"><?php echo $page->post_title; ?></a>
						</li>

					<?php endforeach; ?>
				</ul>
			</div>
		<?php endforeach; ?>
		</div>
	</div>
</div>


