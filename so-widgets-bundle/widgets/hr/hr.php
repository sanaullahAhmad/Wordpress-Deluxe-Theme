<?php
/*
Widget Name: Button
Description: A powerful yet simple button widget for your sidebars or Page Builder pages.
Author: SiteOrigin
Author URI: https://siteorigin.com
*/

class SiteOrigin_Widget_Hr_Widget extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'sow-hr',
			__('Deluxe Hr', 'so-widgets-bundle'),
			array(
				'description' => __('A horizontal rule widget.', 'so-widgets-bundle'),
				'help' => 'https://siteorigin.com/widgets-bundle/button-widget-documentation/'
			),
			array(

			),
			false,
			plugin_dir_path(__FILE__)
		);

	}

	function initialize() {
		$this->register_frontend_styles(
			array(
				array(
					'sow-button-base',
					get_template_directory_uri() . '/so-widgets-bundle/widgets/hr/css/style.css',
					array(),
					SOW_BUNDLE_VERSION
				),
			)
		);
	}

	function initialize_form() {
		return array(
			
		);
	}

	function get_style_name($instance) {
		if(empty($instance['design']['theme'])) return 'atom';
		return $instance['design']['theme'];
	}

	/**
	 * Get the variables that we'll be injecting into the less stylesheet.
	 *
	 * @param $instance
	 *
	 * @return array
	 */
	function get_less_variables($instance){
		if( empty( $instance ) || empty( $instance['design'] ) ) return array();
		return array(
			
		);
	}

	/**
	 * Make sure the instance is the most up to date version.
	 *
	 * @param $instance
	 *
	 * @return mixed
	 */
	function modify_instance($instance){

		return $instance;
	}
}

siteorigin_widget_register('sow-hr', __FILE__, 'SiteOrigin_Widget_Hr_Widget');
