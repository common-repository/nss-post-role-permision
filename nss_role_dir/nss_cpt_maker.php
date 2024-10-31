<?php

/* protected */
if (!defined('ABSPATH'))
    exit;

/**
 * Description of nss_cpt_maker
 *
 * @author nssTheme
 */
trait nss_cpt_generate 
{
    //visibility
    public $cpt = 'nss_review';
    public $rv_cat='review_cats';
    //method
    public function nss_add_post_type()
    {
        // register code here
        register_post_type($this->cpt, array(
            'labels' => array(
                'name' => __('Review', 'nssrole_mit'),
                'singular_name' => __('Review', 'nssrole_mit'),
                'add_new' => __('Add New Review', 'nssrole_mit'),
                'add_new_item' => __('Add New Review', 'nssrole_mit'),
                'edit_item' => __('Edit Review', 'nssrole_mit'),
                'new_item' => __('New Review', 'nssrole_mit'),
                'view_item' => __('View Review', 'nssrole_mit'),
                'search_items' => __('Search Review', 'nssrole_mit'),
                'not_found' => __('No Review found', 'nssrole_mit'),
                'not_found_in_trash' => __('No Review found in Trash', 'nssrole_mit'),
                'parent_item_colon' => __('Parent Review:', 'nssrole_mit'),
                'menu_name' => __('Review', 'nssrole_mit'),
            ),
            'description' => 'Manipulating with our Review',
            'public' => true,
            'show_in_nav_menus' => true,
            'supports' => array(
                'title',
                'thumbnail',
                'editor',
                'page-attributes'
            ),
            'show_ui' => true,
            'show_in_menu' => true,
            'menu_position' => 6,
            'has_archive' => true,
            'menu_icon' => 'dashicons-calendar',
            'query_var' => true,
            'rewrite' => array('slug' => $this->cpt),
            'capability_type'=>'post',
            'map_meta_cap' => true
        )); // end register_post_type

        register_taxonomy($this->rv_cat, $this->cpt, array(
            'hierarchical' => true,
            'labels' => array(
                'name' => __('Review cat', 'nssrole_mit'),
                'singular_name' => __('Review cat', 'nssrole_mit'),
                'search_items' => __('Search Review cat', 'nssrole_mit'),
                'popular_items' => __('Popular Review cat', 'nssrole_mit'),
                'all_items' => __('All Review cat', 'nssrole_mit'),
                'parent_item' => __('Parent Review cat', 'nssrole_mit'),
                'parent_item_colon' => __('Parent Review cat', 'nssrole_mit'),
                'edit_item' => __('Edit Review cat', 'nssrole_mit'),
                'update_item' => __('Update Review cat', 'nssrole_mit'),
                'add_new_item' => __('Add New Review cat', 'nssrole_mit'),
                'new_item_name' => __('New Review cat Name', 'nssrole_mit'),
                'add_or_remove_items' => __('Add or remove Review cat', 'nssrole_mit'),
                'choose_from_most_used' => __('Choose from most used nssrole_mit', 'nssrole_mit'),
                'menu_name' => __('Review cat', 'nssrole_mit'),
            ),
            'rewrite' => array(
                'slug' => $this->rv_cat,
                'with_front' => false,
                'hierarchical' => true
            ),
            'show_admin_column' => true,
        )); // end register_taxonomy
        flush_rewrite_rules(false);
    }
}

//another class of style
class nss_role_sstyle
{
    //construct
    public function __construct() 
    {
        add_action('wp_enqueue_scripts', array($this, 'nss_role_sTyle'));
    }

    //methods
    public function nss_role_sTyle() 
    {
        wp_register_style('role-style', NSS_PROLE_URL . 'role_assets/css/role-style.css');
        wp_enqueue_style('role-style');        
    }
}
new nss_role_sstyle();