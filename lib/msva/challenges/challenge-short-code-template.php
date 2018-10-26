<div class="card card--keep-padding">
	<div class="card-block challenges-list">
		<h5>challenges</h5>
		<div class="">
		<?php if (sizeof($challenges_posts) > 0) : ?>
			<ul>
				<?php foreach ($challenges_posts as $challenge) : ?>
					<li class="">
						<a href="<?php echo get_permalink($challenge); ?>"><?php echo $challenge->post_title; ?></a>
					</li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>
		</div>

		<?php if($number_of_challenges > 6) : ?>			
			<a class="mt-5 show-all-btn" href="<?php echo get_post_type_archive_link('challenge'); ?>">Visa alla challenges</a>
		<?php endif; ?>
	</div>
</div>