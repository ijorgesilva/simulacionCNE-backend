<?php

/* ---------------------------------------------------------------------------
*  Plugin Name: CSS Dashboard
*  Plugin Author: Bombano
*  Author URI:
*  Description: 
* --------------------------------------------------------------------------- */
add_action('admin_head', 'acf_css_dashboard');

function acf_css_dashboard() {
  echo '<style>
			.acf-hide {
				display: none !important; 
			}
			.acf-hide-title > .acf-label > label {
				display: none; 
			}
			.acf-hide-box > .acf-input > .acf-fields.-top.-border {
			    border: none;
			}
			.acf-hide-header-table .acf-table thead {
				display: none;
			}
  		</style>';
}

?>