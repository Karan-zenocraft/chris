<?php /* Template Name: HomePage */?>

<?php

get_header();?>
<div>
<?php echo do_shortcode('[layerslider id="1"]'); ?>
</div>
<div class="featured-slider-area<?php echo ashe_options('general_slider_width') === 'boxed' ? ' boxed-wrapper' : ''; ?>">

<!-- Featured Slider -->
<div id="featured-slider" class="<?php echo esc_attr(ashe_options('general_slider_width')) === 'boxed' ? 'boxed-wrapper' : ''; ?> custom_padding" data-slick="<?php echo esc_attr($slider_data); ?>">

	<?php

// Query Args
$args = array(
    'post_type' => array('post'),
    'orderby' => 'rand',
    'order' => 'DESC',
    'posts_per_page' => ashe_options('featured_slider_amount'),
    'ignore_sticky_posts' => 1,
    'meta_query' => array(
        array(
            'key' => '_thumbnail_id',
            'compare' => 'EXISTS',
        ),
    ),
);

if (ashe_options('featured_slider_display') === 'category') {
    $args['cat'] = ashe_options('featured_slider_category');
}

if (ashe_is_preview()) {
    array_pop($args);
    $preview_count = 0;
    $preview_images = array(
        get_template_directory_uri() . '/assets/images/image_5.jpg',
        get_template_directory_uri() . '/assets/images/image_3.jpg',
        get_template_directory_uri() . '/assets/images/image_6.jpg',
    );
}

$sliderQuery = new WP_Query();
$sliderQuery->query($args);

// Loop Start
if ($sliderQuery->have_posts()):

    while ($sliderQuery->have_posts()): $sliderQuery->the_post();

        if (ashe_is_preview()) {
            $featured_image = $preview_images[$preview_count];
            $preview_count++;
        } else {
            $featured_image = get_the_post_thumbnail_url();
        }
        ?>
																																																																																																<div class="slider-item">

																																																																																																		<div class="slider-item-bg" style="background-image:url(<?php echo esc_url($featured_image); ?>);"></div>

																																																																																																		<div class="cv-container image-overlay">
																																																																																																			<div class="cv-outer">
																																																																																																				<div class="cv-inner">
																																																																																																					<div class="slider-info">

																																																																																																						<?php $category_list = get_the_category_list(', ');?>

																																																																																																						<?php if ($category_list): ?>
																																																																																																						<div class="slider-categories">
																																																																																																							<?php echo '' . $category_list; ?>
																																																																																																						</div>
																																																																																																						<?php endif;?>

																																																						<h2 class="slider-title">
																																																							<a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title();?></a>
																																																						</h2>

																																																						<div class="slider-content"><?php ashe_excerpt(30);?></div>

																																																						<div class="slider-read-more">
																																																							<a href="<?php echo esc_url(get_permalink()); ?>"><?php esc_html_e('read more', 'ashe');?></a>
																																																						</div>

																																																						<div class="slider-date"><?php the_time(get_option('date_format'));?></div>

																																																					</div>
																																																				</div>
																																																			</div>
																																																		</div>

																																																	</div>
																																																        <?php
endwhile; // Loop end
endif;

?>

</div><!-- #featured-slider -->

</div><!-- .featured-slider-area -->
<div id="featured-links" class="<?php echo esc_attr(ashe_options('general_links_width')) === 'boxed' ? ' boxed-wrapper' : ''; ?> clear-fix">

	<!-- Link 1 -->
	<?php if (ashe_options('featured_links_image_1') !== ''): ?>
	<div class="featured-link">

		<?php

$image_src_1 = wp_get_attachment_url(ashe_options('featured_links_image_1'));
$link_title_1 = ashe_options('featured_links_title_1');

?>

		<img src="<?php echo esc_url($image_src_1); ?>" alt="<?php echo esc_attr($link_title_1); ?>">
		<a href="<?php echo esc_url(ashe_options('featured_links_url_1')); ?>">
			<div class="cv-outer">
				<div class="cv-inner">
					<h6><?php echo esc_html($link_title_1); ?></h6>
				</div>
			</div>
		</a>
	</div>
	<?php endif;?>

	<!-- Link 2 -->
	<?php if (ashe_options('featured_links_image_2') !== ''): ?>
	<div class="featured-link">

		<?php

$image_src_2 = wp_get_attachment_url(ashe_options('featured_links_image_2'));
$link_title_2 = ashe_options('featured_links_title_2');

?>

		<img src="<?php echo esc_url($image_src_2); ?>" alt="<?php echo esc_attr($link_title_2); ?>">
		<a href="<?php echo esc_url(ashe_options('featured_links_url_2')); ?>">
			<div class="cv-outer">
				<div class="cv-inner">
					<h6><?php echo esc_html($link_title_2); ?></h6>
				</div>
			</div>
		</a>
	</div>
	<?php endif;?>

	<!-- Link 3 -->
	<?php if (ashe_options('featured_links_image_3') !== ''): ?>
	<div class="featured-link">

		<?php

$image_src_3 = wp_get_attachment_url(ashe_options('featured_links_image_3'));
$link_title_3 = ashe_options('featured_links_title_3');

?>

		<img src="<?php echo esc_url($image_src_3); ?>" alt="<?php echo esc_attr($link_title_3); ?>">
		<a href="<?php echo esc_url(ashe_options('featured_links_url_3')); ?>">
			<div class="cv-outer">
				<div class="cv-inner">
					<h6><?php echo esc_html($link_title_3); ?></h6>
				</div>
			</div>
		</a>
	</div>
	<?php endif;?>

</div><!-- #featured-links -->
<div class="main-content clear-fix<?php echo (ashe_options('general_single_width') === 'boxed') ? ' boxed-wrapper' : ''; ?>" data-sidebar-sticky="<?php echo esc_attr(ashe_options('general_sidebar_sticky')); ?>">

	<!-- Main Container -->
	<div class="main-container">
<?php global $wp_query;
$original_query = $wp_query;
$wp_query = null;
$wp_query = new WP_Query(array("post_type" => "post", "category_name" => "book"));?>
		<article id="page-<?php the_ID();?>" <?php post_class();?>>

			<?php

if (have_posts()):

    // Loop Start
    while (have_posts()): the_post();

        if (has_post_thumbnail()) {
            echo '<div class="post-media">';
            the_post_thumbnail('ashe-full-thumbnail');
            echo '</div>';
        }

        if (get_the_title() !== '') {
            echo '<header class="post-header">';
            echo '<h1 class="page-title">' . get_the_title() . '</h1>';
            echo '</header>';
        }

        echo '<div class="post-content">';
        the_content('');

        // Post Pagination
        $defaults = array(
            'before' => '<p class="single-pagination">' . esc_html__('Pages:', 'ashe'),
            'after' => '</p>',
        );

        wp_link_pages($defaults);
        echo '</div>';

    endwhile; // Loop End

endif;

?>

		</article>

		<?php get_template_part('templates/single/comments', 'area');?>

	</div><!-- .main-container -->


	<?php // Sidebar Right

get_template_part('templates/sidebars/sidebar', 'right');

?>

</div><!-- .page-content -->
<?php
get_footer();
?>