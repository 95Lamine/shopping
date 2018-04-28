<?php

/**
 * ------------------------------------------------------------------------------------------------
 * Returns the current header instance (on frontend)
 * ------------------------------------------------------------------------------------------------
 */

if( ! function_exists( 'whb_get_header' ) ) {
	function whb_get_header() {
		return WOODMART_HB_Frontend::get_instance()->header;
	}
}


/**
 * ------------------------------------------------------------------------------------------------
 * Generate current header HTML structure
 * ------------------------------------------------------------------------------------------------
 */

if( ! function_exists( 'whb_generate_header' ) ) {
	function whb_generate_header() {
		WOODMART_HB_Frontend::get_instance()->generate_header(); 
	}
}


/**
 * ------------------------------------------------------------------------------------------------
 * Get main builder class instance
 * ------------------------------------------------------------------------------------------------
 */

if( ! function_exists( 'whb_get_builder' ) ) {
	function whb_get_builder() {
		return WOODMART_HB_Frontend::get_instance()->builder;
	}
}


/**
 * ------------------------------------------------------------------------------------------------
 * Is full screen search enabled
 * ------------------------------------------------------------------------------------------------
 */

if( ! function_exists( 'whb_is_full_screen_search' ) ) {
	function whb_is_full_screen_search() {
		if( whb_is_enabled() ) {
			$settings = whb_get_settings();

			if( isset( $settings['search'] ) && $settings['search']['display'] != 'full-screen' ) return false;

		} else if ( woodmart_get_opt( 'header_search' ) != 'full-screen' ) return false;

		return true;
	}
}

/**
 * ------------------------------------------------------------------------------------------------
 * Is full screen menu enabled
 * ------------------------------------------------------------------------------------------------
 */

if( ! function_exists( 'whb_is_full_screen_menu' ) ) {
	function whb_is_full_screen_menu() {
		if( whb_is_enabled() ) {
			$settings = whb_get_settings();

			if( isset( $settings['mainmenu'] ) && $settings['mainmenu']['full_screen'] ) return true;

		} else if ( woodmart_get_opt( 'full_screen_menu' ) ) return true;

		return false;
	}
}

/**
 * ------------------------------------------------------------------------------------------------
 * Is full screen search enabled
 * ------------------------------------------------------------------------------------------------
 */

if( ! function_exists( 'whb_is_side_cart' ) ) {
	function whb_is_side_cart() {
		if( whb_is_enabled() ) {
			$settings = whb_get_settings();

			if( isset( $settings['cart'] ) && $settings['cart']['position'] == 'side' ) return true;

		} else if ( woodmart_get_opt('cart_position') == 'side' ) return true;

		return false;
	}
}


/**
 * ------------------------------------------------------------------------------------------------
 * Get header settings and key elements params (search, cart widget, menu)
 * ------------------------------------------------------------------------------------------------
 */

if( ! function_exists( 'whb_get_settings' ) ) {
	function whb_get_settings() {
		return whb_get_header()->get_options();
	}
}


/**
 * ------------------------------------------------------------------------------------------------
 * Get dropdowns color
 * ------------------------------------------------------------------------------------------------
 */

if( ! function_exists( 'whb_get_dropdowns_color' ) ) {
	function whb_get_dropdowns_color() {
		if( woodmart_get_opt( 'dark_version' ) ) return 'light';
		
		if( whb_is_enabled() ) {
			$settings = whb_get_settings();

			if( isset( $settings['dropdowns_dark'] ) )  return ( $settings['dropdowns_dark'] ? 'light' : 'dark' ); 

		} else return ( woodmart_get_opt( 'header_dropdowns_dark' ) || woodmart_get_opt( 'dark_version' ) ) ? 'light' : 'dark';
			
	}
}


/**
 * ------------------------------------------------------------------------------------------------
 * Is this mega machine is turned on in Theme Settings -> Header
 * ------------------------------------------------------------------------------------------------
 */

if( ! function_exists( 'whb_is_enabled' ) ) {
	function whb_is_enabled() {
		return woodmart_get_opt( 'header_builder' );
	}
}