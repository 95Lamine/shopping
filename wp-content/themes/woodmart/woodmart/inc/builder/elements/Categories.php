<?php if ( ! defined('WOODMART_THEME_DIR')) exit('No direct script access allowed');

/**
 * ------------------------------------------------------------------------------------------------
 *	Get categories dropdown vertical menu
 * ------------------------------------------------------------------------------------------------
 */

if( ! class_exists( 'WOODMART_HB_Categories' ) ) {
	class WOODMART_HB_Categories extends WOODMART_HB_Element {

		public function __construct() {
			parent::__construct();
			$this->template_name = 'categories';
		}

		public function map() {
			$options = $this->get_menu_options();
			$first = reset($options);
			
			$this->args = array(
				'type' => 'categories',
				'title' => esc_html__( 'Categories', 'woodmart' ),
				'text' => esc_html__( 'Categories dropdown', 'woodmart' ),
				'icon' => WOODMART_ASSETS_IMAGES . '/header-builder/icons/hb-ico-category.svg',
				'editable' => true,
				'container' => false,
				'edit_on_create' => true,
				'drag_target_for' => array(),
				'drag_source' => 'content_element',
				'removable' => true,
				'addable' => true,
				'desktop' => true,
				'params' => array(
					'menu_id' => array(
						'id' => 'menu_id',
						'title' => esc_html__( 'Choose menu', 'woodmart' ),
						'type' => 'select',
						'tab' => esc_html__( 'General', 'woodmart' ),
						'value' => $first['value'],
						'options' => $options,
						'description' => esc_html__( 'Choose which menu to display in the header as a categories dropdown.', 'woodmart' ),
					),
					'color_scheme' => array(
						'id' => 'color_scheme',
						'title' => esc_html__( 'Text color scheme', 'woodmart' ),
						'type' => 'selector',
						'tab' => esc_html__( 'Colors', 'woodmart' ),
						'value' => 'light',
						'options' => array(
							'dark' => array(
								'value' => 'dark',
								'label' => esc_html__( 'Dark', 'woodmart' ),
							),
							'light' => array(
								'value' => 'light',
								'label' => esc_html__( 'Light', 'woodmart' ),
							),
						),
						'description' => esc_html__( 'Select different text color scheme depending on your header background.', 'woodmart' ),
					),
					'background' => array(
						'id' => 'background',
						'title' => esc_html__( 'Background settings', 'woodmart' ),
						'type' => 'bg',
						'tab' => esc_html__( 'Colors', 'woodmart' ),
						'value' => '',
						'description' => ''
					),
				)
			);
		}

	}

}