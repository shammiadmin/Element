<?php defined( 'ABSPATH' ) or die( 'Keep Silent' );
    
    // $attributes, $contents, $settings, $tag

    if ( ! upb_is_shortcode_enabled( $attributes ) ) {
        return;
    }

     
?>

<div id="<?php upb_shortcode_id( $attributes ) ?>" class="<?php upb_shortcode_class( $attributes, $tag ) ?>">
       

     <div class="counter-area <?php echo esc_attr( $attributes[ 'align' ] ) ?> <?php if ($attributes['box'] == true) 
              { echo  "box" ?>  <?php } ?> " <?php if ($attributes['box'] == true)  { ?> 
       style="background-color : <?php echo esc_attr( $attributes['color' ] ) ; ?>" <?php }  ?> >

              <?php if ($attributes['show-icon'] == true) { ?>
                <div class="icon"><i class="<?php echo esc_attr( $attributes[ 'icon' ] ) ?>"></i></div>
                <?php } ?> 
 
            <div class="content">
                <div class="counter timer"> <?php echo esc_html( $attributes[ 'counter-value' ] ) ?></div>
                <div><?php upb_shortcode_title( $attributes ) ?></div>
            </div>
    </div>
 
     
</div>