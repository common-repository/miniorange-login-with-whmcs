<?php

require('class-mo-oauth-client-admin-utils.php');
require('account/class-mo-oauth-client-admin-account.php');
require('apps/class-mo-oauth-client-apps.php');
require('licensing/class-mo-oauth-client-license.php');
require('guides/class-mo-oauth-client-guides.php');
require('support/class-mo-oauth-client-support.php');
require('guides/class-mo-oauth-client-attribute-mapping.php');
require('reports/class-mo-oauth-client-reports.php');
require('demo/class-mo-oauth-client-demo.php');
require('faq/class-mo-oauth-client-faq.php');
require('addons/class-mo-oauth-client-addons.php');

function mo_oauth_client_plugin_settings_style($hook) {
	if($hook != 'toplevel_page_mo_oauth_settings') {
		return;
	}
	wp_enqueue_style( 'mo_oauth_admin_style', plugin_dir_url( dirname(__FILE__) ) . 'css/admin.css' );
	wp_enqueue_style( 'mo_oauth_admin_settings_style', plugin_dir_url( dirname(__FILE__) ) . 'css/style_settings.css' );
	wp_enqueue_style( 'mo_oauth_admin_settings_font_awesome', plugin_dir_url( dirname(__FILE__) ) . 'css/font-awesome.css' );
	wp_enqueue_style( 'mo_oauth_admin_settings_phone_style', plugin_dir_url( dirname(__FILE__) ) . 'css/phone.css' );
	wp_enqueue_style( 'mo_oauth_admin_settings_datatable_style', plugin_dir_url( dirname(__FILE__) ) . 'css/jquery.dataTables.min.css' );
}

function mo_oauth_client_plugin_settings_script($hook) {
	if($hook != 'toplevel_page_mo_oauth_settings') {
		return;
	}
	wp_enqueue_script( 'mo_oauth_admin_script', plugin_dir_url( dirname(__FILE__) ) . 'js/admin.js' );
	wp_enqueue_script( 'mo_oauth_admin_settings_script', plugin_dir_url( dirname(__FILE__) ) . 'js/settings.js' );
	wp_enqueue_script( 'mo_oauth_admin_settings_phone_script', plugin_dir_url( dirname(__FILE__) ) . 'js/phone.js' );
	wp_enqueue_script( 'mo_oauth_admin_settings_datatable_script', plugin_dir_url( dirname(__FILE__) ) . 'js/jquery.dataTables.min.js' );
}

function mo_oauth_client_main_menu() {
	$today = date("Y-m-d H:i:s");
	$date = "2020-12-31 23:59:59";
	$currenttab = "";
	if(isset($_GET['tab']))
		$currenttab = $_GET['tab'];

	Mo_OAuth_Client_Admin_Utils::curl_extension_check();
	Mo_OAuth_Client_Admin_Menu::show_menu($currenttab);
	echo '<div id="mo_oauth_settings">';
		Mo_OAuth_Client_Admin_Menu::show_idp_link($currenttab);
		if ( $today <= $date )
			Mo_OAuth_Client_Admin_Menu::show_bfs_note();
		echo '
		<div class="miniorange_container">';

		echo '<table style="width:100%;">
			<tr>
				<td style="vertical-align:top;width:65%;" class="mo_oauth_content">';


				Mo_OAuth_Client_Admin_Menu::show_tab($currenttab);

				Mo_OAuth_Client_Admin_Menu::show_support_sidebar($currenttab);
				echo '</tr>
				</table>
				<div class="mo_tutorial_overlay" id="mo_tutorial_overlay" hidden></div>
		</div>';
}


function mo_oauth_hbca_xyake(){if(get_option('mo_oauth_admin_customer_key') > 138200)return true;else return false;}

class Mo_OAuth_Client_Admin_Menu {

