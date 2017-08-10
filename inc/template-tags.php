<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * Please browse readme.txt for credits and forking information
 * @package nest
 */


if ( ! function_exists( 'nest_posts_navigation' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 */
function nest_posts_navigation() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<nav class="navigation posts-navigation" role="navigation">
		<h2 class="screen-reader-text"><?php esc_html_e( 'Posts navigation', 'nest' ); ?></h2>
		<div class="nav-links">

			<div class="row">
				<?php if ( get_previous_posts_link() ) { ?>
				<div class="col-md-6 next-post">
					<?php previous_posts_link('<i class="fa fa-angle-double-left"></i>
					'. __( 'NEWER POSTS', 'nest' ) ); ?>
				</div>
				<?php } else {
					echo '<div class="col-md-6">';
					echo '</div>';
				} ?>			

				<?php if ( get_next_posts_link() ) { ?>	
				<div class="col-md-6 prev-post">		
					<?php next_posts_link( __( 'OLDER POSTS ', 'nest' ).'<i class="fa fa-angle-double-right"></i>' ); ?>
				</div>
				<?php }	else{
					echo '<div class="col-md-6">';
					echo '</div>';
				} ?>
			</div>		
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'nest_posted_on' ) ) :
	/**
	* Prints HTML with meta information for the current post-date/time and author.
	*/
	function nest_posted_on() {

		$viewbyauthor_text = __( '查看 ', 'nest' ).' %s'.' 的所有文章';

		$entry_meta = '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s </time></a><span class="byline"><span class="sep"></span>';

		$entry_meta = sprintf($entry_meta,
			esc_url( get_permalink() ),
			esc_attr( get_the_time() ),
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_attr( sprintf( $viewbyauthor_text, get_the_author() ) ),
			esc_html( get_the_author() ));

		print $entry_meta;

	}
endif;

if ( ! function_exists( 'nest_single_meta' ) ) :
	function nest_single_meta() {

		$viewbyauthor_text = __( '查看 ', 'nest' ).' %s'.'的所有文章';
		$categories_list = "";
		if ( 'post' == get_post_type() ) {
			$categories_list = get_the_category_list( esc_html__( ', ', 'nest' ) );
		}

		$entry_meta = '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s </time></a> / %5$s';

		$entry_meta = sprintf($entry_meta,
			esc_url( get_permalink() ),
			esc_attr( get_the_time() ),
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			$categories_list
			);

		print $entry_meta;

	}
endif;

if ( ! function_exists( 'nest_posted_on_no_link' ) ) :
	/**
	* Prints HTML with meta information for the current post-date/time and author.
	*/
	function nest_posted_on_no_link() {

		$viewbyauthor_text = __( 'View all posts by', 'nest' ).' %s';

		$entry_meta = '<time class="entry-date" datetime="%3$s" pubdate>%4$s </time>';

		$entry_meta = sprintf($entry_meta,
			esc_url( get_permalink() ),
			esc_attr( get_the_time() ),
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_html( get_the_author() ));

		print $entry_meta;


	}
endif;

if ( ! function_exists( 'nest_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function nest_entry_footer() {
	if(is_single())
		echo '<hr>';
	
	if(!is_home() && !is_search() && !is_archive()){

		if ( 'post' == get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ' ', 'nest' ) );
			echo '<div class="row">';
			if ( $categories_list && nest_categorized_blog() ) {
				printf( '<div class="col-md-3 cattegories"><span class="cat-links">
		 ' . '%1$s</span></div>', $categories_list ); // WPCS: XSS OK.
			}
			else{
				echo '<div class="col-md-3 cattegories"><span class="cat-links"></span></div>'; 
			}


			$tags_list = get_the_tag_list( '', esc_html__( ' ', 'nest' ) );
			if ( $tags_list ) {
					printf( '<div class="col-md-9 cattegories"><span class="tags-links">' . esc_html__( ' %1$s', 'nest' ) . '</span></div>', $tags_list ); // WPCS: XSS OK.
				}
				
				echo '</div>';
			}
		}
		edit_post_link( esc_html__( 'Edit This Post', 'nest' ), '<span>', '</span>' );
		
	}
endif;


/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function nest_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'nest_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
			) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'nest_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so nest_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so nest_categorized_blog should return false.
		return false;
	}
}

/**
*  Display featured image of the post
**/

function nest_featured_image_disaplay(){
	if ( has_post_thumbnail() && ! post_password_required() && ! is_attachment() ) {  // check if the post has a Post Thumbnail assigned to it. 
		echo '<div class="featured-image">';
		the_post_thumbnail('nest-full-width');
		echo '</div>';
	} 
}

/**
 * Flush out the transients used in nest_categorized_blog.
 */
function nest_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'nest_categories' );
}
add_action( 'edit_category', 'nest_category_transient_flusher' );
add_action( 'save_post',     'nest_category_transient_flusher' );
