<?php 
    defined( 'ABSPATH' ) or die( 'Keep Silent' ); 
?>
<div v-show="enabled" :id="elementID" :class="addClass()" v-ui-draggable v-preview-element :style="backgroundVariables">
    <upb-preview-mini-toolbar :parent="parent" :model="model"></upb-preview-mini-toolbar>

    <!-- {{ attributes }} {{ contents }}-->
     
      
   <div>
 
 
    <ul>
        <li>
            <div class="testimonial">
                <div class="photo">
                    <img v-bind:src="attributes.image" alt="Customer Testimonails"> 
                </div>
                <div class="quote">
                    <p v-html="contents"></p>
                    <div class="info">
                        <p v-text="title"></p>
                        <span v-text="attributes.company"></span>
                    </div>
                </div>
            </div>
        </li>
    </ul>
</div>

</div>



