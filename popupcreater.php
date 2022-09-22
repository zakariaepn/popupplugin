<?php 
	
/*

Plugin Name: Popup creator
Plugin URI: http://speed1.wptechit.com/poupplugin
Description: This plugin is a popup WordPress Plugin
Version: 1.0.0
Author: LWHH
Author URI: http://speed1.wptechit.com/
License: GPLv2 or later
Text Domain: popupcrator
Domain Path: /languages/
Plugin Type: Piklist


*/

	class poupcreator{

		public function __construct(){

			add_action('plugins_loaded',array($this,'ppup_textdpmani'));
			add_action('init',array($this,'ppup_post_type')); 
			add_action( 'init', array( $this, 'register_popup_size' ) );
			
		    add_action( 'wp_enqueue_scripts', array( $this, 'sala_load_jq' ) );
		    add_action('wp_footer',array($this,'ppup_display_output')); 


		    }

		function sala_load_jq(){
			
			wp_enqueue_script('plainmodal-js',plugin_dir_url(__FILE__) . "assets/js/plainmodal.js",null,'1.0.0',true); 
			wp_enqueue_script('popup-main-js',plugin_dir_url(__FILE__) . "assets/js/popup-main.js",array('jquery','plainmodal-js'),time(),true); 
			wp_enqueue_style('popupmain-css',plugin_dir_url(__FILE__)."assets/css/popupmain.css",null,time());


			}

		function register_popup_size() {
		add_image_size( 'popup-landscape', '800', '600', true );
		add_image_size( 'popup-square', '500', '500', true );
	}

		function ppup_post_type(){


							/**
					 * Post Type: Popups.
					 */

					$labels = [
						"name" => __( "Popups", "popupcrator" ),
						"singular_name" => __( "Popup", "popupcrator" ),
						"featured_image" => __("Popup Image","popupcrator"),
						"set_featured_image" => __("Set Popup Image","popupcrator"),
						"add_new"     => "Add New Popup",
						"add_new_item" => "Add New Popup",
					];

					$args = [
						"label" => __( "Popups", "popupcrator" ),
						"labels" => $labels,
						"description" => "",
						"menu_icon"   => "dashicons-bell",
						"public" => false,
						"publicly_queryable" => true,
						"show_ui" => true,
						"show_in_rest" => true,
						"rest_base" => "",
						"rest_controller_class" => "WP_REST_Posts_Controller",
						"has_archive" => false,
						"show_in_menu" => true,
						"show_in_nav_menus" => true,
						"delete_with_user" => false,
						"exclude_from_search" => false,
						"capability_type" => "post",
						"map_meta_cap" => true,
						"hierarchical" => false,
						"rewrite" => [ "slug" => "popup", "with_front" => true ],
						"query_var" => true,
						"supports" => [ "title", "thumbnail" ],
						"show_in_graphql" => false,
					];

					register_post_type( "popup", $args );





		}

		function ppup_textdpmani(){

			load_plugin_textdomain('popupcrator',false,plugin_dir_path(__FILE__).'languages/'); 
	
		}


		function ppup_display_output(){

			$arguments = array(

					'post_type'   => 'popup',
					'post_status' => 'publish',
					'meta_key'    => 'popupcreator_active',
					'meta_value'  =>  1

				);

			$query = new WP_Query($arguments);

			while($query->have_posts()){
				
				$query->the_post();
				$size = get_post_meta(get_the_ID(),'popupcreator_popup_size',true);  
				 

				$exit = get_post_meta(get_the_ID(),'popupcreator_on_exit',true);  
				$dealy = get_post_meta(get_the_ID(),'popupcreator_display_after',true);  
				if($dealy > 0){
					$dealy *= 1000;
				}else{
					
					$dealy = 0; 

				}
				$image = get_the_post_thumbnail_url(get_the_ID(),$size);
				
				?> 
					

					<div class="modal-content" data-modal-id="<?php the_ID();  ?>" data-size="<?php echo esc_attr( $size );  ?>" data-exit="<?php echo esc_attr($exit);  ?>" data-dealy="<?php echo esc_attr($dealy);  ?>" >
						<div>
							<img class="close-button" width="30" src="<?php echo plugin_dir_url(__FILE__)."assets/img/x.png";  ?>" alt="<?php _e('close','popupcrator');  ?>">
						</div>
						<img width="250" height="250"  src="<?php echo esc_url($image);  ?>" alt="">
					</div>
				
				<?php
			}

			wp_reset_query(); 




		}

	}

	new poupcreator(); 