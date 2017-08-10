<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package nest
 *
 * Please browse readme.txt for credits and forking information
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function nest_body_classes( $classes ) {
  // Adds a class of group-blog to blogs with more than 1 published author.
  if ( is_multi_author() ) {
    $classes[] = 'group-blog';
  }

  return $classes;
}
//add_filter( 'body_class', 'nest_body_classes' );

if ( ! function_exists( 'nest_header_menu' ) ) :
    /**
     * Header menu (should you choose to use one)
     */
  function nest_header_menu() {
      // display the WordPress Custom Menu if available
    wp_nav_menu(array(
      'theme_location'    => 'primary',
      'depth'             => 2,
      'container'         => 'div',
      'container_class'   => 'collapse navbar-collapse navbar-ex1-collapse',
      'menu_class'        => 'nav navbar-nav',
      'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
      'walker'            => new wp_bootstrap_navwalker()
      ));
  } /* end header menu */
  endif;

if ( ! function_exists( 'nest_header_fixed_menu' ) ) :
    /**
     * Header menu (should you choose to use one)
     */
  function nest_header_fixed_menu() {
      // display the WordPress Custom Menu if available
    wp_nav_menu(array(
      'theme_location'    => 'primary',
      'depth'             => 2,
      'container'         => 'div',
      'container_class'   => 'collapse navbar-collapse navbar-ex1-collapse',
      'menu_class'        => 'nav navbar-nav',
      'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
      'walker'            => new wp_bootstrap_navwalker()
      ));
  } /* end header menu */
  endif;



/**
 * Adds the URL to the top level navigation menu item
 */
function  nest_add_top_level_menu_url( $atts, $item, $args ){
  if ( isset($args->has_children) && $args->has_children  ) {
    $atts['href'] = ! empty( $item->url ) ? $item->url : '';
  }
  return $atts;
}

//hide!!!
//add_filter( 'nav_menu_link_attributes', 'nest_add_top_level_menu_url', 99, 3 );



/** BACKEND **/

//add_action( 'admin_menu', 'nest_register_backend' );
function nest_register_backend() {
  add_theme_page( __('About nest', 'nest'), __('nest Theme', 'nest'), 'edit_theme_options', 'about-nest.php', 'nest_backend');
}

function nest_backend(){ ?>
<div class="info-page-wrapper">
  <div class="info-page-top-section">
    <div class="info-page-left">
      <h2><?php echo __( 'Helpdesk & Questions', 'nest' ); ?></h2>
      <p>
        <?php echo __( '
          If you need help with anything theme related, or have pre-sale questions please contact us  
          <a href="http://madefornest.com/help-support/" target="_blank">through this form</a> or email us at Writerthemehelp@gmail.com
           we try to respond within 48 hours.
        ', 'nest' ); ?>
      </p>
      <p>
        <?php echo __( '
        If you are having troubles with a plugin or general WordPress functionality we ask you kindly to either go to the <a href="https://wordpress.org/support/" target="_blank">WordPress support forum</a>
         or contact the author of the plugin you are having troubles with.
        ', 'nest' ); ?>
      </p>
    </div>
    <div class="info-page-right">
      <h2><?php echo __( 'Useful Links and Resources', 'nest' ); ?></h2>
      <ul>
      <li><?php echo __( '- <a href="http://madefornest.com/help-support/" target="_blank">Contact nest Author</a>', 'nest' ); ?></li>
      <li><?php echo __( '- <a href="https://wordpress.org/support/" target="_blank">WordPress Support Forum</a>', 'nest' ); ?></li>
      <li><?php echo __( '- <a href="http://madefornest.com/nest/" target="_blank">nest Pro Info</a>', 'nest' ); ?></li>
      <li><?php echo __( '- <a href="https://wordpress.org/plugins/browse/popular/" target="_blank">Popular WordPress Plugins</a>', 'nest' ); ?></li>
      </ul>
    </div>
  </div>
  <div class="divider-border"></div>
    <h2 class="pro-vers-headline">Take Your Website To The Next Level</h2>

<div class="text-align-center">
<div class="version-tables">
   <a href="http://madefornest.com/nest/" target="_blank" class="p-version">
    <h3>Pro Version</h3>
    <h4><strong>$39</strong> One Time Fee</h4>
    <span class="purchase-btn-wrapper">
    <span class="purchase-btn">Purchase Now</span>
    </span>
    <ul>
      <li><img src="<?php echo get_template_directory_uri(); ?>/images/checkmark.png">Customize Header</li>
      <li><img src="<?php echo get_template_directory_uri(); ?>/images/checkmark.png">Customize Global Color</li>
      <li><img src="<?php echo get_template_directory_uri(); ?>/images/checkmark.png">Custom Header Height</li>
      <li><img src="<?php echo get_template_directory_uri(); ?>/images/checkmark.png">Show Header On All Pages</li>
      <li><img src="<?php echo get_template_directory_uri(); ?>/images/checkmark.png">Better SEO</li>
      <li><img src="<?php echo get_template_directory_uri(); ?>/images/checkmark.png">Custom Copyright Text</li>
      <li><img src="<?php echo get_template_directory_uri(); ?>/images/checkmark.png">Customize Navigation Colors</li>
      <li><img src="<?php echo get_template_directory_uri(); ?>/images/checkmark.png">Customize Footer Colors</li>
      <li><img src="<?php echo get_template_directory_uri(); ?>/images/checkmark.png">Customize Post Colors</li>      
      <li><img src="<?php echo get_template_directory_uri(); ?>/images/checkmark.png">Customize Page Colors</li>
      <li><img src="<?php echo get_template_directory_uri(); ?>/images/checkmark.png">Customize Sidebar Colors</li>
      <li><img src="<?php echo get_template_directory_uri(); ?>/images/checkmark.png">Author Image</li>
      <li><img src="<?php echo get_template_directory_uri(); ?>/images/checkmark.png">Customize Bottom Widgets Colors</li>
      <li><img src="<?php echo get_template_directory_uri(); ?>/images/checkmark.png">Full Width Page Template</li>
    </ul>
    <span class="purchase-button">Purchase For $39 </span>
  </a>
   <div class="f-version">
    <h3>Free Version</h3>
    <h4>Free Forever</h4>
    <span class="purchase-btn-wrapper">
    <span class="purchase-btn"> </span>
    </span>
    <ul>
      <li><img src="<?php echo get_template_directory_uri(); ?>/images/checkmark.png">Customize Header</li>
      <li><img src="<?php echo get_template_directory_uri(); ?>/images/checkmark.png">Customize Global Color</li>
      <li class="notincluded">Custom Header Height</li>
      <li class="notincluded">Show Header On All Pages</li>
      <li class="notincluded">Better SEO</li>
      <li class="notincluded">Custom Copyright Text</li>
      <li class="notincluded">Customize Navigation Colors</li>
      <li class="notincluded">Customize Footer Colors</li>
      <li class="notincluded">Customize Post Colors</li>
      <li class="notincluded">Customize Page Colors</li>
      <li class="notincluded">Customize Sidebar Colors</li>
      <li class="notincluded">Author Image</li>
      <li class="notincluded">Customize Bottom Widgets Colors</li>
      <li class="notincluded">Full Width Page Template</li>
    </ul>
  </div>
</div>
</div>
</div>
<?php }













