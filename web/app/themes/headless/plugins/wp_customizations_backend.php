<?php

/* ---------------------------------------------------------------------------
*  Plugin Name: Hde Slug box for post
*  Plugin Author: Bombano
*  Author URI:
*  Description: 
* --------------------------------------------------------------------------- */
function hide_slug_options() {
  global $post;
  global $pagenow;
  $hide_slugs = "<style type=\"text/css\">#slugdiv, #edit-slug-box, [for=\"slugdiv-hide\"] { display: none; }</style>\n";
  if (is_admin() && $pagenow=='post-new.php' OR $pagenow=='post.php') print($hide_slugs);
}
add_action( 'admin_head', 'hide_slug_options'  );

/* ---------------------------------------------------------------------------
*  Plugin Name: Hde all update notifications
*  Plugin Author: Bombano
*  Author URI:
*  Description: 
* --------------------------------------------------------------------------- */
function remove_core_updates(){
  global $wp_version;return(object) array('last_checked'=> time(),'version_checked'=> $wp_version,);
}
add_filter('pre_site_transient_update_core','remove_core_updates'); //hide updates for WordPress itself
add_filter('pre_site_transient_update_plugins','remove_core_updates'); //hide updates for all plugins
add_filter('pre_site_transient_update_themes','remove_core_updates'); //hide updates for all themes

/* ---------------------------------------------------------------------------
*  Plugin Name: Change Howdy
*  Plugin Author: Bombano
*  Author URI:
*  Description: 
* --------------------------------------------------------------------------- */
add_filter( 'admin_bar_menu', 'replace_wordpress_howdy', 25 );
function replace_wordpress_howdy( $wp_admin_bar ) {
  $my_account = $wp_admin_bar->get_node('my-account');

  $newtext = str_replace( 'Howdy,', '', $my_account->title );

  $wp_admin_bar->add_node( 
    array(
      'id' => 'my-account',
      'title' => $newtext,
    ) 
  );

}

/* ---------------------------------------------------------------------------
*  Plugin Name: Logo URL
*  Plugin Author: Bombano
*  Author URI:
*  Description: 
* --------------------------------------------------------------------------- */
function wpb_custom_logo() {
  echo '
      <style type="text/css">
        #wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon:before {
          background-image: url(' . get_bloginfo('stylesheet_directory') . '/images/logo_dashboard.svg) !important;
          background-position: 0 0;
          color:rgba(0, 0, 0, 0);
        }
        #wpadminbar #wp-admin-bar-wp-logo.hover > .ab-item .ab-icon {
          background-position: 0 0;
        }
      </style>
    ';
}
add_action('wp_before_admin_bar_render', 'wpb_custom_logo');

/* ---------------------------------------------------------------------------
*  Plugin Name: Remove WP Version
*  Plugin Author: Bombano
*  Author URI:
*  Description: 
* --------------------------------------------------------------------------- */
// Org URL
function login_logo_url() {
  return esc_url( '#' );  // Main Website URL
} 
add_filter( 'login_headerurl', 'login_logo_url' );

// Org Title
function login_logo_url_title() {
  return 'Victory Church';
}
add_filter( 'login_headertext', 'login_logo_url_title' );

/* ---------------------------------------------------------------------------
*  Plugin Name: CSS Login Page
*  Plugin Author: Bombano
*  Author URI:
*  Description: 
* --------------------------------------------------------------------------- */
add_action( 'login_head', 'custom_css_login_page' );

function custom_css_login_page() { ?>
    <style>
      /* Background */
      body.login {
         width: 100%; 
         height: 100%; 
         background-image:url(https://twimg0-a.akamaihd.net/a/1350072692/t1/img/front_page/jp-mountain@2x.jpg); 
         background-size: cover; 
         background-attachment:fixed; 
         margin: 0; 
         padding: 0; 
      }
      /* Title */
      .login h1 {
        padding-top: 10px;
      }
      /* Login Logo */
      body.login div#login h1 a {
        background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/logo_login.svg );
        background-size: 300px;
        min-height: 70px;
        min-width: 300px;
        margin: 0px;
      }
      /* Login Container */
      #login {
          box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22);
          margin: 0;
          height: 100vh;
          max-width: 320px;
          padding: 0px 30px;
          display: flex;
          align-items: center;
          justify-content: center;
          flex-direction: column;
          background-color: white;
      }
      .login form {
          background: none;
          box-shadow: unset;
          border: unset;
      }
      /* LOGIN PAGE */
      #backtoblog {
        display:none !important;
      }

    </style>

  <?php
}

