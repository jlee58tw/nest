<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 *
 * Please browse readme.txt for credits and forking information
 * @package nest
 */

?>

<section class="no-results not-found">
	<header class="page-header">
		<span class="screen-reader-text"><?php esc_html_e( '找不到東西唷', 'nest' ); ?></span>
		<h1 class="page-title"><?php esc_html_e( '找不到東西唷', 'nest' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'nest' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>
			<p><?php esc_html_e( '抱歉，我們無法找到相關文章，請您試試其他關鍵字', 'nest' ); ?></p>
		<?php else : ?>
			<p><?php esc_html_e( '抱歉，我們無法找到相關文章，請您試試站內搜尋', 'nest' ); ?></p>
		<?php endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
