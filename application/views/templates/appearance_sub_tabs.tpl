<div id="subTabs"  class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true" >
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h3 id="Add_subtab">{foreach from=$lang item=val}{if $val.rLabelName == 'Add Sub Tabs'}
						   		{$val.rField}
						   	{/if}{/foreach}</h3>
  </div>
<div id="test"></div>
<form name="save_app_feature" id="saveSubTabData" action="{$data.base_url}app/save_app_feature" method="POST">
  <div class="modal-body">
   <div >
   <!--<table border="0" width="100%">
		  <tbody><tr>
		  	<td width="17%"  tip="This dictates whether or not these subtabs will be appeared only in iPad APP."> Subtab Option: &nbsp;&nbsp;<span class="qmark">&nbsp;</span></td>
			<td>
				&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="checkbox" id="showonly4ipad" class="onbtn">
				&nbsp;&nbsp;
				<label for="only4ipad" class="label">Show only for iPad</label>
			</td>
			<td style="text-align: right;">
				<a href="#" id="btnButtonPrferenceSave" >Save Preference</a>
			</td>
		  </tr>
		</tbody></table>-->
    </div>    
    <button type="button" class="btn btn-primary"  id="addnew_subtab" style="float:right;">{foreach from=$lang item=val}{if $val.rLabelName == 'Add New Sub Tab'}
						   		{$val.rField}
						   	{/if}{/foreach}
						   </button>
    <div style="clear:both;"></div>
    
    <div  style="padding: 20px 20px 20px 20px; ">
	<div id="teststs" style="display: none;" class="box_info"> </div>
	<div id="table_listing">
	<table id="sub_tab_listing" width="100%" cellspacing="0" cellpadding="0" class="table table-striped table-hover table-bordered">
		<tbody>
		  <tr class="nodrop">
			<!--th class=""></th-->
		   	<th>{foreach from=$lang item=val}{if $val.rLabelName == 'Icon'}
						   		{$val.rField}
						   	{/if}{/foreach}</th>
			<th>{foreach from=$lang item=val}{if $val.rLabelName == 'Name'}
						   		{$val.rField}
						   	{/if}{/foreach}</th>
			<th>{foreach from=$lang item=val}{if $val.rLabelName == 'Linked Tab'}
						   		{$val.rField}
						   	{/if}{/foreach}</th>
			<th>{foreach from=$lang item=val}{if $val.rLabelName == 'Active'}
						   		{$val.rField}
						   	{/if}{/foreach}</th>
		    <th colspan="2"></th>
		</tr>
		{if $data['AllSubTabImages']}
		  {section name=i loop=$data['AllSubTabImages']}		  
		  <tr class="row1a" id="23670">
			 <!--td width="5%" class="handle_tr"><img src="{$data['base_upload']}tab_icon/{$data['AllSubTabImages'][i]['iIconId']}/{$data['AllSubTabImages'][i]['iIconId']}" alt="move" width="16" height="16"></td-->
			 <td align="center" width="9%">
			    <div class="img_wrapper dark_shadow" style="min-width: 32px; min-height: 32px;">
				<img width="32" height="32" src="{$data.base_upload}tab_icon/{$data['AllSubTabImages'][i]['iIconcolorId']}/{$data['AllSubTabImages'][i]['vImage']}">
			    </div>
			 </td>
			 <td align="center" width="16%">
			    <p class="sp_title">{$data['AllSubTabImages'][i]['vTabTitle']}</p>
			 </td>
			 <td align="center" width="30%">{$data['AllSubTabImages'][i]['TabName']}</td>
			 <td align="center" width="9%">{$data['AllSubTabImages'][i]['eActive']}</td>
			 <td align="center" style="text-align:center;">
			    <a class="apptab_edit button white" onclick="editSubTab('{$data['AllSubTabImages'][i]['iSubTabId']}','{$data['AllSubTabImages'][i]['iApplicationId']}');" href="javascript:void(0);"><i class="icon-pencil helper-font-24" title="Edit"></i></a>
			 </td>
			 <td align="center" colspan="2" style="text-align:center;">
			  <a class="button grey" onclick="return deleteSubTab('{$data['AllSubTabImages'][i]['iSubTabId']}','{$data['AllSubTabImages'][i]['iApplicationId']}')" ><i class="icon-trash helper-font-24" title="Delete"></i></a>
			 </td>
          </tr>
		  {/section}
		  {else}
		  <tr class="row1a"><td colspan="5" style="text-align:center;">{foreach from=$lang item=val}{if $val.rLabelName == 'No subtab founds'}
	   		{$val.rField}
	   	{/if}{/foreach}</td></tr>
		  {/if}
	</tbody></table>
	</div>
	
    </div>
    
    
    
  </div>
</form>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">{foreach from=$lang item=val}{if $val.rLabelName == 'Close'}
						   		{$val.rField}
						   	{/if}{/foreach}</button>
    <!--<button type="button" class="btn btn-primary" id="save_feature">Save Feature & Continue</button>-->
  </div>
</div>
<div id="add_newtab_popup">
{include file="add_new_sub_tabs.tpl" }
</div>