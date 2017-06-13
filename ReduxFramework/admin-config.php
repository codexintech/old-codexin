<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }


    // This is your option name where all the Redux data is stored.
    $opt_name = CODEXIN_THEME_OPTIONS;

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'codexin/opt_name', $opt_name );

    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

    $sampleHTML = '';
    if ( file_exists( dirname( __FILE__ ) . '/info-html.html' ) ) {
        Redux_Functions::initWpFilesystem();

        global $wp_filesystem;

        $sampleHTML = $wp_filesystem->get_contents( dirname( __FILE__ ) . '/info-html.html' );
    }

    // Background Patterns Reader
    $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
    $sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
    $sample_patterns      = array();
    
    if ( is_dir( $sample_patterns_path ) ) {

        if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) {
            $sample_patterns = array();

            while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

                if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
                    $name              = explode( '.', $sample_patterns_file );
                    $name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
                    $sample_patterns[] = array(
                        'alt' => $name,
                        'img' => $sample_patterns_url . $sample_patterns_file
                    );
                }
            }
        }
    }

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.

        'disable_tracking' => true,
        
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => __( 'Theme Options', 'codexin' ),
        'page_title'           => __( 'Theme Options', 'codexin' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => false,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    // ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
    $args['admin_bar_links'][] = array(
        'id'    => 'redux-docs',
        'href'  => 'http://docs.reduxframework.com/',
        'title' => __( 'Documentation', 'codexin' ),
    );

    $args['admin_bar_links'][] = array(
        //'id'    => 'redux-support',
        'href'  => 'https://github.com/ReduxFramework/redux-framework/issues',
        'title' => __( 'Support', 'codexin' ),
    );

    $args['admin_bar_links'][] = array(
        'id'    => 'redux-extensions',
        'href'  => 'reduxframework.com/extensions',
        'title' => __( 'Extensions', 'codexin' ),
    );

    // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
   

    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        $args['intro_text'] = sprintf( __( '<p>Welcome to Codexin Theme options</p>', 'codexin' ), $v );
    } else {
        $args['intro_text'] = __( '<p>Thanks for using Codexin Theme Options</p>', 'codexin' );
    }

    // Add content after the form.
    $args['footer_text'] = __( '<p>Thanks for using Codexin Theme Options</p>', 'codexin' );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => __( 'Theme Information 1', 'codexin' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'codexin' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => __( 'Theme Information 2', 'codexin' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'codexin' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'codexin' );
    Redux::setHelpSidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */






    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


     */

    // -> START Basic Fields

    // -> START Typography
    Redux::setSection( $opt_name, array(
        'title'  => __( 'Typography', 'codexin' ),
        'id'     => 'codexin-typography',
        'desc'   => __( 'Theme Typography Section ', 'codexin' ),
        'icon'   => 'el el-font',
        'fields' => array(
            array(
                'id'       => 'codexin-typography-body',
                'type'     => 'typography',
                'title'    => __( 'Body Font', 'codexin' ),
                'subtitle' => __( 'Specify the body font properties.', 'codexin' ),
                'google'   => true,
                'output'   => array('body'),
                'default'  => array(
                    'color'       => '#333',
                    'font-size'   => '16px',
                    'line-height' => '26px',
                    'font-family' => 'Arial,Helvetica,sans-serif',
                    'font-weight' => 'Normal',
                ),
            ),
            array(
                'id'          => 'codexin-typography-h2',
                'type'        => 'typography',
                'title'       => __( 'Typography h2', 'codexin' ),
                //'compiler'      => true,  // Use if you want to hook in your own CSS compiler
                //'google'      => false,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => true,
                // Select a backup non-google font in addition to a google font
                //'font-style'    => false, // Includes font-style and weight. Can use font-style or font-weight to declare
                //'subsets'       => false, // Only appears if google is true and subsets not set to false
                //'font-size'     => false,
                //'line-height'   => false,
                //'word-spacing'  => true,  // Defaults to false
                //'letter-spacing'=> true,  // Defaults to false
                //'color'         => false,
                //'preview'       => false, // Disable the previewer
                //'all_styles'  => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'      => array( 'h2' ),
                // An array of CSS selectors to apply this font style to dynamically
                //'compiler'    => array( 'h2' ),
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => __( 'Typography option with each property can be called individually.', 'codexin' ),
                'default'     => array(
                    'color'       => '#333',
                    'font-style'  => '700',
                    'font-family' => 'Abel',
                    'google'      => true,
                    'font-size'   => '33px',
                    'line-height' => '40px'
                ),
            ),
        )
    ) );


    Redux::setSection( $opt_name, array(
        'title'            => __( 'Header', 'codexin' ),
        'icon'             => 'dashicons dashicons-admin-settings',
        'id'               => 'codexin-header-option',
        'customizer_width' => '500px',
    ) );

    Redux::setSection( $opt_name, array(
        'title'            => __( 'Header Versions', 'codexin' ),
        'id'               => 'codexin-header',
        'customizer_width' => '500px',
        'subsection'       => true,
        'fields'           => array(

            array(
                'id'       => 'codexin-header-version',
                'type'     => 'image_select',
                'title'    => __( 'Select Navigation Type', 'codexin' ),
                'desc'     => __( 'Choose Header Type', 'codexin' ),
                //Must provide key => value pairs for select options
                'options'  => array(
                    '1' => array(
                        'alt' => 'Header-1',
                        'img' => ReduxFramework::$_url . 'assets/img/header-1.png'
                    ),
                    '2' => array(
                        'alt' => 'Header-2',
                        'img' => ReduxFramework::$_url . 'assets/img/header-2.png'
                    ),
                    '3' => array(
                        'alt' => 'Header-3',
                        'img' => ReduxFramework::$_url . 'assets/img/header-3.png'
                    ),
                    '4' => array(
                        'alt' => 'Header-4',
                        'img' => ReduxFramework::$_url . 'assets/img/header-4.png'
                    ),
                //     '5' => array(
                //         'alt' => 'Header-5',
                //         'img' => ReduxFramework::$_url . 'assets/img/header-5.png'
                //     ),
                //     '6' => array(
                //         'alt' => 'Header-6',
                //         'img' => ReduxFramework::$_url . 'assets/img/header-6.png'
                //     ),
                ),
                'default'  => '1'
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'            => __( 'Header Top Options', 'codexin' ),
        'id'               => 'codexin-email-phone',
        'customizer_width' => '500px',
        'subsection'       => true,
        'fields'           => array(

            array(
                'id'       => 'codexin-header-top',
                'type'     => 'switch',
                'title'    => __( 'Enable Header Top?', 'codexin' ),
                'subtitle' => __( 'Select to enable/disable header top', 'codexin' ),
                'default'  => 1,
                'on'       => 'Enabled',
                'off'      => 'Disabled',
            ),

            array(
                'id'       => 'codexin-phone',
                'type'     => 'text',
                'required' => array( 'codexin-header-top', '=', '1' ),
                'title'    => __( 'Phone Number', 'codexin' ),
                'desc'     => __( 'Please insert  Your Phone: example: (707) 123-4567 ', 'codexin' ),
                'default'  => '(707) 123-4567',
            ),


            array(
                'id'       => 'codexin-phone-url',
                'type'     => 'text',
                'required' => array( 'codexin-header-top', '=', '1' ),
                'title'    => __( 'Phone Number URL', 'codexin' ),
                'desc'     => __( 'Please enter phone number URL: example: +17071234567  ', 'codexin' ),
                'default'  => '+7071234567',
            ),

            array(
                'id'       => 'codexin-email',
                'type'     => 'text',
                'required' => array( 'codexin-header-top', '=', '1' ),
                'title'    => __( 'Email', 'codexin' ),
                'desc'     => __( 'Please insert  Your Email  ', 'codexin' ),
                'default'  => 'email@email.com',
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'            => __( 'Social Media ', 'codexin' ),
        'customizer_width' => '500px',
        'id'               => 'codexin-social-media',
        'subsection'       => true,
        'fields'           => array(
            array(
                'id'       => 'codexin-twitter',
                'type'     => 'text',
                'title'    => __( 'Twitter ', 'codexin' ),
                'desc'     => __( 'Please insert Twitter profile  ', 'codexin' ),
                'default'  => '',
            ),
            array(
                'id'       => 'codexin-facebook',
                'type'     => 'text',
                'title'    => __( 'Facebook ', 'codexin' ),
                'desc'     => __( 'Please insert Facebook profile  ', 'codexin' ),
                'default'  => '',
            ),

            array(
                'id'       => 'codexin-instagram',
                'type'     => 'text',
                'title'    => __( 'Instagram ', 'codexin' ),
                'desc'     => __( 'Please Insert Instagram profile  ', 'codexin' ),
                'default'  => '',
            ),

             array(
                'id'       => 'codexin-linkedin',
                'type'     => 'text',
                'title'    => __( 'Linkedin ', 'codexin' ),
                'desc'     => __( 'Please Insert Linkedin profile  ', 'codexin' ),
                'default'  => '',
            ),
             array(
                'id'       => 'codexin-youtube',
                'type'     => 'text',
                'title'    => __( 'Youtube ', 'codexin' ),
                'desc'     => __( 'Please Insert Youtube profile  ', 'codexin' ),
                'default'  => '',
            ),
             array(
                'id'       => 'codexin-vimeo',
                'type'     => 'text',
                'title'    => __( 'Vimeo ', 'codexin' ),
                'desc'     => __( 'Please Insert vimeo profile  ', 'codexin' ),
                'default'  => '',
            ),

             array(
                'id'       => 'codexin-google-plus',
                'type'     => 'text',
                'title'    => __( 'Google-Plus ', 'codexin' ),
                'desc'     => __( 'Please Insert Google Plus profile  ', 'codexin' ),
                'default'  => '',
            ),
            
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Logo', 'codexin' ),
        'customizer_width' => '500px',
        'id'               => 'codexin-logo-section',
        'subsection'       => true,
        'fields'           => array(
            array(
                'id'       => 'codexin-logo',
                'type'     => 'media',
                'title'    => __( 'Logo  ', 'codexin' ),
                'desc'     => __( 'Please Upload  Logo ', 'codexin' ),
                'default'  => array( 'url' => 'http://placehold.it/250X50' ),
            ),
            
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'            => __( 'Breadcrumbs', 'codexin' ),
        'customizer_width' => '500px',
        'id'               => 'codexin-bc',
        'subsection'       => true,
        'fields'           => array(
            array(
                'id'       => 'codexin-bcrumbs',
                'type'     => 'switch',
                'title'    => __( 'Enable Breadcrumbs?', 'codexin' ),
                'subtitle' => __( 'Select to enable/disable Breadcrumbs', 'codexin' ),
                'default'  => 1,
                'on'       => 'Enabled',
                'off'      => 'Disabled',
            ),
            
        )
    ) );


    // footer section 

    Redux::setSection( $opt_name, array(
        'title'            => __( 'Footer', 'codexin' ),
        'icon'             => 'dashicons dashicons-admin-generic',
        'id'               => 'codexin-footer-option',
        'customizer_width' => '500px',
    ) );

    Redux::setSection( $opt_name, array(
        'title'            => __( 'Footer Layout', 'codexin' ),
        'customizer_width' => '500px',
        'id'               => 'codexin-footer',
        'subsection'       => true,
        'fields'           => array(

            array(
                'id'       => 'codexin-footer-version',
                'type'     => 'image_select',
                'title'    => __( 'Select Footer Layout Type', 'codexin' ),
                'desc'     => __( 'Choose Footer Layout Type', 'codexin' ),
                //Must provide key => value pairs for select options
                'options'  => array(
                    '1' => array(
                        'alt' => 'Footer-1',
                        'img' => ReduxFramework::$_url . 'assets/img/footer-1.jpg'
                    ),
                    '2' => array(
                        'alt' => 'Footer-2',
                        'img' => ReduxFramework::$_url . 'assets/img/footer-2.jpg'
                    ),
                    '3' => array(
                        'alt' => 'Footer-3',
                        'img' => ReduxFramework::$_url . 'assets/img/footer-3.jpg'
                    ),
                    '4' => array(
                        'alt' => 'Footer-4',
                        'img' => ReduxFramework::$_url . 'assets/img/footer-4.jpg'
                    ),
                    '5' => array(
                        'alt' => 'Footer-5',
                        'img' => ReduxFramework::$_url . 'assets/img/footer-5.jpg'
                    ),
                    '6' => array(
                        'alt' => 'Footer-6',
                        'img' => ReduxFramework::$_url . 'assets/img/footer-6.jpg'
                    ),
                ),
                'default'  => '1'
            ),

        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'            => __( 'Footer Copyright', 'codexin' ),
        'customizer_width' => '500px',
        'id'               => 'codexin-footer-cpr',
        'subsection'       => true,
        'fields'           => array(

            array(
                'id'       => 'codexin-footer_copyright',
                'type'     => 'switch',
                'title'    => __( 'Enable Footer Copyright?', 'codexin' ),
                'subtitle' => __( 'Select to enable/disable Footer Copyright', 'codexin' ),
                'default'  => 1,
                'on'       => 'Enabled',
                'off'      => 'Disabled',
            ),


            array(
                'id'       => 'codexin-copyright',
                'type'     => 'textarea',
                'required' => array( 'codexin-footer_copyright', '=', '1' ),
                'title'    => __( 'Footer copyright text  ', 'codexin' ),
                'desc'     => __( 'Please add your copyright text  ', 'codexin' ),
                'validate' => 'html',
                'default'  => 'HTML is allowed in here.'
            ),

        )
    ) );
            



    Redux::setSection( $opt_name, array(
            'title'            => __( 'Map Settings', 'codexin' ),
            'customizer_width' => '500px',
            'icon'             => 'dashicons dashicons-admin-post',
            'id'               => 'codexin-map-parent',
            'desc'             => 'You can find the <strong>Latitude</strong> and <strong>Longitude</strong> information by placing your address here <a href="http://www.latlong.net/" target="_blank">http://www.latlong.net/</a>',
            'fields'           => array(


                array(
                    'title' => __('Insert Google Map API Key', 'codexin'),
                    'desc' => 'Enter Your Google Map API Key',
                    'id'    => 'codexin-google-map-api-key',                  
                    'type'  => 'text',
                    'desc'  => 'If you don\'t have the API key yet, then <a href="https://developers.google.com/maps/documentation/javascript/get-api-key" target="_blank">Click Here</a> to get a API key', 
                    'default' => ''
                ),

                array(
                    'title' => __('Insert Map Latitude', 'codexin'),
                    //'desc' => 'Upload image here',
                    'id'    => 'codexin-google-map-latitude',
                    
                    //'subtitle' => __( 'Recommended image size 1920X1080 ', 'codexin' ),

                    'type'  => 'text',
                    'default' => '39.414269'
                ),

                array(
                    'title' => __('Insert Map Longitude', 'codexin'),
                    //'desc' => 'Upload image here',
                    'id'    => 'codexin-google-map-longitude',
                    
                    //'subtitle' => __( 'Recommended image size 1920X1080 ', 'codexin' ),

                    'type'  => 'text',
                    'default' => '-77.410541'
                ),

                array(
                    'title' => __('Map Zoom Level', 'codexin'),
                    //'desc' => 'Upload image here',
                    'id'    => 'codexin-google-map-zoom',
                    'type'  => 'text',
                    'default' => '15'
                ),

	            array(
	                'id'       => 'codexin-google-map-marker',
	                'type'     => 'media',
	                'url'      => true,
	                'title'    => __( 'Upload Map Marker', 'codexin' ),
	                'compiler' => 'true',
	                //'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
	                // 'desc'     => __( 'Basic media uploader with disabled URL input field.', 'codexin' ),
	                // 'subtitle' => __( 'Upload any media using the WordPress native uploader', 'codexin' ),
	                'default'  => array( 'url' => ReduxFramework::$_url . 'assets/img/map-marker-1.png' ),
	                //'hint'      => array(
	                //    'title'     => 'Hint Title',
	                //    'content'   => 'This is a <b>hint</b> for the media field with a Title.',
	                //)
	            ),

            )
        ) );


    //Dont Paste Anything Below this Line

    Redux::setSection( $opt_name, array(
        'icon'            => 'el el-list-alt',
        'title'           => __( 'Customizer Only', 'codexin' ),
        'desc'            => __( '<p class="description">This Section should be visible only in Customizer</p>', 'codexin' ),
        'customizer_only' => true,
        'fields'          => array(
            array(
                'id'              => 'opt-customizer-only',
                'type'            => 'select',
                'title'           => __( 'Customizer Only Option', 'codexin' ),
                'subtitle'        => __( 'The subtitle is NOT visible in customizer', 'codexin' ),
                'desc'            => __( 'The field desc is NOT visible in customizer.', 'codexin' ),
                'customizer_only' => true,
                //Must provide key => value pairs for select options
                'options'         => array(
                    '1' => 'Opt 1',
                    '2' => 'Opt 2',
                    '3' => 'Opt 3'
                ),
                'default'         => '2'
            ),
        )
    ) );

    if ( file_exists( dirname( __FILE__ ) . '/../README.md' ) ) {
        $section = array(
            'icon'   => 'el el-list-alt',
            'title'  => __( 'Documentation', 'codexin' ),
            'fields' => array(
                array(
                    'id'       => '17',
                    'type'     => 'raw',
                    'markdown' => true,
                    'content_path' => dirname( __FILE__ ) . '/../README.md', // FULL PATH, not relative please
                    //'content' => 'Raw content here',
                ),
            ),
        );
        Redux::setSection( $opt_name, $section );
    }
    /*
     * <--- END SECTIONS
     */


    /*
     *
     * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR ANY OTHER CONFIG MAY OVERRIDE YOUR CODE.
     *
     */

    /*
    *
    * --> Action hook examples
    *
    */

    // If Redux is running as a plugin, this will remove the demo notice and links
    //add_action( 'redux/loaded', 'remove_demo' );

    // Function to test the compiler hook and demo CSS output.
    // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
    //add_filter('redux/options/' . $opt_name . '/compiler', 'compiler_action', 10, 3);

    // Change the arguments after they've been declared, but before the panel is created
    //add_filter('redux/options/' . $opt_name . '/args', 'change_arguments' );

    // Change the default value of a field after it's been set, but before it's been useds
    //add_filter('redux/options/' . $opt_name . '/defaults', 'change_defaults' );

    // Dynamically add a section. Can be also used to modify sections/fields
    //add_filter('redux/options/' . $opt_name . '/sections', 'dynamic_section');

    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
        }
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $field['msg']    = 'your custom error message';
                $return['error'] = $field;
            }

            if ( $warning == true ) {
                $field['msg']      = 'your custom warning message';
                $return['warning'] = $field;
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => __( 'Section via hook', 'codexin' ),
                'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'codexin' ),
                'icon'   => 'el el-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            //$args['dev_mode'] = true;

            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }
    }

    /**
     * Removes the demo link and the notice of integrated demo from the redux-framework plugin
     */
    if ( ! function_exists( 'remove_demo' ) ) {
        function remove_demo() {
            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                remove_filter( 'plugin_row_meta', array(
                    ReduxFrameworkPlugin::instance(),
                    'plugin_metalinks'
                ), null, 2 );

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
            }
        }
    }

