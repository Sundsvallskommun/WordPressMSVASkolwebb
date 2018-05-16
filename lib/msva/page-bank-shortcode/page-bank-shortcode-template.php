<div class="card card--keep-padding">
	<div class="card-block pagebank">
		<h5>nyttobank</h5>




		<?php foreach ($grouped_pages as $group => $pages) : ?>
			<div class="col-md-6">
				<span class="title"><?php echo $group; ?></span>
				<ul>
				<?php foreach($pages as $page) : ?>


						<li>
							<a href="<?php echo get_permalink($challenge); ?>"><?php echo $page->post_title; ?></a>
						</li>

				
				<?php endforeach; ?>
				</ul>
			</div>
		<?php endforeach; ?>





	</div>
</div>