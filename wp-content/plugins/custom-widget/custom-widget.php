<?php
/*
Plugin Name: Custom Widget
Plugin URI: http://wordpress.org/extend/plugins/#
Description: This is an Social Media plugin
Author: Rutusha Joshi
Version: 1.0
Author URI: http://example.com/
 */
// register My_Widget
add_action('widgets_init', function () {
    register_widget('SocialMedia_Widget');
});
class SocialMedia_Widget extends WP_Widget
{
    // class constructor
    public function __construct()
    {
        $widget_ops = array(
            'classname' => 'SocialMedia_Widget',
            'description' => 'A plugin for display social media icons',
        );
        parent::__construct('SocialMedia_Widget', 'Social Media Widget', $widget_ops);
    }

    // output the widget content on the front-end
    public function widget($args, $instance)
    {
        $title = $instance['title'];
        $facebook = $instance['facebook'];
        $twitter = $instance['twitter'];
        $instagram = $instance['instagram'];

// social profile link
        $facebook_profile = "<a href='" . $facebook . "'><img src=" . content_url() . "/images/facebookiconforbook.png class='img-responsive inline-block'></a>";
        $twitter_profile = "<a href='" . $twitter . "'><img src=" . content_url() . "/images/twittericonforbook.png class='img-responsive inline-block'></a>";
        $instagram_profile = "<a href='" . $instagram . "'><img src=" . content_url() . "/images/instagramiconforbook.png class='img-responsive inline-block'></a>";

        echo $args['before_widget'];
        if (!empty($title)) {
            echo $args['before_title'] . $title . $args['after_title'];
        }

        echo '<div class="social-icons">';
        echo (!empty($twitter)) ? $twitter_profile : null;
        echo (!empty($facebook)) ? $facebook_profile : null;
        echo (!empty($instagram)) ? $instagram_profile : null;
        echo '</div>';
        echo $args['after_widget'];
    }

    // output the option form field in admin Widgets screen
    public function form($instance)
    {
        $title = !empty($instance['title']) ? $instance['title'] : esc_html__('Title', 'text_domain');
        $twitter = !empty($instance['twitter']) ? $instance['twitter'] : esc_html__('Twitter', 'text_domain');
        $facebook = !empty($instance['facebook']) ? $instance['facebook'] : esc_html__('Facebook', 'text_domain');
        $instagram = !empty($instance['instagram']) ? $instance['instagram'] : esc_html__('Instagram', 'text_domain');
        ?>
	<p>
	<label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
	<?php esc_attr_e('Title:', 'text_domain');?>
	</label>

	<input
		class="widefat"
		id="<?php echo esc_attr($this->get_field_id('title')); ?>"
		name="<?php echo esc_attr($this->get_field_name('title')); ?>"
		type="text"
		value="<?php echo esc_attr($title); ?>">
	</p>
	<p>
	<label for="<?php echo esc_attr($this->get_field_id('twitter')); ?>">
	<?php esc_attr_e('Twitter:', 'text_domain');?>
	</label>

	<input
		class="widefat"
		id="<?php echo esc_attr($this->get_field_id('twitter')); ?>"
		name="<?php echo esc_attr($this->get_field_name('twitter')); ?>"
		type="text"
		value="<?php echo esc_attr($twitter); ?>">
	</p>
	<p>
	<label for="<?php echo esc_attr($this->get_field_id('facebook')); ?>">
	<?php esc_attr_e('Facebook:', 'text_domain');?>
	</label>

	<input
		class="widefat"
		id="<?php echo esc_attr($this->get_field_id('facebook')); ?>"
		name="<?php echo esc_attr($this->get_field_name('facebook')); ?>"
		type="text"
		value="<?php echo esc_attr($facebook); ?>">
	</p>
	<p>
	<label for="<?php echo esc_attr($this->get_field_id('instagram')); ?>">
	<?php esc_attr_e('Instagram:', 'text_domain');?>
	</label>

	<input
		class="widefat"
		id="<?php echo esc_attr($this->get_field_id('instagram')); ?>"
		name="<?php echo esc_attr($this->get_field_name('instagram')); ?>"
		type="text"
		value="<?php echo esc_attr($instagram); ?>">
	</p>

	<?php
}

    // save options
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['facebook'] = (!empty($new_instance['facebook'])) ? strip_tags($new_instance['facebook']) : '';
        $instance['twitter'] = (!empty($new_instance['twitter'])) ? strip_tags($new_instance['twitter']) : '';
        $instance['instagram'] = (!empty($new_instance['instagram'])) ? strip_tags($new_instance['instagram']) : '';
        return $instance;
    }

}
