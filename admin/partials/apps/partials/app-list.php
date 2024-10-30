<?php
require_once('defaultapps.php');
function applist_page() {
	// tutorial();
	?>
	<style>
		.tableborder {
			border-collapse: collapse;
			width: 100%;
			border-color:#eee;
		}

		.tableborder th, .tableborder td {
			text-align: left;
			padding: 8px;
			border-color:#eee;
		}

		.tableborder tr:nth-child(even){background-color: #f2f2f2}
	</style>
	<div id="mo_oauth_app_list" class="mo_table_layout">
	<?php

		if(isset($_GET['action']) && $_GET['action']=='delete'){
			if(isset($_GET['app'])) {
				delete_app($_GET['app']);
				if ($_GET['app'] === "CognitoApp") {
					?>
					<script>
						let url = window.location.href;
						url = url.split("&action=delete&app=CognitoApp")[0];
						window.location.replace(url);
					</script>
					<?php
					exit();
				}
			}
		} else if(isset($_GET['action']) && $_GET['action']=='instructions'){
			if(isset($_GET['appId'])){
				Mo_OAuth_Client_Admin_Guides::instructions($_GET['appId']);
			}
		}

		if(isset($_GET['action']) && $_GET['action']=='add'){
			Mo_OAuth_Client_Admin_Apps::add_app();
		}
		else if(isset($_GET['action']) && $_GET['action']=='update'){
			if(isset($_GET['app']))
				Mo_OAuth_Client_Admin_Apps::update_app($_GET['app']);
		}
		else if(get_option('mo_oauth_apps_list'))
		{
			Mo_OAuth_Client_Admin_Apps::update_app(array_keys(get_option('mo_oauth_apps_list'))[0]);
		} 
		else {
			Mo_OAuth_Client_Admin_Apps::add_app();
		 } ?>
		</div>
	<?php
}



	function delete_app($appname){
		$appslist = get_option('mo_oauth_apps_list');
		if(! is_array($appslist) || empty($appslist)) {
			return;
		}
		foreach($appslist as $key => $app){
			if($appname == $key){
				if( $appslist[$appname]['appId'] == 'wso2' )
					delete_option( 'mo_oauth_client_custom_token_endpoint_no_csecret' );
				unset($appslist[$key]);
				delete_option( 'mo_oauth_client_disable_authorization_header' );
				delete_option( 'mo_oauth_attr_name_list' );
				delete_option('mo_oauth_apps_list');
			}
		}
		update_option('mo_oauth_apps_list', $appslist);
	}
