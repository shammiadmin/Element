<?php 
    defined( 'ABSPATH' ) or die( 'Keep Silent' ); 
?>
<div v-show="enabled" :id="elementID" :class="addClass()" v-ui-draggable v-preview-element :style="backgroundVariables">
    <upb-preview-mini-toolbar :parent="parent" :model="model"></upb-preview-mini-toolbar>

    <!-- {{ attributes }} {{ contents }}-->
    
      
   <div>
 

    <div :class="['team']">
         <img v-bind:src="attributes.image" class="img-responsive" alt="Image"> 
        <div class="caption">
            <h3 v-text="title"></h3> <small v-text="attributes['designation']"></small>
        </div>
    </div>

</div>

</div>



