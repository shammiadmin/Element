<?php 
    defined( 'ABSPATH' ) or die( 'Keep Silent' ); 
?>
<div v-show="enabled" :id="elementID" :class="addClass()" v-ui-draggable v-preview-element :style="backgroundVariables">
    <upb-preview-mini-toolbar :parent="parent" :model="model"></upb-preview-mini-toolbar>

    <!-- {{ attributes }} {{ contents }}-->
   
       
 
    <div :class="['owl-carousel','owl-theme', attributes.design]">
        
            <div class="item" v-for="(content, index) in contents" v-if="isElementRegistered(content.tag)" :class="{ active: content.attributes.active, 't16-testimonial-item': true }" >
                <div class="block">
                    <div class="quote">
                        <p v-html="content.contents"> </p>
                    </div>

                    <div class="info">
                        <div class="photo">
                            <img :src="content.attributes.image" >
                        </div>
                        <p v-text="content.attributes.title"> </p>
                        <span  v-text="content.attributes.company"></span>
                    </div>
                </div>        
            </div> 
                  
    </div>
 

</div>