	public static function show_menu($currenttab) {
		?> <div class="wrap">
			<div><img style="float:left;" src="<?php echo esc_url( dirname(plugin_dir_url( __FILE__ )) );?>/images/logo.png"></div>
		</div>
		        <div class="wrap">
            <h1>

                miniOrange <?php echo esc_attr( MO_OAUTH_PLUGIN_NAME ); ?>&nbsp
                <a id="license_upgrade" class="add-new-h2 add-new-hover" style="background-color: orange !important; border-color: orange; font-size: 16px; color: #000;" href="<?php echo esc_url( add_query_arg( array( 'tab' => 'licensing' ), htmlentities( $_SERVER['REQUEST_URI'] ) ) ); ?>">Premium plans</a>
                <a id="faq_button_id" class="add-new-h2" href="https://faq.miniorange.com/kb/oauth-openid-connect/" target="_blank" rel="noopener">Troubleshooting</a>
                <a id="form_button_id" class="add-new-h2" href="https://forum.miniorange.com/" target="_blank" rel="noopener">Ask questions on our forum</a>
                <a id="features_button_id" class="add-new-h2" href="https://developers.miniorange.com/docs/oauth/wordpress/client" target="_blank" rel="noopener">Feature Details</a>

			</h1>
			<?php if ( 'licensing' === $currenttab ) { ?>
				<div id="moc-lp-imp-btns" style="float:right;">
					<a class="btn btn-outline-danger" target="_blank" href="https://plugins.miniorange.com/wordpress-oauth-client" rel="noopener">Full Feature List</a>&emsp;<a class="btn btn-outline-primary" onclick="getlicensekeys()" href="#">Get License Keys</a>
				</div>
			<?php } ?>
        </div>
        <style>
            .add-new-hover:hover{
                color: white !important;
            }

        </style>
		<div id="tab">
		<h2 class="nav-tab-wrapper">
			<a id="tab-config" class="nav-tab <?php if($currenttab == 'config') echo 'nav-tab-active';?>" href="admin.php?page=mo_oauth_settings&tab=config<?php if(get_option('mo_oauth_apps_list')) echo '&action=update&app='.esc_attr( array_keys(get_option('mo_oauth_apps_list'))[0] );?>">Configure OAuth</a>
			<a id="tab-attrmapping" class="nav-tab <?php if($currenttab == 'attributemapping') echo 'nav-tab-active';?>" href="admin.php?page=mo_oauth_settings&tab=attributemapping">Attribute/Role Mapping</a>
			<a id="tab-signinsettings" class="nav-tab <?php if($currenttab == 'signinsettings') echo 'nav-tab-active';?>" href="admin.php?page=mo_oauth_settings&tab=signinsettings">Login Settings</a>
			<a id="tab-customization" class="nav-tab <?php if($currenttab == 'customization') echo 'nav-tab-active';?>" href="admin.php?page=mo_oauth_settings&tab=customization">Login Button Customization</a>
			<a id="tab-requestdemo" class="nav-tab <?php if($currenttab == 'requestfordemo') echo 'nav-tab-active';?>" href="admin.php?page=mo_oauth_settings&tab=requestfordemo">Request For Demo</a>
			<!-- <a class="nav-tab <?php //if($currenttab == 'faq') echo 'nav-tab-active';?>" href="admin.php?page=mo_oauth_settings&tab=faq">Frequently Asked Questions [FAQ]</a>	 -->
			<a id="tab-acc-setup" class="nav-tab <?php if($currenttab == 'account') echo 'nav-tab-active';?>" href="admin.php?page=mo_oauth_settings&tab=account">Account Setup</a>
            <a id="tab-addons" class="nav-tab <?php if($currenttab == 'addons') echo 'nav-tab-active';?>" href="admin.php?page=mo_oauth_settings&tab=addons">Add-ons</a>
			<!-- <a class="nav-tab <?php //if($currenttab == 'licensing') echo 'nav-tab-active';?>" href="admin.php?page=mo_oauth_settings&tab=licensing">Licensing Plans</a> -->
		</h2>
		</div>
		<?php

	}

	public static function show_bfs_note()
	{
        ?>
            <form name="f" method="post" action="" id="mo_oauth_client_bfs_note_form">
            	<?php wp_nonce_field('mo_oauth_client_bfs_note_form','mo_oauth_client_bfs_note_form_field'); ?>
				<input type="hidden" name="option" value="mo_oauth_client_bfs_note_message"/>	
                <div class="notice notice-info"style="padding-right: 38px;position: relative;border-color:red; background-color:black"><h4><center><i class="fa fa-gift" style="font-size:50px;color:red;"></i>&nbsp;&nbsp;
				<big><font style="color:white; font-size:30px;"><b>END OF YEAR SALE: </b><b style="color:yellow;">UPTO 50% OFF!</b></font> <br><br></big><font style="color:white; font-size:20px;">Contact us @ oauthsupport@xecurify.com for more details.</font></center></h4>
				<p style="text-align: center; font-size: 60px; margin-top: 0px; color:white;" id="demo"></p>
				</div>
			</form>
		<script>
		var countDownDate = <?php echo esc_attr( strtotime('Dec 31, 2020 23:59:59') ) ?> * 1000;
		var now = <?php echo esc_attr( time() )?> * 1000;
		var x = setInterval(function() {
			now = now + 1000;
			var distance = countDownDate - now;
			var days = Math.floor(distance / (1000 * 60 * 60 * 24));
			var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
			var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
			var seconds = Math.floor((distance % (1000 * 60)) / 1000);
			document.getElementById("demo").innerHTML = days + "d " + hours + "h " +
				minutes + "m " + seconds + "s ";
			if (distance < 0) {
				clearInterval(x);
				document.getElementById("demo").innerHTML = "EXPIRED";
			}
		}, 1000);
		</script>
		<?php
	}


