<?php 
/**
 * widget-recent-post.php
 * This Class Show The Most Recent/Latest Posts of the Defult post..
 * Devloped & Designe by Codexin on 28-04-2012..
 * Modyfied & Updated By Codexin
 *
 */


class codexin_recent_post_widget extends WP_Widget {

	public function __construct() {
		parent::__construct(
			'codexin_recent_post_widget',
			__('Codexin Recent Posts ', 'codexin'),
			array(
				'description'	=> __('This Widegts Can Display Most Recent Posts', 'codexin')
				)
			);

 	} // End parent::__construct


 	public function widget( $args, $instance ) {

 		$title = $instance['title'];
 		if($instance['showposts']){
 			$per_page = $instance['showposts'];
 		}else{
 			$per_page = 3;
 		}

 		$result = '';	

 		$result .= $args['before_widget'];
 		$result .= $args['before_title'] . $title;

 		$q = new WP_Query(
 			array( 
 				'orderby' => 'date', 
 				'order'   => 'DEC',
 				'showposts' => $per_page, 
 				'ignore_sticky_posts' => '1',
 				'post_type' => 'post',
 				'cat'  => ''
 				)
 			);

 		
 		$result .= '<ul>';


 		if($q->have_posts()):
 			while ($q->have_posts()): $q->the_post();
 		ob_start();?>

            <li class="article-widget-item recetange-item">
                <a href="#" class="entry-thumbnail"> <img width="100" height="75" src="<?php the_post_thumbnail_url('thumbnail'); ?>" class="img-responsive wp-post-image" alt=""> </a>
                <!-- .entry-thumb -->
                <div class="content">
                    <a class="title-link" href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), 8, null ); ?></a>
                    <div class="post-meta">
                        </span> <span class="meta-time">
                            <a href="#"><span><?php the_time('M j, Y') ?></span></a>
                        </span>
                        <span class="author vcard"><span class="fn">By <span class="screen-reader-text">Author </span><a class="url fn n" rel="author"><?php the_author(); ?></a></span>
                    </div>
                </div>
            </li>


 		<?php $result .= ob_get_clean();
 		endwhile;


 		wp_reset_query();
 		endif;

 		$result.= '</ul>'; 
 		
 		echo $result;


 	}


 	public function form($instance) {

 		if( isset( $instance['title'] )){
 			$get_title = $instance['title'];
 		}else{
 			$get_title = __('Recent Posts', 'codexin');
 		}//end $instance['title']..

 		if( isset($instance['showposts']) ){
 			$per_page = $instance['showposts'];
 		}else {
 			$per_page = 3;
 		}//end $instance['showposts']..


 		
 		?>

 		<p>
 			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e(' Title : ', 'codexin'); ?></label>
 		</p>
 		<p>
 			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" type="text" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $get_title; ?>"></input>
 		</p><!--End title -->

 		<p>
 			<label for="<?php echo $this->get_field_id('showposts'); ?>" ><?php _e(' Show Posts Number : ', 'codexin'); ?></label>
 		</p>
 		<p>
 			<input class="widefat" id="<?php echo $this->get_field_id('showposts'); ?>" type="number" name="<?php echo $this->get_field_name( 'showposts' ); ?>" value="<?php echo $per_page; ?>">
 		</p><!--End showposts -->


 		<?php }	// End function form..



 } // End codexin_recent_post_widget







 // Add widgets into the hook
 add_action( 'widgets_init', function() {
 	register_widget('codexin_recent_post_widget');
 } );



 ?>