/* ---------------------------------------------------------------------------
*  Plugin Name: Remove WP Version
*  Plugin Author: Bombano
*  Author URI:
*  Description: 
* --------------------------------------------------------------------------- */
function remove_footer_wp_version() {
    remove_filter( 'update_footer', 'core_update_footer' ); 
}
add_action( 'admin_menu', 'remove_footer_wp_version' );

/* ---------------------------------------------------------------------------
*  Plugin Name: Remove WP Version
*  Plugin Author: Bombano
*  Author URI:
*  Description: 
* --------------------------------------------------------------------------- */
function remove_wordpress_version() {
return '';
}
add_filter('the_generator', 'remove_wordpress_version');

/* ---------------------------------------------------------------------------
*  Plugin Name: Remove CSS & JS Version
*  Plugin Author: Bombano
*  Author URI:
*  Description: 
* --------------------------------------------------------------------------- */
add_filter( 'style_loader_src',  'sdt_remove_ver_css_js', 9999, 2 );
add_filter( 'script_loader_src', 'sdt_remove_ver_css_js', 9999, 2 );
function sdt_remove_ver_css_js( $src, $handle ) {
    $handles_with_version = [ 'style' ]; // <-- Adjust to your needs!
    if ( strpos( $src, 'ver=' ) && ! in_array( $handle, $handles_with_version, true ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}

/* ---------------------------------------------------------------------------
*  Plugin Name: Custom Admin footer
*  Plugin Author: Bombano
*  Author URI:
*  Description: 
* --------------------------------------------------------------------------- */
function remove_footer_admin () {
  echo '';
}
add_filter('admin_footer_text', 'remove_footer_admin');

/* ---------------------------------------------------------------------------
*  Plugin Name: CSS Dashboard
*  Plugin Author: Bombano
*  Author URI:
*  Description: 
* --------------------------------------------------------------------------- */
add_action('admin_head', 'custom_css_dashboard');

function custom_css_dashboard() {
  echo '<style>

    /* Admin Menu */
    #toplevel_page_upload-heading-true a:hover,
    #toplevel_page_edit-post_type-periodoelectoral-heading-true a:hover,
    #toplevel_page_edit-heading-true a:hover,
    #toplevel_page_edit-post_type-redirect-heading-true a:hover,
      #toplevel_page_admin-page-website-general-settings-heading-true a:hover,
      #toplevel_page_edit-post_type-acf-field-group-heading-true a:hover{
        background-color: #0f0a1b;
        cursor: default;
    }

    #toplevel_page_upload-heading-true .wp-menu-image,
    #toplevel_page_edit-post_type-periodoelectoral-heading-true .wp-menu-image,
    #toplevel_page_edit-heading-true .wp-menu-image,
    #toplevel_page_edit-post_type-redirect-heading-true .wp-menu-image,
    #toplevel_page_admin-page-website-general-settings-heading-true .wp-menu-image,
    #toplevel_page_edit-post_type-acf-field-group-heading-true .wp-menu-image{
        display: none !important;
    }

    #toplevel_page_upload-heading-true .wp-menu-name,
    #toplevel_page_edit-post_type-periodoelectoral-heading-true .wp-menu-name,
    #toplevel_page_edit-heading-true .wp-menu-name,
    #toplevel_page_edit-post_type-redirect-heading-true .wp-menu-name,
    #toplevel_page_admin-page-website-general-settings-heading-true .wp-menu-name,
    #toplevel_page_edit-post_type-acf-field-group-heading-true .wp-menu-name{
      font-weight: bold;
      color: rgba(255,255,255,0.3) !important;
      padding-left: 8px !important;
    }

  </style>';
}

/* ---------------------------------------------------------------------------
*  Plugin Name: Add Separators
*  Plugin Author: Bombano
*  Author URI:
*  Description: 
* --------------------------------------------------------------------------- */
add_action( 'admin_init', 'add_admin_menu_separator' );
function add_admin_menu_separator( $position ) {
  global $menu;
  $menu[ $position ] = array(
    0 =>  '',
    1 =>  'read',
    2 =>  'separator' . $position,
    3 =>  '',
    4 =>  'wp-menu-separator'
  );
}

