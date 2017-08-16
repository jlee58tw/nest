<?php
/**
 * The template for displaying search results pages.
 *
 * Please browse readme.txt for credits and forking information
 * @package nest
 */

get_header(); ?>
		<div class="container">
            <div class="row nav-padding">
				

					<?php if ( have_posts() ) : ?>

						<header class="search-page-header">
							<h3 class="search-page-title"><?php printf( esc_html__( '與「 %s」有關的文章', 'nest' ), '<span>' . get_search_query() . '</span>' ); ?></h3>
						</header><!-- .page-header -->

					<section id="primary" class="col-md-8 content-area">
						<main id="main" class="site-main" role="main">

						<?php /* Start the Loop */ ?>
						<?php while ( have_posts() ) : the_post(); ?>

							<?php
							/**
							 * Run the loop for the search to output the results.
							 * If you want to overload this in a child theme then include a file
							 * called content-search.php and that will be used instead.
							 */
							get_template_part( 'template-parts/content','excerpt');
							?>

						<?php endwhile; ?>

							<nav class="navigation posts-navigation" role="navigation">
								<h2 class="screen-reader-text">Posts navigation</h2>
									<div class="nav-numbers">
										<?php if ( $wp_query->max_num_pages > 1 ) : ?>
											<?php if (function_exists("pagination")) {
												pagination($custom_query->max_num_pages);
											} ?>	
										<?php endif; ?>
									</div>				
							</nav>

						</main><!-- #main -->
					</section><!-- #primary -->

					<?php else : ?>

					<section id="primary" class="col-md-8 content-area">
						<main id="main" class="site-main" role="main">

						<?php get_template_part( 'template-parts/content', 'none' ); ?>

						</main><!-- #main -->
					</section><!-- #primary -->


					<?php endif; ?>

						


				<?php get_sidebar('sidebar-1'); ?>

			</div> <!--.row-->            
        </div><!--.container-->
        <?php get_footer(); ?>
