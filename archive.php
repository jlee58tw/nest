<?php
/**
 * The template for displaying archive pages.
 *
 * 
 * Please browse readme.txt for credits and forking information
 *
 * @package nest
 */

get_header(); ?>
<div class="container">
	<div class="row nav-padding">
		

		<?php if ( have_posts() ) : ?>

			<header class="archive-page-header">
				<?php						
				the_archive_title( '<h3 class="archive-page-title">', '</h3>' );
				the_archive_description ( '<div class="taxonomy-description">', '</div>' )
				?>
			</header><!-- .page-header -->

			<div id="primary" class="col-md-8 content-area">
				<main id="main" class="site-main" role="main">

					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>

						<?php

								/*
								 * Include the Post-Format-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
								 */
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

					</main><!-- #main -->
				</div><!-- #primary -->

				<?php get_sidebar('sidebar-1'); ?>			

			</div> <!--.row-->            
		</div><!--.container-->
		<?php get_footer(); ?>