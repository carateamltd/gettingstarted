
<div class="rightpanel">
	<ul class="breadcrumbs">	
        	<li><a href="#"><i class="icon-book"></i></a> <span class="separator"></span></li>
            <li>{foreach from=$lang item=val}
                    {if $val.rLabelName == 'Application'}
                       {$val.rField}
                     {/if}
                     {/foreach}</li>
    </ul>
    <div class="pageheader">
        	<div class="pageicon"><span class="icon-book"></span></div>
            <div class="pagetitle">
                <h5>{foreach from=$lang item=val}
                    {if $val.rLabelName == 'All Features Summary'}
                       {$val.rField}
                     {/if}
                     {/foreach}</h5>
                <h1>
                	{foreach from=$lang item=val}
                    {if $val.rLabelName == 'Application'}
                       {$val.rField}
                     {/if}
                     {/foreach}
               </h1>
            </div>
    </div>
      <div class="maincontent">
        	<div class="maincontentinner">
    <div class="row-fluid">
            <div class="span12">
                <!-- BEGIN EXAMPLE TABLE widget-->
                <div class="widget purple brdrnone">
                    <!--div class="widget-title">
                        <h4><i class="icon-reorder"></i> Application</h4>
                        <span class="tools">
                        <a href="javascript:;" class="icon-chevron-down"></a>
                        <a href="javascript:;" class="icon-remove"></a>
                        </span>
                    </div-->
                    <div class="widget-body">
                        <div>
                            <div class="clearfix">
                                <!--div class="btn-group">
                                    <a href="#myModal" class="btn green" id="add_app" role="button" data-toggle="modal">
                                        Add New <i class="icon-plus"></i>
                                    </a>
                                    </div-->
                                <div class="btn-group pull-right" style="display:none;">
                                    <button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="icon-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="#">Print</a></li>
                                        <li><a href="#">Save as PDF</a></li>
                                        <li><a href="#">Export to Excel</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="space15">
                                <div class="span6">
                                    <div class="span6 ">
                                        {if $data.role|count gt 0 }
                                        <p class="text-paging">{$data.paging_message}</p>
                                        {/if}
                                    </div>
                                </div>
                            </div>
                            <!--table class="table table-striped table-hover table-bordered" id="editable-sample">
                                <thead>
                                <tr>
                                    <th>Title</th>
                                    <th style="text-align:center;">Status</th>
                                    <th style="text-align:center;">Edit</th>
                                    <th style="text-align:center;">Delete</th>
                                </tr>
                                </thead>
                                <tbody-->
                            <!--
                                {section name = i loop = $data.role}
                                <tr class="">
                                    <td>{$data.role[i].vTitle}</td>
                                    <td style="text-align:center">{$data.role[i].eStatus}</td>
                                    <td style="text-align:center !important;"><a href="#" data-toggle="modal">
                                        <i title="Edit" class="icon-pencil helper-font-24"></i></a>
                                    </td>
                                    <td style="text-align:center !important;"><a href="#"  data-toggle="modal" >
                                        <i title="Delete"  class="icon-trash helper-font-24"></i></a>
                                    </td>
                                </tr>
                                {/section}
                                -->
                            <!--/tbody>
                                </table-->
                            <div class="mainpartcont">
                                {include file="tab.tpl" }
                                <div class="tbdata">
                                    <div class="progress progress-striped active" >
                                        <div class="bar" style="width:80%;"></div>
                                    </div>
                                    <div class="div_inner">
                                        <div class="top_live_text">
                                            <!--<img src="{$data.base_url}assets/images/app_icon.png" width="16" height="16"/>-->
                                            <h1>{foreach from=$lang item=val}
                    {if $val.rLabelName == 'Mobile Application Preview'}
                       {$val.rField}
                     {/if}
                     {/foreach}</h1>
                                        </div>
                                        <div class="main_top_preview">
                                           <!--  <div class="mobile_app_box">
                                                <div class="mobile_app_text">{foreach from=$lang item=val}{if $val.rLabelName == 'Mobile App Preview'}{$val.rField}{/if}{/foreach}</div>
                                                <div class="mobile_iphone_app_io" style="margin-top:71px;margin-left:140px;">
                                                     <iframe src="https://app.io/uFwGIC?orientation=portrait&device=iphone4&" height="422px" width="292px" frameborder="0" allowtransparency="true" scrolling="no" style="margin:77px 0px 0px 5px;"></iframe>
                                                    <iframe src="https://app.io/uFwGIC?orientation=portrait&device=iphone4&params=%7B%22appcode%22%3A%22{$vApplicationCode}%22%7D" height="607px" width="291px" frameborder="0" allowtransparency="true" scrolling="no"></iframe>
                                                    
                                                </div>
                                            </div> -->


                                            <div class="mobile_app_box">
                                              <!--   <div class="mobile_app_text">Mobile Website Preview</div> -->
                                                <div class="android_phone_im">
                                                    <iframe style="overflow:hidden; margin:49px 0px 0px -1px;"  scrolling="yes" name="booth" width="295" height="483" id="booth" frameborder="0" src="{$appDynamicFolder}"></iframe>
                                                    <!-- <iframe src="http://www.biznessapps.com/html5/?appcode=DreamApp" width="300" height="510" frameborder="0" scrolling="no" allowTransparency="true" 
                                                        style="background-color: transparent; position: absolute; top: 53px; left: 22px;"></iframe> -->
                                                </div>
                                            </div>




                                            <!-- <div class="mobile_app_box">
                                                <div class="mobile_app_text">Mobile Website Preview</div>
                                                <div class="obile_iphone5_blank" style="width:596px !important;">
                                                    <iframe style="overflow:hidden; width:323px; height:62.5%; margin:18% 0 0 23.5%;"  scrolling="yes" name="booth" id="booth" frameborder="0" src="{$appDynamicFolder}"></iframe>
                                                </div>
                                            </div> -->
					
                                            <div class="iPhone_app_preview">
                                                <!--<div class="iPhone_app_text_box">
                                                    <div class="iPhone_app_text">iPhone App Preview</div>
                                                    <div class="your_app_text_box">
                                                        <div class="your_app_text">Your App Code is: <strong>{$data.appinformation.vApplicationCode}</strong></div>
                                                        <div class="qrcode1_text">
                                                            <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl={$data.Ipone_app_url}&choe=UTF-8" title="Link To Slb Ipone App" />
                                                        </div>
                                                        <div class="first_text"><strong>Note:</strong> First download our iPhone App and enter your App Code for preview.</div>
                                                    </div>
                                                </div>
                                                <div class="iPhone_app_text_box">
                                                    <div class="iPhone_app_text1">Android App Preview</div>
                                                    <div class="your_app_text_box">
                                                        <div class="your_app_text">Your App Code is: <strong>{$data.appinformation.vApplicationCode}</strong></div>
                                                        <div class="qrcode1_text">
                                                            <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl={$data.Andriod_app_url}&choe=UTF-8" title="Link To Slb Android App" />
                                                        </div>
                                                        <div class="first_text"><strong>Note:</strong> First download our Android App and enter your App Code for preview.</div>
                                                    </div>
                                                </div> -->

						                  <center>
                                                <div class="iPhone_app_text_box" style="float: center;width: 30.5%;margin-left: 2%;">
                                                    <div class="iPhone_app_text2">Mobile Website Preview</div>
                                                    <div class="your_app_text_box">
                                                        <div class="your_app_text"></div>
                                                        <div class="qrcode1_text">
                                                            <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl={$data.mobile_preview}&choe=UTF-8" title="Mobile Website Preview" />
                                                        </div>
                                                        <!--<div class="first_text" style="white-space: nowrap; ">http://www.admin.easy-apps.co.uk/webservice/previewapp?appcode={$data.appinformation.vApplicationCode}</div>-->
                                                    </div>
                                                </div>
						                  </center>
                                            </div>
					
                                        </div>
                                    </div>
                                </div>
                                <div style="clear:both;">   </div>
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
    <div class="footer">
                	  <div class="footer-left">
                        <span>&copy; Carateam Ltd 2014</span>
                    </div>
                    <div class="footer-right">
                        <!--<span>Designed &amp; Developed by: <a href="http://www.intelithub.com/" target="_blank">Intel It Hub</a></span>-->
                    </div>
                </div>
    </div>
    </div>
