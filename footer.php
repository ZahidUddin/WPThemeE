<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WPThemeE
 */

?>

<footer id="colophon" class="footer">
    
	
	<div class="footer__content container">
    <div class="footer-left">
        
    <div class="footer__content--logo">
         	<?php
// Check if the footer logo has been uploaded, if yes, display it
if ( get_theme_mod('footer_logo') ) {
    echo '<div class="footer-logo">';
    echo '<a href="' . esc_url(home_url('/')) . '"><img src="' . esc_url(get_theme_mod('footer_logo')) . '" alt="' . get_bloginfo('name') . '"></a>';
    echo '</div>';
}
?>
    </div>
    <div class="footer-contact-info">
        <div>
        <small class="font-secondary">Baton Rouge, LA | Hammond, LA</small>
        <small class="font-secondary"><a href="tel:+12253845549" style="color: inherit; text-decoration: none;">225 384 5549</a></small>
        </div>
    
      </div>
    </div>
    
       <div class="footer-right" style="
    display: flex;
 
    flex-direction: column;
">
           
           <?php
		wp_nav_menu(array(
			'theme_location' => 'menu-2', // Replace 'footer' with your menu location slug
			'container'      => false,
			'menu_class'     => 'footer__content--nav',
			'walker'         => new Custom_Footer_Nav_Walker(),
		));
		?>
        
            <div class="footer-desc-right " >
                <small class="font-secondary">©2024 WPThemeE | All rights reserved. | <a href="/privacy/">Privacy Policy</a></small>
                <small class="font-secondary">By accessing this site, you consent to the use of cookies and collection of personal information.</small>
              </div>
                   <div class="custom_logo" >
             <?php
             if(get_theme_mod('service_provider_badge')){
             $badge_url = esc_url(get_theme_mod('service_provider_badge'));
             $site_name = get_bloginfo('name');
             $height = 100; // Set the desired height
             $width = 100;  // Set the desired width

            echo '<img src="' . $badge_url . '" alt="' . $site_name  . '" width="' . $width . '">';
            
             
             }
              if(get_theme_mod('hippa_compliance_seal')){
                  $badge_url = esc_url(get_theme_mod('hippa_compliance_seal'));
                  $site_name = get_bloginfo('name');
                  $height = 100; // Set the desired height
                 $width = 100;  // Set the desired width
             
          echo '<img src="' . $badge_url . '" alt="' . $site_name  . '" width="' . $width . '">';
             
             }
              if(get_theme_mod('louisiana')){
                  $badge_url = esc_url(get_theme_mod('louisiana'));
                  $site_name = get_bloginfo('name');
                  $height = 100; // Set the desired height
                 $width = 100;  // Set the desired width
             
          echo '<img src="' . $badge_url . '" alt="' . $site_name  . '" width="' . $width . '">';
             
             }
               if(get_theme_mod('inc')){
                  $badge_url = esc_url(get_theme_mod('inc'));
                  $site_name = get_bloginfo('name');
                  $height = 100; // Set the desired height
                 $width = 100;  // Set the desired width
             
           echo '<img src="' . $badge_url . '" alt="' . $site_name  . '" width="' . $width . '">';
             
             }
             ?>
         
         
    </div>
       </div>
      
    
    </div>
	
	
	
	
	
	
	
	
	
	
	
	
	<div id='scroll-up'>
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-up"><line x1="12" y1="19" x2="12" y2="5"></line><polyline points="5 12 12 5 19 12"></polyline></svg>
    </div>
</footer> 

</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>