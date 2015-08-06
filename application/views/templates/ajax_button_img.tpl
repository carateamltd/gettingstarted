<li>
    <div class="hover_active_back active_btn_mobile">
          {foreach from=$lang item=val}
           {if $val.rLabelName == 'noimg'}
            <!--<img src="{$data.base_logo}{$val.rField}.png" alt="SLB" /> -->
            <img src="{$data.base_image}{$val.rField}.png" height="75px" width="75px" alt="SLB" /> 
           {/if}
          {/foreach}
      
      <label class="margin_5ptop">
        <input type="radio" value="0" {if $data.buttons_tab_background[i].iBtntabbackgroundId} checked="checked" {/if} class="onbtn_radi"  name="tabbackimage"  onClick="chng_back_icon(0);"/>
      </label>
    </div>
</li>
{section name = i loop = $data.buttons_tab_background}
  <li>
    <label>
      <div class="hover_active_back active_btn_mobile">
          <img src="{$data.base_upload}tab_btn_background/{$data.buttons_tab_background[i].iBtntabbackgroundId}/{$data.buttons_tab_background[i].vImage}" height="75px" width="75px" alt="SLB" /> 
          <label class="margin_5ptop">
             <input type="radio" value="{$data.buttons_tab_background[i].iBtntabbackgroundId}" class="onbtn_radi"  name="radio-appr-buttons-tabbackg" onClick="chng_back_icon({$data.buttons_tab_background[i].iBtntabbackgroundId});"/>
          </label>
        </label>
    </div>
  </li>
{/section}
