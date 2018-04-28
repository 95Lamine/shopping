<?php
if( $params['menu_id'] == '' ) return;

$opened = get_post_meta( woodmart_get_the_ID(), '_woodmart_open_categories', true );

if ( woodmart_woocommerce_installed() && is_product() ) $opened = false;

$class = ( $params['color_scheme'] != 'inherit') ? 'color-scheme-' . $params['color_scheme'] : '';

if ( ! empty( $params['background'] ) && ! empty( $params['background']['background-color'] ) ) {
	$class .= ' has-bg';
}

?>

<div class="header-categories-nav <?php if( $opened ) echo 'opened-menu'; else echo 'show-on-hover'; ?>" role="navigation">
	<div class="header-categories-nav-wrap">
		<span class="whb-<?php echo esc_attr( $id ); ?> menu-opener <?php echo esc_attr( $class ); ?>">
			<span class="burger-icon"></span>
			<span class="menu-open-label">
				<?php esc_html_e('Browse Categories', 'woodmart'); ?>
			</span>
			<span class="arrow-opener"></span>
		</span>
		<div class="categories-menu-dropdown vertical-navigation woodmart-navigation">
			<?php 
				wp_nav_menu(
					array(
						'menu' => $params['menu_id'],
						'menu_class' => 'menu',
						'walker' => new WOODMART_Mega_Menu_Walker()
					)
				);
			 ?>
		</div>
	</div>
</div>
