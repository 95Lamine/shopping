<?php if ( ! defined('WOODMART_THEME_DIR')) exit('No direct script access allowed');

/**
 * ------------------------------------------------------------------------------------------------
 * Search form. A few kinds of it.
 * ------------------------------------------------------------------------------------------------
 */

if( ! class_exists( 'WOODMART_HB_Search' ) ) {
	class WOODMART_HB_Search extends WOODMART_HB_Element {


		public function __construct() {
			parent::__construct();

			$this->template_name = 'search';
		}

		public function map() {
			$this->args = array(
				'type' => 'search',
				'title' => esc_html__( 'Search', 'woodmart' ),
				'text' => esc_html__( 'Search form', 'woodmart' ),
				'icon' => WOODMART_ASSETS_IMAGES . '/header-builder/icons/hb-ico-search.svg',
				'editable' => true,
				'container' => false,
				'edit_on_create' => true,
				'drag_target_for' => array(),
				'drag_source' => 'content_element',
				'removable' => true,
				'addable' => true,
				'desktop' => true,
				'params' => array(
					'display' => array(
						'id' => 'display',
						'title' => esc_html__( 'Display', 'woodmart' ),
						'type' => 'selector',
						'tab' => esc_html__( 'General', 'woodmart' ),
						'value' => 'full-screen',
						'options' => array(
							'full-screen' => array(
								'value' => 'full-screen',
								'label' => esc_html__( 'Full screen', 'woodmart' ),
							),
							'dropdown' => array(
								'value' => 'dropdown',
								'label' => esc_html__( 'Dropdown', 'woodmart' ),
							),
							'form' => array(
								'value' => 'form',
								'label' => esc_html__( 'Form', 'woodmart' ),
							),
						),
						'description' => esc_html__( 'Display search icon/form in the header in different views.', 'woodmart' ),
					),
					'categories_dropdown' => array(
						'id' => 'categories_dropdown',
						'title' => esc_html__( 'Show product categories dropdown', 'woodmart' ),
						'type' => 'switcher',
						'tab' => esc_html__( 'General', 'woodmart' ),
						'value' => false,
				        'requires' => array(
							'display' => array(
								'comparison' => 'equal',
								'value' => 'form'
							)
						),
					),
					'ajax' => array(
						'id' => 'ajax',
						'title' => esc_html__( 'Search with AJAX', 'woodmart' ),
						'type' => 'switcher',
						'tab' => esc_html__( 'General', 'woodmart' ),
						'value' => false,
						'description' => esc_html__( 'Enable instant AJAX search functionality for this form.', 'woodmart' ),
					),
					'post_type' => array(
						'id' => 'post_type',
						'title' => esc_html__( 'Post type', 'woodmart' ),
						'type' => 'selector',
						'tab' => esc_html__( 'General', 'woodmart' ),
						'value' => 'product',
						'options' => array(
							'product' => array(
								'value' => 'product',
								'label' => esc_html__( 'Product', 'woodmart' ),
							),
							'post' => array(
								'value' => 'post',
								'label' => esc_html__( 'Post', 'woodmart' ),
							),
							'portfolio' => array(
								'value' => 'portfolio',
								'label' => esc_html__( 'Portfolio', 'woodmart' ),
							),
						),
						'description' => esc_html__( 'You can set up the search for posts, projects or for products (woocommerce).', 'woodmart' ),
					),
				)
			);
		}

	}

}
