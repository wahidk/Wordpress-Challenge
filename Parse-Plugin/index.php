<?php

    /**
     * Plugin Name: Parse Plugin
     * Description: test parse plugin
     * Version: 1.0
     * Author: wahid
     * Author URI: http://logicmountain.com
     * License: Copyright 2013 WHFFA
    */


    // *****************************************************
    // Register CSS and JS files.
    // Only register them if we are in this plugin	
    // *****************************************************
    if ( $_REQUEST['page'] == 'parse')
    {

        wp_enqueue_script( 'jqm-script',      'http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js' );
        wp_enqueue_script( 'pjqm-script',     'http://www.parsecdn.com/js/parse-1.2.17.min.js'  );

    }

    // *****************************************************
    // Register the Menu Item in Admin.
    // *****************************************************
    add_action( 'admin_menu', 'ParseAPI' );

    /** Step 1. */
    function ParseAPI() 
    {

        // ADD MAIN MENU OPTION
        // add_menu_page(   $page_title,            $menu_title,        $capability,        $menu_slug,                     $function,              $icon_url,                                                  $position )
        // ADD SUB MENU OPTIONS
        // add_submenu_page( $parent_slug,              $page_title,        $menu_title,        $capability,        $menu_slug,                     $function ); 
		
		// add_submenu_page( $parent_slug,              $page_title,        $menu_title,        $capability,        $menu_slug,                     $function ); 
       //Award Nominations		
		add_menu_page(  'parse',   'Parse',  'manage_options',  'parse',       'parse' ,'', 22);
		//add_submenu_page(   null, 'Award Nominations Edit',  '', 'manage_options',   'awardnomination-edit',   'Award_Nominations_Edit' )  ;
        
    }


	
	// ***************************************************
    // Parse Data
    // ***************************************************
    function parse()
    {
        if ( !current_user_can( 'manage_options' ) )  
        {
                wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
        }
        echo '<div class="wrap">';
        require plugin_dir_path( __FILE__ ) . 'parse.php'  ;
        echo '</div>';
    }

?>
