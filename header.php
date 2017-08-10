<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
* Please browse readme.txt for credits and forking information
 * @package nest
 */

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width" />
  <link rel="profile" href="http://gmpg.org/xfn/11" />
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <div id="page" class="hfeed site">
    <header id="masthead"  role="banner">
      <nav class="navbar lh-nav-bg-transform navbar-default navbar-fixed-top navbar-left" role="navigation"> 
        <!-- Brand and toggle get grouped for better mobile display --> 
        <div class="container" id="navigation_menu">
          <div class="navbar-header"> 
            <?php if ( has_nav_menu( 'primary' ) ) { ?>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"> 
              <span class="sr-only"><?php echo esc_html('Toggle Navigation', 'nest') ?></span> 
              <span class="icon-bar"></span> 
              <span class="icon-bar"></span> 
              <span class="icon-bar"></span> 
            </button> 
            <?php } ?>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
              <?php
              if (!is_front_page()){
                if (!has_custom_logo()) { 
                  echo '<div class="navbar-brand">'; bloginfo('name'); echo '</div>';
                } else {
                  the_custom_logo();
                } 
              }
              ?>
            </a>
          </div> 

          <?php if ( !is_front_page() ) { 
                  if ( has_nav_menu( 'primary' ) ) {
                    nest_header_menu();
                  }
                } else {
                  echo "<div id='index_nav'>";
                  nest_header_menu();
                  echo "</div>";
          } ?>
          </div><!--#container-->
        </nav>
        <?php if ( is_front_page() ) { ?>
        <div class="site-header">
          <div class="site-info">
            <?php if ( get_bloginfo( 'description' ) || get_bloginfo( 'title' ) ) : ?>
                <h1 class="site-title">
                  <a href="<?php echo esc_url( home_url() ); ?>" title="<?php echo esc_attr( get_bloginfo( 'title' ) ); ?> &mdash; <?php echo esc_attr( get_bloginfo( 'description' ) ); ?>" rel="home"><?php echo esc_attr( get_bloginfo( 'title' ) ); ?></a>
                </h1>
                <?php if ( get_bloginfo( 'description' ) ) { ?>
                  <h3 class="site-description"><?php echo esc_attr( get_bloginfo( 'description' ) ); ?></h3>
                <?php } ?>		
            <?php endif; ?>
          </div> 	<!-- /blog-info -->	
    </div><!--.site-header--> 
    <?php } else {  ?>

    <?php } ?>
  </header>    

  <div id="content" class="site-content">