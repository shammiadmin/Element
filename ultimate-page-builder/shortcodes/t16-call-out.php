<?php defined( 'ABSPATH' ) or die( 'Keep Silent' );
    
    // $attributes, $contents, $settings, $tag

    if ( ! upb_is_shortcode_enabled( $attributes ) ) {
        return;
    }

     
?>

<div id="<?php upb_shortcode_id( $attributes ) ?>" class="<?php upb_shortcode_class( $attributes, $tag ) ?>">
      
       
    <div class="call-us <?php echo esc_attr( $attributes[ 'align' ] ) ?>" style = "<?php upb_shortcode_scoped_style_background($attributes) ?> margin-bottom : <?php echo esc_attr($attributes['space']) ?>px;">
        <div class="title"> <?php upb_shortcode_title( $attributes ) ?></div>
        <div class="description"> <?php echo do_shortcode( $contents ) ?></div>
            <a target="_blank" <?php if ($attributes['link'] == true)  { ?> 
       href="<?php echo esc_attr( $attributes['url' ] ) ; ?>" <?php }  ?> 
        class="button <?php echo esc_attr( $attributes['size' ] ) ?> <?php if ($attributes['curved'] == true) { echo  "button-curved" ?>  <?php } ?> " style="background-color : <?php echo esc_attr($attributes['color']) ?>"  >  <?php echo esc_html( $attributes[ 'button-text' ] ) ?></a>    
    </div>
     
</div>