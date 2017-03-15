<?php defined( 'ABSPATH' ) or die( 'Keep Silent' );
    
    // $attributes, $contents, $settings, $tag

    if ( ! upb_is_shortcode_enabled( $attributes ) ) {
        return;
    }

     
?>

<div id="<?php upb_shortcode_id( $attributes ) ?>" class="<?php upb_shortcode_class( $attributes, $tag ) ?>">
      
      


    <div class="image-box <?php echo esc_attr( $attributes[ 'align' ] ) ?>">
        <a href="<?php echo esc_attr( $attributes['url' ] ) ; ?>"><img  src="<?php echo esc_attr( $attributes['image' ] ) ; ?> "></a>
        <div class="content">
            <a href="<?php echo esc_attr( $attributes['title-url' ] ) ; ?>">
            <h3> <?php upb_shortcode_title( $attributes ) ?></h3></a>
             <?php echo do_shortcode( $contents ) ?> 
        </div>
    </div>
     
</div>