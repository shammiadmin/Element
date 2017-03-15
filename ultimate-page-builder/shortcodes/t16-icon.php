<?php defined( 'ABSPATH' ) or die( 'Keep Silent' );
    
    // $attributes, $contents, $settings, $tag

    if ( ! upb_is_shortcode_enabled( $attributes ) ) {
        return;
    }
 

?>
<?php
    echo "<pre>";
    print_r($settings);
    echo "</pre>";
?>

<div id="<?php upb_shortcode_id( $attributes ) ?>" class="<?php upb_shortcode_class( $attributes, $tag ) ?>">
      
     <div class="feature-box <?php echo esc_attr( $attributes[ 'align' ] ) ?>">
      
         <?php if ($attributes['show-icon'] == true) { ?> 
           
            <div  class="icon-area <?php echo esc_attr( $attributes[ 'effect' ] ) ?>" >
                <div class="icon"><i class="<?php echo esc_attr( $attributes[ 'icon' ] ) ?>"></i> </div>
            </div>

        <?php } ?>
         
        <div class="content-box">
            <h3 class="title"><?php upb_shortcode_title( $attributes ) ?></h3>
            <div class="description" ><?php echo do_shortcode( $contents ) ?></div>
        

        <?php if ($attributes['button'] == true) { ?>
            <a <?php if ($attributes['link'] == true) ?> href="<?php { echo esc_attr( $attributes['url' ] ) ; ?>" <?php } ?> class=" button <?php echo esc_attr( $attributes['size' ] ) ?> <?php if ($attributes['curved'] == true) 
              { echo  "button-curved" ?>  <?php } ?> " style="background-color : <?php echo esc_attr($attributes['color']) ?>" >
                    <?php echo esc_html( $attributes[ 'button-text' ] ) ?>
            </a>


        <?php } ?>
        </div>

       

    </div>
     
</div>