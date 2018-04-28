<?php
	$count = ( $params['display'] == 'dropdown' ) ? 20 : 40;
	if( $params['display'] == 'form' ) {
		woodmart_search_form( array(
			'ajax' => $params['ajax'],
			'post_type' => $params['post_type'],
			'show_categories' => $params['categories_dropdown'],
		) );
		return;
	}
?>
<div class="whb-search search-button">
	<a href="#"><span class="search-button-icon"></span></a>
	<?php if ( $params['display'] == 'dropdown' ): ?>
		<?php 
			woodmart_search_form( array(
				'ajax' => $params['ajax'],
				'post_type' => $params['post_type'],
				'type' => 'dropdown'
			) );
		?>
	<?php endif ?>
</div>