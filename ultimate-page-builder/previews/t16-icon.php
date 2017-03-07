<?php 
    defined( 'ABSPATH' ) or die( 'Keep Silent' ); 
?>
<div v-show="enabled" :id="elementID" :class="addClass()" v-ui-draggable v-preview-element :style="backgroundVariables">
    <upb-preview-mini-toolbar :parent="parent" :model="model"></upb-preview-mini-toolbar>

    <!-- {{ attributes }} {{ contents }}-->
   
      
   <div>

<div :class="['feature-box', attributes.align]">
    
    <div v-if="attributes['show-icon']"  :class="['icon-area', attributes.effect]">
        <div :class="['icon']"><i :class="attributes.icon"></i></div>
    </div>

    <div class="content-box">
        <h3 class="title" v-text="title"></h3>
        <div class="description" v-html="contents"></div> 
        <a  v-if="attributes.link" v-bind:href="attributes.url" v-if="attributes.button" :class="['button', attributes.size, {'button-curved': attributes.curved}]" 
        v-text="attributes['button-text']" :style="{'--color':attributes.color}"   ></a>

    </div>
 </div>



</div>

</div>



