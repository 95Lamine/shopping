<?php if ( ! defined('WOODMART_THEME_DIR')) exit('No direct script access allowed');

/**
 * ------------------------------------------------------------------------------------------------
 *	Search icon for mobile devices
 * ------------------------------------------------------------------------------------------------
 */

if( ! class_exists( 'WOODMART_HB_Mobilesearch' ) ) {
	class WOODMART_HB_Mobilesearch extends WOODMART_HB_Element {

		public function __construct() {
			parent::__construct();
			$this->template_name = 'mobile-search';
		}

		public function map() {
			$this->args = array(
				'type' => 'mobilesearch',
				'title' => esc_html__( 'Search', 'woodmart' ),
				'text' => esc_html__( 'Search form', 'woodmart' ),
				'icon' => WOODMART_ASSETS_IMAGES . '/header-builder/icons/hb-ico-search.svg',
				'editable' => false,
				'container' => false,
				'edit_on_create' => false,
				'drag_target_for' => array(),
				'drag_source' => 'content_element',
				'removable' => true,
				'addable' => true,
				'mobile' => true
			);
		}

	}

}
