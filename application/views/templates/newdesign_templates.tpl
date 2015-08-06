
<div id="main-content">
 <!-- BEGIN PAGE CONTAINER-->
 <div class="container-fluid">
    <!-- BEGIN PAGE HEADER-->   
    <div class="row-fluid">
       <div class="span12">
           <h3 class="page-title">
             Application
           </h3>
       </div>
    </div>
    <div class="row-fluid">

        <div class="span12">
         <!-- BEGIN EXAMPLE TABLE widget-->
         <div class="widget purple brdrnone">
             <div class="widget-body">
                 <div>
				    <div class="mainpartcont">

					{include file="tab.tpl" }
					
					<div class="tbdata">
						<div class="progress" >
							<div class="bar" style="width: 60%;"></div>
						</div>
						<div class="box_darkblue">
						<table width="100%" border="0">
						  <tr>
						  <td>
							<p>
								<b>Choose a menu style</b>
							</p>
						  </td>
						  <td align="right" class="td_rightalign" >
						  	<input type="hidden" name="iApplicationId" id="iApplicationId" value="{$data.iApplicationId}">
							Filter menu styles: 
							<select name="select_rows" class="select_rows_al" >
								<option value="0" {if $data.param == 0}selected{/if}>All</option>
								<option value="1" {if $data.param == 1}selected{/if}>Single Row</option>
								<option value="2" {if $data.param == 2}selected{/if}>Multi Row</option>
							</select
						  ></td>
						  <td width="40%" align="center">
							<a class="btn btn_upload_icon" href="{$data.base_url}app/step4/{$data.iApplicationId}"> Go To Detail Settings</a>
						  </td>
						  </tr>
						</table>
					  </div>
  
						<!--<ul class="samples_screens">
						
						{section name = i loop = $data.single_newdesign_templates}
						<li>
							<div class="theme_room">
								<div class="">
									<a href="{$data.base_url}app/assign_temp/{$data.iApplicationId}?tmpl={$data.single_newdesign_templates[i].iTemplateId}" class="preview"><img  src="{$data.base_upload}newdesign_template/{$data.single_newdesign_templates[i].iTemplateId}/{$data.single_newdesign_templates[i].vImage}" width="150px" /></a>
								</div>
								<div class="label"> Single Row {$smarty.section.i.index+1} </div>
							</div>
						</li>
						{/section}
						{section name = i loop = $data.multi_newdesign_templates}
						<li>
							<div class="theme_room">
								<div class="">
									<a href="{$data.base_url}app/assign_temp/{$data.iApplicationId}?tmpl={$data.multi_newdesign_templates[i].iTemplateId}" class="preview"><img  src="{$data.base_upload}newdesign_template/{$data.multi_newdesign_templates[i].iTemplateId}/{$data.multi_newdesign_templates[i].vImage}" width="150px" /></a>
								</div>
								<div class="label"> Multi Row {$smarty.section.i.index +1} </div>
							</div>
						</li>
						{/section}
						</ul> -->
					</div>
				    <div style="clear:both;"></div>
                        <div class="pagination">
                    {$data.create_links}
                </div>  
                 </div>
             </div>
		   <div style="clear:both;"></div>
         </div>
         <!-- END EXAMPLE TABLE widget-->
        </div>
    </div>

            <!-- END EDITABLE TABLE widget-->
    <!-- END PAGE CONTENT-->         
 </div>
 <!-- END PAGE CONTAINER-->
</div>

<!--modal -->
<div class="modal fade" id="select_template">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" style="color:white;">Confirmation</h4>
      </div>
      <div class="modal-body">
        <p >Are you sure you'd like to use the <b><span id="tmplname">Single Row 2 template</span></b>?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        <button type="button" class="btn btn-primary" id="btnyes">Yes</button>
      </div>
    </div>
  </div>
</div>
<!--End-->
 

{literal}
<script type="text/javascript" language="javascript">



</script>
{/literal}
