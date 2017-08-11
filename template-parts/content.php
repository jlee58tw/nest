<?php
/**
 * Template part for displaying posts.
 *
 * Please browse readme.txt for credits and forking information
 * @package nest
 */

?>

<article id="post-<?php the_ID(); ?>"  <?php post_class('post-content'); ?>>

	<?php
	if ( is_sticky() && is_home() && ! is_paged() ) {
		printf( '<span class="sticky-post">%s</span>', __( 'Featured', 'nest' ) );
	} ?>

	<header class="entry-header">	
		<span class="screen-reader-text"><?php the_title();?></span>
		<?php if (get_theme_mod('blog_post_author_image') ) : ?>
		<div class="subpage-author-image" style="background-image: url('<?php echo esc_url(get_theme_mod('blog_post_author_image')) ?>')"></div>

				

	<?php else : ?>

<?php endif; ?>

<?php if ( is_single() ) : ?>
	<h1 class="entry-title">
		<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
	</h1>
<?php else : ?>
	<h2 class="entry-title">
		<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
	</h2>
<?php endif; // is_single() ?>

<?php if ( 'post' == get_post_type() ) : ?>
	<div class="entry-meta">
		<h5 class="entry-date"><?php nest_single_meta(); ?></h5>
	</div><!-- .entry-meta -->
<?php endif; ?>
</header><!-- .entry-header -->

<div class="entry-content">
	<?php					
	the_content('&hellip; <p class="read-more"><a class="btn btn-default" href="'. esc_url(get_permalink( get_the_ID() )) . '">' . __(' Read More', 'nest') . '<span class="screen-reader-text"> '. __(' Read More', 'nest').'</span></a></p>');
	?>

	<?php
	wp_link_pages( array(
		'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'nest' ),
		'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php nest_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
