<?php
/*
Plugin Name: cartoon-url
Plugin URI: http://www.4fbbs.cn/2019/09/16/cartoon-url-most-wonderful-url-plugins-for-the-matic/
Description: Cartoon images to the url
Author: bright.j.k
Version: 1.0
Author URI: http://www.4fbbs.cn
License: MIT
*/
if ( ! function_exists( '_fs' ) ) {
    // Create a helper function for easy SDK access.
    function cartoon_fs() {
        global $cartoon_fs;

        if ( ! isset( $cartoon_fs ) ) {
            // Activate multisite network integration.
            if ( ! defined( 'CARTOONWP_FS__PRODUCT_4592_MULTISITE' ) ) {
                define( 'CARTOONWP_FS__PRODUCT_4592_MULTISITE', true );
            }

            // Include Freemius SDK.
            require_once dirname(__FILE__) . '/freemius/start.php';

            $cartoon_fs = fs_dynamic_init( array(
                'id'                  => '4592',
                'slug'                => 'Cartnoon-Url',
                'type'                => 'plugin',
                'public_key'          => 'pk_c0b646e75630e1f7ea25d1ca506b5',
                'is_premium'          => false,
                'has_addons'          => false,
                'has_paid_plans'      => false,
                'is_org_compliant'    => false,
                'menu'                => array(
                    'slug'           => 'cartoon-plugin',
                    'first-path'     => 'admin.php?page=cartoon-plugin',
                    'account'        => false,
                    'support'        => false,
                ),
            ) );
        }

        return $cartoon_fs;
    }

    // Init Freemius.
    cartoon_fs();
    // Signal that SDK was initiated.
    do_action( '_fs_loaded' );
}
add_action('admin_menu', 'cartoon_url_plugin_setup_menu');
 
function cartoon_url_plugin_setup_menu(){
        add_menu_page( 'Cartoon Url Plugin Page', 'Cartoon Url  Plugin', 'manage_options', 'cartoon-plugin', 'cartoon_init' );
}
 
function cartoon_init(){
      cartoon_options_page_html(); 
} 
 
function cartoon_motion() {
    //$chosen = hello_world_get_words();
    //echo "<p id='world'>" . get_bloginfo( 'name', 'display' ) . " 跟你说：{$chosen}</p>";
    $file_path=dirname(__FILE__)."/cb.js";
    $tmp=get_option('groupSelect');
    $str=file_get_contents($file_path);
    echo str_replace("<!--cartoon-motion--!>",esc_html($tmp)."()",$str);
    
}
if (!function_exists('cartoon_pro_register_option')) {
        function cartoon_pro_register_option() {
                register_setting('cartoon-option-group', 'groupSelect');

         }
} 
add_action('admin_init', 'cartoon_pro_register_option');
function cartoon_options_page_html() {
?>
<div class="wrap">
 <h1></h1>
 <form action="options.php" method="post">
<?php settings_fields( 'cartoon-option-group' ); ?>
<?php do_settings_sections( 'cartoon-option-group' ); ?>
<?php
          $ck_gs = get_option('groupSelect');
          print esc_html($ck_gs);
          $ct_array=array();
          $ct_array['Moon Effect']="loop_moon"; 
          $ct_array['Clock Effect']="loop_clock"; 
          $ct_array['Smile Effect']="loop_smile"; 
          $ct_array['Wave Effect']="loop_wave"; 
          $ct_array['Baby Effect']="loop_baby"; 
          $ct_array['Progress Bar Effect']="loop_progress"; 
?>
 <select class="control-select" id="groupSelect" name="groupSelect">
                <?php 
                   foreach($ct_array as $n=>$v)
                   {
                     $op="";
                     if ($ck_gs ==$v) 
                         $op="selected";
                     $op=esc_html($op);
                     print "<option value=\"$v\" $op>$n</option>";
                   }
                ?>
                                    </select>
 <?php
//do_settings_fields( 'myoption-group' );
submit_button(); 
 ?>
 <input type="hidden" name="action" value="update" />  
 </form>
 </div>
 Please Support !
 <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick" />
<input type="hidden" name="hosted_button_id" value="RT8ZQRHWLJYS2" />
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" />
<img alt="" border="0" src="https://www.paypal.com/en_C2/i/scr/pixel.gif" width="1" height="1" />
</form>
<?php
} 
add_action( 'wp_footer', 'cartoon_motion' );
add_action( 'network_admin_edit_cartoonedit', 'cartoon_save_settings' );
 
function cartoon_save_settings(){
 
	//check_admin_referer( '-validate' ); // Nonce security check
 
	update_site_option( 'groupSelect', sanitize_text_field($_POST['groupSelect']) );

 
	wp_redirect( add_query_arg( array(
		'page' => 'cartoon-plugin',
		'updated' => true ), network_admin_url('themes.php')
	));
 
	exit;
 
}


