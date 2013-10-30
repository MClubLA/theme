<?php
/**
 * The template for displaying search forms in MClub LA
 *
 * @package MClub LA
 */
?>
	<form method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
		<label for="s" class="screen-reader-text"><?php _ex( 'Search', 'assistive text', 'mclub' ); ?></label>
		<input type="search" class="field" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" id="s" />
		<button type="submit" id="searchsubmit" value="<?php //echo esc_attr_x( 'Search', 'submit button', 'mclub' ); ?>" />
	</form>
