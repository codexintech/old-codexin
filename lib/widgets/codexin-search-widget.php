<?php 
/**
 * merryll-search-widget.php
 * 
 * Developed & Designed by Codexin on 28-04-2017..
 * Modyfied & Updated By Codexin
 *
 */


class merryll_search_widget extends WP_Widget {

	public function __construct() {
		parent::__construct(
			'merryll_search_widget',
			__('Merryll Search Widget', 'merryll'),
			array(
				'description'	=> __('This Widegts Can Display Search Box', 'merryll')
				)
			);

 	} // End parent::__construct


 	public function widget( $args, $instance ) {

 		$title = $instance['title'];
 		

 		$result = '';	
 		
 		$result .= $args['before_widget'];
 		$result .= $args['before_title'] . $title . $args['after_title'];

 		ob_start();
 		?>
 		
 		<div id="cx_search_widget">
			<form id="search-form" method="get" action="<?php echo home_url( '/' ); ?>"> 
				<input class="cx-search-form w-250 clr-1" type="search" name="s"  value="<?php echo get_search_query(); ?>" placeholder="<?php _e('search some content here..', 'merryll'); ?>" autocomplete="off" />
			</form>
 		</div>

 		<?php 


 		$result .= ob_get_clean(); 		

 		$result .= $args['after_widget'];

 		echo $result;


 	}


 	public function form($instance) {

 		if( isset( $instance['title'] )){
 			$get_title = $instance['title'];
 		}else{
 			$get_title = __('Search on site', 'merryll');
 		}
 		
 		?>

 		<p>
 			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e(' Title : ', 'merryll'); ?></label>
 		</p>
 		<p>
 			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" type="text" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $get_title; ?>"></input>
 		</p><!--End title -->

 		<?php }	// End function form..



 } // End merryll_search_widget



 // Add widgets into the hook
 add_action( 'widgets_init', function() {
 	register_widget('merryll_search_widget');
 } );



 ?>