<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * Please browse readme.txt for credits and forking information
 * @package nest
 */

get_header(); ?>
		<div class="container">
   			<div class="row nav-padding">
				<div id="primary" class="col-md-8 content-area">
					<main id="main" class="site-main" role="main">

						<section class="error-404 not-found">
							<header class="page-header">
								<h1 class="page-title"><?php esc_html_e( '嗚嗚 404！這個頁面找不到', 'nest' ); ?></h1>
							</header><!-- .page-header -->

							<div class="page-content">
								<p><?php esc_html_e( '您想要打開的頁面可能本來就不存在，或已被移除！', 'nest' ); ?></p>
								</div><!-- .page-content -->
						</section><!-- .error-404 -->

					</main><!-- #main -->
				</div><!-- #primary -->

				<?php get_sidebar('sidebar-1'); ?>

			</div> <!--.row-->            
        </div><!--.container-->
		<?php get_footer(); ?>