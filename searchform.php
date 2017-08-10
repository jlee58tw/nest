<?php
/**
 * Template for displaying search forms in Twenty Sixteen
 *
 * Please browse readme.txt for credits and forking information
 * @package nest
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'nest' ); ?></span>
		<input type="search" class="search-field" placeholder="Searching..." value="<?php echo get_search_query(); ?>" name="s" title="站內搜尋" />
	</label>
	<button type="submit" class="search-submit">搜尋</span></button>
</form>
