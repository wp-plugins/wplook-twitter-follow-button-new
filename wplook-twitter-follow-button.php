<?php
/*
* Plugin Name: WPLOOK Twitter Follow Button
* Plugin URI: https://wplook.com	
* Description: Add the Follow Button to your blog to increase engagement and create a lasting connection with your audience. After enabling this plugin visit <a href="widgets.php">the widgets page</a>
* Author: Valeriu Tihai
* Version: 1.0.1
* Author URI: http://stylishwp.com
*/

add_action('widgets_init', create_function('', 'return register_widget("WPLOOKTwitterFollowButton");'));
class WPLOOKTwitterFollowButton extends WP_Widget {

	public function __construct() {
		parent::__construct(
	 		'WPLOOKTwitterFollowButton',
	 		__( 'Twitter Follow Button', SWP_TEXTDOMAIN ),
			array( 'description' => __( 'Add the Follow Button to your blog to increase engagement and create a lasting connection with your audience.', 'wpl'), )
		);
	}

	function form($instance) {
		// outputs the options form on admin
		if ( $instance ) {
			$wpl_title = esc_attr($instance['wpl_title']); 
			$wpl_username = esc_attr($instance['wpl_username']);
			$wpl_data_show_count = esc_attr($instance['wpl_data_show_count']);
			$wpl_size = esc_attr($instance['wpl_size']);
			$wpl_show_screen_name = esc_attr($instance['wpl_show_screen_name']);
			$wpl_data_dnt = esc_attr($instance['wpl_data_dnt']);
			$wpl_language = esc_attr($instance['wpl_language']);
		}
		else {
			$wpl_title = __( 'Follow Button ', 'wpl' );
			$wpl_username = 'StylishWP';
			$wpl_data_show_count = 'true';
			$wpl_size = 'medium';
			$wpl_show_screen_name = 'true';
			$wpl_data_dnt = 'false';
			$wpl_language = 'en';
		}

		?>
		<p>
			<label for="<?php echo $this->get_field_id('wpl_title'); ?>">
				<?php _e('Title:', 'wpl'); ?>
			</label>
			<input class="widefat" id="<?php echo $this->get_field_id('wpl_title'); ?>" name="<?php echo $this->get_field_name('wpl_title'); ?>" type="text" value="<?php echo $wpl_title; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('wpl_username'); ?>">
				<?php _e('Twitter Username:', 'wpl'); ?>
			</label>
			<input class="widefat" id="<?php echo $this->get_field_id('wpl_username'); ?>" name="<?php echo $this->get_field_name('wpl_username'); ?>" type="text" value="<?php echo $wpl_username; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('wpl_data_show_count'); ?>">
				<?php _e('Followers count display:', 'wpl'); ?>
				<br />
			</label>
			<select id="<?php echo $this->get_field_id('wpl_data_show_count'); ?>" name="<?php echo $this->get_field_name('wpl_data_show_count'); ?>">
				<option value="true" <?php selected( 'true', $wpl_data_show_count ); ?>><?php _e('Yes', 'wpl'); ?></option>
				<option value="false" <?php selected( 'false', $wpl_data_show_count ); ?>><?php _e('No', 'wpl'); ?></option>
			</select>

		</p>
		<p>
			<label for="<?php echo $this->get_field_id('wpl_size'); ?>">
				<?php _e('Button Size:', 'wpl'); ?>
				<br />
			</label>
			<select id="<?php echo $this->get_field_id('wpl_size'); ?>" name="<?php echo $this->get_field_name('wpl_size'); ?>">
				<option value="medium" <?php selected( 'medium', $wpl_size ); ?>><?php _e('Medium', 'wpl'); ?></option>
				<option value="large" <?php selected( 'large', $wpl_size ); ?>><?php _e('Large', 'wpl'); ?></option>
			</select>
		</p>
		
		
		<p>
			<label for="<?php echo $this->get_field_id('wpl_show_screen_name'); ?>">
				<?php _e('Show Screen Name:', 'wpl'); ?>
			</label>
			<select id="<?php echo $this->get_field_id('wpl_show_screen_name'); ?>" name="<?php echo $this->get_field_name('wpl_show_screen_name'); ?>">
				<option value="true" <?php selected( 'true', $wpl_show_screen_name ); ?>><?php _e('Yes', 'wpl'); ?></option>
				<option value="false" <?php selected( 'false', $wpl_show_screen_name ); ?>><?php _e('No', 'wpl'); ?></option>
			</select>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('wpl_data_dnt'); ?>">
				<?php _e('Opt-out of tailoring Twitter:', 'wpl'); ?>
			</label>
			<select id="<?php echo $this->get_field_id('wpl_data_dnt'); ?>" name="<?php echo $this->get_field_name('wpl_data_dnt'); ?>">
				<option value="true" <?php selected( 'true', $wpl_data_dnt ); ?>><?php _e('Yes', 'wpl'); ?></option>
				<option value="false" <?php selected( 'false', $wpl_data_dnt ); ?>><?php _e('No', 'wpl'); ?></option>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('wpl_language'); ?>">
				<?php _e('Language:', 'wpl'); ?>
				<br />
			</label>
			<select id="<?php echo $this->get_field_id('wpl_language'); ?>" name="<?php echo $this->get_field_name('wpl_language'); ?>">
				<option value="en" <?php selected( 'en', $wpl_language ); ?>><?php _e('English', 'wpl'); ?></option>
				<option value="fr" <?php selected( 'fr', $wpl_language ); ?>><?php _e('French', 'wpl'); ?></option>
				<option value="de" <?php selected( 'de', $wpl_language ); ?>><?php _e('German', 'wpl'); ?></option>
				<option value="it" <?php selected( 'it', $wpl_language ); ?>><?php _e('Italian', 'wpl'); ?></option>
				<option value="ja" <?php selected( 'ja', $wpl_language ); ?>><?php _e('Japanese', 'wpl'); ?></option>
				<option value="ko" <?php selected( 'ko', $wpl_language ); ?>><?php _e('Korean', 'wpl'); ?></option>
				<option value="ru" <?php selected( 'ru', $wpl_language ); ?>><?php _e('Russian', 'wpl'); ?></option>
				<option value="es" <?php selected( 'es', $wpl_language ); ?>><?php _e('Spanish', 'wpl'); ?></option>
				<option value="tr" <?php selected( 'tr', $wpl_language ); ?>><?php _e('Turkish', 'wpl'); ?></option>
			</select>
		</p>
		
		
		
		<?php 
	} 

