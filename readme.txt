=== Login with WHMCS ===
Contributors: cyberlord92,oauth
Tags: whmcs login, sso, whmcs, single sign on, whmcs plugins
Requires at least: 3.0.1
Tested up to: 6.1
Stable tag: 1.4.8
License: MIT/Expat
License URI: https://docs.miniorange.com/mit-license

WordPress Login with WHMCS plugin allows Login(Single Sign-On) to WordPress using WHMCS account credentials. You can SSO(Single Sign-on) to your WordPress site with WHMCS using this plugin. This plugin uses OAuth protocol to achieve Single Sign-on.

== Description ==

WordPress Login with WHMCS plugin allows Login(Single Sign-On) to WordPress using WHMCS account credentials. You can SSO(Single Sign-on) to your WordPress site with WHMCS using this plugin. This plugin uses OAuth protocol to achieve Single Sign-on. 


= Single Sign-On(SSO) =

In simple term, Single Sign-On(SSO) means login into 1 site / application using the credentials of another app/site.
Example. If you have all your Users/Customers/Members/Employees stored on 1 site(ex. gmail, wordpress, etc.), lets say site A and you want all of them to register/login into your WordPress site say site B. In this scenario, you can register/login all your users of site A into Site B using the login credentials/account of Site A. This is call Single Sign-On or SSO.


= FREE VERSION FEATURES =

*	WordPress Login with WHMCS supports single sign-on / SSO with WHMCS.
*   Auto Create Users : After SSO, new user automatically gets created in WordPress.
*	Account Linking : After user SSO to WordPress, if user already exists in WordPress, then his profile gets updated or it will create a new WordPress User.
*	Attribute Mapping : Login with WHMCS supports username Attribute Mapping feature to map WordPress user profile username attribute.
*	Login Widget : Use Widgets to easily integrate the login link with your WordPress site.
*	Logging :  If you run into issues Login with WHMCS can be helpful to enable debug logging.


= PREMIUM VERSION FEATURES =

*   Optionally Auto Register Users : Login with WHMCS does automatic user registration after login if the user is not already registered with your site.
*	Advanced Role Mapping : Assign roles to users registering through Login with WHMCS based on rules you define.
*	Support for Shortcode : Use shortcode to place Login with WHMCS button anywhere in your Theme or Plugin.
*	Customize Login Buttons / Icons / Text : Wide range of Login with WHMCS Buttons/Icons and it allows you to customize Text shadow.
*	Custom Redirect URL after Login : WordPress WHMCS SSO provides auto redirection and this is useful if you wanted to globally protect your whole site.
*	Custom Redirect URL after logout : WordPress WHMCS SSO allows you to auto redirect Users to custom URL after he logs out from your WordPress site.
*	Force Authentication / Protect Complete Site : Allows user to restrict login / authorization for particular site.
*	Multiple Userinfo Endpoints Support : Login with WHMCS supports multiple Userinfo Endpoints.
*	App domain specific Registration Restrictions : Login with WHMCS restricts registration on your site based on the person's email address domain.
*	BuddyPress Attribute Mapping : Login with WHMCS allows BuddyPress Attribute Mapping.
*	Page Restriction according to roles : Limit Access to pages based on user status or roles. This WordPress Login with WHMCS plugin allows you to restrict access to the content of a page or post to which only certain group of users can access.
*	WP Hooks for Different Events : Provides support for different hooks for user defined functions.
*	Login Reports : Login with WHMCS creates user login and registration reports based on application used.  


= No SSL restriction =
*	Login to WordPress (WordPress SSO) using WHMCS without having an SSL or HTTPS enabled site.


== Supported Add-ons ==

1. Page Restriction
2. BuddyPress integrator
3. Login Form Add-on
4. Membership Level based Login Redirection

= REST API Authentication =
Secures the unauthorized access to your WordPress sites/pages using our <a href="https://wordpress.org/plugins/wp-rest-api-authentication/" target="_blank">WordPress REST API Authentication</a> plugin.


