<div class="three_footer_tab"> 
    <ul style="list-style:none; padding:0; margin:0; height:188px; overflow:hidden;">
        {section name=i loop=$data.selected_feature_details}
            {if $data.selected_feature_details[i].eActive eq 'Yes'}
            	<li style="background:#520000;" class="indv_tab">
                	<a href="#">
                    	<span class="tab_bg"><img src='{$data.base_upload}/tab_btn_background/1/TB1.png' width="100%" /></span>
                        <span class="menumain">
                        	<span><img width="25" height="25" src="{$data.base_upload}tab_icon/{$data.selected_feature_details[i].iIconcolorId}/{$data.selected_feature_details[i].vImage}" orgname = "{$data.selected_feature_details[i].vImage}"/></span>
                            <span class="pre_tab_title">
                                <!--{$data.selected_feature_details[i].vTitle}-->
                            </span>
                        </span>
                        <span style="height:94px; width:94px; position:absolute; z-index:99; background:#520000; left:0; top:0; opacity: 0.5;" class="indv_tab">&nbsp;</span>
                    </a>
                </li>
            {/if}
        {/section} 
    </ul>
</div>