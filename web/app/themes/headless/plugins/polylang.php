<?php

/* ---------------------------------------------------------------------------
*  Plugin Name: enables language and translation management for 'my_cpt
*  Plugin Description: 
*  Plugin Author: Bombano
*  Author URI:
*  Description: https://polylang.pro/doc/filter-reference/#pll_get_post_types
* --------------------------------------------------------------------------- */
// add_filter( 'pll_get_post_types', 'add_cpt_to_pll', 10, 2 );
 
function add_cpt_to_pll( $post_types, $is_settings ) {
    if ( $is_settings ) {
        // hides 'my_cpt' from the list of custom post types in Polylang settings
        unset( $post_types['vod'] );
    } else {
        // enables language and translation management for 'my_cpt'
        $post_types['vod'] = 'vod';
    }
    return $post_types;
}

?>