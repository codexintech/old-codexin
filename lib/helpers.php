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