	public static function show_idp_link($currenttab) {
	if ((! get_option( 'mo_oauth_client_show_mo_server_message' )) ) {
            ?>
            <form name="f" method="post" action="" id="mo_oauth_client_mo_server_form">
            	<?php wp_nonce_field('mo_oauth_mo_server_message_form','mo_oauth_mo_server_message_form_field'); ?>
                <input type="hidden" name="option" value="mo_oauth_client_mo_server_message"/>
                <div class="notice notice-info" style="padding-right: 38px;position: relative;">
                    <h4>Looking for a User Storage/OAuth Server? We have a B2C Service(Cloud IDP) which can scale to hundreds of millions of consumer identities. You can <a href="https://idp.miniorange.com/b2c-pricing" target="_blank" rel="noopener">click here</a> to find more about it.</h4>
                    <button type="button" class="notice-dismiss" id="mo_oauth_client_mo_server"><span class="screen-reader-text">Dismiss this notice.</span>
                    </button>
                </div>
            </form>
            <script>
                jQuery("#mo_oauth_client_mo_server").click(function () {
                    jQuery("#mo_oauth_client_mo_server_form").submit();
                });
            </script>
            <?php
        }
	}

	public static function show_tab($currenttab) {
			if($currenttab == 'account') {
				if (get_option ( 'verify_customer' ) == 'true') {
					Mo_OAuth_Client_Admin_Account::verify_password();
				} elseif (trim ( get_option ( 'mo_oauth_admin_email' ) ) != '' && trim ( get_option ( 'mo_oauth_admin_api_key' ) ) == '' && get_option ( 'new_registration' ) != 'true') {
					Mo_OAuth_Client_Admin_Account::verify_password();
				} elseif(get_option('mo_oauth_registration_status') == 'MO_OTP_DELIVERED_SUCCESS' || get_option('mo_oauth_registration_status')=='MO_OTP_VALIDATION_FAILURE' ||get_option('mo_oauth_registration_status') ==  'MO_OTP_DELIVERED_SUCCESS_PHONE' ||get_option('mo_oauth_registration_status') == 'MO_OTP_DELIVERED_FAILURE_PHONE'){
					Mo_OAuth_Client_Admin_Account::otp_verification();
				} else {
					Mo_OAuth_Client_Admin_Account::register();
				}
			} elseif($currenttab == 'customization')
				Mo_OAuth_Client_Admin_Apps::customization();
			elseif($currenttab == 'signinsettings')
				Mo_OAuth_Client_Admin_Apps::sign_in_settings();
			elseif($currenttab == 'licensing')
				Mo_OAuth_Client_Admin_Licensing::show_licensing_page();
			elseif($currenttab == 'requestfordemo')
    			Mo_OAuth_Client_Admin_RFD::requestfordemo();
			elseif($currenttab == 'faq')
    			Mo_OAuth_Client_Admin_Faq::faq();
            elseif($currenttab == 'addons')
				Mo_OAuth_Client_Admin_Addons::addons();
			elseif($currenttab == 'attributemapping')
				Mo_OAuth_Client_Admin_Apps::attribute_role_mapping();
			elseif($currenttab == '') {
					?>
						<a id="goregister" style="display:none;" href="<?php echo esc_url( add_query_arg( array( 'tab' => 'config' ), htmlentities( $_SERVER['REQUEST_URI'] ) ) ); ?>">

						<script>
							location.href = jQuery('#goregister').attr('href');
						</script>
					<?php
			} else {
				Mo_OAuth_Client_Admin_Apps::applist();
			}
		//}
	}

	public static function show_support_sidebar($currenttab) {
		if($currenttab != 'licensing') {
			echo '<td style="vertical-align:top;padding-left:1%;" class="mo_oauth_sidebar">';
			if ( 'attributemapping' === $currenttab ) {
				echo esc_attr( Mo_OAuth_Client_Admin_Attribute_Mapping::emit_attribute_table() );
			}
			echo esc_attr( Mo_OAuth_Client_Admin_Support::support() );
			echo '</td>';
		}
	}

}

?>