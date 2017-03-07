<?php 
    defined( 'ABSPATH' ) or die( 'Keep Silent' ); 
?>
<div v-show="enabled" :id="elementID" :class="addClass()" v-ui-draggable v-preview-element :style="backgroundVariables">
    <upb-preview-mini-toolbar :parent="parent" :model="model"></upb-preview-mini-toolbar>

    <!-- {{ attributes }} {{ contents }}-->
   
   
   <div>

    <div :class="['counter-area', attributes.align, {'box':attributes.box}]" :style="{'--color':attributes.color}">
        <div  v-if="attributes['show-icon']" :class="['icon']">
            <i :class="attributes.icon"></i>
        </div>
        <div :class="['content']">
            <div class="counter timer" v-text="attributes['counter-value']" ></div>
            <div v-text="title"></div>
        </div>
    </div>


</div>

</div>



