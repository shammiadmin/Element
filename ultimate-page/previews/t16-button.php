<?php 
    defined( 'ABSPATH' ) or die( 'Keep Silent' ); 
?>
<div v-show="enabled" :id="elementID" :class="addClass()" v-ui-draggable v-preview-element :style="backgroundVariables">
    <upb-preview-mini-toolbar :parent="parent" :model="model"></upb-preview-mini-toolbar>

    <!-- {{ attributes }} {{ contents }}-->
   <div>
 
 <a v-bind:href="attributes.url" :class = "['button', attributes.size,{'icon-reveal':attributes.reveal} , attributes.effect,{'button-curved':attributes.curved}]" :style="{'--color':attributes.color}" >
     <i v-if="attributes['show-icon']" :class="attributes.icon"></i> 
        <span v-text="title"> </span>      
</a>
</div>

</div>



