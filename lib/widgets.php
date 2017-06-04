<?php
	
add_action( 'widgets_init', 'codexin_sidebar_widgets_init' );

function codexin_sidebar_widgets_init () {
	
	register_sidebar( array(
		'name'				=> 'Sidebar (General)',
		'id'				=> 'codexin-sidebar-general',
		'description'		=> 'This sidebar will show everywhere the sidebar is enabled, both Posts and Pages.',	
	    'class'         	=> '',
		'before_widget' 	=> '<div class="sidebar-widget clearfix">',
		'after_widget'  	=> '</div>',			
	) );

	register_sidebar( array(
		'name'				=> 'Sidebar (Pages)',
		'id'				=> 'codexin-sidebar-page',
		'description'		=> 'This sidebar will show on all Pages.',
	    'class'         	=> '',
		'before_widget' 	=> '<div class="sidebar-widget clearfix">',
		'after_widget'  	=> '</div>',		
	) );
	
	register_sidebar( array(
		'name' 				=> 'Sidebar (Blog)',
		'id'				=> 'codexin-sidebar-blog',
		'description'		=> 'This sidebar will show on all blog Posts.', 
	    'class'         	=> '',
		'before_widget' 	=> '<div class="sidebar-widget clearfix">',
		'after_widget'  	=> '</div>',		
	) );

	register_sidebar( array(
		'name' 				=> 'Sidebar (Contact Page)',
		'id'				=> 'codexin-sidebar-contact-template',
		'description'		=> 'This sidebar will show only on Contact Page.', 
	    'class'         	=> '',
		'before_widget' 	=> '<div class="sidebar-widget clearfix">',
		'after_widget'  	=> '</div>',		
	) );

} // codexin_sidebar_widgets_init ()
	



add_action( 'widgets_init', 'codexin_footer_widgets' );

