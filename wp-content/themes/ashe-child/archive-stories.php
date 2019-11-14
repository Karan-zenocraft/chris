<?php get_header();?> <link rel="stylesheet"
href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script
src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<div class="row story_list_row">
	<?php if (have_posts()): while (have_posts()): the_post();?>
										 <?php $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full', false);?>
		    <div class="col-md-8 story_image Story_Image">
			<img class="slider-item-bg" src="<?php echo esc_url($featured_image[0]); ?>">
			<div class="StoryTitle page-content">
			<a>Story</a>

		    </div>


		    <div class="post-content PageContent"><p class="page_title" style="margin-bottom:0px;font-weight:bold;"><?php the_title();?>
		    <?php echo '<div class="entry-content">';
        the_content();
        echo '</div>';
        ?></p>

		    </div>
			</div>
		    <div class="col-md-4 story_description">
			<?php get_template_part('templates/sidebars/sidebar', 'right');?>

			</div>																							<?php endwhile;endif;?>
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