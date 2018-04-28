<?php
	if ( ! woodmart_woocommerce_installed() || ! class_exists( 'YITH_WCWL' ) ) return;
?>
<div class="woodmart-wishlist-info-widget whb-wishlist-<?php echo esc_attr($params['design']); ?>">
	<a href="<?php echo esc_url(YITH_WCWL()->get_wishlist_url()); ?>"><span class="wishlist-info-wrap"><span class="wishlist-icon"><span class="wishlist-count"><?php echo YITH_WCWL()->count_products(); ?></span></span><span class="wishlist-label"><?php esc_html_e( 'Wishlist', 'woodmart' ) ?></span></span></a>
</div>