== Installation ==

= From your WordPress dashboard =
1. Visit `Plugins > Add New`
2. Search for `whmcs`. Find and Install `Login with WHMCS` plugin by miniOrange
3. Activate the plugin

= From WordPress.org =
1. Download WordPress Login with WHMCS.
2. Unzip and upload the `Login with WHMCS` directory to your `/wp-content/plugins/` directory.
3. Activate Login with WHMCS from your Plugins page.

= Once Activated =
1. Go to `Settings-> Login with WHMCS -> Configure OAuth`, and follow the instructions
2. Go to `Appearance->Widgets` ,in available widgets you will find `WHMCS Login` widget, drag it to chosen widget area where you want it to appear.
3. Now visit your site and you will see login with widget.


== Frequently Asked Questions ==
= I need to customize the plugin or I need support and help? =
Please email us at <a href="mailto:info@xecurify.com" target="_blank">info@xecurify.com</a> or <a href="http://miniorange.com/contact" target="_blank">Contact us</a>. You can also submit your query from plugin's configuration page.

= I need integration of this plugin with my other installed plugins like BuddyPress, etc.? =
We will help you in integrating this plugin with your other installed plugins. Please email us at <a href="mailto:info@xecurify.com" target="_blank">info@xecurify.com</a> or <a href="http://miniorange.com/contact" target="_blank">Contact us</a>. You can also submit your query from plugin's configuration page.

= For any other query/problem/request =
Please email us at <a href="mailto:info@xecurify.com" target="_blank">info@xecurify.com</a> or <a href="http://miniorange.com/contact" target="_blank">Contact us</a>. You can also submit your query from plugin's configuration page.


== Screenshots ==

1. Plugin Configuration
2. Attribute Mapping
3. Login Button / Widget
4. WordPress Dashboard Login

== Changelog ==

= 1.4.8 =
* UI Updates
* Added compatiblity with WP v6.1

= 1.4.7 =
* Security fixes

= 1.4.6 =
* Added compatiblity with WP v6.0

= 1.4.5 =
* Minor bug fixes
* Added compatiblity with WP v5.9

= 1.4.4 =
* Minor bug fixes
* Added compatiblity with WP v5.8

= 1.4.3 =
* Minor Updates in Licensing plans
* Updated FAQ link on support form

= 1.4.2 =
* Added documents links for Login Form AddOn and Membership based Login AddOn

= 1.4.1 =
* UI Updates

= 1.4.0 =
* Added compatibility with WP 5.6

= 1.3.7 =
* added end of the year sale

= 1.3.6 =
* added black friday sale

= 1.3.5 =
* minor bug fixes

= 1.3.4 =
* Added compatibility with WP 5.5

= 1.3.3 =
* Minor bug fixes

= 1.3.2 =
* Add-ons tab update
* minor bug fixes

= 1.3.1 =
* Fixed Userinfo endpoint

= 1.3.0 =
* Advertised PKCE Authentication
* Password grant checkbox fix
* Added Multisite Licensing plans

= 1.2.3 =
* Bug fixes
* Compatibility fixes
* Licensing changes
* Add-ons tab update

= 1.2.2 =
* Improvements in the plugin.

= 1.0.0 =
* First version for Login with WHMCS.


== Upgrade Notice ==

= 1.3.7 =
* added end of the year sale

= 1.3.6 =
* added black friday sale

= 1.3.5 =
* minor bug fixes

= 1.3.4 =
* Added compatibility with WP 5.5

= 1.3.3 =
* Minor bug fixes

= 1.3.2 =
* Add-ons tab update
* minor bug fixes

= 1.3.1 =
* Fixed Userinfo endpoint

= 1.3.0 =
* Advertised PKCE Authentication
* Password grant checkbox fix
* Added Multisite Licensing plans

= 1.2.3 =
* Bug fixes
* Compatibility fixes
* Licensing changes
* Add-ons tab update

= 1.2.2 =
* Improvements in the plugin.

= 1.0.0 =
* Initial Version