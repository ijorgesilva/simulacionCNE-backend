<?php 



/* ---------------------------------------------------------------------------
*  Plugin Name: Console with PHP
*  Plugin Author: Bombano
*  Author URI:
*  Description: https://stackoverflow.com/questions/4323411/how-can-i-write-to-console-in-php
* --------------------------------------------------------------------------- */
function console( $data ) {
    $output = $data;
    if ( is_array( $output ) )
        $output = implode( ',', $output);

    echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
}


/* ---------------------------------------------------------------------------
*  Plugin Name: Console Log
*  Plugin Author: Bombano
*  Author URI: 
*  Description:
* --------------------------------------------------------------------------- */
function console_log($output, $with_script_tags = true) {
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . 
');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}

/* ---------------------------------------------------------------------------
*  Plugin Name: Get Query String Parameters
*  Plugin Author: Bombano
*  Author URI: 
*  Description: Usage: query string: ?foo=lorem&bar=&baz || var foo = getParameterByName('foo'); // "lorem"
*  Source: https://stackoverflow.com/questions/901115/how-can-i-get-query-string-values-in-javascript
* --------------------------------------------------------------------------- */
function js_query_string_loader(){
	?>
		<script>
			function getParameterByName(name, url = window.location.href) {
			    name = name.replace(/[\[\]]/g, '\\$&');
			    var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
			        results = regex.exec(url);
			    if (!results) return null;
			    if (!results[2]) return '';
			    return decodeURIComponent(results[2].replace(/\+/g, ' '));
			}
		</script>
	<?php
}
add_action('wp_head','js_query_string_loader');



/* ---------------------------------------------------------------------------
*  Plugin Name: Get Backend current post type
*  Plugin Author: Bombano
*  Author URI: 
*  Description: if ( 'vod' == get_current_post_type() ) {}
*  Source: https://wp-mix.com/get-current-post-type-wordpress/
* --------------------------------------------------------------------------- */
function custom_get_current_post_type() {
	
	global $post, $typenow, $current_screen;
	if ($post && $post->post_type) return $post->post_type;
	elseif($typenow) return $typenow;
	elseif($current_screen && $current_screen->post_type) return $current_screen->post_type;
	elseif(isset($_REQUEST['post_type'])) return sanitize_key($_REQUEST['post_type']);

	return null;
}


/* ---------------------------------------------------------------------------
*  Plugin Name: Is Edit Page
*  Plugin Author: 
*  Author URI: 
*  Description: if (is_edit_page()){ }
*  Source: https://wordpress.stackexchange.com/questions/50043/how-to-determine-whether-we-are-in-add-new-page-post-cpt-or-in-edit-page-post-cp
* --------------------------------------------------------------------------- */
function is_edit_page($new_edit = null){
    global $pagenow;
    //make sure we are on the backend
    if (!is_admin()) return false;


    if($new_edit == "edit")
        return in_array( $pagenow, array( 'post.php',  ) );
    elseif($new_edit == "new") //check for new post page
        return in_array( $pagenow, array( 'post-new.php' ) );
    else //check for either new or edit
        return in_array( $pagenow, array( 'post.php', 'post-new.php' ) );
}

?>