	function update($new_instance, $old_instance) {
		// processes widget options to be saved
		$instance = $old_instance;
		
		$instance['wpl_title'] = sanitize_text_field($new_instance['wpl_title']);
		$instance['wpl_username'] = sanitize_text_field($new_instance['wpl_username']);
		$instance['wpl_data_show_count'] = sanitize_text_field($new_instance['wpl_data_show_count']);
		$instance['wpl_size'] = sanitize_text_field($new_instance['wpl_size']);
		$instance['wpl_show_screen_name'] = sanitize_text_field($new_instance['wpl_show_screen_name']);
		$instance['wpl_data_dnt'] = sanitize_text_field($new_instance['wpl_data_dnt']);
		$instance['wpl_language'] = sanitize_text_field($new_instance['wpl_language']);

		return $instance;
	}
	
	function widget($args, $instance) {
		// outputs the content of the widget
		 extract( $args );
			$wpl_title = apply_filters('widget_wpl_title', $instance['wpl_title']);
			$wpl_username = apply_filters('widget_wpl_username', $instance['wpl_username']);
			$wpl_data_show_count = apply_filters('widget_wpl_data_show_count', $instance['wpl_data_show_count']);
			$wpl_size = apply_filters('widget_wpl_size', $instance['wpl_size']);
			$wpl_show_screen_name = apply_filters('widget_wpl_show_screen_name', $instance['wpl_show_screen_name']);
			$wpl_data_dnt = apply_filters('widget_wpl_data_dnt', $instance['wpl_data_dnt']);  
			$wpl_language = apply_filters('widget_wpl_language', $instance['wpl_language']);

		?>

<?php echo $before_widget; ?>
	<?php if ( $wpl_title )
	 	echo $before_title . $wpl_title . $after_title; ?>
		<a href="http://twitter.com/<?php echo $wpl_username; ?>" class="twitter-follow-button" data-show-count="<?php echo $wpl_data_show_count; ?>" data-size="<?php echo $wpl_size; ?>" data-show-screen-name="<?php echo $wpl_show_screen_name; ?>" data-dnt="<?php echo $wpl_data_dnt; ?>" data-lang="<?php echo $wpl_language; ?>" >Follow @<?php echo $wpl_username; ?></a>		
		<?php echo $after_widget; ?>
<?php
	}
}

add_action('wp_head', 'wpl_twitter_follow_js');
function wpl_twitter_follow_js() { 	?>
	<script>window.twttr=(function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],t=window.twttr||{};if(d.getElementById(id))return;js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);t._e=[];t.ready=function(f){t._e.push(f);};return t;}(document,"script","twitter-wjs"));</script>
<?php } ?>