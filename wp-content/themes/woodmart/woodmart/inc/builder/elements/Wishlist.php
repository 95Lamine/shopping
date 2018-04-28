<?php if ( ! defined('WOODMART_THEME_DIR')) exit('No direct script access allowed');

/**
 * ------------------------------------------------------------------------------------------------
 *	Wishlist icon in the header elements
 * ------------------------------------------------------------------------------------------------
 */

if( ! class_exists( 'WOODMART_HB_Wishlist' ) ) {
	class WOODMART_HB_Wishlist extends WOODMART_HB_Element {

		public function __construct() {
			parent::__construct();
			$this->template_name = 'wishlist';
		}

		public function map() {
			$this->args = array(
				'type' => 'wishlist',
				'title' => esc_html__( 'Wishlist', 'woodmart' ),
				'text' => esc_html__( 'Wishlist icon', 'woodmart' ),
				'icon' => WOODMART_ASSETS_IMAGES . '/header-builder/icons/hb-ico-wishlist.svg',
				'editable' => true,
				'container' => false,
				'edit_on_create' => true,
				'drag_target_for' => array(),
				'drag_source' => 'content_element',
				'removable' => true,
				'addable' => true,
				'params' => array(
					'design' => array(
						'id' => 'design',
						'title' => esc_html__( 'Style', 'woodmart' ),
						'type' => 'selector',
						'tab' => esc_html__( 'General', 'woodmart' ),
						'value' => 'icon',
						'options' => array(
							'icon' => array(
								'value' => 'icon',
								'label' => esc_html__( 'Icon', 'woodmart' ),
							),
							'text' => array(
								'value' => 'text',
								'label' => esc_html__( 'With text', 'woodmart' ),
							)
						),
						'description' => esc_html__( 'You can show the icon only or display "Wishlist" text too.', 'woodmart' ),
					),
				)
			);
		}

	}

}
