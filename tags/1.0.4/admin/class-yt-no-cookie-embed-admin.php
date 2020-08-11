<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://punktbar.de
 * @since      1.0.0
 *
 * @package    Yt_No_Cookie_Embed
 * @subpackage Yt_No_Cookie_Embed/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Yt_No_Cookie_Embed
 * @subpackage Yt_No_Cookie_Embed/admin
 * @author     punktbar <kontakt@punktbar.de>
 */
class Yt_No_Cookie_Embed_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Yt_No_Cookie_Embed_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Yt_No_Cookie_Embed_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/yt-no-cookie-embed-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Yt_No_Cookie_Embed_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Yt_No_Cookie_Embed_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/yt-no-cookie-embed-admin.js', array( 'jquery' ), $this->version, false );

	}

	function map_youtube_fusion_builder_element() {
		if ( !function_exists( 'fusion_builder_map' ) ) return;

		fusion_builder_map(
			array(
				'name'       => esc_attr__( 'Youtube (No-Cookie)', 'fusion-builder' ),
				'shortcode'  => 'fusion_youtube_nocookie',
				'icon'       => 'fusiona-youtube',
				'preview'    => FUSION_BUILDER_PLUGIN_DIR . 'inc/templates/previews/fusion-youtube-preview.php',
				'preview_id' => 'fusion-builder-block-module-youtube-preview-template',
				'params'     => array(
					array(
						'type'        => 'textfield',
						'heading'     => esc_attr__( 'Video ID', 'fusion-builder' ),
						'description' => esc_attr__( 'For example the Video ID for https://www.youtube.com/watch?v=UDyNsnB_COA is UDyNsnB_COA.', 'fusion-builder' ),
						'param_name'  => 'id',
						'value'       => '',
					),
					array(
						'type'        => 'radio_button_set',
						'heading'     => esc_attr__( 'Alignment', 'fusion-builder' ),
						'description' => esc_attr__( "Select the video's alignment.", 'fusion-builder' ),
						'param_name'  => 'alignment',
						'default'     => '',
						'value'       => array(
							''       => esc_attr__( 'Text Flow', 'fusion-builder' ),
							'left'   => esc_attr__( 'Left', 'fusion-builder' ),
							'center' => esc_attr__( 'Center', 'fusion-builder' ),
							'right'  => esc_attr__( 'Right', 'fusion-builder' ),
						),
					),
					array(
						'type'             => 'dimension',
						'remove_from_atts' => true,
						'heading'          => esc_attr__( 'Dimensions', 'fusion-builder' ),
						'description'      => esc_attr__( 'In pixels but only enter a number, ex: 600.', 'fusion-builder' ),
						'param_name'       => 'dimensions',
						'value'            => array(
							'width'  => '600',
							'height' => '350',
						),
					),
					array(
						'type'        => 'radio_button_set',
						'heading'     => esc_attr__( 'Autoplay Video', 'fusion-builder' ),
						'description' => esc_attr__( 'Set to yes to make video autoplaying.', 'fusion-builder' ),
						'param_name'  => 'autoplay',
						'value'       => array(
							'false' => esc_attr__( 'No', 'fusion-builder' ),
							'true'  => esc_attr__( 'Yes', 'fusion-builder' ),
						),
						'default'     => 'false',
					),
					array(
						'type'        => 'textfield',
						'heading'     => esc_attr__( 'Additional API Parameter', 'fusion-builder' ),
						'description' => esc_attr__( 'Use additional API parameter, for example &rel=0 to disable related videos.', 'fusion-builder' ),
						'param_name'  => 'api_params',
						'value'       => '',
					),
					array(
						'type'        => 'checkbox_button_set',
						'heading'     => esc_attr__( 'Element Visibility', 'fusion-builder' ),
						'param_name'  => 'hide_on_mobile',
						'value'       => fusion_builder_visibility_options( 'full' ),
						'default'     => fusion_builder_default_visibility( 'array' ),
						'description' => esc_attr__( 'Choose to show or hide the element on small, medium or large screens. You can choose more than one at a time.', 'fusion-builder' ),
					),
					array(
						'type'        => 'textfield',
						'heading'     => esc_attr__( 'CSS Class', 'fusion-builder' ),
						'param_name'  => 'class',
						'value'       => '',
						'description' => esc_attr__( 'Add a class to the wrapping HTML element.', 'fusion-builder' ),
					),
				),
			)
		);
	}

}
