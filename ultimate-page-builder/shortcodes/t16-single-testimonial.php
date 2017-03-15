<?php defined( 'ABSPATH' ) or die( 'Keep Silent' );
    
    // $attributes, $contents, $settings, $tag

    if ( ! upb_is_shortcode_enabled( $attributes ) ) {
        return;
    }

     
?>

<div id="<?php upb_shortcode_id( $attributes ) ?>" class="<?php upb_shortcode_class( $attributes, $tag ) ?>">
      

    <div class="testimonial">
        <div class="photo">
            <img src="<?php echo esc_attr( $attributes['image' ] ) ; ?> " alt="Customer Testimonails"> 
        </div>
        <div class="quote">
             <?php echo do_shortcode( $contents ) ?> 
            <div class="info">
                <p><?php upb_shortcode_title( $attributes ) ?> </p>
                <span> <?php echo esc_html( $attributes[ 'company' ] ) ?></span>
            </div>
        </div>
    </div>
     
</div>