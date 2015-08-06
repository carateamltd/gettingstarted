<div class="main_iphonebg">
 <!--***************template 1**************-->	
    <div class="innerdesign" id="tabImagesDiv">
    
    	<div class="iphonetopbar"><img src="{$data.base_image}state_bar.png" alt="" /></div>
        <div class="header_main">
        	<div class="hed_bg"><img src="{$data.base_upload}lunch_header/25/h25.jpg" alt="" style="height:44px;" /></div>
            <div style="width:100%; background:#13121A; height:44px; display:block; opacity: 0.295;" class="header_img_top">&nbsp;</div>
        </div>
        <div class="iphone_overlay"><img src="{$data.base_image}iphone_overlay.png" alt="" /></div>
        
        <div class="footer_tab" id="ftab">        
        
       	  <ul style="list-style:none; padding:0; margin:0; height:80px; overflow:hidden;">
            {section name=i loop=$data.selected_feature_details}
                {if $data.selected_feature_details[i].eActive eq 'Yes'}
                	<li style="background:#520000;" class="indv_tab">
                    	<a href="#">
                        	<span class="tab_bg"><img src='{$data.base_upload}/tab_btn_background/1/TB1.png' width="100%" /></span>
                            <span class="menumain">
                            	<span><img width="25" height="25" src="{$data.base_upload}tab_icon/{$data.selected_feature_details[i].iIconcolorId}/{$data.selected_feature_details[i].vImage}" /></span>
                                <span class="pre_tab_title">
                                    {$data.selected_feature_details[i].vTitle}
                                </span>
                            </span>
                            <span style="height:80px; width:71px; position:absolute; z-index:99; background:#13121A; left:0; top:0; opacity: 0.5;" class="indv_tab">&nbsp;</span>
                        </a>
                    </li>
                {/if}
            {/section} 
            </ul>
        </div>
  </div>
<!--***************template 1**************-->
<!--***************colors page template 1**************-->
  <div class="colors_main" id="colorImageDiv" style="display: none;">
  
    <div class="iphonetopbar"><img src="{$data.base_image}state_bar.png" alt="" /></div>
        <div class="header_main">
            <div class="hed_bg" id="global_header_image"><img src="{$data.base_image}header-bg1.png" alt="" style="height:44px;"/></div>
            <p style="text-align:center; color:#E8E1DA; position:absolute; z-index:99; font-size:20px; font-weight:bold; width:100%; line-height:43px;text-shadow: 1px 1px 0 #0F0F0F;" id="colorImage_menu">Menu</p>
            <div style="width:100%; background:#000000; height:44px; display:block; opacity: 0.295;" id="global_preview_header_overlay">&nbsp;</div>
        </div>
        <div class="iphone_overlay"><img src="{$data.base_image}iphone_overlay.png" alt="" /></div>
        
        <h1 id="page_title" style="background:#737373; color:#000000;">Menu </h1>
        <ul class="color_info">
            <li style="background:#E3E3E3; color:#000000;" class="odrow">
                <p>Stackers</p> <span><img src="{$data.base_image}cute_app_arrow.png" alt="" /></span>
            </li>
            <li style="background:#F7F7F7; color:#000000;" class="evnrow">
                <p>Alternative Burgers</p> <span><img src="{$data.base_image}cute_app_arrow.png" alt="" /></span>
            </li>
            <li style="background:#E3E3E3; color:#000000;" class="odrow">
                <p>Burger Bar</p> <span><img src="{$data.base_image}cute_app_arrow.png" alt="" /></span>
            </li>
            <li style="background:#F7F7F7; color:#000000;" class="evnrow">
                <p>Sauces</p> <span><img src="{$data.base_image}cute_app_arrow.png" alt="" /></span>
            </li>
            <li style="background:#E3E3E3; color:#000000;" class="odrow">
                <p>Salads</p> <span><img src="{$data.base_image}cute_app_arrow.png" alt="" /></span>
            </li>
            <li style="background:#F7F7F7; color:#000000;" class="evnrow">
                <p>Snacks</p> <span><img src="{$data.base_image}cute_app_arrow.png" alt="" /></span>
            </li>
            <li style="background:#E3E3E3; color:#000000;" class="odrow">
                <p>Sides</p> <span><img src="{$data.base_image}cute_app_arrow.png" alt="" /></span>
            </li>
            <li style="background:#F7F7F7; color:#000000;" class="evnrow">
                <p>Hand-Spun Shakes</p> <span><img src="{$data.base_image}cute_app_arrow.png" alt="" /></span>
            </li>
            <li style="background:#E3E3E3; color:#000000;" class="odrow">
                <p>Stackers</p> <span><img src="{$data.base_image}cute_app_arrow.png" alt="" /></span>
            </li>
            <li style="background:#F7F7F7; color:#000000;" class="evnrow">
                <p>Alternative Burgers</p> <span><img src="{$data.base_image}cute_app_arrow.png" alt="" /></span>
            </li>
            <li style="background:#E3E3E3; color:#000000;" class="odrow">
                <p>Stackers</p> <span><img src="{$data.base_image}cute_app_arrow.png" alt="" /></span>
            </li>
        </ul>
  
  
  </div>


<!--***************colors page template 1**************-->
</div>
