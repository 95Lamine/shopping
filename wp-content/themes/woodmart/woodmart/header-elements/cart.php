<?php
$extra_class = '';

if( $params['icon_type'] == 'bag' ) {
	$extra_class .= ' woodmart-cart-alt';
}

if( $params['position'] == 'side' ) {
	$extra_class .= ' cart-widget-opener';
}

if ( !woodmart_woocommerce_installed() || $params['style'] == 'disable' ) return; ?>

<div class="woodmart-shopping-cart woodmart-cart-design-<?php echo esc_attr( $params['style'] ); ?> <?php echo esc_attr( $extra_class ); ?>">
	<a href="<?php echo esc_url( wc_get_cart_url() ); ?>">
		<span class="woodmart-cart-wrapper">
			<span class="woodmart-cart-icon"></span>
			<span class="woodmart-cart-totals">
				<?php woodmart_cart_count(); ?>
				<span class="subtotal-divider">/</span> 
				<?php woodmart_cart_subtotal(); ?>
			</span>
		</span>
	</a>
	<?php if ( $params['position'] != 'side'): ?>
		<div class="dropdown-cart">
			 <?php 

				// Insert cart widget placeholder - code in woocommerce.js will update this on page load
				echo '<div class="widget woocommerce widget_shopping_cart"><div class="widget_shopping_cart_content"></div></div>';


			  ?> 
		</div>
	<?php endif; ?>
</div>