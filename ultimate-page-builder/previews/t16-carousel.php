<?php 
    defined( 'ABSPATH' ) or die( 'Keep Silent' ); 
?>
<div v-show="enabled" :id="elementID" :class="addClass()" v-ui-draggable v-preview-element :style="backgroundVariables">
    <upb-preview-mini-toolbar :parent="parent" :model="model"></upb-preview-mini-toolbar>

    <!-- {{ attributes }} {{ contents }}-->
    
      
<div>
	<div :class="['owl-carousel','owl-theme', 'logocarousel']" >
		<div class="item" v-for="(content, index) in contents">
			<img :src="content.attributes.logoimage" alt="Clients Logo" v-if="isElementRegistered(content.tag)" :class="{ active: content.attributes.active, 'upb-tab-content': true }">
		</div>
	</div>
</div>

</div>



