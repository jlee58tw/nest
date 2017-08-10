<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * Please browse readme.txt for credits and forking information
 * @package nest
 */

get_header(); ?>

<div class="container">
	<div class="row">
		<div id="primary" class="col-md-8 content-area">
			<main id="main" class="site-main" role="main">
				<div class="article-grid-container">
					<?php if ( have_posts() ) : ?>
					<?php if ( is_home() && ! is_front_page() ) : ?>
					<header>
						<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
					</header>
				<?php endif; ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

				<?php
					get_template_part( 'template-parts/content','excerpt');
				?>

			<?php endwhile; ?>
				<nav class="navigation posts-navigation" role="navigation">
					<h2 class="screen-reader-text">Posts navigation</h2>
						<div class="row nav-numbers">
							<?php if ( $wp_query->max_num_pages > 1 ) : ?>
								<?php if (function_exists("pagination")) {
									pagination($custom_query->max_num_pages);
								} ?>	
							<?php endif; ?>
						</div>				
				</nav>
		<?php else : ?>
		<?php get_template_part( 'template-parts/content', 'none' ); ?>

	<?php endif; ?>
</div>
</main><!-- #main -->
</div><!-- #primary -->

<?php get_sidebar('sidebar-1'); ?>
</div><!--row-->      

</div><!--.container-->
<?php get_footer(); ?>



