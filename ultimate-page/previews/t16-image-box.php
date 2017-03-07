<?php 
    defined( 'ABSPATH' ) or die( 'Keep Silent' ); 
?>
<div v-show="enabled" :id="elementID" :class="addClass()" v-ui-draggable v-preview-element :style="backgroundVariables">
    <upb-preview-mini-toolbar :parent="parent" :model="model"></upb-preview-mini-toolbar>

    <!-- {{ attributes }} {{ contents }}-->
   
      
   <div>
 
    <div :class="['image-box', attributes.align]">
        <a v-bind:href="attributes.url"><img v-bind:src="attributes.image" alt="Image"></a>
        <div class="content">
            <a v-bind:href="attributes['title-url']"><h3 v-text="title" ></h3></a>
            <p v-html="contents"></p>
        </div>
    </div>  


</div>

</div>