</div>

<!--<div id="main-content">-->
    <!-- BEGIN PAGE CONTAINER-->
<!--    <div class="container-fluid">-->
        <!-- BEGIN PAGE HEADER-->
        <!--<div class="row-fluid">
            <div class="span12">-->
                <!-- BEGIN THEME CUSTOMIZER-->
                <!--div id="theme-change" class="hidden-phone">
                    <i class="icon-cogs"></i>
                     <span class="settings">
                         <span class="text">Theme Color:</span>
                         <span class="colors">
                             <span class="color-default" data-style="default"></span>
                             <span class="color-green" data-style="green"></span>
                             <span class="color-gray" data-style="gray"></span>
                             <span class="color-purple" data-style="purple"></span>
                             <span class="color-red" data-style="red"></span>
                         </span>
                     </span>
                    </div-->
                <!-- END THEME CUSTOMIZER-->
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                
                <!--ul class="breadcrumb">
                    <li>
                        <a href="{$data.base_url}home">Dashboard</a>
                        <span class="divider">/</span>
                    </li>
                    <li class="active">
                        Application
                    </li>
                    <li class="pull-right search-wrap">
                        <form action="search_result.html" class="hidden-phone">
                            <div class="input-append search-input-area">
                                <input class="" id="appendedInputButton" type="text">
                                <button class="btn" type="button"><i class="icon-search"></i> </button>
                            </div>
                        </form>
                    </li>
                    </ul-->
                <!-- END PAGE TITLE & BREADCRUMB-->
            <!--</div>
        </div>-->
        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->
        
        <!-- END EDITABLE TABLE widget-->
        <!-- END PAGE CONTENT-->         
<!--    </div>-->
    <!-- END PAGE CONTAINER-->
<!--</div>-->
