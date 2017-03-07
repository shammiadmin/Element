<?php 
    defined( 'ABSPATH' ) or die( 'Keep Silent' ); 
?>
<div v-show="enabled" :id="elementID" :class="addClass()" v-ui-draggable v-preview-element :style="backgroundVariables">
    <upb-preview-mini-toolbar :parent="parent" :model="model"></upb-preview-mini-toolbar>

    <!-- {{ attributes }} {{ contents }}-->
     
      
   <div>
 

    <div :class="['title', attributes.align, attributes['design-align'],attributes.design]" :style="{'--color':attributes.color}">
       
    <h1 v-if="attributes.size=='h1'"  v-text="title" :style="{'--textcolor':attributes.textcolor}"></h1>
    <span v-if="attributes.size=='h1'" :class="['icon']" ><i :class="attributes.icon"></i></span> 
   
    <h2 v-if="attributes.size=='h2'"  v-text="title" :style="{'--textcolor':attributes.textcolor}" ></h2>
     <span  v-if="attributes.size=='h2'" :class="['icon']" ><i :class="attributes.icon"></i></span> 
    
    <h3 v-if="attributes.size=='h3'"  v-text="title" :style="{'--textcolor':attributes.textcolor}"></h3>
     <span v-if="attributes.size=='h3'" :class="['icon']" ><i :class="attributes.icon"></i></span> 
    
    <h4 v-if="attributes.size=='h4'"  v-text="title" :style="{'--textcolor':attributes.textcolor}"></h4>
     <span  v-if="attributes.size=='h4'" :class="['icon']" ><i :class="attributes.icon"></i></span> 
    
    <h5 v-if="attributes.size=='h5'"  v-text="title" :style="{'--textcolor':attributes.textcolor}"></h5>
     <span  v-if="attributes.size=='h5'" :class="['icon']" ><i :class="attributes.icon"></i></span> 
    
    <h6 v-if="attributes.size=='h6'"  v-text="title" :style="{'--textcolor':attributes.textcolor}"></h6>
     <span v-if="attributes.size=='h6'" :class="['icon']" ><i :class="attributes.icon"></i></span> 
     
    </div>

</div>

</div>



