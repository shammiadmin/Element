<?php defined( 'ABSPATH' ) or die( 'Keep Silent' );
    
    // $attributes, $contents, $settings, $tag

    if ( ! upb_is_shortcode_enabled( $attributes ) ) {
        return;
    }

     
?>

<div id="<?php upb_shortcode_id( $attributes ) ?>" class="<?php upb_shortcode_class( $attributes, $tag ) ?>">
     

    


    <div class="team">
         <img src="<?php echo esc_attr( $attributes['image' ] ) ; ?> " class="img-responsive" alt="Image"> 
        <div class="caption">
            <h3 v-text="title"><?php upb_shortcode_title( $attributes ) ?></h3> 
            <small><?php echo esc_html( $attributes[ 'designation' ] ) ?></small>
        </div>
    </div>
     
</div>