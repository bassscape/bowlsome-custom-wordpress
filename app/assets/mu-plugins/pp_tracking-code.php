<?php
/*
Plugin Name: PixelPress - Tracking Code Insert
Description: Plugin for adding tracking code to the header and/or footer which based on Khaled Hossain Saikat's Plugin Tracking Code. 
Version: 1.0.0
Author: Peter Lugg
Author URI: http://pixelpress.com.au
Min WP Version: 3.4.1
*/

if (realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
    exit('Please don\'t access this file directly.');
}

if (!class_exists( 'PixelPressTrackingCode' )){
    class PixelPressTrackingCode {
        
        function __construct(){     
            add_action( 'admin_menu', array( $this, 'menuItem' ) );    
            add_action( 'wp_head', array( $this, 'wpHead' ) ); 
            add_action( 'wp_footer', array( $this, 'wpFooter' ) );                         
        }
        
        function menuItem(){
            //$page = add_submenu_page( 'options-general.php', 'Tracking Codes', 'Tracking Codes', 'manage_options', 'pixelpress-tracking-codes', array( $this, 'init' ));
            $page = add_submenu_page( 'index.php', 'Tracking Codes', 'Tracking Codes', 'manage_options', 'pixelpress-tracking-codes', array( $this, 'init' ));                       
        }
        
        function init(){
            
            if( isset($_REQUEST['save']) ){
                update_option( 'PixelPress_tracking_code', $_REQUEST );
                $message = "Saved Successfully.";
            }
                        
            $data = get_option('PixelPress_tracking_code');
            $this->form( $data, @$message );
        }
        
        function wpHead(){
            if(defined('WP_LOCAL')){
	            if (WP_LOCAL === FALSE) {
		            $data = get_option('PixelPress_tracking_code');
		            if( isset( $data['tracking_head']['enable'] ) ) {
		            	$tracking_head_code = '<!-- The following scripts are being inserted by the MU-Plugin \'PixelPress - Tracking Code Insert\' because the WP_LOCAL constant has been set to FALSE -->\n';
		            	$tracking_head_code .= $data['tracking_head']['code'];
		            	echo stripcslashes($tracking_head_code);
		            }
	            } else {
		            $tracking_head_code = '<!-- The MU-Plugin \'PixelPress - Tracking Code Insert\' is active but scripts are not being added to this page because the WP_LOCAL constant has been set to TRUE -->\n';
		            echo stripcslashes($tracking_head_code);
	            }
            } else {
	            $tracking_head_code = '<!-- The MU-Plugin \'PixelPress - Tracking Code Insert\' is active but scripts are not being added to this page because the WP_LOCAL constant is NOT defined -->\n';
			    echo stripcslashes($tracking_head_code);
            }        
        }
        
        function wpFooter(){
            if(defined('WP_LOCAL')){
	            if (WP_LOCAL === FALSE) {
		            $data = get_option('PixelPress_tracking_code');
		            if( isset( $data['tracking_footer']['enable'] ) ) {
		            	$tracking_footer_code = '<!-- The following scripts are being inserted by the MU-Plugin \'PixelPress - Tracking Code Insert\' because the WP_LOCAL constant has been set to FALSE -->\n';
		            	$tracking_footer_code .= $data['tracking_footer']['code'];
		            	echo stripcslashes($tracking_footer_code);
		            } else {
			            $tracking_footer_code = '<!-- The MU-Plugin \'PixelPress - Tracking Code Insert\' is active but scripts are not being added to this page because the WP_LOCAL constant has been set to TRUE -->\n';
			            echo stripcslashes($tracking_footer_code);
		            }
	            }
            } else {
	            $tracking_footer_code = '<!-- The MU-Plugin \'PixelPress - Tracking Code Insert\' is active but scripts are not being added to this page because the WP_LOCAL constant is NOT defined -->\n';
			    echo stripcslashes($tracking_footer_code);
            }            
        }
        
        function form( $data, $message=null ){
            ?>
            <div class="wrap">
                <div id="icon-options-general" class="icon32 icon32-posts-page"><br /></div>  
                <form method="post" action="">
                    <h2>Add Your Tracking Codes here</h2>   
                    <?php if( $message ) : ?>
                        <div class="updated"><p><strong><?php echo $message; ?></strong></p></div>
                    <?php endif; ?>
                    <p>
                        <h3>Add tracking codes to wp_head()</h3>
                        <textarea rows="20" cols="150" name="tracking_head[code]"><?php echo stripcslashes( @$data['tracking_head']['code'] ); ?></textarea>
                        <br />
                        <input type="checkbox" name="tracking_head[enable]" <?php checked( @$data['tracking_head']['enable'], 'on' ); ?>  /> Enable Head Tracking Code
                    </p>
                    
                    <p><br /></p>
                    
                    <p>
                        <h3>Add tracking codes to wp_footer()</h3>
                        <textarea rows="20" cols="150" name="tracking_footer[code]"><?php echo stripcslashes( @$data['tracking_footer']['code'] ); ?></textarea>                        <br />
                        <input type="checkbox" name="tracking_footer[enable]"  <?php checked( @$data['tracking_footer']['enable'], 'on' ); ?> /> Enable Footer Tracking Code
                    </p>
                    
                    <p><input class="button-primary" type="submit" name="save" value="Save Changes"/></p>
                    
                </form>             
            </div>            
            <?php
        }
                    
    }
}

global $PixelPressTrackingCode;
$PixelPressTrackingCode = new PixelPressTrackingCode;    
?>