<?php defined( 'ABSPATH' ) or die( 'Keep Silent' );
    
    // $attributes, $contents, $settings, $tag

    if ( ! upb_is_shortcode_enabled( $attributes ) ) {
        return;
    }
?>

<div id="<?php upb_shortcode_id( $attributes ) ?>" class="<?php upb_shortcode_class( $attributes, $tag ) ?>">
     
     
    <div class="title <?php echo esc_attr( $attributes[ 'align' ] ) ?> <?php echo esc_attr( $attributes[ 'design-align' ] ) ?> <?php echo esc_attr( $attributes[ 'design' ] ) ?>" style="color : <?php echo esc_attr($attributes['textcolor']) ?>">
     
        <<?php echo esc_attr( $attributes[ 'size' ] ) ?> >
             <?php upb_shortcode_title( $attributes ) ?> 
        </<?php echo esc_attr( $attributes[ 'size' ] ) ?>>
        
         
        <span class="icon">
            <i class="<?php echo esc_attr( $attributes[ 'icon' ] ) ?>"></i> 
        </span>
    </div> 
     
     
</div>