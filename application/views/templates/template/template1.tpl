<div class="main_iphonebg">
 <!--***************template 1**************-->	
    <div class="innerdesign" id="tabImagesDiv">
    
    	<div class="iphonetopbar"><img src="{$data.base_image}state_bar.png" alt="" /></div>
        <div class="header_main">
        	<div class="hed_bg"><img src="{$data.base_upload}lunch_header/24/h24.jpg" alt="" style="height:44px;" /></div>
            <div style="width:100%; background:#C20000; height:44px; display:block; opacity: 0.295;" class="header_img_top">&nbsp;</div>
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
                                    {foreach from=$lang item=val}{if $val.rLabelName == {$data.selected_feature_details[i].vTitle}}
                                        {$val.rField}
                                    {/if}{/foreach}
                                    </span>
                            </span>
                            <span style="height:80px; width:71px; position:absolute; z-index:99; background:#520000; left:0; top:0; opacity: 0.5;" class="indv_tab">&nbsp;</span>
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
            <div class="hed_bg"><img src="{$data.base_image}header-bg1.png" alt="" /></div>
            <p style="text-align:center; color:#FFF; position:absolute; z-index:99; font-size:20px; font-weight:bold; width:100%; line-height:43px;" id="colorImage_menu">Menu</p>
            <div style="width:100%; background:#000; height:44px; display:block; opacity: 0.295;" id="global_preview_header_overlay">&nbsp;</div>
        </div>
        <div class="iphone_overlay"><img src="{$data.base_image}iphone_overlay.png" alt="" /></div>
        
        <h1 id="page_title" style="background:#9C0000; color:#FFF;">Menu </h1>
        <ul class="color_info">
            <li style="background:#CF9E0C; color:#000;" class="odrow">
                <p>Stackers</p> <span><img src="{$data.base_image}cute_app_arrow.png" alt="" /></span>
            </li>
            <li style="background:#C90404; color:#FFF;" class="evnrow">
                <p>Alternative Burgers</p> <span><img src="{$data.base_image}cute_app_arrow.png" alt="" /></span>
            </li>
            <li style="background:#CF9E0C; color:#000;" class="odrow">
                <p>Burger Bar</p> <span><img src="{$data.base_image}cute_app_arrow.png" alt="" /></span>
            </li>
            <li style="background:#C90404; color:#FFF;" class="evnrow">
                <p>Sauces</p> <span><img src="{$data.base_image}cute_app_arrow.png" alt="" /></span>
            </li>
            <li style="background:#CF9E0C; color:#000;" class="odrow">
                <p>Salads</p> <span><img src="{$data.base_image}cute_app_arrow.png" alt="" /></span>
            </li>
            <li style="background:#C90404; color:#FFF;" class="evnrow">
                <p>Snacks</p> <span><img src="{$data.base_image}cute_app_arrow.png" alt="" /></span>
            </li>
            <li style="background:#CF9E0C; color:#000;" class="odrow">
                <p>Sides</p> <span><img src="{$data.base_image}cute_app_arrow.png" alt="" /></span>
            </li>
            <li style="background:#C90404; color:#FFF;" class="evnrow">
                <p>Hand-Spun Shakes</p> <span><img src="{$data.base_image}cute_app_arrow.png" alt="" /></span>
            </li>
            <li style="background:#CF9E0C; color:#000;" class="odrow">
                <p>Stackers</p> <span><img src="{$data.base_image}cute_app_arrow.png" alt="" /></span>
            </li>
            <li style="background:#C90404; color:#FFF;" class="evnrow">
                <p>Alternative Burgers</p> <span><img src="{$data.base_image}cute_app_arrow.png" alt="" /></span>
            </li>
            <li style="background:#CF9E0C; color:#000;" class="odrow">
                <p>Stackers</p> <span><img src="{$data.base_image}cute_app_arrow.png" alt="" /></span>
            </li>
        </ul>
  
  
  </div>


<!--***************colors page template 1**************-->
</div>
