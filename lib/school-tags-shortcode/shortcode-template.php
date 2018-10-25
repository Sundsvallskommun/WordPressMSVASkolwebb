<div class="school-tags-container">
    <?php foreach($tags as $tag) : ?>
        <a href="<?php echo get_tag_link($tag->term_id); ?>"><?php echo $tag->name; ?></a>
    <?php endforeach; ?>
</div>