<?php 
if( ! woodmart_woocommerce_installed() ) return '';

$links = woodmart_get_header_links();
$my_account_style = $params['display'];
$login_side = $params['form_display'] == 'side';

$classes = 'item-level-0';
$classes .= ( ! empty( $link['dropdown'] ) ) ? ' menu-item-has-children' : '';
$classes .= ( $params['with_username'] ) ? ' my-account-with-username' : '';
$classes .= ( $my_account_style ) ? ' my-account-with-' . $my_account_style : '';
$classes .= ( ! is_user_logged_in() && $params['login_dropdown'] && $login_side ) ? ' login-side-opener' : '';


if( empty( $links ) ) return '';

?>
<div class="whb-header-links woodmart-navigation woodmart-header-links">
	<ul class="menu">
		<?php foreach ($links as $key => $link):
			$classes .= ' menu-item-'. $key;
		?>
			<li class="<?php echo esc_attr( $classes ); ?> menu-simple-dropdown item-event-hover"><a href="<?php echo esc_url( $link['url'] ); ?>"><span><?php echo wp_kses( $link['label'], 'default' ); ?></span></a>
				<?php if( ! empty( $link['dropdown'] ) ) {
					echo $link['dropdown'];
				} ?></li>
		<?php endforeach; ?>
	</ul>		
</div>