add_action( 'admin_menu', 'set_admin_menu_separator' );
function set_admin_menu_separator() {
  do_action( 'admin_init', 100 );
  do_action( 'admin_init', 110 );
  do_action( 'admin_init', 120 );
  do_action( 'admin_init', 130 );
  do_action( 'admin_init', 140 );
  do_action( 'admin_init', 150 );
  do_action( 'admin_init', 160 );
  do_action( 'admin_init', 170 );
  do_action( 'admin_init', 180 );
  do_action( 'admin_init', 190 );
  do_action( 'admin_init', 200 );
}

/* ---------------------------------------------------------------------------
*  Plugin Name: Remove Menues
*  Plugin Author: Bombano
*  Author URI:
*  Description: https://developer.wordpress.org/reference/functions/remove_menu_page/
* --------------------------------------------------------------------------- */
function wp_remove_menus(){
   
  remove_menu_page( 'edit-comments.php' );          //Comments
  // remove_menu_page( 'customize.php' );                  //Customize
  // remove_menu_page( 'themes.php' );                //Appearance
  //remove_menu_page( 'tools.php' );                  //Tools
  //remove_menu_page( 'options-general.php' );        //Settings
  // remove_menu_page( 'tools.php' );
   if ( ! is_admin() ) {
    remove_menu_page( 'edit.php?post_type=acf-field-group&heading=true' );
    remove_menu_page( 'edit.php?post_type=acf-field-group' );
    remove_menu_page( 'gf_edit_forms' );
    remove_menu_page( 'tools.php' );
    remove_menu_page( 'graphql' );
    remove_menu_page( 'plugins.php' );
    remove_menu_page( 'themes.php' );
    remove_menu_page( 'update-core.php?alt=true' );
    remove_menu_page( 'separator-last' );
  }
}
add_action( 'admin_menu', 'wp_remove_menus' );


/* ---------------------------------------------------------------------------
*  Plugin Name: Remove Sub Menues
*  Plugin Author: Bombano
*  Author URI:
*  Description: https://developer.wordpress.org/reference/functions/remove_submenu_page/
* --------------------------------------------------------------------------- */
function wp_adjust_the_wp_menu() {
    $page = remove_submenu_page( 'options-general.php', 'options-discussion.php' );
    $page = remove_submenu_page( 'options-general.php', 'options-reading.php' );
    $page = remove_submenu_page( 'index.php', 'update-core.php' );
    // $page[0] is the menu title
    // $page[1] is the minimum level or capability required
    // $page[2] is the URL to the item's file
}
add_action( 'admin_menu', 'wp_adjust_the_wp_menu', 999 );

/* ---------------------------------------------------------------------------
*  Plugin Name: Add submenu to parent Menu
*  Plugin Author: Bombano
*  Author URI:
*  Description: https://wordpress.stackexchange.com/questions/134857/add-labels-to-admin-menu-how-to
* --------------------------------------------------------------------------- */

/* ---------------------------------------------------------------------------
*  Plugin Name: Add Custom Menu Items
*  Plugin Author: Bombano
*  Author URI:
*  Description: https://stackoverflow.com/questions/62613855/create-a-wordpress-admin-menu-item-and-link-to-a-page
* --------------------------------------------------------------------------- */

add_action( 'admin_menu', 'register_my_custom_menu_page' );
function register_my_custom_menu_page() {
  
  // Updates | add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
  add_menu_page( 'Simulador - Menu Heading', 'Simulador', 'edit_posts', 'edit.php?post_type=periodoelectoral?heading=true', '', 'dashicons-minus', 200 );
  add_menu_page( 'Paginas & Posts - Menu Heading', 'Paginas & Posts', 'edit_posts', 'edit.php?heading=true', '', 'dashicons-minus', 210 );
  add_menu_page( 'Herramientas - Menu Heading', 'Herramientas' , 'edit_posts', 'edit.php?post_type=redirect&heading=true', '', 'dashicons-minus', 280 );
  add_menu_page( 'Configuraciones - Menu Heading', 'Configuraciones', 'edit_posts', 'admin.php?page=website-general-settings&heading=true', '', 'dashicons-minus', 290 );
  add_menu_page( 'Admin - Menu Heading', 'Admin', 'edit_posts', 'edit.php?post_type=acf-field-group&heading=true', '', 'dashicons-minus', 300 );

  // Custom Links
  add_menu_page( 'Updates', 'Updates', 'edit_posts', 'update-core.php?alt=true', '', 'dashicons-update-alt', 350 );
  
}