function codexin_footer_widgets () {

	$codexin_footer = codexin_option('codexin-footer-version');
			

	if($codexin_footer == 1):
	register_sidebar( array(
		'name'				=> 'Footer (Column-1)',
		'id'				=> 'codexin-footer-col-1',
	    'class'         	=> '',
	    'before_title'		=> '<h4>',
	    'after_title'		=> '</h4>',
		'before_widget' 	=> '',
		'after_widget'  	=> '',			
	) );

	register_sidebar( array(
		'name'				=> 'Footer (Column-2)',
		'id'				=> 'codexin-footer-col-2',
	    'class'         	=> '',
		'before_title'		=> '<h4>',
	    'after_title'		=> '</h4>',
		'before_widget' 	=> '',
		'after_widget'  	=> '',			
	) );

	register_sidebar( array(
		'name'				=> 'Footer (Column-3)',
		'id'				=> 'codexin-footer-col-3',
	    'class'         	=> '',
		'before_title'		=> '<h4>',
	    'after_title'		=> '</h4>',
		'before_widget' 	=> '',
		'after_widget'  	=> '',			
	) );
	
	register_sidebar( array(
		'name'				=> 'Footer (Column-4)',
		'id'				=> 'codexin-footer-col-4',
	    'class'         	=> '',
		'before_title'		=> '<h4>',
	    'after_title'		=> '</h4>',
		'before_widget' 	=> '',
		'after_widget'  	=> '',			
	) );

	elseif($codexin_footer == 2):
	register_sidebar( array(
		'name'				=> 'Footer (Left)',
		'id'				=> 'codexin-footer-col-1',
	    'class'         	=> '',
	    'before_title'		=> '<h4>',
	    'after_title'		=> '</h4>',
		'before_widget' 	=> '',
		'after_widget'  	=> '',			
	) );

	register_sidebar( array(
		'name'				=> 'Footer (Middle)',
		'id'				=> 'codexin-footer-col-2',
	    'class'         	=> '',
		'before_title'		=> '<h4>',
	    'after_title'		=> '</h4>',
		'before_widget' 	=> '',
		'after_widget'  	=> '',			
	) );

	register_sidebar( array(
		'name'				=> 'Footer (Right)',
		'id'				=> 'codexin-footer-col-3',
	    'class'         	=> '',
		'before_title'		=> '<h4>',
	    'after_title'		=> '</h4>',
		'before_widget' 	=> '',
		'after_widget'  	=> '',			
	) );

	elseif($codexin_footer == 3):
	register_sidebar( array(
		'name'				=> 'Footer (Left)',
		'id'				=> 'codexin-footer-col-1',
	    'class'         	=> '',
	    'before_title'		=> '<h4>',
	    'after_title'		=> '</h4>',
		'before_widget' 	=> '',
		'after_widget'  	=> '',			
	) );

	register_sidebar( array(
		'name'				=> 'Footer (Right)',
		'id'				=> 'codexin-footer-col-2',
	    'class'         	=> '',
		'before_title'		=> '<h4>',
	    'after_title'		=> '</h4>',
		'before_widget' 	=> '',
		'after_widget'  	=> '',			
	) );

	elseif($codexin_footer == 4):
	register_sidebar( array(
		'name'				=> 'Footer (Left)',
		'id'				=> 'codexin-footer-col-1',
	    'class'         	=> '',
	    'before_title'		=> '<h4>',
	    'after_title'		=> '</h4>',
		'before_widget' 	=> '',
		'after_widget'  	=> '',			
	) );

	register_sidebar( array(
		'name'				=> 'Footer (Middle)',
		'id'				=> 'codexin-footer-col-2',
	    'class'         	=> '',
		'before_title'		=> '<h4>',
	    'after_title'		=> '</h4>',
		'before_widget' 	=> '',
		'after_widget'  	=> '',			
	) );

	register_sidebar( array(
		'name'				=> 'Footer (Right)',
		'id'				=> 'codexin-footer-col-3',
	    'class'         	=> '',
		'before_title'		=> '<h4>',
	    'after_title'		=> '</h4>',
		'before_widget' 	=> '',
		'after_widget'  	=> '',			
	) );

	elseif($codexin_footer == 5):
	register_sidebar( array(
		'name'				=> 'Footer (Column-1)',
		'id'				=> 'codexin-footer-col-1',
	    'class'         	=> '',
	    'before_title'		=> '<h4>',
	    'after_title'		=> '</h4>',
		'before_widget' 	=> '',
		'after_widget'  	=> '',			
	) );

	register_sidebar( array(
		'name'				=> 'Footer (Column-2)',
		'id'				=> 'codexin-footer-col-2',
	    'class'         	=> '',
		'before_title'		=> '<h4>',
	    'after_title'		=> '</h4>',
		'before_widget' 	=> '',
		'after_widget'  	=> '',			
	) );

	register_sidebar( array(
		'name'				=> 'Footer (Column-3)',
		'id'				=> 'codexin-footer-col-3',
	    'class'         	=> '',
		'before_title'		=> '<h4>',
	    'after_title'		=> '</h4>',
		'before_widget' 	=> '',
		'after_widget'  	=> '',			
	) );
	
	register_sidebar( array(
		'name'				=> 'Footer (Column-4)',
		'id'				=> 'codexin-footer-col-4',
	    'class'         	=> '',
		'before_title'		=> '<h4>',
	    'after_title'		=> '</h4>',
		'before_widget' 	=> '',
		'after_widget'  	=> '',			
	) );

	register_sidebar( array(
		'name'				=> 'Footer (Column-5)',
		'id'				=> 'codexin-footer-col-5',
	    'class'         	=> '',
		'before_title'		=> '<h4>',
	    'after_title'		=> '</h4>',
		'before_widget' 	=> '',
		'after_widget'  	=> '',			
	) );

	elseif($codexin_footer == 6):
	register_sidebar( array(
		'name'				=> 'Footer (Column-1)',
		'id'				=> 'codexin-footer-col-1',
	    'class'         	=> '',
	    'before_title'		=> '<h4>',
	    'after_title'		=> '</h4>',
		'before_widget' 	=> '',
		'after_widget'  	=> '',			
	) );

	register_sidebar( array(
		'name'				=> 'Footer (Column-2)',
		'id'				=> 'codexin-footer-col-2',
	    'class'         	=> '',
		'before_title'		=> '<h4>',
	    'after_title'		=> '</h4>',
		'before_widget' 	=> '',
		'after_widget'  	=> '',			
	) );

	register_sidebar( array(
		'name'				=> 'Footer (Column-3)',
		'id'				=> 'codexin-footer-col-3',
	    'class'         	=> '',
		'before_title'		=> '<h4>',
	    'after_title'		=> '</h4>',
		'before_widget' 	=> '',
		'after_widget'  	=> '',			
	) );
	
	register_sidebar( array(
		'name'				=> 'Footer (Column-4)',
		'id'				=> 'codexin-footer-col-4',
	    'class'         	=> '',
		'before_title'		=> '<h4>',
	    'after_title'		=> '</h4>',
		'before_widget' 	=> '',
		'after_widget'  	=> '',			
	) );

	endif;
} // codexin_footer_widgets ()	

?>