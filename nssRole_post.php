<?php

/**
 * Plugin Name: Nss Post Role Permision
 * Plugin URI: https://wordpress.org/plugins/nss_post_role_permission/
 * Description: This plugin is uesd to create a new users to enter the wordpress dashboard with default page, post, comments and custom posts. 
 * Version: 1.0.0
 * Author: nssTheme
 * Author URI: https://www.linkedin.com/in/saiful5721/
 * License: GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: nssrole_mit
 */

// if accessed directly
if (!defined('ABSPATH'))
    exit;

//define
define('NSS_PROLE_URL', plugin_dir_url(__FILE__));
define('NSS_PROLE_DIR', plugin_dir_path(__FILE__));

//required
require_once 'nss_role_dir/nss_role_cpost.php';
//class
class nss_role_manager
{
    //static method
    static function nss_activation() 
    {
        register_activation_hook(__FILE__, array('nss_role_manager', 'nss_role_activation'));
    }

    static function nss_role_activation()
    {
        add_role('nss_user', __('Nss user'), array(
            'read' => true, // true allows this capability
            'edit_posts' => true, // Allows user to edit their own posts
            'edit_pages' => false, // Allows user to edit pages
            'edit_others_posts' => true, // Allows user to edit others posts not just their own
            'create_posts' => true, // Allows user to create new posts
            'manage_categories' => true, // Allows user to manage post categories
            'publish_posts' => true, // Allows the user to publish, otherwise posts stays in draft mode
            'edit_themes' => false, // false denies this capability. User can’t edit your theme
            'install_plugins' => false, // User cant add new plugins
            'update_plugin' => false, // User can’t update any plugins
            'update_core' => false, // user cant perform core updates
            'upload_files'=>true//Allows for images
                )
        );
    }

}//end class

//static method calles
nss_role_manager::nss_activation();