/* ---------------------------------------------------------------------------
*  Plugin Name: Reorder Dashboard Menu
*  Plugin Author: Bombano
*  Author URI:
*  Description: https://wordpress.stackexchange.com/questions/276230/how-can-i-control-the-position-in-the-admin-menu-of-items-added-by-plugins
* --------------------------------------------------------------------------- */
function wpse_custom_menu_order( $menu_ord ) {
    if ( !$menu_ord ) return true;

    return array(
        'index.php', // Dashboard
        'separator1', // First separator

        'edit.php?post_type=periodoelectoral?heading=true',  // Simulador Votos
        'edit.php?post_type=periodoelectoral',
        'edit.php?post_type=posicion',
        'edit.php?post_type=candidato',
        'edit.php?post_type=partido',

        'edit.php?heading=true',  // HEADING POSTS AND PAGES
        'edit.php', // Posts
        'edit.php?post_type=page', // Pages
        'edit.php?post_type=news',
        'separator110', // Separator

        'upload.php?heading=true',  // HEADING RESOURCES
        'upload.php', // Media
        'edit.php?post_type=document',
        'edit.php?post_type=link',
        'edit.php?post_type=form',
        'separator150', // Separator

        'edit.php?post_type=redirect&heading=true', // HEADING TOOLS
        'edit.php?post_type=redirect',
        'separator160', // Separator

        'admin.php?page=website-general-settings&heading=true',  // HEADING SETTINGS
        'edit.php?post_type=section',
        'edit.php?post_type=custommenu',
        'options-general.php', // WP General Settings
        'wpseo_dashboard', //'admin.php?page=wpseo_dashboard', // SEO
        'mlang', // Language
        'users.php', // Users
        'separator170', // Separator

        'edit.php?post_type=acf-field-group&heading=true',  // HEADING SUPER ADMIN
        'website-general-settings',//'admin.php?page=website-general-settings', // Static Website Settings
        'edit.php?post_type=acf-field-group', // 'acf-field-group', // ACF
        'admin.php?page=aam',
        'gf_edit_forms',//'edit.php?post_type=acf-field-group', // Gravity Forms
        'tools.php', // WP Tools
        'graphql', // GraphiQL
        'plugins.php', // Plugins
        'themes.php', // Themes - Appareance
        'update-core.php?alt=true', // Updates Available
        // 'edit-comments.php', // Comments
        // 'themes.php', // Appearance
        // 'tools.php', // Tools
        'separator-last', // Last separator
    );
}
add_filter( 'custom_menu_order', 'wpse_custom_menu_order', 10, 1 );
add_filter( 'menu_order', 'wpse_custom_menu_order', 10, 1 );


/* ---------------------------------------------------------------------------
*  Plugin Name: Remove Admin Bar Icons
*  Plugin Author: Bombano
*  Author URI:
*  Description: https://jasonyingling.me/removing-items-from-the-wordpress-admin-bar/
* --------------------------------------------------------------------------- */

function remove_from_admin_bar($wp_admin_bar) {
    if ( ! is_admin() ) {
    }
 
    $wp_admin_bar->remove_node('wp-logo');
    $wp_admin_bar->remove_node('site-name');
    $wp_admin_bar->remove_node('updates');
    $wp_admin_bar->remove_node('comments');
    $wp_admin_bar->remove_node('customize');

    // Plugin Generated
    $wp_admin_bar->remove_node('wpseo-menu');
    $wp_admin_bar->remove_node('graphiql-ide');
    $wp_admin_bar->remove_node('gform-forms');
}
add_action('admin_bar_menu', 'remove_from_admin_bar', 999);

/* ---------------------------------------------------------------------------
*  Plugin Name: Remove Customizer
*  Plugin Author: Bombano
*  Author URI:
*  Description: https://stackoverflow.com/questions/25788511/remove-submenu-page-customize-php-in-wordpress-4-0
* --------------------------------------------------------------------------- */
function remove_customize() {
    $customize_url_arr = array();
    $customize_url_arr[] = 'customize.php'; // 3.x
    $customize_url = add_query_arg( 'return', urlencode( wp_unslash( $_SERVER['REQUEST_URI'] ) ), 'customize.php' );
    $customize_url_arr[] = $customize_url; // 4.0 & 4.1
    if ( current_theme_supports( 'custom-header' ) && current_user_can( 'customize') ) {
        $customize_url_arr[] = add_query_arg( 'autofocus[control]', 'header_image', $customize_url ); // 4.1
        $customize_url_arr[] = 'custom-header'; // 4.0
    }
    if ( current_theme_supports( 'custom-background' ) && current_user_can( 'customize') ) {
        $customize_url_arr[] = add_query_arg( 'autofocus[control]', 'background_image', $customize_url ); // 4.1
        $customize_url_arr[] = 'custom-background'; // 4.0
    }
    foreach ( $customize_url_arr as $customize_url ) {
        remove_submenu_page( 'themes.php', $customize_url );
    }
}
add_action( 'admin_menu', 'remove_customize', 999 );

