<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://punktbar.de
 * @since      1.0.0
 *
 * @package    Yt_No_Cookie_Embed
 * @subpackage Yt_No_Cookie_Embed/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Yt_No_Cookie_Embed
 * @subpackage Yt_No_Cookie_Embed/public
 * @author     punktbar <kontakt@punktbar.de>
 */
class Yt_No_Cookie_Embed_Public {

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
	 * @param      string $plugin_name       The name of the plugin.
	 * @param      string $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;

		add_filter( 'pb_fusion_attr_youtube-shortcode', array( $this, 'attr' ) );
		add_filter( 'pb_fusion_attr_youtube-shortcode-video-sc', array( $this, 'video_sc_attr' ) );

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		// wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/yt-no-cookie-embed-public.css', array(), $this->version, 'all' );
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		// wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/yt-no-cookie-embed-public.js', array( 'jquery' ), $this->version, false );
	}

	/**
	 * Render the shortcode
	 *
	 * @access public
	 * @since 1.0
	 * @param  array  $args    Shortcode parameters.
	 * @param  string $content Content between shortcode.
	 * @return string          HTML output.
	 */
	public function render( $args, $content = '' ) {

		if ( ! class_exists( 'FusionBuilder' ) ) {
			return;
		}

		$defaults = FusionBuilder::set_shortcode_defaults(
			array(
				'hide_on_mobile' => fusion_builder_default_visibility( 'string' ),
				'class'          => '',
				'api_params'     => '',
				'autoplay'       => 'false',
				'alignment'      => '',
				'center'         => 'no',
				'height'         => 360,
				'id'             => '',
				'width'          => 600,

			),
			$args
		);

		$defaults['height'] = FusionBuilder::validate_shortcode_attr_value( $defaults['height'], '' );
		$defaults['width']  = FusionBuilder::validate_shortcode_attr_value( $defaults['width'], '' );

		extract( $defaults );

		$this->args = $defaults;

		// Make sure only the video ID is passed to the iFrame.
		$pattern = '~(?:http|https|)(?::\/\/|)(?:www.|)(?:youtu\.be\/|youtube\.com(?:\/embed\/|\/v\/|\/watch\?v=|\/ytscreeningroom\?v=|\/feeds\/api\/videos\/|\/user\S*[^\w\-\s]|\S*[^\w\-\s]))([\w\-]{11})[a-z0-9;:@#?&%=+\/\$_.-]*~i';
		preg_match( $pattern, $id, $matches );
		if ( isset( $matches[1] ) ) {
			$id = $matches[1];
		}

		$html  = '<div ' . FusionBuilder::attributes( 'youtube-shortcode' ) . '>';
		$html .= '<div ' . FusionBuilder::attributes( 'youtube-shortcode-video-sc' ) . '>';
		$html .= '<iframe title="YouTube video player" src="https://www.youtube-nocookie.com/embed/' . $id . '?wmode=transparent&autoplay=0' . $api_params . '" width="' . $width . '" height="' . $height . '" allowfullscreen allow="autoplay; fullscreen"></iframe>';
		$html .= '</div></div>';

		return $html;

	}

	/**
	 * Parses the arguments.
	 *
	 * @access public
	 * @since 1.0
	 * @return array
	 */
	public function attr() {

		$attr = fusion_builder_visibility_atts(
			$this->args['hide_on_mobile'],
			array(
				'class' => 'fusion-video fusion-youtube',
			)
		);

		if ( 'yes' === $this->args['center'] ) {
			$attr['class'] .= ' center-video';
		} else {
			$attr['style'] = 'max-width:' . $this->args['width'] . 'px;max-height:' . $this->args['height'] . 'px;';
		}

		if ( '' !== $this->args['alignment'] ) {
			$attr['class'] .= ' fusion-align' . $this->args['alignment'];
			$attr['style'] .= ' width:100%';
		}

		if ( 'true' == $this->args['autoplay'] || 'yes' === $this->args['autoplay'] ) {
			$attr['data-autoplay'] = 1;
		}

		if ( $this->args['class'] ) {
			$attr['class'] .= ' ' . $this->args['class'];
		}

		return $attr;

	}

	/**
	 * The video ShortCode arguments.
	 *
	 * @access public
	 * @since 1.0
	 * @return array
	 */
	public function video_sc_attr() {

		$attr = array(
			'class' => 'video-shortcode',
		);

		if ( 'yes' === $this->args['center'] ) {
			$attr['style'] = 'max-width:' . $this->args['width'] . 'px;max-height:' . $this->args['height'] . 'px;';
		}

		return $attr;

	}

	/**
	 * Sets the necessary scripts.
	 *
	 * @access public
	 * @since 1.1
	 * @return void
	 */
	public function add_scripts() {
		if ( ! class_exists( 'Fusion_Dynamic_JS' ) ) {
			return;
		}
		Fusion_Dynamic_JS::enqueue_script( 'fusion-video' );
	}
}
