<?php defined( 'ABSPATH' ) or die( 'Keep Silent' );
    
    // $attributes, $contents, $settings, $tag

    if ( ! upb_is_shortcode_enabled( $attributes ) ) {
        return;
    }

     
?>
  <?php
    echo "<pre>";
    print_r($contents);
    echo "</pre>";
?>

<div id="<?php upb_shortcode_id( $attributes ) ?>" class="<?php upb_shortcode_class( $attributes, $tag ) ?>">
      
      
        <div class=" <?php echo esc_attr( $attributes[ 'design' ] ) ?> ">

        <?php
            global $upb_testi;
             $testimonial_contents = do_shortcode( $contents );

        ?>
         <?php foreach ( $upb_testi as $index => $testimonial ): ?>
             
            <div class="item">
                <div class="block">
                    <div class="quote">
                            <?php echo $testimonial_contents ;?>
                    </div>   
                    
                    <div class="info">
                        <div class="photo">
                            <img src="<?php echo esc_html( $testimonial[ 'image' ] ) ?>"   >
                        </div>
                        <p> <?php echo esc_html( $testimonial[ 'title' ] ) ?> </p>
                        <span><?php echo esc_html( $testimonial[ 'company' ] ) ?></span>
                    </div>
                </div>        
            </div> 
           <?php endforeach; ?>
             
                      
    </div>

       

    </div>
     
</div>