/* ---------------------------------------------------------------------------
*  Plugin Name: Hide help tab
*  Plugin Author: Bombano
*  Author URI:
*  Description: https://wordpress.stackexchange.com/questions/50787/how-to-remove-contextual-help-on-wp-3-3-2
* --------------------------------------------------------------------------- */
function wp_remove_contextual_help() {
    $screen = get_current_screen();
    $screen->remove_help_tabs();
}
add_action( 'admin_head', 'wp_remove_contextual_help' );


/* ---------------------------------------------------------------------------
*  Plugin Name: Hide Dashboard Widgets
*  Plugin Author: Bombano
*  Author URI:
*  Description: 
* --------------------------------------------------------------------------- */
function disable_default_dashboard_widgets() {
  global $wp_meta_boxes;
  // wp..
  // unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_site_health']);
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);
  // bbpress
  unset($wp_meta_boxes['dashboard']['normal']['core']['bbp-dashboard-right-now']);
  // yoast seo
  unset($wp_meta_boxes['dashboard']['normal']['core']['wpseo-dashboard-overview']);
  // gravity forms
  unset($wp_meta_boxes['dashboard']['normal']['core']['rg_forms_dashboard']);
}
add_action('wp_dashboard_setup', 'disable_default_dashboard_widgets', 999);

/* ---------------------------------------------------------------------------
*  Plugin Name: Change Default color Scheme wordpress
*  Plugin Author: Bombano
*  Author URI:
*  Description:  This is the default color scheme for new users
*  Source: https://www.wpbeginner.com/wp-tutorials/how-to-set-default-admin-color-scheme-for-new-users-in-wordpress/
* --------------------------------------------------------------------------- */

/* Remove option to change color scheme */
if ( !current_user_can('manage_options') ) {
  //remove_action( 'admin_color_scheme_picker', 'admin_color_scheme_picker' );
}

/* Register new color scheme */
function dynamos_admin_color_scheme() {
  //Get the theme directory
  $theme_dir = get_template_directory_uri();
 
  //Dynamos
  wp_admin_css_color( 'dynamos', __( 'Dynamos' ),
    $theme_dir . '/plugins/css/dynamos.css',
    array( '#0f0a1b', '#ffffff', '#d54e21' , '#0d8da0')
  );
}
add_action('admin_init', 'dynamos_admin_color_scheme');

/* Set default color scheme for new users */
function set_default_admin_color($user_id) {
    $args = array(
        'ID' => $user_id,
        'admin_color' => 'dynamos'
    );
    wp_update_user( $args );
}
add_action('user_register', 'set_default_admin_color');


/* ---------------------------------------------------------------------------
*  Plugin Name: Hide ACF for everyone except admin/user ID 1
*  Plugin Author: Bombano
*  Author URI: 
*  Description:
*  Source: https://www.advancedcustomfields.com/resources/how-to-hide-acf-menu-from-clients/
*  https://stackoverflow.com/questions/36420082/how-to-remove-the-custom-fields-menu
* --------------------------------------------------------------------------- */
// hide ACF menus for all users except those specified
function show_hide_acf_menu( $show ) {

    // array of user IDs that are allowed to see ACF menu
    $allowedUsers = array(1);

    // get the current user's ID
    $userID = get_current_user_id();

    if (in_array($userID, $allowedUsers)) {
        return true;
    } else {
        return false;
    }
}
add_filter('acf/settings/show_admin', 'show_hide_acf_menu');


/* ---------------------------------------------------------------------------
*  Plugin Name: Duplicate CPTs
*  Plugin Author: Bombano
*  Author URI: 
*  Description: Filter to allow 'Yoast Duplicate Post' to duplicate CPTs
*  Source: https://developer.yoast.com/duplicate-post/filters-actions/
* --------------------------------------------------------------------------- */
function my_custom_enabled_post_types( $enabled_post_types ) {
  // $enabled_post_types[] = 'posicion';
  // $enabled_post_types[] = 'candidato';
  // $enabled_post_types[] = 'partido';
  // $enabled_post_types[] = 'periodoelectoral';
  return $enabled_post_types;
}
add_filter('duplicate_post_enabled_post_types', 'my_custom_enabled_post_types');
?>