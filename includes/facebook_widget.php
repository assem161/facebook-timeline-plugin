<?php

class facebook_timeline extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		parent::__construct(
			'fc_timeline', // Base ID
			esc_html__( 'facebook timeline', 'fc_domain' ), // Name
			array( 'facebook timeline' => esc_html__( 'fc_timeline', 'fc_domain' ), ) // Args
		);
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {

			echo $args['before_widget'];
			echo $args['before_title'];
				if(!empty($instance['title'])){
					echo $instance['title'];
				}

			echo $args['after_title'];
		?>
			<div class="fb-page" 
			data-href="<?php if(!empty($instance['fc_url'])) { echo $instance['fc_url'];} ?>" 
			data-tabs="<?php if(!empty($instance['timeline'])) { echo $instance['timeline'];} ?>" 
			data-width="<?php if(!empty($instance['width'])) { echo $instance['width'];} ?>" 
			data-height="<?php if(!empty($instance['height'])) { echo $instance['height'];} ?>" 
			data-small-header="<?php if(!empty($instance['small_header'])) { echo $instance['small_header'];} ?>" 
			data-adapt-container-width="<?php if(!empty($instance['data_width_conatiner'])) { echo $instance['data_width_conatiner'];} ?>" 
			data-hide-cover="<?php if(!empty($instance['hide_cover'])) { echo $instance['hide_cover'];} ?>" 
			data-show-facepile="<?php if(!empty($instance['show_faces'])) { echo $instance['show_faces'];} ?>">
				<blockquote cite="<?php if(!empty($instance['fc_url'])) { echo $instance['fc_url'];} ?>" class="fb-xfbml-parse-ignore">
				<a href="<?php if(!empty($instance['fc_url'])) { echo $instance['fc_url'];} ?>">‏تعلم‏</a>
				</blockquote>
			</div>
			<div id="fb-root"></div>
			<script async defer crossorigin="anonymous" src="https://connect.facebook.net/ar_AR/sdk.js#xfbml=1&version=v3.3">
			</script>			
		<?php
		echo $args['after_widget'];
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		$title = !empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'title', 'fc_domain' );
		$fc_url = !empty( $instance['fc_url'] ) ? $instance['fc_url'] : esc_html__( 'face page url', 'fc_domain' );		
		$timeline = !empty( $instance['timeline'] ) ? $instance['timeline'] : esc_html__( 'timeline', 'fc_domain' );
		$width = !empty( $instance['width'] ) ? $instance['width'] : esc_html__( '400px', 'fc_domain' );
		$height = !empty( $instance['height'] ) ? $instance['height'] : esc_html__( '300px', 'fc_domain' );
		$hide_cover = !empty( $instance['hide_cover'] ) ? $instance['hide_cover'] : esc_html__( 'true', 'fc_domain' );
		$show_faces = !empty( $instance['show_faces'] ) ? $instance['show_faces'] : esc_html__( 'true', 'fc_domain' );
		$small_header = !empty( $instance['small_header'] ) ? $instance['small_header'] : esc_html__( 'true', 'fc_domain' );
		$data_width_conatiner = !empty( $instance['data_width_conatiner'] ) ? $instance['data_width_conatiner'] : esc_html__( 'true', 'fc_domain' );														
		?>

		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'title', 'fc_domain' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'fc_url' ) ); ?>"><?php esc_attr_e( 'face page url', 'fc_domain' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'fc_url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'fc_url' ) ); ?>" type="url" value="<?php echo esc_attr( $fc_url ); ?>">
		</p>
		<p>		
		<label for="<?php echo esc_attr( $this->get_field_id( 'timeline' ) ); ?>"><?php esc_attr_e( 'timeline', 'fc_domain' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'timeline' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'timeline' ) ); ?>" type="text" value="<?php echo esc_attr( $timeline ); ?>">
		</p>
		<p>		
		<label for="<?php echo esc_attr( $this->get_field_id( 'width' ) ); ?>"><?php esc_attr_e( 'width', 'fc_domain' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'width' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'width' ) ); ?>" type="text" value="<?php echo esc_attr( $width ); ?>">
		</p>		
		<p>		
		<label for="<?php echo esc_attr( $this->get_field_id( 'height' ) ); ?>"><?php esc_attr_e( 'height', 'fc_domain' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'height' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'height' ) ); ?>" type="text" value="<?php echo esc_attr( $height ); ?>">
		</p>
		<p>		
		<label for="<?php echo esc_attr( $this->get_field_id( 'hide_cover' ) ); ?>"><?php esc_attr_e( 'hide cover', 'fc_domain' ); ?></label> 
		<select class="widefat" type="text" name="<?php echo esc_attr( $this->get_field_name( 'hide_cover' ) ); ?>" id="<?php echo esc_attr( $this->get_field_name( 'hide_cover' ) ); ?>">
			<option value="true" <?php echo ($hide_cover == 'true') ? 'selected' : ''; ?>>true</option>
			<option value="false" <?php echo ($hide_cover == 'false') ? 'selected' : ''; ?>>false</option>
		</select>
		</p>
		<p>		
		<label for="<?php echo esc_attr( $this->get_field_id( 'show_faces' ) ); ?>"><?php esc_attr_e( 'show faces', 'fc_domain' ); ?></label> 
		<select class="widefat" type="text" name="<?php echo esc_attr( $this->get_field_name( 'show_faces' ) ); ?>" id="<?php echo esc_attr( $this->get_field_name( 'show_faces' ) ); ?>">
			<option value="true" <?php echo ($show_faces == 'true') ? 'selected' : ''; ?>>true</option>
			<option value="false" <?php echo ($show_faces == 'false') ? 'selected' : ''; ?>>false</option>
		</select>
		</p>
		<p>		
		<label for="<?php echo esc_attr( $this->get_field_id( 'small_header' ) ); ?>"><?php esc_attr_e( 'small header', 'fc_domain' ); ?></label> 
		<select class="widefat" type="text" name="<?php echo esc_attr( $this->get_field_name( 'small_header' ) ); ?>" id="<?php echo esc_attr( $this->get_field_name( 'small_header' ) ); ?>">
			<option value="true" <?php echo ($small_header == 'true') ? 'selected' : ''; ?>>true</option>
			<option value="false" <?php echo ($small_header == 'false') ? 'selected' : ''; ?>>false</option>
		</select>
		</p>
		<p>		
		<label for="<?php echo esc_attr( $this->get_field_id( 'data_width_conatiner' ) ); ?>"><?php esc_attr_e( 'conatiner width', 'fc_domain' ); ?></label> 
		<select class="widefat" type="text" name="<?php echo esc_attr( $this->get_field_name( 'data_width_conatiner' ) ); ?>" id="<?php echo esc_attr( $this->get_field_name( 'data_width_conatiner' ) ); ?>">
			<option value="true" <?php echo ($data_width_conatiner == 'true') ? 'selected' : ''; ?>>true</option>
			<option value="false" <?php echo ($data_width_conatiner == 'false') ? 'selected' : ''; ?>>false</option>
		</select>
		</p>																		
		<?php 
	}


	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 *
	 * @return array
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( !empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['fc_url'] = ( !empty( $new_instance['fc_url'] ) ) ? sanitize_text_field( $new_instance['fc_url'] ) : '';
		$instance['timeline'] = ( !empty( $new_instance['timeline'] ) ) ? sanitize_text_field( $new_instance['timeline'] ) : '';
		$instance['width'] = ( !empty( $new_instance['width'] ) ) ? sanitize_text_field( $new_instance['width'] ) : '';
		$instance['height'] = ( !empty( $new_instance['height'] ) ) ? sanitize_text_field( $new_instance['height'] ) : '';
		$instance['hide_cover'] = ( !empty( $new_instance['hide_cover'] ) ) ? sanitize_text_field( $new_instance['hide_cover'] ) : '';
		$instance['show_faces'] = ( !empty( $new_instance['show_faces'] ) ) ? sanitize_text_field( $new_instance['show_faces'] ) : '';
		$instance['small_header'] = ( !empty( $new_instance['small_header'] ) ) ? sanitize_text_field( $new_instance['small_header'] ) : '';
		$instance['data_width_conatiner'] = ( !empty( $new_instance['data_width_conatiner'] ) ) ? sanitize_text_field( $new_instance['data_width_conatiner'] ) : '';																					
		return $instance;
	}
}