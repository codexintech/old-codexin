<?php

if (!function_exists('codexin_option')){
    /**
     * Function to get options in front-end
     * @param int $option The option we need from the DB
     * @param string $default If $option doesn't exist in DB return $default value
     * @return string
     */

    function codexin_option( $option = false, $default = false ){
        if($option === false){
            return false;
        }
        $codexin_options = wp_cache_get( CODEXIN_THEME_OPTIONS );
        if( ! $codexin_options ){
            $codexin_options = get_option( CODEXIN_THEME_OPTIONS );
            wp_cache_delete( CODEXIN_THEME_OPTIONS );
            wp_cache_add( CODEXIN_THEME_OPTIONS, $codexin_options );
        }

        if(isset($codexin_options[$option]) && $codexin_options[$option] !== ''){
            return $codexin_options[$option];
        }else{
            return $default;
        }
    }
}


function codexin_add_dynamic_js_variables() {

    if(!empty(codexin_option('codexin-google-map-latitude'))):
        $latitude = codexin_option('codexin-google-map-latitude');
    endif;

    if(!empty(codexin_option('codexin-google-map-longitude'))):
        $longtitude = codexin_option('codexin-google-map-longitude');
    endif;

    if(!empty(codexin_option('codexin-google-map-zoom'))):
        $c_zoom = codexin_option('codexin-google-map-zoom');
    endif;

    if(!empty(codexin_option('codexin-google-map-marker'))):
        $gmap_marker = codexin_option('codexin-google-map-marker');
    endif;

    $codeopt = '';
    $codeopt .= '
    <script type="text/javascript">
        var codexin_lat = "'. $latitude .'"; 
        var codexin_long = "'. $longtitude .'"; 
        var codexin_marker = "'. $gmap_marker['url'] .'"; 
        var codexin_m_zoom = Number ("'. $c_zoom .'"); 
    </script>

    ';

    echo $codeopt;

}

add_action('wp_head', 'codexin_add_dynamic_js_variables');