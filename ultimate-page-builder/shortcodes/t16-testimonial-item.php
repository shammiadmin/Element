<?php defined( 'ABSPATH' ) or die( 'Keep Silent' );
    
    // $attributes, $contents, $settings, $tag

    if ( ! upb_is_shortcode_enabled( $attributes ) ) {
        return;
    }

     

    global $upb_testi;

     $upb_testi[] = $attributes;

?>
 
  
<div class="quote">
    <?php echo do_shortcode( $contents ) ?>
</div>
 


