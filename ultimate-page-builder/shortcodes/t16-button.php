<?php defined( 'ABSPATH' ) or die( 'Keep Silent' );
    
    // $attributes, $contents, $settings, $tag

    if ( ! upb_is_shortcode_enabled( $attributes ) ) {
        return;
    }
     
?>

<div id="<?php upb_shortcode_id( $attributes ) ?>" class="<?php upb_shortcode_class( $attributes, $tag ) ?>">
      
    <div>

      <a target="_blank" <?php if ($attributes['link'] == true)  { ?> 
       href="<?php echo esc_attr( $attributes['url' ] ) ; ?>" <?php }  ?> class="button <?php echo esc_attr( $attributes['size' ] ) ?> <?php if ($attributes['curved'] == true) { echo  "button-curved" ?>  <?php } ?> <?php if  ( (($attributes['show-icon'] == true) && ($attributes['icon'] == true)) &&
        ($attributes['reveal'] == true ))
             { echo  "icon-reveal" ;}  
        elseif ( (($attributes['show-icon'] == true) && ($attributes['icon'] == true)) && 
        ($attributes['reveal'] == false ))
             { echo  "reveal-none" ;} ?> <?php if ($attributes['reveal'] == true)  
             {  echo esc_attr($attributes['effect']) ; } ?> " style="background-color : <?php echo esc_attr($attributes['color']) ?>"  >
         
         <?php if ($attributes['show-icon'] == true) { ?>
              <i class=" <?php echo esc_attr( $attributes['icon' ] ) ?> "></i>
        <?php  } ?>
          <span> <?php upb_shortcode_title( $attributes ) ?> </span>      
      </a>  
         
    </div>
     
</div>