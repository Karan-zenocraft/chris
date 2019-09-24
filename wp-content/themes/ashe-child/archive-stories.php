<?php get_header();?> <link rel="stylesheet"
href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script
src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<div class="row story_list_row">
	<?php if (have_posts()): while (have_posts()): the_post();?>
				<div class="col-md-6 story_image">	<?php the_post_thumbnail();?></div> <div
				class="col-md-6"><strong><h3><?php the_title();?></h3> </strong><?php echo '<div
				class="entry-content">';
        the_content();
        echo '</div>';
        ?></div>																									<?php endwhile;endif;?>
    <div class="small-12 col-md-12 columns">
    <?php
the_posts_pagination(array(
    'mid_size' => 2,
    'prev_text' => 'Previous',
    'next_text' => 'Next',
));
?>
    </div>

</div>

  <?php get_footer();?>