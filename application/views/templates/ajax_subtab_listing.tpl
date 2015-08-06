             <table id="listItem_app_subtab" width="100%" cellspacing="0" cellpadding="0" class="table table-striped table-hover table-bordered">
		<tbody>
		 <tr class="nodrop">
			<th class=""></th>
		   	<!--th>Icon</th-->
			<th>Name</th>
			<th>Linked Tab</th>
			<th>Active</th>
		    <th colspan="2"></th>
		</tr>
		 {section name=i loop=$data['AllSubTabImages']}		  
		  <tr class="row1a" id="23670">
			 <!--td width="5%" class="handle_tr"><img src="{$data['base_upload']}tab_icon/{$data['AllSubTabImages'][i]['iIconId']}/{$data['AllSubTabImages'][i]['iIconId']}" alt="move" width="16" height="16"></td-->
			 <td align="center" width="9%">
			    <div class="img_wrapper dark_shadow" style="min-width: 32px; min-height: 32px;">
				<img width="32" height="32" src="{$data.base_upload}tab_icon/{$data.default_icon.iIconcolorId}/{$data['AllSubTabImages'][i]['vImage']}">
			    </div>
			 </td>
			 <td align="center" width="16%">
			    <p class="sp_title">{$data['AllSubTabImages'][i]['vTabTitle']}</p>
			 </td>
			 <td align="center" width="30%">{$data['AllSubTabImages'][i]['TabName']}</td>
			 <td align="center" width="9%">{$data['AllSubTabImages'][i]['eActive']}</td>
			<td>
			    <a class="apptab_edit button white" onclick="editSubTab('{$data['AllSubTabImages'][i]['iSubTabId']}','{$data['AllSubTabImages'][i]['iApplicationId']}');" href="javascript:void(0);"><i class="icon-pencil helper-font-24" title="Edit"></i></a>
			 </td>
			 <td align="center" colspan="2">
			  <a class="button grey" onclick="return deleteSubTab('{$data['AllSubTabImages'][i]['iSubTabId']}','{$data['AllSubTabImages'][i]['iApplicationId']}')" ><i class="icon-trash helper-font-24" title="Delete"></i></a>
			 </td>
            </tr>
		  {/section}
		  
	</tbody></table>