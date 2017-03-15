<?php 
    defined( 'ABSPATH' ) or die( 'Keep Silent' ); 
?>
<div v-show="enabled" :id="elementID" :class="addClass()" v-ui-draggable v-preview-element :style="backgroundVariables">
    <upb-preview-mini-toolbar :parent="parent" :model="model"></upb-preview-mini-toolbar>

    <!-- {{ attributes }} {{ contents }}-->
 
     
    <div :class="['call-us', attributes.align,attributes['background-type']=='gradient'?'gradient':'']" >
        <div class="title" v-text="title"></div>
        <div class="description" v-html="contents"> </div>
            <a v-bind:href="attributes.url" :class="['button', attributes.size, {'button-curved' : attributes.curved}]" v-text="attributes['button-text']" :style="{'--color':attributes.color}"> </a>
        
	</div>
</div>



