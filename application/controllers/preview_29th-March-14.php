<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Preview extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('preview_model', '', TRUE);
        $this->load->model('app_model', '', TRUE);
        $this->load->library('rssparser');    
        $this->load->library('Flickr');
    }    

    function index()
    {
        //echo ROOTPATH_DOWNLOAD;exit;
        $this->data['tpl_name']= "view-app-step5.tpl";
        $iApplicationId = $this->uri->segment(3); 
        $this->data['tab_cnt'] =$this->get_appfeature_count($iApplicationId);  
        $appinformation = $this->app_model->appinformation_by_id($iApplicationId );
        $this->data['iApplicationId'] = $iApplicationId; 
        
        $appinformation=$this->preview_model->getapplication_info($iApplicationId);
        $this->data['appinformation']=$appinformation;
        
        $this->data['Ipone_app_url']=urlencode($GLOBALS['Configration_value']['IPHONE_APP_URL']);
        $this->data['Andriod_app_url']= urlencode($GLOBALS['Configration_value']['ANDROID_APP_URL']);
        $this->data['mobile_preview']= "http://184.107.213.34/~techiest/php/slb/webservice/previewapp?appcode=".$appinformation['vApplicationCode'];
        
        #echo "<pre>";
        #print_r($this->data);exit;

        
        $this->data['client_info'] = $this->preview_model->get_client_info($iApplicationId); 
        
        //########################### START: ALL DESIGN DATA GET HERE  ###############
        $activeTabs = $this->preview_model->getactivetabs($iApplicationId);
        $iconbackground = $this->preview_model->geticonbackground($iApplicationId);
        $iconcolorId = $this->preview_model->geticoncolor($iApplicationId);
        /*$pageTypeArr1 = $this->preview_model->getTabTypeArr();*/
        
        
        //########################### START TAB WISE DATA  ###########################
        
        foreach($activeTabs AS $key=>$tabArr){
            
            $iAppTabId = $tabArr['iAppTabId'];
            
            // Get event data
            $appwisevents = $this->preview_model->getappwiseevents($iApplicationId,$iAppTabId);
            if($appwisevents){
                foreach($appwisevents as $evkey=>$eventsval){
                    if($eventsval['vImage'] !=''){
                        $appwisevents[$evkey]['vImage'] = $this->data['base_upload']."events/".$eventsval['iEventId']."/".$eventsval['vImage'];
                    }else{
                        $appwisevents[$evkey]['vImage'] = $this->data['base_image']."noimg.png";
                    }
                }    
    
                $this->data['appdata']['appwisevents'][$iAppTabId] = $appwisevents;
            }
           
            // Get news data
            $appwisnews = $this->preview_model->getappwisenews($iApplicationId,$iAppTabId);
            if($appwisnews[0]['eGoogleNews'] == 'Yes' && $appwisnews[0]['vGoogleNewsKeyWords'] != ''){
                $keyword = $appwisnews[0]['vGoogleNewsKeyWords'];
                $allgooglenews = $this->getgooglenews($keyword);
               
                if($allgooglenews){
                    foreach($allgooglenews as $webkey=>$websiteval){
                        
                        if($websiteval->image->url !=''){
                            
                        }else{
                            $websiteval->image->url = $this->data['base_image']."noimg.png";
                        }
                    } 
                }
                
                $this->data['appdata']['allgooglenews'][$iAppTabId] = $allgooglenews;
            }

            // Get rss data

            $appwiseRssInfo = $this->preview_model->gerappwiseRssfeed($iApplicationId, $iAppTabId);
            
            if($appwiseRssInfo['vRSSURL'] !=''){
                
                if($appwiseRssInfo['vIcon'] !=''){
                    $appwiseRssInfo['vIcon'] = $this->data['base_upload']."rss/".$appwiseRssInfo['iRSSId']."/".$appwiseRssInfo['vIcon'];
                }else{
                    $websiteval->image->url = $this->data['base_image']."noimg.png";
                }

                $rssdata = $this->rssparser->set_feed_url($appwiseRssInfo['vRSSURL'])->set_cache_life(30)->getFeed(12);
                foreach($rssdata as $rsskey=>$rssvalue){
                    $rssdata[$rsskey]['rssicon'] = $appwiseRssInfo['vIcon'];
                }               
                $this->data['appdata']['allrssdata'][$iAppTabId] = $rssdata;
            }
            
            // Get app wise info data
            $appwiseinfotab = $this->preview_model->appwiseinfodata($iApplicationId,$iAppTabId);
            if($appwiseinfotab){
                $this->data['appdata']['infotabdata'][$iAppTabId] = $appwiseinfotab;
            }
           
            
            // Get pdf data
            $appwisepdfdata = $this->preview_model->appwisepdfdata($iApplicationId,$iAppTabId);
            if($appwisepdfdata){
                $this->data['appdata']['pdfdata'][$iAppTabId] = $appwisepdfdata;
            }
            
            #$appwismallingslist = $this->preview_model->getappwisemallingslist($iApplicationId,$iAppTabId);
            // Get location data
            $appwislocationlist = $this->preview_model->getappwislocationlist($iApplicationId,$iAppTabId);
            if($appwislocationlist){
                $this->data['appdata']['locationdata'][$iAppTabId] = $appwislocationlist;
            }

            // Get website data
            $appwisewebsitelist = $this->preview_model->getappwisewebsitelist($iApplicationId,$iAppTabId);
             if($appwisewebsitelist){
                foreach($appwisewebsitelist as $webkey=>$websiteval){
                    if($websiteval['vWebImage'] !=''){
                        $appwisewebsitelist[$webkey]['vWebImage'] = $this->data['base_upload']."website/".$websiteval['iWebsiteId']."/".$websiteval['vWebImage'];
                    }else{
                        $appwisewebsitelist[$webkey]['vWebImage'] = $this->data['base_image']."noimg.png";
                    }
                }    
    
                $this->data['appdata']['appwiswebsite'][$iAppTabId] = $appwisewebsitelist;
            }
            
            
            // Get podcast data
            $appwisepodcastInfo = $this->preview_model->gerappwisePodcast($iApplicationId,$iAppTabId);
            
            if($appwisepodcastInfo['vPodcastRssUrl'] !=''){
                
                if($appwisepodcastInfo['vPodcastIcon'] !=''){
                    $appwisepodcastInfo['vPodcastIcon'] = $this->data['base_upload']."podcast/".$appwisepodcastInfo['iPodcastId']."/".$appwisepodcastInfo['vPodcastIcon'];
                }else{
                    $appwisepodcastInfo['vPodcastIcon'] = $this->data['base_image']."noimg.png";
                }
                
                $podcastdata = $this->rssparser->set_feed_url($appwisepodcastInfo['vPodcastRssUrl'])->set_cache_life(30)->getFeed(12);
                
                foreach($podcastdata as $podkey=>$podvalue){
                    $podcastdata[$podkey]['vPodcastIcon'] = $appwisepodcastInfo['vPodcastIcon'];
                }
               
                $this->data['appdata']['allpodcastdata'][$iAppTabId] = $podcastdata;
            }
            
            
            // Get voicerecording data
            $appwisevoicerecordingInfo = $this->preview_model->gerappwisevoicerecording($iApplicationId,$iAppTabId);
            
            if($appwisevoicerecordingInfo){
                $this->data['appdata']['allvoicerecorddata'][$iAppTabId] = $appwisevoicerecordingInfo;    
            }
           
        }
        //########################### END TAB WISE DATA  ###########################
        
        /*if($iconcolorId[0]['iIconcolorId'] != ''){
            foreach($activeTabs AS $key=>$val){
                $activeTabs[$key]['iIconcolorId'] = $iconcolorId[0]['iIconcolorId'];
                if($activeTabs[$key]['vImage'] !=''){
                    $activeTabs[$key]['vImage'] = $this->data['base_upload']."tab_icon/".$activeTabs[$key]['iIconcolorId']."/".$activeTabs[$key]['vImage'];    
                }
            }    
        } */

        //########################## START: ALL DESIGN DATA GET HERE ###########################
        
        foreach($activeTabs AS $key=>$val){
            if($iconcolorId[0]['iIconcolorId'] != ''){
                $activeTabs[$key]['iIconcolorId'] = $iconcolorId[0]['iIconcolorId'];
                if($activeTabs[$key]['vImage'] !=''){
                    $activeTabs[$key]['vImage'] = $this->data['base_upload']."tab_icon/".$activeTabs[$key]['iIconcolorId']."/".$activeTabs[$key]['vImage'];    
                }    
            }else{
                if($activeTabs[$key]['vImage'] !=''){
                    $activeTabs[$key]['vImage'] = $this->data['base_upload']."tab_icon/".$activeTabs[$key]['iIconcolorId']."/".$activeTabs[$key]['vImage'];    
                }
            }
        }   
        
        $backgroundimageArr = array();
         foreach($activeTabs AS $key=>$val){            
            $tabwisemainbackgroundimage = $this->preview_model->gettabwisemainbackgroundimage($val['iApplicationId'],$val['iAppTabId']);
            #echo "<pre>";
            #print_r($tabwisemainbackgroundimage);
            
            
            if($tabwisemainbackgroundimage){
                foreach($tabwisemainbackgroundimage as $bgkey=>$backimage){
                    
                    if($backimage['iAppTabId'] == $activeTabs[$key]['iAppTabId']){
                        if($backimage['eType'] == 'Mobile'){
                            if($backimage['vImage'] !=''){
                                $backgroundimageArr[$key]['mobileimage'] = $this->data['base_upload']."background_image/".$backimage['iBackgroundimgId']."/org_".$backimage['vImage'];
                                $activeTabs[$key]['mobileimage']= $this->data['base_upload']."background_image/".$backimage['iBackgroundimgId']."/org_".$backimage['vImage'];
                            }else{
                                $backgroundimageArr[$key]['mobileimage'] = '';
                                $activeTabs[$key]['mobileimage']= '';
                            }
                        }else{
                            $backgroundimageArr[$key]['mobileimage'] = '';
                            $activeTabs[$key]['mobileimage']= '';
                        }
                        
                        if($backimage['Tablet'] !='Tablet'){
                            if($backimage['vImage'] !=''){
                                $backgroundimageArr[$key]['tabletimage'] = $this->data['base_upload']."background_image/".$backimage['iBackgroundimgId']."/org_".$backimage['vImage'];
                                $activeTabs[$key]['tabletimage'] = $this->data['base_upload']."background_image/".$backimage['iBackgroundimgId']."/org_".$backimage['vImage'];
                            }else{
                                $backgroundimageArr[$key]['tabletimage'] = '';
                                $activeTabs[$key]['tabletimage'] = '';
                            }   
                        }else{
                            $backgroundimageArr[$key]['tabletimage'] = '';
                            $activeTabs[$key]['tabletimage'] = '';
                        }
                    }
                }
            }else{
                $backgroundimageArr[$key]['tabletimage'] = '';
                $activeTabs[$key]['tabletimage'] = '';
                $backgroundimageArr[$key]['mobileimage'] = '';
                $activeTabs[$key]['mobileimage']= '';
            }
        }
        
        $this->data['appdata']['activeTabs'] = $activeTabs;        
                
        $appotherinfo = $this->preview_model->getappotherinfo($iApplicationId);
        
        if($appotherinfo[0]['tabbackground'] !=''){
            $appotherinfo[0]['tabbackground'] = $this->data['base_upload']."tab_btn_background/".$appotherinfo[0]['iBackgroundId']."/".$appotherinfo[0]['tabbackground'];
        }
        
        if($appotherinfo[0]['lunch_header'] !=''){
            $appotherinfo[0]['lunch_header'] = $this->data['base_upload']."lunch_header/".$appotherinfo[0]['iLunchheaderId']."/".$appotherinfo[0]['lunch_header'];
        }
        
        if($appotherinfo[0]['global_header'] !=''){
            $appotherinfo[0]['global_header'] = $this->data['base_upload']."lunch_header/".$appotherinfo[0]['iGlobalHeaderId']."/".$appotherinfo[0]['global_header'];
        }
        
        #echo "<pre>";
        #print_r($appotherinfo);
        
        $this->data['appdata']['appOtherInfo'] = $appotherinfo;
        //GET ALL OTHER DATA OF DESING

        /*$layout = $appotherinfo[0]['eBtnLayout'];
        $layoutArr = array(
          "Bottom"  => "www-4",
          "Top"  => "www-4",
          "Left"  => "www-4",
          "Right"  => "www-4"
        );*/
        
        $pageTypeArr = array(
          "Home"  => "home",
          "Event"  => "list",
          "Fanwall"  => "fanwall",
          "Information"  => "content",
          "Mailinglist"  => "form",
          "News"  => "list",
          "Notepad"  => "notepad",
          "PDF"  => "list",
          "Podcast"  => "list",
          "RSS Feeds"  => "list",   
          "Voice Recording"  => "voicerecording",
          "Website"  => "list",
          "YouTube"  => "video",
          "Location"  => "list",
          "Payment"  => "payment",
          "Gallery"  => "gallery",
          "2Tire Info"  => "2tire"
          
        );

        $this->data['appdata']['pageTypeArr'] = $pageTypeArr;
        
        if(!is_dir('downloads/')){
            @mkdir('downloads/', 0777);
        }

        //$src = $this->data['base_download_path']."alltemplate/".$layoutArr[$layout]."";
        $src = $this->data['base_download_path']."alltemplate/www";
        
        $appDynamicFolder = $this->data['base_download_url']."www-".$iApplicationId."/index.html";
        
        $dest = $this->data['base_download_path']."www-".$iApplicationId;
        
        
        $index_file = $dest.'/index.html';
        $css_file = $dest.'/css/style.css';
        $script_file = $dest.'/javascripts/script.js';
        
        
        if(is_dir($dest)){
            //@mkdir($dest, 0777);
            unlink($index_file);
            unlink($css_file);
        }else{
            
        }
        //exit;
        $this->recurse_copy($src,$dest);
        
        ## READ THE INDEX.HTML FILE
        $handle = fopen($index_file, 'r');
        $indexdata = fread($handle,filesize($index_file));
        fclose($handle);
        $replacecontent = '<body class="tab_bg">
        ##PAGES##
        </body>';
        $indexdata = preg_replace('/(<body>)(.*)(<\/body>)/s', $replacecontent, $indexdata);
        
        ## CREATE PAGES ACCORDING TO THE MENU AVAILABLE
        $pageHTML = $this->createPages();
        
        ## REPLACE DYNAMIC CONTENT AND PUT THEM IN INDEX.HTML FILE
        $HTMLbody = str_replace('<script src="javascripts/cordova-2.6.0.js"></script>',"",$indexdata);
        $HTMLbody = str_replace("##PAGES##",$pageHTML,$HTMLbody);
        
        $handle1 = fopen($index_file, 'w') or die('Cannot open file:  '.$index_file);
        fwrite($handle1, $HTMLbody);
        fclose($handle1);

        
        ## READ THE STYLE.CSS FILE ###
        $handle2 = fopen($css_file, 'r');
        $CSSbody = fread($handle2,filesize($css_file));
        fclose($handle2);
        
        ## REPLACE DYNAMIC CONTENT AND PUT THEM IN INDEX.HTML FILE
        $appInfo = $this->data['appdata']['appOtherInfo'][0];
        
        if($appInfo['tabbackground'] !=''){
            $CSSbody = str_replace("##TAB_BACKGROUND_IMAGE##",$appInfo['tabbackground'],$CSSbody);
        }else{
            $CSSbody = str_replace("##TAB_BACKGROUND_IMAGE##",'../images/tab_default.jpg',$CSSbody);
        }

        if($appInfo['vTabColor'] !=''){
            $CSSbody = str_replace("##TAB_BG_COLOR##",$appInfo['vTabColor'],$CSSbody);
        }else{
            $CSSbody = str_replace("##TAB_BG_COLOR##",'#000',$CSSbody);
        }

        if($appInfo['vTabTexColor'] !=''){
            $CSSbody = str_replace("##TAB_TEXT_COLOR##",$appInfo['vTabTexColor'],$CSSbody);
        }else{
            $CSSbody = str_replace("##TAB_TEXT_COLOR##",'#FFFFFF',$CSSbody);
        }

        if($appInfo['global_header'] !=''){
            $CSSbody = str_replace("##GLOBAL_HEADER_BACKGROUND_IMAGE##",$appInfo['global_header'],$CSSbody);
        }else{
            $CSSbody = str_replace("##GLOBAL_HEADER_BACKGROUND_IMAGE##",'../images/header_default.jpg',$CSSbody);
        }

        if($appInfo['vNavigationShadow'] !=''){
            $CSSbody = str_replace("##HEADER_TEXT_SHADOW##",$appInfo['vNavigationShadow'],$CSSbody);
        }else{
            $CSSbody = str_replace("##HEADER_TEXT_SHADOW##",$appInfo['vNavigationText'],$CSSbody);
        }

        if($appInfo['vGlobalTintColor'] !=''){
            $CSSbody = str_replace("##GLOBAL_HEADER_BACKGROUND_COLOR##",$appInfo['vGlobalTintColor'],$CSSbody);
        }else{
            $CSSbody = str_replace("##GLOBAL_HEADER_BACKGROUND_COLOR##",'',$CSSbody);
        }

        if($appInfo['lunch_header'] !=''){
            $CSSbody = str_replace("##LUNCH_HEADER_BACKGROUND_IMAGE##",$appInfo['lunch_header'],$CSSbody);
        }else{
            $CSSbody = str_replace("##LUNCH_HEADER_BACKGROUND_IMAGE##",'../images/header_default.jpg',$CSSbody);
        }

        if($appInfo['vLuncherTintColor'] !=''){
            $CSSbody = str_replace("##LUNCH_HEADER_BACKGROUND_COLOR##",$appInfo['vLuncherTintColor'],$CSSbody);
        }else{
            $CSSbody = str_replace("##LUNCH_HEADER_BACKGROUND_COLOR##",'',$CSSbody);
        }
        
        if($appInfo['vNavigationText'] !=''){
            $CSSbody = str_replace("##TEXT_COLOR##",$appInfo['vNavigationText'],$CSSbody);
        }else{
            $CSSbody = str_replace("##TEXT_COLOR##",'#FFFFFF',$CSSbody);
        }

        if($appInfo['vOddRowBar'] !=''){
            $CSSbody = str_replace("##LIST_ODD##",$appInfo['vOddRowBar'],$CSSbody);
        }else{
            $CSSbody = str_replace("##LIST_ODD##",'#FFF',$CSSbody);
        }

        if($appInfo['vOddRowText'] !=''){
            $CSSbody = str_replace("##LIST_ODD_TEXT##",$appInfo['vOddRowText'],$CSSbody);
        }else{
            $CSSbody = str_replace("##LIST_ODD_TEXT##",'#FFF',$CSSbody);
        }

        if($appInfo['vEvenRowBar'] !=''){
            $CSSbody = str_replace("##LIST_EVEN##",$appInfo['vEvenRowBar'],$CSSbody);
        }else{
            $CSSbody = str_replace("##LIST_EVEN##",'#ededed',$CSSbody);
        }

        if($appInfo['vEvenRowText'] !=''){
            $CSSbody = str_replace("##LIST_EVEN_TEXT##",$appInfo['vEvenRowText'],$CSSbody);
        }else{
            $CSSbody = str_replace("##LIST_EVEN_TEXT##",'#ededed',$CSSbody);
        }
        
        
        $handle3 = fopen($css_file, 'w') or die('Cannot open file:  '.$css_file);
        fwrite($handle3, $CSSbody);
        fclose($handle3);
        //########################### END: ALL DESIGN DATA GET HERE  ###########################

        $this->smarty->assign('iApplicationId', $iApplicationId);
        $this->smarty->assign('vApplicationCode', $appinformation['vApplicationCode']);
        $this->smarty->assign('data', $this->data);
        $this->smarty->assign('appDynamicFolder', $appDynamicFolder);
        
        $this->smarty->view('template.tpl'); 
    }
    

    function recurse_copy($src,$dst) { 
        $dir = opendir($src); 
        @mkdir($dst);
        
        while(false !== ( $file = readdir($dir)) ) { 
            if (( $file != '.' ) && ( $file != '..' )) { 
                if ( is_dir($src . '/' . $file) ) { 
                    $this->recurse_copy($src . '/' . $file,$dst . '/' . $file); 
                } 
                else { 
                    copy($src . '/' . $file,$dst . '/' . $file); 
                } 
            } 
        } 
        closedir($dir); 
    }
    
    function createPages(){
        $html_last = '';
        $activeTabs = $this->data['appdata']['activeTabs'];
        $appOtherInfo = $this->data['appdata']['appOtherInfo'][0];
        $client_info = $this->data['client_info'];
        $vPhoneNo = $client_info['vPhone'];
        $vEmailAd = $client_info['vEmail'];
        $iApplicationId = $this->data['iApplicationId'];
        
        $SCRIPTbody .= 'var web_url = "'.$this->data['base_url'].'webservice?action=";'."\n";
        
        $dest = $this->data['base_download_path']."www-".$iApplicationId;
        $script_file = $dest.'/javascripts/script.js';
        $handle5 = fopen($script_file, 'r');
        $SCRIPTbody .= fread($handle5,filesize($script_file));
        fclose($handle5);

            $html_last.= '<div data-role="page" id="default_menu">';
            $html_last.= '<div data-role="header" id="hedbg" class="headerbg">
                            <div class="defaulthedbg">
                                <ul>';
                                    if($this->data['appdata']['appOtherInfo'][0]['eCallBtn'] == 'Yes')
                                        $html_last.= '<li><a href="tel:+'.$vPhoneNo.'" style="margin-left: 27px;float: left;
                                    "><span><img src="images/callus.png" alt=""></span> <span>Call Us</span></a></li>';
                                    else
                                        $html_last.= '<li>&nbsp;</li>';
                                    if($this->data['appdata']['appOtherInfo'][0]['eDirectionBtn'] == 'Yes')
                                        $html_last.= '<li><a href="javascript:getLocation();"><span><img src="images/directions.png" alt=""></span> <span>Directions</span></a></li>';
                                    else
                                        $html_last.= '<li>&nbsp;</li>';
                                    if($this->data['appdata']['appOtherInfo'][0]['eTellFriendBtn'] == 'Yes')
                                        $html_last.= '<li><a href="#tell_friend"><span><img src="images/sharefriend.png" alt=""></span> <span>Tell Friend</span></a></li>';
                                    else
                                        $html_last.= '<li>&nbsp;</li>';
                                $html_last.= '</ul>
                            </div>';
                            if ($appOtherInfo['eBtnLayout'] == 'Left') {
                                $html_last.= '<a style="background:#000;" href="#left-panel" data-theme="d" data-icon="arrow-r" data-iconpos="notext" data-shadow="false" data-iconshadow="false" class="ui-icon-nodisc">Open left panel</a>';
                            }if ($appOtherInfo['eBtnLayout'] == 'Right') {
                                $html_last.= '<a style="display:none;" href="#left-panel" ></a>'."\n".'<a style="background:#000;" href="#right-panel" data-theme="d" data-icon="arrow-l" data-iconpos="notext" data-shadow="false" data-iconshadow="false" class="ui-icon-nodisc">Open right panel</a>';
                            }                         
                        $html_last.= '</div>
                        <div style="clear:both;"></div>
                        <div data-role="content" >
                            <div id="midpartwrap">
                                &nbsp;                  
                            </div>
                        </div>';
            $html_last.= $this->createFooter();
            $html_last.= '</div>'."\n\n";

            $html_last.= '<div data-role="dialog" id="Dialog">
                <div data-role="header" data-theme="d" data-position="inline">
                    <h1>Alert</h1>
                </div>
                <div data-role="content" data-theme="c">
                    <h3 id="alertMsg">Please Enter Valid Zip Code.</h3>
                    <a data-role="button" data-rel="back" data-theme="c">Cancel</a>   
                </div>
            </div>'."\n\n";
            
        $appOtherInfo = $this->data['appdata']['appOtherInfo'][0];  
        $SCRIPTbody .= "\n";
        $SCRIPTbody .= 'var save_sharedata = "'.$this->data['base_url'].'webservice?action=save_share";'."\n";

        if($appOtherInfo['eBtnLayout'] == 'Bottom'){
            $SCRIPTbody .= '$(document).ready(function() {'."\n";
            $SCRIPTbody .= '$(".owl-carousel").owlCarousel({'."\n";
            $SCRIPTbody .= 'navigation : true'."\n";
            $SCRIPTbody .= '});'."\n";
            $SCRIPTbody .= '});'."\n";
        }

        for($k=0;$k<count($activeTabs);$k++){            
            $pageID = str_replace(" ","_",$activeTabs[$k]['vTitle']);
            $pageID = strtolower($pageID);
            
            if($activeTabs[$k]['mobileimage'] != ''){
                $mobileimage = $activeTabs[$k]['mobileimage'];
                $SCRIPTbody .= '$(document).on("pageshow", "#'.$pageID.'_'.$k.'",function (data) {
                    $("#'.$pageID.'_'.$k.'").css("background", "url('.$mobileimage.')");
                    $("#'.$pageID.'_'.$k.'").css("background-size", "100% 100%");
                });'."\n";
                
            }else{
                
            }
           
            $html_last.='<div data-role="page" id="'.$pageID.'_'.$k.'">
                            '.$this->createHeader($k).'
                            <div style="clear:both;"></div>
                            '.$this->createBody($k).'
                            <div style="clear:both;"></div>
                            '.$this->createFooter().'
                        </div>'."\n\n";

            
        }


        
        
        $html_last.= '<div data-role="page" id="video_detail">';
            $html_last.= '<div data-role="header" id="hedbg" class="headerbg hbgglobal">
                            <a href="/" data-role="button" data-rel="back">Back</a>
                            <h1 class="hedbglunch" id="videoTitleId">&nbsp;</h1>
                            <div class="bgcolor_hedlunch">&nbsp;</div>';
                            if ($appOtherInfo['eBtnLayout'] == 'Left') {
                                $html_last.= '<a style="background:#000;" href="#left-panel" data-theme="d" data-icon="arrow-r" data-iconpos="notext" data-shadow="false" data-iconshadow="false" class="ui-icon-nodisc">Open left panel</a>';
                            }if ($appOtherInfo['eBtnLayout'] == 'Right') {
                                $html_last.= '<a style="background:#000;" href="#right-panel" data-theme="d" data-icon="arrow-l" data-iconpos="notext" data-shadow="false" data-iconshadow="false" class="ui-icon-nodisc">Open right panel</a>';
                            }
                        $html_last.= '</div>
                        <div style="clear:both;"></div>
                        <div data-role="content">
                            <div id="video_detail_main" class="midpartwrap">
                                &nbsp;   
                            </div>
                        </div>';
                        $html_last.= $this->createFooter();
                    $html_last.= '</div>'."\n\n";
                    
        
        
        $html_last.= '<div data-role="page" id="2tire_detail">';
            $html_last.= '<div data-role="header" id="hedbg" class="headerbg hbgglobal">
                            <a href="/" data-role="button" data-rel="back">Back</a>
                            <h1 class="hedbglunch" id="2tireTitleId">&nbsp;</h1>
                            <div class="bgcolor_hedlunch">&nbsp;</div>';
                            if ($appOtherInfo['eBtnLayout'] == 'Left') {
                                $html_last.= '<a style="background:#000;" href="#left-panel" data-theme="d" data-icon="arrow-r" data-iconpos="notext" data-shadow="false" data-iconshadow="false" class="ui-icon-nodisc">Open left panel</a>';
                            }if ($appOtherInfo['eBtnLayout'] == 'Right') {
                                $html_last.= '<a style="background:#000;" href="#right-panel" data-theme="d" data-icon="arrow-l" data-iconpos="notext" data-shadow="false" data-iconshadow="false" class="ui-icon-nodisc">Open right panel</a>';
                            }
                        $html_last.= '</div>
                        <div style="clear:both;"></div>
                        <div data-role="content">
                            <div id="2tire_detail_main" class="midpartwrap">
                                &nbsp;   
                            </div>
                        </div>';
                        $html_last.= $this->createFooter();
                    $html_last.= '</div>'."\n\n";
                    

        $html_last.= '<div data-role="page" id="news_detail">';
            $html_last.= '<div data-role="header" id="hedbg" class="headerbg hbgglobal">
                            <a href="/" data-role="button" data-rel="back">Back</a>
                            <h1 class="hedbglunch" id="newsTitleId">&nbsp;</h1>
                            <div class="bgcolor_hedlunch">&nbsp;</div>';
                            if ($appOtherInfo['eBtnLayout'] == 'Left') {
                                $html_last.= '<a style="background:#000;" href="#left-panel" data-theme="d" data-icon="arrow-r" data-iconpos="notext" data-shadow="false" data-iconshadow="false" class="ui-icon-nodisc">Open left panel</a>';
                            }if ($appOtherInfo['eBtnLayout'] == 'Right') {
                                $html_last.= '<a style="background:#000;" href="#right-panel" data-theme="d" data-icon="arrow-l" data-iconpos="notext" data-shadow="false" data-iconshadow="false" class="ui-icon-nodisc">Open right panel</a>';
                            }
                        $html_last.= '</div>
                        <div style="clear:both;"></div>
                        <div data-role="content">
                            <div id="news_detail_main" class="midpartwrap">
                                &nbsp;   
                            </div>
                        </div>';
                        $html_last.= $this->createFooter();
                    $html_last.= '</div>'."\n\n";

        $html_last.= '<div data-role="page" id="rss_detail">';
            $html_last.= '<div data-role="header" id="hedbg" class="headerbg hbgglobal">
                            <a href="/" data-role="button" data-rel="back">Back</a>
                            <h1 class="hedbglunch" id="rssTitleId">&nbsp;</h1>
                            <div class="bgcolor_hedlunch">&nbsp;</div>';
                            if ($appOtherInfo['eBtnLayout'] == 'Left') {
                                $html_last.= '<a style="background:#000;" href="#left-panel" data-theme="d" data-icon="arrow-r" data-iconpos="notext" data-shadow="false" data-iconshadow="false" class="ui-icon-nodisc">Open left panel</a>';
                            }if ($appOtherInfo['eBtnLayout'] == 'Right') {
                                $html_last.= '<a style="background:#000;" href="#right-panel" data-theme="d" data-icon="arrow-l" data-iconpos="notext" data-shadow="false" data-iconshadow="false" class="ui-icon-nodisc">Open right panel</a>';
                            }
                        $html_last.= '</div>
                        <div style="clear:both;"></div>
                        <div data-role="content">
                            <div id="rss_detail_main" class="midpartwrap">
                                &nbsp;   
                            </div>
                        </div>';
                        $html_last.= $this->createFooter();
                    $html_last.= '</div>'."\n\n";


        $html_last.= '<div data-role="page" id="podcast_detail">';
                $html_last.= '<div data-role="header" id="hedbg" class="headerbg hbgglobal">
                                <a href="/" data-role="button" data-rel="back">Back</a>
                                <h1 class="hedbglunch" id="podcastTitleId">&nbsp;</h1>
                                <div class="bgcolor_hedlunch">&nbsp;</div>';
                                if ($appOtherInfo['eBtnLayout'] == 'Left') {
                                    $html_last.= '<a style="background:#000;" href="#left-panel" data-theme="d" data-icon="arrow-r" data-iconpos="notext" data-shadow="false" data-iconshadow="false" class="ui-icon-nodisc">Open left panel</a>';
                                }if ($appOtherInfo['eBtnLayout'] == 'Right') {
                                    $html_last.= '<a style="background:#000;" href="#right-panel" data-theme="d" data-icon="arrow-l" data-iconpos="notext" data-shadow="false" data-iconshadow="false" class="ui-icon-nodisc">Open right panel</a>';
                                }
                            $html_last.= '</div>
                            <div style="clear:both;"></div>
                            <div data-role="content">
                                <div id="podcast_detail_main" class="midpartwrap">
                                    &nbsp;   
                                </div>
                            </div>';
                            $html_last.= $this->createFooter();
                        $html_last.= '</div>'."\n\n";


        $html_last.= '<div data-role="page" id="event_detail">';
            $html_last.= '<div data-role="header" id="hedbg" class="headerbg hbgglobal">
                            <a href="/" data-role="button" data-rel="back">Back</a>
                            <h1 class="hedbglunch" id="titleId">&nbsp;</h1>
                            <div class="bgcolor_hedlunch">&nbsp;</div>';
                            if ($appOtherInfo['eBtnLayout'] == 'Left') {
                                $html_last.= '<a style="background:#000;" href="#left-panel" data-theme="d" data-icon="arrow-r" data-iconpos="notext" data-shadow="false" data-iconshadow="false" class="ui-icon-nodisc">Open left panel</a>';
                            }if ($appOtherInfo['eBtnLayout'] == 'Right') {
                                $html_last.= '<a style="background:#000;" href="#right-panel" data-theme="d" data-icon="arrow-l" data-iconpos="notext" data-shadow="false" data-iconshadow="false" class="ui-icon-nodisc">Open right panel</a>';
                            }
                        $html_last.= '</div>
                        <div style="clear:both;"></div>
                        <div data-role="content">
                            <div id="event_detail_main" class="midpartwrap">
                                &nbsp;   
                            </div>
                        </div>';
                        $html_last.= $this->createFooter();
                    $html_last.= '</div>'."\n\n";

        $html_last.= '<div data-role="dialog" id="fanDialog">
                <div data-role="header" data-theme="d" data-position="inline">
                    <h1>Alert</h1>
                </div>
                <div data-role="content" data-theme="c">

                    <a data-role="button" data-rel="back" data-theme="c">Cancel</a>   
                </div>
            </div>'."\n\n";

        $html_last.= '<div data-role="page" id="payment_thanks">';
            $html_last.= '<div data-role="header" id="hedbg" class="headerbg hbgglobal">
                            <a href="/" data-role="button" data-rel="back">Back</a>
                            <h1 class="hedbglunch">&nbsp;</h1>
                            <div class="bgcolor_hedlunch">&nbsp;</div>';
                            if ($appOtherInfo['eBtnLayout'] == 'Left') {
                                $html_last.= '<a style="background:#000;" href="#left-panel" data-theme="d" data-icon="arrow-r" data-iconpos="notext" data-shadow="false" data-iconshadow="false" class="ui-icon-nodisc">Open left panel</a>';
                            }if ($appOtherInfo['eBtnLayout'] == 'Right') {
                                $html_last.= '<a style="background:#000;" href="#right-panel" data-theme="d" data-icon="arrow-l" data-iconpos="notext" data-shadow="false" data-iconshadow="false" class="ui-icon-nodisc">Open right panel</a>';
                            }
            $html_last.= '</div>
                        <div style="clear:both;"></div>
                        <div data-role="content">';
                        $html_last.= '<div id="midpartwrap">';
                            $html_last.= '<div class="detail_part">';
                                $html_last.= '<div class="thankscl">';
                                    $html_last.= '<p>Your payment pay successfully. Thank you for purchase item. Please check your confirm email.</p>';
                                $html_last.= '</div>';
                            $html_last.= '</div>
                                    </div>
                        </div>';
            $html_last.= $this->createFooter();
            $html_last.='</div>'."\n\n";


        $html_last.= '<div data-role="page" id="map_container">';
            $html_last.= '<div data-role="header" id="hedbg" class="headerbg hbgglobal">
                            <a href="/" data-role="button" data-rel="back">Back</a>
                            <h1 class="hedbglunch">Map Location</h1>
                            <div class="bgcolor_hedlunch">&nbsp;</div>';
                            if ($appOtherInfo['eBtnLayout'] == 'Left') {
                                $html_last.= '<a style="background:#000;" href="#left-panel" data-theme="d" data-icon="arrow-r" data-iconpos="notext" data-shadow="false" data-iconshadow="false" class="ui-icon-nodisc">Open left panel</a>';
                            }if ($appOtherInfo['eBtnLayout'] == 'Right') {
                                $html_last.= '<a style="background:#000;" href="#right-panel" data-theme="d" data-icon="arrow-l" data-iconpos="notext" data-shadow="false" data-iconshadow="false" class="ui-icon-nodisc">Open right panel</a>';
                            }
            $html_last.= '</div>
                        <div style="clear:both;"></div>
                        <div data-role="content">
                            <div id="map-canvas" >
                                &nbsp;                  
                            </div>
                        </div>';
            $html_last.= $this->createFooter();
            $html_last.='</div>'."\n\n";

        $html_last.= '<div data-role="page" id="map_direction">';
            $html_last.= '<div data-role="header" id="hedbg" class="headerbg hbgglobal">';
                            if ($appOtherInfo['eBtnLayout'] == 'Left') {
                                $html_last.= '<a style="background:#000;" href="#left-panel" data-theme="d" data-icon="arrow-r" data-iconpos="notext" data-shadow="false" data-iconshadow="false" class="ui-icon-nodisc">Open left panel</a>';
                            }
                $html_last.= '<a href="#default_menu" data-role="button" data-rel="">Back</a>
                            <h1 class="hedbglunch">Map Direction</h1>
                            <div class="bgcolor_hedlunch">&nbsp;</div>';
                            if ($appOtherInfo['eBtnLayout'] == 'Right') {
                                $html_last.= '<a style="background:#000;" href="#right-panel" data-theme="d" data-icon="arrow-l" data-iconpos="notext" data-shadow="false" data-iconshadow="false" class="ui-icon-nodisc">Open right panel</a>';
                            }
            $html_last.= '</div>
                        <div style="clear:both;"></div>
                        <div data-role="content">
                            <div id="map-canvas1" >
                                &nbsp;                  
                            </div>
                        </div>';
            $html_last.= $this->createFooter();
            $html_last.='</div>'."\n\n";

         if($this->data['appdata']['appOtherInfo'][0]['eTellFriendBtn'] == 'Yes'){
            $html_last.= '<div data-role="page" id="tell_friend">';
            $html_last.= '<div data-role="header" id="hedbg" class="headerbg hbgglobal">
                            <a href="#default_menu" data-role="button" data-rel="">Back</a>
                            <h1 class="hedbglunch">Tell Friend</h1>
                            <div class="bgcolor_hedlunch">&nbsp;</div>
                        </div>
                        <div style="clear:both;"></div>
                        <div data-role="content" style="margin:45px 0 0 0;">';
                            $html_last.= '<div data-role="fieldcontain" class="tellpart">';
                            $html_last.= '<h2 class="tell_hd">Tell Friend</h2>';
                            $html_last.= '<div class="inner_box">';
                            $html_last.= '<a class="join_btn" href="mailto:'.$vEmailAd.'?subject=Feedback&body=Your message within Main Body" data-role="button" data-inline="true">Share by Email</a>';
                            $html_last.= '<a class="join_btn" href="javascript:shareTwitter();" data-role="button" data-inline="true">Share on Twitter</a>';
                            $html_last.= '<a class="join_btn" href="javascript:shareFacebook();" data-role="button" data-inline="true">Share on Facebook</a>';
                            $html_last.= '</div>';
                            $html_last.= '</div>';
                        $html_last .= '</div>
                    </div>'."\n\n";
        }
                    
                /* =================== Start detail page map ==================*/
                $SCRIPTbody .= 'function showmap(lat,lon){'."\n";
                $SCRIPTbody .= '$.mobile.changePage( "#map_container")'."\n";          
                $SCRIPTbody .= 'var myLatlng = new google.maps.LatLng(lat,lon);'."\n";
                $SCRIPTbody .= 'var mapOptions = {'."\n";
                $SCRIPTbody .= 'zoom: 4,'."\n";
                $SCRIPTbody .= 'center: myLatlng'."\n";
                $SCRIPTbody .= '}'."\n";
                $SCRIPTbody .= 'var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);'."\n";
                $SCRIPTbody .= 'var marker = new google.maps.Marker({'."\n";
                $SCRIPTbody .= 'position: myLatlng,'."\n";
                $SCRIPTbody .= 'map: map,'."\n";
                $SCRIPTbody .= '});'."\n";
                $SCRIPTbody .= 'setTimeout(function() {';
                $SCRIPTbody .= 'google.maps.event.trigger(map, "resize")'."\n";
                $SCRIPTbody .= 'map.setCenter(myLatlng);'."\n";
                $SCRIPTbody .= '}, 500);';
                $SCRIPTbody .= '}'."\n";
                $SCRIPTbody .= ''."\n";
                $SCRIPTbody .= ''."\n";
                /* =================== End detail page map ==================*/
                
                /* =================== Start save mailing ==================*/
                $url_mail = $this->data['base_url']."webservice?action=save_mail";

                $SCRIPTbody .= 'function join_mailing(){'."\n";
                $SCRIPTbody .= 'var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;'."\n";
                $SCRIPTbody .= 'if(!$("#vMailName").val()){'."\n";
                $SCRIPTbody .= '$("#alertMsg").html("Please enter name");'."\n";
                $SCRIPTbody .= '$.mobile.changePage("#Dialog", "pop", true, true);'."\n";
                $SCRIPTbody .= 'return false;'."\n";
                $SCRIPTbody .= '}'."\n";
                $SCRIPTbody .= 'else if(!$("#vMail").val()){'."\n";
                $SCRIPTbody .= '$("#alertMsg").html("Please enter email address");'."\n";
                $SCRIPTbody .= '$.mobile.changePage("#Dialog", "pop", true, true);'."\n";
                $SCRIPTbody .= 'return false;'."\n";
                $SCRIPTbody .= '}'."\n";
                $SCRIPTbody .= 'else if (!emailReg.test($("#vMail").val())) {'."\n";
                $SCRIPTbody .= '$("#alertMsg").html("Please enter valid email address");'."\n";
                $SCRIPTbody .= '$.mobile.changePage("#Dialog", "pop", true, true);'."\n";
                $SCRIPTbody .= 'return false;'."\n";
                $SCRIPTbody .= '}'."\n";
                $SCRIPTbody .= 'else{'."\n";
                $SCRIPTbody .= 'var vMailName = $("#vMailName").val();'."\n";
                $SCRIPTbody .= 'var vEmail = $("#vMail").val();'."\n";
                $SCRIPTbody .= 'var iCategoryId = $("#iCategoryId").val();'."\n";
                $SCRIPTbody .= 'var iAppTabId = $("#iAppTabId_Mail").val();'."\n";
                $SCRIPTbody .= 'var iApplicationId = '.$iApplicationId.';'."\n";
                $SCRIPTbody .= '}'."\n";
                $SCRIPTbody .= '$.ajax({'."\n";
                $SCRIPTbody .= 'url: "'.$url_mail.'",'."\n";
                $SCRIPTbody .= 'type: "GET",'."\n";
                $SCRIPTbody .= 'dataType: "jsonp",'."\n";
                $SCRIPTbody .= 'data:"vMailName="+vMailName+"&vEmail="+vEmail+"&iApplicationId="+iApplicationId+"&iCategoryId="+iCategoryId+"&iAppTabId="+iAppTabId,'."\n";
                $SCRIPTbody .= 'crossDomain:true,'."\n";
                $SCRIPTbody .= 'success: function(result)'."\n";
                $SCRIPTbody .= '{'."\n";
                $SCRIPTbody .= '$("#vMailName").val(" ");'."\n";
                $SCRIPTbody .= '$("#vMail").val(" ");'."\n";
                $SCRIPTbody .= 'if(result[0].msg == "Exist"){'."\n";
                $SCRIPTbody .= '$("#alertMsg").html("News letter send successfully");'."\n";
                $SCRIPTbody .= '$.mobile.changePage("#Dialog", "pop", true, true);'."\n";
                $SCRIPTbody .= '}else if(result[0].msg == "Success"){'."\n";
                $SCRIPTbody .= '$("#alertMsg").html("News letter send successfully");'."\n";
                $SCRIPTbody .= '$.mobile.changePage("#Dialog", "pop", true, true);'."\n";
                $SCRIPTbody .= '}else{'."\n";
                $SCRIPTbody .= '$("#alertMsg").html("Error in send news letter");'."\n";
                $SCRIPTbody .= '$.mobile.changePage("#Dialog", "pop", true, true);'."\n";
                $SCRIPTbody .= '}}'."\n";
                $SCRIPTbody .= '});'."\n";
                $SCRIPTbody .= '}'."\n";
                /* =================== End save mailing ==================*/

                /* =================== Start direction map ==================*/
                $client_info = $this->data['client_info'];
                $address = "los angeles, ca";
                $address = $client_info['vAddress']." ".$client_info['vCity']." ".$client_info['vState']." ".$client_info['vCountry'];
                $SCRIPTbody .= 'function getLocation(){'."\n";
                $SCRIPTbody .= 'if (navigator.geolocation){'."\n";
                $SCRIPTbody .= 'navigator.geolocation.getCurrentPosition(showPosition);'."\n";
                $SCRIPTbody .= '}else{'."\n";
                $SCRIPTbody .= 'x.innerHTML="Geolocation is not supported by this browser.";'."\n";
                $SCRIPTbody .= '}'."\n";
                $SCRIPTbody .= '}'."\n";
                
                $SCRIPTbody .= 'function showPosition(position){'."\n";
                $SCRIPTbody .= '$.mobile.changePage( "#map_direction")'."\n";          
                $SCRIPTbody .= 'var cur_lat = position.coords.latitude;'."\n";
                $SCRIPTbody .= 'var cur_lang = position.coords.longitude;'."\n";
                $SCRIPTbody .= 'var directionDisplay;'."\n";
                $SCRIPTbody .= 'var directionsService = new google.maps.DirectionsService();'."\n";
                $SCRIPTbody .= 'var map;'."\n";
                $SCRIPTbody .= 'var start = new google.maps.LatLng(cur_lat,cur_lang);'."\n";
                $SCRIPTbody .= 'var end ="'.$address.'";'."\n";
                //$SCRIPTbody .= 'var end = new google.maps.LatLng(client_lat,client_lang);'."\n";
                //$SCRIPTbody .= 'var start = new google.maps.LatLng(41.850033, -87.6500523);'."\n";
                $SCRIPTbody .= 'var request = {'."\n";
                $SCRIPTbody .= 'origin:start,'."\n";
                $SCRIPTbody .= 'destination:end,'."\n";
                $SCRIPTbody .= 'travelMode: google.maps.TravelMode.DRIVING'."\n";
                $SCRIPTbody .= '};'."\n";
                $SCRIPTbody .= 'directionsService.route(request, function(response, status) {'."\n";
                $SCRIPTbody .= 'if (status == google.maps.DirectionsStatus.OK) {'."\n";
                $SCRIPTbody .= 'directionsDisplay.setDirections(response);'."\n";
                $SCRIPTbody .= '}'."\n";
                $SCRIPTbody .= '});'."\n";
                $SCRIPTbody .= 'directionsDisplay = new google.maps.DirectionsRenderer();'."\n";
                $SCRIPTbody .= 'var mapOptions = {'."\n";
                $SCRIPTbody .= 'center: start,'."\n";
                $SCRIPTbody .= 'zoom: 7'."\n";
                $SCRIPTbody .= '}'."\n";
                $SCRIPTbody .= 'map = new google.maps.Map(document.getElementById("map-canvas1"), mapOptions);'."\n";
                $SCRIPTbody .= 'directionsDisplay.setMap(map);'."\n";
                $SCRIPTbody .= 'directionsDisplay.setPanel(document.getElementById("panel"));'."\n";
                $SCRIPTbody .= 'setTimeout(function() {';
                $SCRIPTbody .= 'google.maps.event.trigger(map, "resize")'."\n";
                $SCRIPTbody .= 'map.setCenter(start);'."\n";
                $SCRIPTbody .= '}, 500);';
                $SCRIPTbody .= '}'."\n";
                /* =================== End direction map ==================*/
                
                /* =================== Start share facebook ==================*/
                $SCRIPTbody .= 'function shareFacebook(){'."\n";
                $SCRIPTbody .= 'var title = "SLB webapp";'."\n";
                $SCRIPTbody .= 'var mylink = "http://184.107.213.34/~techiest/php/slb";'."\n";
                $SCRIPTbody .= 'var message = "I have been using this WebApp. Please check it out at";'."\n";
                $SCRIPTbody .= 'var redir_url = "http://184.107.213.34/~techiest/php/slb";'."\n";
                $SCRIPTbody .= 'var ContestImage = "http://184.107.213.34/~techiest/php/slb/assets/images/logo.png";'."\n";
                $SCRIPTbody .= 'var name = "SLB";'."\n";
                $SCRIPTbody .= '//var fburl = "https://www.facebook.com/dialog/feed?%20app_id=559662177417368&link="+encodeURIComponent(mylink)+"&caption="+encodeURIComponent(title)+"&description="+encodeURIComponent(message)+"&redirect_uri="+encodeURIComponent(redir_url);'."\n";
                $SCRIPTbody .= 'var fburl = "https://www.facebook.com/dialog/feed?%20app_id=600784816630414&link="+encodeURIComponent(mylink)+"&picture="+encodeURIComponent(ContestImage)+"&name="+encodeURIComponent(name)+"&caption="+encodeURIComponent(title)+"&description="+encodeURIComponent(message)+"&redirect_uri="+encodeURIComponent(redir_url);'."\n";
                $SCRIPTbody .= 'window.plugins.childBrowser.showWebPage(fburl);'."\n";
                $SCRIPTbody .= 'window.plugins.childBrowser.onLocationChange = function(loc){'."\n";
                $SCRIPTbody .= 'if(loc.indexOf("post_id")!=-1){'."\n";
                $SCRIPTbody .= 'window.plugins.childBrowser.close();'."\n";
                $SCRIPTbody .= '}'."\n";
                $SCRIPTbody .= '}'."\n";
                $SCRIPTbody .= '}'."\n";

                /* =================== End share facebook ====================*/

                /* =================== Start share twitter ==================*/
                $SCRIPTbody .= 'function shareTwitter(){'."\n";
                $SCRIPTbody .= 'var shareurl = "http://184.107.213.34/~techiest/php/slb";'."\n";
                $SCRIPTbody .= 'var text = "I have been using this WebApp. Please check it out at";'."\n";
                $SCRIPTbody .= 'var id = null;'."\n";
                $SCRIPTbody .= 'window.plugins.childBrowser.showWebPage("https://twitter.com/intent/tweet?url="+encodeURIComponent(shareurl)+"&text="+encodeURIComponent(text), {showLocationBar: true });'."\n";
                $SCRIPTbody .= 'window.plugins.childBrowser.onLocationChange = function(loc){'."\n";
                $SCRIPTbody .= 'var url2 = loc.split("?");'."\n";
                $SCRIPTbody .= 'var url3 = url2.split("&");'."\n";
                $SCRIPTbody .= 'id = url3.split("=");'."\n";
                $SCRIPTbody .= 'if(id !== " " || id !== null){'."\n";
                $SCRIPTbody .= '//window.plugins.childBrowser.close();'."\n";
                $SCRIPTbody .= '}'."\n";
                $SCRIPTbody .= '}'."\n";
                $SCRIPTbody .= 'if(id !== " " && id !== null){'."\n";
                $SCRIPTbody .= 'window.plugins.childBrowser.close();'."\n";
                $SCRIPTbody .= '}'."\n";
                $SCRIPTbody .= '}'."\n";

                /* =================== End share twitter ====================*/

                /* =================== Start payment tab ====================*/
                $SCRIPTbody .= 'var totAmt = parseInt(0);'."\n";
                $SCRIPTbody .= 'var amount_arr = new Array();'."\n";
                $SCRIPTbody .= 'var itemname_arr = new Array();'."\n";
                $SCRIPTbody .= '$(document).ready(function() {'."\n";
                $SCRIPTbody .= '$(".itemfee").bind("click", function(){'."\n";
                $SCRIPTbody .= 'var amt = $(this).attr("amount");'."\n";
                $SCRIPTbody .= 'var item = $(this).attr("itemname");'."\n";
                $SCRIPTbody .= 'if (this.checked) {'."\n";
                $SCRIPTbody .= 'totAmt += parseInt(amt);'."\n";
                $SCRIPTbody .= 'itemname_arr.push(item);'."\n";
                $SCRIPTbody .= 'amount_arr.push(amt);'."\n";
                $SCRIPTbody .= '}else{'."\n";
                $SCRIPTbody .= 'totAmt -= parseInt(amt);'."\n";
                $SCRIPTbody .= 'var item_index = itemname_arr.indexOf(item);'."\n";
                $SCRIPTbody .= 'var amount_index = amount_arr.indexOf(amt);'."\n";
                $SCRIPTbody .= 'itemname_arr.splice(item_index, 1);'."\n";
                $SCRIPTbody .= 'amount_arr.splice(amount_index, 1);'."\n";
                $SCRIPTbody .= '}'."\n";
                $SCRIPTbody .= 'if (totAmt > 0) {'."\n";
                $SCRIPTbody .= '$("#mainPayFrm").show();'."\n";
                $SCRIPTbody .= '}else{'."\n";
                $SCRIPTbody .= '$("#mainPayFrm").hide();'."\n";
                $SCRIPTbody .= '}'."\n";
                $SCRIPTbody .= 'console.log("total=="+totAmt);'."\n";
                $SCRIPTbody .= 'console.log("item=="+JSON.stringify(itemname_arr));'."\n";
                $SCRIPTbody .= 'console.log("amt=="+JSON.stringify(amount_arr));'."\n";
                $SCRIPTbody .= '$("#replaceAmt").html(totAmt+" GBP");'."\n";
                $SCRIPTbody .= '});'."\n";
                $SCRIPTbody .= '});'."\n";

                $SCRIPTbody .= 'function paynow() {'."\n";
                $SCRIPTbody .= 'var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;'."\n";
                $SCRIPTbody .= 'if (!$("#vFirstName").val()) {'."\n";
                $SCRIPTbody .= '$("#alertMsg").html("Please enter first name");'."\n";
                $SCRIPTbody .= '$.mobile.changePage("#Dialog", "pop", true);'."\n";
                $SCRIPTbody .= 'return false;'."\n";
                $SCRIPTbody .= '}else if(!$("#vLastName").val()){'."\n";
                $SCRIPTbody .= '$("#alertMsg").html("Please enter last name");'."\n";
                $SCRIPTbody .= '$.mobile.changePage("#Dialog", "pop", true);'."\n";
                $SCRIPTbody .= 'return false;'."\n";
                $SCRIPTbody .= '}else if(!$("#vEmail").val()){'."\n";
                $SCRIPTbody .= '$("#alertMsg").html("Please enter email");'."\n";
                $SCRIPTbody .= '$.mobile.changePage("#Dialog", "pop", true);'."\n";
                $SCRIPTbody .= 'return false;'."\n";
                $SCRIPTbody .= '}else if (!emailReg.test($("#vEmail").val())) {'."\n";
                $SCRIPTbody .= '$("#alertMsg").html("Please enter valid email address");'."\n";
                $SCRIPTbody .= '$.mobile.changePage("#Dialog", "pop", true);'."\n";
                $SCRIPTbody .= 'return false;'."\n";
                $SCRIPTbody .= '}else if(!$("#vHolderName").val()){'."\n";
                $SCRIPTbody .= '$("#alertMsg").html("Please enter holder name");'."\n";
                $SCRIPTbody .= '$.mobile.changePage("#Dialog", "pop", true);'."\n";
                $SCRIPTbody .= 'return false;'."\n";
                $SCRIPTbody .= '}else if(!$("#vCreditCardType").val()){'."\n";
                $SCRIPTbody .= '$("#alertMsg").html("Please choose card type");'."\n";
                $SCRIPTbody .= '$.mobile.changePage("#Dialog", "pop", true);'."\n";
                $SCRIPTbody .= 'return false;'."\n";
                $SCRIPTbody .= '}else if(!$("#vCreditCardNumber").val()){'."\n";
                $SCRIPTbody .= '$("#alertMsg").html("Please enter card number");'."\n";
                $SCRIPTbody .= '$.mobile.changePage("#Dialog", "pop", true);'."\n";
                $SCRIPTbody .= 'return false;'."\n";
                $SCRIPTbody .= '}else if (!checkCreditCard ($("#vCreditCardNumber").val(),$("#vCreditCardType").val())) {'."\n";
                $SCRIPTbody .= '$("#alertMsg").html("Please enter valid type and number");'."\n";
                $SCRIPTbody .= '$.mobile.changePage("#Dialog", "pop", true);'."\n";
                $SCRIPTbody .= 'return false;'."\n";
                $SCRIPTbody .= '}else if(!$("#vMonth").val()){'."\n";
                $SCRIPTbody .= '$("#alertMsg").html("Please choose expire month");'."\n";
                $SCRIPTbody .= '$.mobile.changePage("#Dialog", "pop", true);'."\n";
                $SCRIPTbody .= 'return false;'."\n";
                $SCRIPTbody .= '}else if(!$("#vYear").val()){'."\n";
                $SCRIPTbody .= '$("#alertMsg").html("Please choose expire year");'."\n";
                $SCRIPTbody .= '$.mobile.changePage("#Dialog", "pop", true);'."\n";
                $SCRIPTbody .= 'return false;'."\n";
                $SCRIPTbody .= '}else if(CheckDate(($("#vMonth").val()),($("#vYear").val())) == "invalid"){'."\n";                
                $SCRIPTbody .= '$("#alertMsg").html("Please enter valid month and year");'."\n";
                $SCRIPTbody .= '$.mobile.changePage("#Dialog", "pop", true);'."\n";
                $SCRIPTbody .= 'return false;'."\n";
                $SCRIPTbody .= '}else if(!$("#vCvv").val()){'."\n";
                $SCRIPTbody .= '$("#alertMsg").html("Please enter cvv number");'."\n";
                $SCRIPTbody .= '$.mobile.changePage("#Dialog", "pop", true);'."\n";
                $SCRIPTbody .= 'return false;'."\n";
                $SCRIPTbody .= '}else{'."\n";
                $SCRIPTbody .= 'var vFirstName = $("#vFirstName").val();'."\n";
                $SCRIPTbody .= 'var vLastName = $("#vLastName").val();'."\n";
                $SCRIPTbody .= 'var vEmail = $("#vEmail").val();'."\n";
                $SCRIPTbody .= 'var vHolderName = $("#vHolderName").val();'."\n";
                $SCRIPTbody .= 'var vCreditCardType = $("#vCreditCardType").val();'."\n";
                $SCRIPTbody .= 'var vCreditCardNumber = $("#vCreditCardNumber").val();'."\n";
                $SCRIPTbody .= 'var vMonth = $("#vMonth").val();'."\n";
                $SCRIPTbody .= 'var vYear = $("#vYear").val();'."\n";
                $SCRIPTbody .= 'var vCvv = $("#vCvv").val();'."\n";
                $SCRIPTbody .= 'var iClientId = $("#iClientId").val();'."\n";
                $SCRIPTbody .= 'var iApplicationId = $("#iApplicationId").val();'."\n";
                $SCRIPTbody .= 'var iAppTabId = $("#iAppTabId").val();'."\n";

                $url_payment = $this->data['base_url']."webservice?action=save_payment";
                $SCRIPTbody .= '$.mobile.loading( "show" );'."\n";
                $SCRIPTbody .= '$.ajax({'."\n";
                $SCRIPTbody .= 'url: "'.$url_payment.'",'."\n";
                $SCRIPTbody .= 'type: "GET",'."\n";
                $SCRIPTbody .= 'dataType: "jsonp",'."\n";
                $SCRIPTbody .= 'data:"vFirstName=" + vFirstName + "&vLastName=" + vLastName + "&vEmail=" + vEmail + "&vHolderName=" + vHolderName + "&vCreditCardType=" + vCreditCardType+ "&vCreditCardNumber=" + vCreditCardNumber+ "&vMonth=" + vMonth + "&vYear=" + vYear + "&vCvv=" + vCvv + "&fTotalPrice=" + totAmt + "&iClientId=" + iClientId + "&iApplicationId=" + iApplicationId+ "&iAppTabId=" + iAppTabId,'."\n";
                $SCRIPTbody .= 'crossDomain:true,'."\n";
                $SCRIPTbody .= 'success: function(result)'."\n";
                $SCRIPTbody .= '{'."\n";
                $SCRIPTbody .= '$("#vFirstName").val(" ");'."\n";
                $SCRIPTbody .= '$("#vLastName").val(" ");'."\n";
                $SCRIPTbody .= '$("#vEmail").val(" ");'."\n";
                $SCRIPTbody .= '$("#vHolderName").val(" ");'."\n";
                $SCRIPTbody .= '$("#vCreditCardType").val(" ");'."\n";
                $SCRIPTbody .= '$("#vCreditCardNumber").val(" ");'."\n";
                $SCRIPTbody .= '$("#vMonth").val(" ");'."\n";
                $SCRIPTbody .= '$("#vYear").val(" ");'."\n";
                $SCRIPTbody .= '$("#vCvv").val(" ");'."\n";
                $SCRIPTbody .= '$.mobile.loading( "hide" );'."\n";
                $SCRIPTbody .= 'if (result[0].msg == "Success") {'."\n";
                $SCRIPTbody .= 'save_detail(result[0].iFeePaymentId);'."\n";
                //$SCRIPTbody .= '$("#alertMsg").html("Thank you");'."\n";
                $SCRIPTbody .= '$.mobile.changePage("#payment_thanks");'."\n";
                $SCRIPTbody .= '} else {'."\n";
                $SCRIPTbody .= '$("#alertMsg").html("Error in save information");'."\n";
                $SCRIPTbody .= '$.mobile.changePage("#Dialog", "pop", true);'."\n";$SCRIPTbody .= ''."\n";
                $SCRIPTbody .= '}'."\n";
                $SCRIPTbody .= '}'."\n";
                $SCRIPTbody .= '});'."\n";
                $SCRIPTbody .= '}'."\n";
                $SCRIPTbody .= '}'."\n";

                $url_payment_dtl = $this->data['base_url']."webservice?action=save_payment_detail";

                $SCRIPTbody .= 'function save_detail(iFeePaymentId) {'."\n";
                $SCRIPTbody .= 'for(var i=0;i<amount_arr.length;i++){'."\n";
                $SCRIPTbody .= '$.ajax({'."\n";
                $SCRIPTbody .= 'url: "'.$url_payment_dtl.'",'."\n";
                $SCRIPTbody .= 'type: "GET",'."\n";
                $SCRIPTbody .= 'dataType: "jsonp",'."\n";
                $SCRIPTbody .= 'data: "iFeePaymentId=" + iFeePaymentId + "&vFeetype=" + itemname_arr[i] + "&fPrice=" + amount_arr[i],'."\n";
                $SCRIPTbody .= 'crossDomain: true,'."\n";
                $SCRIPTbody .= 'success: function (result) {'."\n";
                $SCRIPTbody .= 'if (result[0].msg == "Success") {'."\n";
                $SCRIPTbody .= '} else {'."\n";
                $SCRIPTbody .= '}'."\n";
                $SCRIPTbody .= '}'."\n";
                $SCRIPTbody .= '});'."\n";
                $SCRIPTbody .= '}'."\n";
                $SCRIPTbody .= '}'."\n";
                /*=================== End payment tab ======================*/

                /* =================== Start Twitter Post tab ====================*/
                $SCRIPTbody .= 'function twitterLogin(){'."\n";
                $SCRIPTbody .= '$("#fbShareMain").hide();'."\n";
                //$SCRIPTbody .= 'cb = window.plugins.childBrowser;'."\n";
                $SCRIPTbody .= 'if (localStorage.getItem(twitterKey) !== null) {'."\n";
                $SCRIPTbody .= 'Twitter.tweet();'."\n";
                $SCRIPTbody .= '} else {'."\n";
                $SCRIPTbody .= 'Twitter.init();'."\n";
                $SCRIPTbody .= '}'."\n";
                $SCRIPTbody .= '}'."\n";

                $SCRIPTbody .= 'function twitterTweet(){'."\n";
                $SCRIPTbody .= 'Twitter.tweet();'."\n";
                $SCRIPTbody .= '}'."\n";

                $SCRIPTbody .= 'function facebookLogin(){'."\n";
                $SCRIPTbody .= '$("#tweetPost").hide();'."\n";
                $SCRIPTbody .= 'app.init();'."\n";
                $SCRIPTbody .= '}'."\n";
        
                /* =================== End Twitter Post tab ====================*/

                /* =================== Start Event Detail page ====================*/
                if($pageID == 'event'){
                    $url_event = $this->data['base_url']."webservice?action=getEventDetail";
                    $SCRIPTbody .= 'function eventDetail(id) {'."\n";
                    $SCRIPTbody .= '$.ajax({'."\n";
                    $SCRIPTbody .= 'url: "'.$url_event.'",'."\n";
                    $SCRIPTbody .= 'dataType: "jsonp",'."\n";
                    $SCRIPTbody .= 'data: "iEventId=" + id,'."\n";
                    $SCRIPTbody .= 'crossDomain: true,'."\n";
                    $SCRIPTbody .= 'success: function (result) {'."\n";
                    $SCRIPTbody .= 'var html = " ";'."\n";
                    $SCRIPTbody .= ''."\n";
                    $SCRIPTbody .= ''."\n";
                    $SCRIPTbody .= ''."\n";
                    $SCRIPTbody .= ''."\n";
                    $SCRIPTbody .= ''."\n";
                    $SCRIPTbody .= ''."\n";
                    $SCRIPTbody .= ''."\n";
                    $SCRIPTbody .= ''."\n";
                    $SCRIPTbody .= ''."\n";
                    $SCRIPTbody .= ''."\n";
                }
                /* =================== End Event Detail page ====================*/
                   
        $dest = $this->data['base_download_path']."www-".$iApplicationId;
        $script_file = $dest.'/javascripts/script.js';
        $handle4 = fopen($script_file, 'w') or die('Cannot open file:  '.$script_file);
        fwrite($handle4, $SCRIPTbody);
        fclose($handle4);
        return $html_last;
    }
    
    function createHeader($i=0){
        $appinfo = $this->data['appdata']['activeTabs'];
        $appOtherInfo = $this->data['appdata']['appOtherInfo'][0];

        $activeTabs = $this->data['appdata']['activeTabs'][$i];
        $tabTYpe = $activeTabs['vTabType'];   
        $pageTypes = $this->data['appdata']['pageTypeArr'][''.$tabTYpe.''];

        $title = $appinfo[$i]['vTitle']; 
        $html = '';
        $html.= '<div data-role="header" id="hedbg" class="headerbg">'; 

        if($pageTypes != 'list'){
            $html.= '<h1 class="hedbglunch">'.$title.'</h1>';
            $html.= '<div class="bgcolor_hedlunch">&nbsp;</div>';
        }else{
            $html.= '<h1 class="hedbg">'.$title.'</h1>';
            $html.= '<div class="bgcolor_hed">&nbsp;</div>';
        }       
        
        if ($appOtherInfo['eBtnLayout'] == 'Left') {
            $html.= '<a style="background:#000;" href="#left-panel" data-theme="d" data-icon="arrow-r" data-iconpos="notext" data-shadow="false" data-iconshadow="false" class="ui-icon-nodisc">Open left panel</a>';
        } 
        $html.= '<a href="#default_menu" data-role="button" data-rel="">Back</a>';
        if ($appOtherInfo['eBtnLayout'] == 'Right') {
            $html.= '<a style="background:#000;" href="#right-panel" data-theme="d" data-icon="arrow-l" data-iconpos="notext" data-shadow="false" data-iconshadow="false" class="ui-icon-nodisc">Open right panel</a>';
        }
        $html.= '</div>';
        $html.= '<div style="clear:both;"></div>';

        return $html;
    }
    
    function createFooter($i=0){
        $appinfo = $this->data['appdata']['activeTabs'];
        $title = $appinfo[$i]['vTitle']; 
        $html = '';
        $appOtherInfo = $this->data['appdata']['appOtherInfo'][0];  

        if($appOtherInfo['eBtnLayout'] == 'Bottom'){
            $html.= '<div data-role="footer" class="footerpartmain" style="position:fixed;bottom:0;">';
            $html.= '<div id="demo">
                        <div id="owl-demo" style="width:100%;" class="owl-carousel">'
                            .$this->createFooterMenuBottom($i).
                        '</div> 
                    </div>
                </div>';
        }elseif ($appOtherInfo['eBtnLayout'] == 'Left') {
            $html.= '<div data-role="panel" id="left-panel" data-theme="d">'
                        .$this->createFooterMenuLeft($i).
                    '</div>';
        }elseif ($appOtherInfo['eBtnLayout'] == 'Right') {
            $html.= '<div data-role="panel" id="right-panel" data-display="push" data-position="right" data-theme="d">'
                        .$this->createFooterMenuRight($i).
                    '</div>';
        }
        return $html; 
    }

    function createFooterMenuLeft($i){
        $activeTabs = $this->data['appdata']['activeTabs'];
        $title = $appinfo[$i]['vTitle']; 
        $html = '';
        $html.= '<h2 class="sidepanelhd">Menu</h2>';
        $html.= '<ul class="navleftone">';
        for($j=0;$j<count($activeTabs);$j++){
            $pageID = str_replace(" ","_",$activeTabs[$j]['vTitle']);
            $pageID = strtolower($pageID);
            $html.= '<li ><a class="navlink" href="#'.$pageID.'_'.$j.'">'.$activeTabs[$j]['vTitle'].'</a></li>
            ';    
        }
        $html.='</ul>';
        return $html;
    }

    function createFooterMenuRight($i){
        $activeTabs = $this->data['appdata']['activeTabs'];
        $title = $appinfo[$i]['vTitle']; 
        $html = '';
        $html.= '<h2 class="sidepanelhd">Menu</h2>';
        $html.= '<ul class="navrightone">';
        for($j=0;$j<count($activeTabs);$j++){
            $pageID = str_replace(" ","_",$activeTabs[$j]['vTitle']);
            $pageID = strtolower($pageID);
            $html.= '<li ><a class="navlink" href="#'.$pageID.'_'.$j.'">'.$activeTabs[$j]['vTitle'].'</a></li>
            ';    
        }
        $html.='</ul>';
        return $html;
    }
    
    function createFooterMenuBottom($i){
        $activeTabs = $this->data['appdata']['activeTabs'];
        $title = $appinfo[$i]['vTitle']; 
        $html = '';
        
        for($j=0;$j<count($activeTabs);$j++){
            $html.= '<div class="item">';
            $pageID = str_replace(" ","_",$activeTabs[$j]['vTitle']);
            $pageID = strtolower($pageID);
            $html.= '<a class="mybg" href="#'.$pageID.'_'.$j.'"><span class="nav_icon"><img src="'.$activeTabs[$j]['vImage'].'" alt="'.$activeTabs[$j]['vTitle'].'"></span> <strong class="navtext">'.$activeTabs[$j]['vTitle'].'</strong></a><a class="bgtabcol" href="#'.$pageID.'_'.$j.'">&nbsp;</a>
            ';    
            $html.='</div>';
        }
        return $html;
    }
    
    function createBody($i=0){
        
        $activeTabs = $this->data['appdata']['activeTabs'];
        $title = $appinfo[$i]['vTitle']; 
        $html = '';
        
        $html.= '<div data-role="content">
                    <div id="midpartwrap">
                       '.$this->getMiddleContent($i).'
                    </div>
                </div>';
        return $html;
    }
    
    function getMiddleContent($i){
        $activeTabs = $this->data['appdata']['activeTabs'][$i];
        $iActiveId = $activeTabs['iAppTabId'];
        $tabTYpe = $activeTabs['vTabType'];   

        $client_info = $this->data['client_info'];
        //echo $tabTYpe."</br>";
        $pageTypes = $this->data['appdata']['pageTypeArr'][''.$tabTYpe.''];
        $pageID = str_replace(" ","_",$activeTabs['vTitle']);
        $pageID = strtolower($pageID);
        //echo $tabTYpe."==".$pageTypes."</br>";
        $html = '';
        switch($pageTypes){
            case "home":
                $iApplicationId = $this->data['iApplicationId'];
                $homeinfo = $this->preview_model->gettabwisehome($iApplicationId, $iActiveId);
                    $html.= '<div class="detail_part">';
                        $html.= '<div class="infomain">';
                            $html.= '<p>'.$homeinfo['tDescription'].'</p>';
                        $html.= '</div>';
                    $html.= '</div>';   
                break;
            case "payment":
                $iApplicationId = $this->data['iApplicationId'];
                $iClientId = $client_info['iClientId'];
                $paymentinfo = $this->preview_model->gettabwisepayment($iClientId, $iApplicationId, $iActiveId);
                
                if($paymentinfo){
                    $html.= '<div class="paypal_main">';
                        $html.= '<table class="pay_listing">';
                            $html.= '<tr>';
                                $html.= '<th>&nbsp;</th>';
                                $html.= '<th data-priority="1" style="width:38%">Fee Type</th>';
                                $html.= '<th data-priority="3">Price</th>';
                            $html.= '</tr>';
                            for($p=0;$p<count($paymentinfo);$p++){
                                $html.= '<tr>';
                                    $html.= '<td>';
                                        $html.= '<div data-role="fieldcontain" style="margin:0; padding:0;">';
                                            $html.= '<fieldset data-role="controlgroup">';
                                                $html.= '<input type="checkbox" name="itemfre'.$p.'" id="itemfre'.$p.'" amount="'.$paymentinfo[$p]["fPrice"].'" itemname="'.$paymentinfo[$p]["vFeetype"].'" class="custom itemfee" />';
                                                $html.= '<label for="itemfre'.$p.'">&nbsp;</label>';
                                            $html.= '</fieldset>';
                                        $html.= '</div>';
                                    $html.= '</td>';
                                    $html.= '<td>'.$paymentinfo[$p]["vFeetype"].'</td>';
                                    $html.= '<td>'.$paymentinfo[$p]["fPrice"].' GBP</td>';
                                $html.= '</tr>';
                            }
                        $html.= '</table>';
                        $html.= '<div class="totamt">Total Amount : <strong id="replaceAmt">0 GBP</strong></div>';
                        //$html.= '<a class="join_btn" href="#" data-role="button" data-inline="true">Pay Now</a>';
                        $html.= '<div class="payformmain" id="mainPayFrm" style="display:none;">';
                        $html.= '<input type="hidden" name="iClientId" id="iClientId" value="'.$iClientId.'" />';
                        $html.= '<input type="hidden" name="iApplicationId" id="iApplicationId" value="'.$iApplicationId.'" />';
                        $html.= '<input type="hidden" name="iAppTabId" id="iAppTabId" value="'.$iActiveId.'" />';
                            $html.= '<div data-role="fieldcontain">';
                                $html.= '<label for="vFirstName">First Name :</label>';
                                $html.= '<input type="text" name="vFirstName" id="vFirstName" value="" />';
                            $html.= '</div>';
                            $html.= '<div data-role="fieldcontain">';
                                $html.= '<label for="vLastName">Last Name :</label>';
                                $html.= '<input type="text" name="vLastName" id="vLastName" value="" />';
                            $html.= '</div>';
                            $html.= '<div data-role="fieldcontain">';
                                $html.= '<label for="vEmail">Email :</label>';
                                $html.= '<input type="email" name="vEmail" id="vEmail" value="" />';
                            $html.= '</div>';
                            $html.= '<div data-role="fieldcontain">';
                                $html.= '<label for="vHolderName">Holder Name :</label>';
                                $html.= '<input type="text" name="vHolderName" id="vHolderName" value="" />';
                            $html.= '</div>';
                            $html.= '<div data-role="fieldcontain">';
                                $html.= '<label for="vCreditCardType" class="select">Credit Card Type :</label>';
                                $html.= '<select name="vCreditCardType" id="vCreditCardType">';
                                    $html.= '<option value="">Choose card type</option>';
                                    $html.= '<option value="Visa">Visa Card</option>';
                                    $html.= '<option value="Master">Master Card</option>';
                                    $html.= '<option value="Credit">Credit Card</option>';
                                $html.= '</select>';
                            $html.= '</div>';
                            $html.= '<div data-role="fieldcontain">';
                                $html.= '<label for="vCreditCardNumber">Credit Card Number :</label>';
                                $html.= '<input type="text" name="vCreditCardNumber" id="vCreditCardNumber" value="" />';
                            $html.= '</div>';
                            $html.= '<div data-role="fieldcontain">';
                                    $html.= '<label for="vMonth" class="select">Expire Month :</label>';
                                    $html.= '<select name="vMonth" id="vMonth">';
                                        $html.= '<option value="">Choose Month</option>';
                                        $html.= '<option value="01">January</option>';
                                        $html.= '<option value="02">February</option>';
                                        $html.= '<option value="03">March</option>';
                                        $html.= '<option value="04">April</option>';
                                        $html.= '<option value="05">May</option>';
                                        $html.= '<option value="06">June</option>';
                                        $html.= '<option value="07">July</option>';
                                        $html.= '<option value="08">August</option>';
                                        $html.= '<option value="09">September</option>';
                                        $html.= '<option value="10">October</option>';
                                        $html.= '<option value="11">November</option>';
                                        $html.= '<option value="12">December</option>';
                                    $html.= '</select>';
                            $html.= '</div>';
                            $year = date('Y');
                            $exyear = $year + 25;
                            $html.= '<div data-role="fieldcontain">';
                                $html.= '<label for="vYear" class="select">Expire Year :</label>';
                                $html.= '<select name="vYear" id="vYear">';
                                    $html.= '<option value="">Choose Year</option>';
                                    for($q=$year; $q<$exyear;$q++){
                                        $html.= '<option value="'.$q.'">'.$q.'</option>';
                                    }
                                $html.= '</select>';
                            $html.= '</div>';
                            $html.= '<div data-role="fieldcontain">';
                                $html.= '<label for="vCvv">CVV :</label>';
                                $html.= '<input type="text" name="vCvv" id="vCvv" value="" />';
                            $html.= '</div>';
                            $html.= '<a class="join_btn" href="javascript:paynow();" data-role="button" data-inline="true">Pay Now</a>';
                        $html.= '</div>';
                    $html.= '</div>';    
                }else{
                    $html.= '<div class="no_data">No item available</div>';
                }                
                break;
            case "voicerecording":
                $html.= '<div class="disrecord"><p class="audiocl" id="audio_position"></p></div>';
                $html.= '<div class="voice">';
                    $html.= '<div class="recordbtn"><a href="javascript:captureAudio();" data-role="button">Record</a></div>';
                    $html.= '<div class="playbtn"><a href="javascript:playAudio();" data-role="button">Play </a></div>';
                    $html.= '<div class="sendvoicebtn"><a href="javascript:sendEmail();" data-role="button">Send</a></div>';
                    $html.= '<div id="idEmail" style="display:none;">parth.devmori@php2india.com</div>';
                    $html.= '<div id="idSubject" style="display:none;">Testing Email</div>';
                    $html.= '<div id="idDescription" style="display:none;"><p>Hi, This is testing email</p></div>';
                $html.= '</div>';
                break;
            case "form":

                    $iApplicationId = $this->data['iApplicationId'];
                    $categoty = $this->preview_model->gettabwisecategory($iApplicationId, $iActiveId);
                    // echo "<pre>";
                    // print_r($categoty);exit;
                    $html.= '<div data-role="fieldcontain" class="wrapmain">';
                        $html.= '<input type="hidden" name="iAppTabId_Mail" id="iAppTabId_Mail" value="'.$iActiveId.'"/>';
                        $html.= '<h2 class="signup">';
                            $html.= '<img src="images/form-icon.png" alt=""> <span> Sign up for our Newsletter</span>';
                        $html.= '</h2>';
                        $html.= '<div data-role="fieldcontain" class="ui-hide-label">';
                            $html.= '<label for="vMailName">Your Name :</label>';
                            $html.= '<input type="text" name="vMailName" id="vMailName" value="" placeholder="Your Name"/>';
                        $html.= '</div>';
                        $html.= '<div data-role="fieldcontain" class="ui-hide-label">';
                            $html.= '<label for="vMail">Your Email :</label>';
                            $html.= '<input type="text" name="vMail" id="vMail" value="" placeholder="Your Email"/>';
                        $html.= '</div>';
                        $html.= '<label for="iCategoryId" >Category :</label>';
                            $html.= '<select name="iCategoryId" id="iCategoryId">';
                            $html.= '<option value="">Choose category</option>';
                                for($k=0;$k<count($categoty);$k++){
                                    $iMailcategoryId = $categoty[$k]["iMailcategoryId"];
                                    $vName = $categoty[$k]["vName"];
                                    $html.= '<option value="'.$iMailcategoryId.'">'.$vName.'</option>';    
                                }
                            $html.= '</select>';
                        $html.= '<a class="join_btn" href="javascript:join_mailing();" data-role="button" data-inline="true">Join</a>';
                    $html.= '</div>'."\n";
                break;
            case "fanwall":
                    $html.= '<div data-role="fieldcontain" class="tellpart">';
                    $html.= '<h2 class="tell_hd">Login</h2>';
                    $html.= '<div class="inner_box">';
                    $html.= '<a class="join_btn" href="javascript:twitterLogin()" data-role="button" data-inline="true">Login With Twitter</a>';
                    $html.= '<a class="join_btn" href="javascript:facebookLogin()" data-role="button" data-inline="true">Login With Facebook</a>';
                    $html.= '</div>';
                    $html.= '</div>';

                    $html.= '<div data-role="fieldcontain" id="tweetPost" style="display:none" class="wrapmain">';
                    $html.= '<div data-role="fieldcontain" class="ui-hide-label">';
                    $html.= '<label for="tweet" class="yrtext">Your text :</label>';
                    $html.= '<textarea cols="40" rows="8" name="tweet" id="tweet"></textarea>';
                    $html.= '</div>';
                    $html.= '<a class="join_btn" href="javascript:twitterTweet();" data-role="button" data-inline="true">Tweet</a>';
                    $html.= '</div>';

                    $html.= '<div data-role="fieldcontain" id="fbShareMain" style="display:none" class="wrapmain">';
                    $html.= '<div data-role="fieldcontain" class="ui-hide-label">';
                    $html.= '<label for="fbShareTXT" class="yrtext">Your text :</label>';
                    $html.= '<textarea cols="40" rows="8" name="fbShareTXT" id="fbShareTXT"></textarea>';
                    $html.= '</div>';
                    $html.= '<a class="join_btn" href="javascript:void();" id="fbShareBTN" data-role="button" data-inline="true">Share</a>';
                    $html.= '</div>';

                break;
            case "list":
                    if($tabTYpe == 'Event'){
                        $eventlisting_data = $this->data['appdata']['appwisevents'][$iActiveId];
                        /*echo "<pre>";
                        print_r($eventlisting_data);exit;*/

                        if($eventlisting_data){
                            $html.= '<ul data-role="listview" data-inset="true" class="listradius" id="'.$pageID.'_list">';
                            $type = "getEventDetail";
                            for($j=0;$j<count($eventlisting_data);$j++){
                                $iEventId = $eventlisting_data[$j]['iEventId'];
                                if($j%2 == 0){                                    
                                    $html.= '<li class="list-odd-bg" onclick="eventDetailPage   ('.$iEventId.',\''.$type.'\');">
                                            <a class="listing_anr" href="">
                                                <img src="'.$eventlisting_data[$j]['vImage'].'" class="image_sp"/>
                                                <h2 class="hd_whitecolor">'.$eventlisting_data[$j]['vTitle'].'</h2>
                                                <p class="white_info">Start Date'.$eventlisting_data[$j]['dStartDate'].' '.$eventlisting_data[$j]['vStartTime'].'<br/>End Date'.$eventlisting_data[$j]['dEndDate'].' '.$eventlisting_data[$j]['vEndTime'].'</p>                                        
                                            </a>
                                        </li>';
                                }else{
                                    $html.= '<li class="list-even-bg" onclick="eventDetailPage('.$iEventId.',\''.$type.'\');">
                                            <a class="listing_anr" href="">
                                                <img src="'.$eventlisting_data[$j]['vImage'].'" class="image_sp"/>
                                                <h2 class="hd_lackcolor">'.$eventlisting_data[$j]['vTitle'].'</h2>
                                                <p class="black_info">Start Date'.$eventlisting_data[$j]['dStartDate'].' '.$eventlisting_data[$j]['vStartTime'].'<br/>End Date'.$eventlisting_data[$i]['dEndDate'].' '.$eventlisting_data[$i]['vEndTime'].'</p>                                        
                                            </a>
                                        </li>';    
                                }
    
                            }
                            $html.= '</ul>'; 
                        }else{
                            $html.= '<div class="no_data">No event found.</div>';    
                        }
                  
                    }elseif($tabTYpe == 'News'){
                        $allgooglenews = $this->data['appdata']['allgooglenews'][$iActiveId];
                        /*echo "<pre>";
                        print_r($allgooglenews);exit;*/
                        if($allgooglenews){
                            $html.= '<ul data-role="listview" data-inset="true" class="listradius" id="'.$pageID.'_list">';
                            for($j=0;$j<count($allgooglenews);$j++){
                                if($j%2 == 0){
                                    $html.= '<li class="list-odd-bg news_list" >
                                            <a class="listing_anr" href="">
                                                <img src="'.$allgooglenews[$j]->image->url.'" class="image_sp"/>
                                                <h2 class="hd_whitecolor">'.$allgooglenews[$j]->title.'</h2>
                                                <p class="white_info">'.$allgooglenews[$j]->content.'<br/>Published Date'.$allgooglenews[$i]->publishedDate.'</p>
                                            </a>
                                        </li>';           
                                }else{
                                    $html.= '<li class="list-even-bg news_list">
                                            <a class="listing_anr" href="">
                                                <img src="'.$allgooglenews[$j]->image->url.'" class="image_sp"/>
                                                <h2 class="hd_lackcolor">'.$allgooglenews[$j]->title.'</h2>
                                                <p class="black_info">'.$allgooglenews[$j]->content.'<br/>Published Date'.$allgooglenews[$j]->publishedDate.'</p>
                                            </a>
                                        </li>';  
                                }
                            }   
                            $html.= '</ul>';
                        }else{
                             $html.= '<div class="no_data">No news found.</div>';  
                        }
                        
                    }elseif($tabTYpe == 'RSS Feeds'){
                        
                        $allrssfeeds = $this->data['appdata']['allrssdata'][$iActiveId];
                        /*echo "<pre>";
                        print_r($allrssfeeds[0]['description']);exit;*/
                        if($allrssfeeds){
                            $html.= '<ul data-role="listview" data-inset="true" class="listradius" id="'.$pageID.'_list">';
                            for($j=0;$j<count($allrssfeeds);$j++){
                                if($j%2 == 0){
                                    $html.= '<li class="list-odd-bg rss_feeds_list">
                                            <a class="listing_anr" href="">
                                                <img src="'.$allrssfeeds[$j]['rssicon'].'" class="image_sp"/>
                                                <h2 class="hd_whitecolor">'.$allrssfeeds[$j]['title'].'</h2>
                                                <p class="white_info">Published Date'.$allrssfeeds[$j]['pubDate'].'</p>
                                                <div style="display:none">'.$allrssfeeds[$j]['description'].'</div>
                                            </a>

                                        </li>';           
                                }else{
                                    $html.= '<li class="list-even-bg rss_feeds_list">
                                            <a class="listing_anr" href="">
                                                <img src="'.$allrssfeeds[$j]['rssicon'].'" class="image_sp"/>
                                                <h2 class="hd_lackcolor">'.$allrssfeeds[$j]['title'].'</h2>
                                                <p class="black_info">Published Date'.$allrssfeeds[$j]['pubDate'].'</p>
                                                <div style="display:none">'.$allrssfeeds[$j]['description'].'</div>
                                            </a>
                                        </li>';  
                                }
    
                            }   
                            $html.= '</ul>';  
                        }else{
                            $html.= '<div class="no_data">No rss founds.</div>';  
                        }
                        
                    }elseif($tabTYpe == 'PDF'){
                        $allpdfdata = $this->data['appdata']['pdfdata'][$iActiveId];
                        
                        if($allpdfdata){
                                $html.= '<ul data-role="listview" data-inset="true" class="listradius" id="'.$pageID.'_list">';
                                for($j=0;$j<count($allpdfdata);$j++){
                                    if($j%2 == 0){
                                        $html.= '<li class="list-odd-bg">
                                                    <a class="" href="">
                                                    <h2 class="hd_whitecolor">'.$allpdfdata[$j]['vPdfTitle'].'</h2>';
                                                    
                                                    if($allpdfdata[$j]["vPdfFile"] !='' && $allpdfdata[$j]["vPdfUrl"] ==''){
                                                        
                                                        $vPdfFile = $this->data['base_upload']."pdfs/".$allpdfdata[$j]["iPdfId"]."/".$allpdfdata[$j]['vPdfFile'];
                                                        $html.= '<p class="white_info"><a href="'.$vPdfFile.'" target="_blank">'.$allpdfdata[$j]['vPdfFile'].'</a></p>';
                                                                    
                                                     }elseif($allpdfdata[$i]["vPdfFile"] =='' && $allpdfdata[$j]["vPdfUrl"] !=''){
                                                        
                                                        $html.= '<p class="white_info"><a href="'.$allpdfdata[$j]["vPdfUrl"].'" target="_blank">'.$allpdfdata[$j]["vPdfUrl"].'</a></p>';
                                                        
                                                     }else{
                                                        $html.= '<p class="white_info">---</p>';
                                                     }
                                                $html .='</a>'; 
                                        $html .='</li>';           
                                    }else{
                                        $html.= '<li class="list-even-bg">
                                                    <a class="" href="">
                                                    <h2 class="hd_whitecolor">'.$allpdfdata[$j]['vPdfTitle'].'</h2>';
                                                
                                                if($allpdfdata[$i]["vPdfFile"] !='' && $allpdfdata[$j]["vPdfUrl"] ==''){
                                                        
                                                        $vPdfFile = $this->data['base_upload']."pdfs/".$allpdfdata[$j]["iPdfId"]."/".$allpdfdata[$j]['vPdfFile'];
                                                        $html.= '<p class="white_info"><a href="'.$vPdfFile.'" target="_blank">'.$allpdfdata[$j]['vPdfFile'].'</a></p>';
                                                                    
                                                     }elseif($allpdfdata[$i]["vPdfFile"] =='' && $allpdfdata[$j]["vPdfUrl"] !=''){
                                                        
                                                        $html.= '<p class="white_info"><a href="'.$allpdfdata[$j]["vPdfUrl"].'" target="_blank">'.$allpdfdata[$j]["vPdfUrl"].'</a></p>';
                                                        
                                                     }else{
                                                        $html.= '<p class="white_info">---</p>';
                                                     }
                                                $html .='</a>'; 
                                        $html.= '</li>';  
                                    }
        
                                }   
                            
                            $html.= '</ul>'; 
                        }else{
                            
                            $html.= '<div class="no_data">No pdf founds.</div>';  
                            
                        }
                       
                    }elseif($tabTYpe == 'Location'){
                        $alllocationdata = $this->data['appdata']['locationdata'][$iActiveId];
                        
                        if($alllocationdata){
                            $html.= '<ul data-role="listview" data-inset="true" class="listradius" id="'.$pageID.'_list">';
                            for($j=0;$j<count($alllocationdata);$j++){
                                if($j%2 == 0){
                                    $html.= '<li class="list-odd-bg" onclick="showmap('.$alllocationdata[$j]['vLatitude'].','.$alllocationdata[$j]['vLongitude'].');" latid="'.$alllocationdata[$j]['vLatitude'].'" longid="'.$alllocationdata[$j]['vLongitude'].'">
                                                <a class="" href="">
                                                <h2 class="hd_whitecolor">'.$alllocationdata[$j]['vWebsite'].'</h2>';
                                                    $html.= '<p class="white_info">'.$alllocationdata[$i]['vEmail'].'</p>
                                                </a>';
                                    $html .='</li>';           
                                }else{
                                    $html.= '<li class="list-even-bg" onclick="showmap()" latid="'.$alllocationdata[$j]['vLatitude'].'" longid="'.$alllocationdata[$j]['vLongitude'].'">
                                                <a class="" href="">
                                                <h2 class="hd_whitecolor">'.$alllocationdata[$j]['vWebsite'].'</h2>';
                                                    $html.= '<p class="white_info">'.$alllocationdata[$i]['vEmail'].'</p>
                                                </a>';
                                    $html .='</li>';   
                                }
                            } 
                            $html.= '</ul>'; 
                        }else{
                            $html.= '<div class="no_data">No location founds.</div>';  
                        }
                           
                    }elseif($tabTYpe == 'Website'){

                        $appwiswebsite = $this->data['appdata']['appwiswebsite'][$iActiveId];
                        if($appwiswebsite){
                            $html.= '<ul data-role="listview" data-inset="true" class="listradius" id="'.$pageID.'_list">';
                            for($j=0;$j<count($appwiswebsite);$j++){
                                if($j%2 == 0){
                                    $html.= '<li class="list-odd-bg">
                                            <a class="listing_anr" href="">
                                                <img src="'.$appwiswebsite[$j]['vWebImage'].'" class="image_sp"/>
                                                <h2 class="hd_whitecolor">'.$appwiswebsite[$j]['vWebTitle'].'</h2>
                                                <p class="white_info"><a href="'.$appwiswebsite[$j]["vWebUrl"].'" target="_blank">'.$appwiswebsite[$j]['vWebUrl'].'</a></p>
                                            </a>
                                        </li>';           
                                }else{
                                    $html.= '<li class="list-even-bg">
                                            <a class="listing_anr" href="">
                                                <img src="'.$appwiswebsite[$j]['vWebImage'].'" class="image_sp"/>
                                                <h2 class="hd_lackcolor">'.$appwiswebsite[$j]['vWebTitle'].'</h2>
                                                <p class="white_info"><a href="'.$appwiswebsite[$j]["vWebUrl"].'" target="_blank">'.$appwiswebsite[$j]['vWebUrl'].'</a></p>
                                            </a>
                                        </li>';  
                                }
    
                            }   
                            
                            $html.= '</ul>'; 
                        }else{
                             $html.= '<div class="no_data">No website founds.</div>';  
                        }
                        
                    }elseif($tabTYpe == 'Podcast'){

                        $allpodcastdata = $this->data['appdata']['allpodcastdata'][$iActiveId];
                        #echo "<pre>"; description
                        #print_r($allpodcastdata);exit;
                        if($allpodcastdata){
                            $html.= '<ul data-role="listview" data-inset="true" class="listradius" id="'.$pageID.'_list">';
                            for($j=0;$j<count($allpodcastdata);$j++){
                                if($j%2 == 0){
                                    $html.= '<li class="list-odd-bg podcast_list">
                                            <a class="listing_anr" href="">  
                                                <img src="'.$allpodcastdata[$j]['vPodcastIcon'].'" class="image_sp"/>                                          
                                                <h2 class="hd_whitecolor">'.$allpodcastdata[$j]['title'].'</h2>
                                                <p class="white_info ppodcast">Published Date'.$allpodcastdata[$j]['pubDate'].'</p>
                                                <div style="display:none">'.$allpodcastdata[$j]['description'].'</div>
                                            </a>
                                        </li>';           
                                }else{
                                    $html.= '<li class="list-even-bg podcast_list">
                                            <a class="listing_anr" href="">
                                                <img src="'.$allpodcastdata[$j]['vPodcastIcon'].'" class="image_sp"/>
                                                <h2 class="hd_lackcolor">'.$allpodcastdata[$j]['title'].'</h2>
                                                <p class="black_info">Published Date'.$allpodcastdata[$j]['pubDate'].'</p>
                                                <div style="display:none">'.$allpodcastdata[$j]['description'].'</div>
                                            </a>
                                        </li>';  
                                }
    
                            }   
                            
                            $html.= '</ul>'; 
                        }else{
                            $html.= '<div class="no_data">No podcast founds.</div>';
                        }
                        
                    }else{
                            $html.= '<li>
                                <a href="">
                                    <img src="http://192.168.1.41/php/slb_new/uploads/Flag_of_Rashtriya_Swayamsevak_Sangh.png" />
                                    Spatial Unlimited
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="http://192.168.1.41/php/slb_new/uploads/Flag_of_Rashtriya_Swayamsevak_Sangh.png" />
                                    Google Maps API Examples
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="http://192.168.1.41/php/slb_new/uploads/Flag_of_Rashtriya_Swayamsevak_Sangh.png" />
                                    Jquery Mobile Examples
                                </a>
                            </li>';
                    }
                break;
            case "video":
                    $iApplicationId = $this->data['iApplicationId'];
                    
                    // Get video data
                    #echo $iApplicationId."<--->".$iAppTabId;exit;
                    $videolisting = $this->preview_model->getvideolisting($iApplicationId,$iActiveId);
                    #echo "<pre>";
                    #print_r($videolisting);
                    
                    
                    if($videolisting){
                        
                    
                    $videoxml =  $this->file_get_contents_curl('https://gdata.youtube.com/feeds/api/videos?q='.$videolisting["vChannelName"].'&orderby=published&start-index=11&max-results=50&v=2');
                    $videoArr = $this->xml2array($videoxml);
                    $mainvideoarr = $videoArr['feed']['entry'];
                    #echo "<pre>";
                    #print_r($mainvideoarr[0]);exit;
                    $finalVideoArr = array();
                    $videodateArr = array();
                    if($mainvideoarr){
                        if(count($mainvideoarr) > 0){
                            foreach($mainvideoarr as $key => $val){
                                $date = new DateTime($val['published']);
                                //$newDate = preg_replace("/(\d+)-(\d+)-(\d+)/","$1-$2-$3",$val['published']);
                                if($val['published']){
                                    $videodateArr[$key] = date("Y-m-d", strtotime($val['published']));    
                                }
                                
                                if($val['published']){
                                    #$finalVideoArr[$key]['publish_date'] = $date->format('F j\,Y');
                                    $finalVideoArr[$key]['publish_date'] = date("Y-m-d", strtotime($val['published']));  
                                    $finalVideoArr[$key]['videoimage'] = $val['media:group']['media:thumbnail']['2_attr']['url'];
                                    $finalVideoArr[$key]['videosrc'] = $val['media:group']['yt:videoid'];
                                    $finalVideoArr[$key]['title'] =$val['title'];
                                    $finalVideoArr[$key]['viewCount'] =$val['yt:statistics_attr']['viewCount'] ;
                                    $finalVideoArr[$key]['numDislikes'] =$val['yt:rating_attr']['numDislikes'] ;
                                    $finalVideoArr[$key]['numLikes'] =$val['yt:rating_attr']['numLikes'] ;
                                    $finalVideoArr[$key]['average_rating'] =$val['gd:rating_attr']['average'] ;
                                }
                                
                            }
                        }
                    }
                    
                    //echo "<pre>";
                    //print_r($finalVideoArr);exit;
                    
                        $this->data['appdata']['videodatas'][$iActiveId] =  $finalVideoArr;
                        #$this->data['appdata']['videodatas'][$iAppTabId] = $videolisting;    
                    }
                    
                    
                    #echo "<pre>";
                    #print_r($this->data['appdata']['videodatas']);
                    
                    $videolisting_data = $this->data['appdata']['videodatas'][$iActiveId];
                    //array_multisort($volume, SORT_DESC, $edition, SORT_ASC, $data);
                    #echo "<pre>";
                    #print_r($videolisting_data);exit; 
                                       
                    if(count($videolisting_data) > 0){
                        $tempdate = array();
                        $html.= '<div>';
                            $html.= '<ul>';
                                foreach($videolisting_data as $key=>$videodata){
                                    
                                    #echo "<pre>";
                                    #print_r($videodata);exit;
                                    
                                    if (!in_array($videodata['publish_date'], $tempdate)){
                                        $tempdate[] = $videodata['publish_date'];
                                        $html.= '<li data-role="list-divider" role="heading" class="ui-li-divider ui-bar-d ui-first-child">'.date("F j\,Y", strtotime($videodata['publish_date'])).'</li>';    
                                    }
                                    
                                    $html.= '<div style="text-align:center" class="oddrowbackground">
                                        <a href="#" onclick="videoDetailPage(\''.$videodata['videosrc'].'\',\''.$videodata['title'].'\');" class="ui-link"><img src="'.$videodata['videoimage'].'" width="320" height="200"></a><br>
                                        <div style="text-overflow: ellipsis;white-space: nowrap; overflow: hidden; text-align:center !important;"><strong>'.$videodata['title'].'</strong></div>
                                        <div class="ui-grid-b" style="margin-right:-2px; height:25px;">
                                            <div class="ui-block-a"><div class="ui-bar" style="height:15px; font-size:11px"><img src="images/play.png" width="12" height="12">'.$videodata['viewCount'].'</div></div>
                                            <div class="ui-block-b"><div class="ui-bar" style="height:15px; font-size:11px"><img src="images/thumbs.png" width="12" height="12">'.$videodata['average_rating'].'</div></div>
                                            <div class="ui-block-c"><div class="ui-bar" style="height:15px; font-size:11px"><img src="images/comment.png" width="12" height="12">'.$videodata['numLikes'].'</div></div>
                                        </div>	
                                    </div>';
                                    
                                }    
                            $html.= '</ul>';
                        $html.= '</div>';
                            
                    }else{
                        $html.= '<div class="no_data">No video founds.</div>'; 
                    }       
                break;
            case "content":
                
                $infotabdata = $this->data['appdata']['infotabdata'][$iActiveId];
               
                   $html.= '<div class="detail_part">';
                        $html.= '<div class="infomain">';
                            $html.= '<p>'.$infotabdata['tDescription'].'</p>';
                        $html.= '</div>';
                    $html.= '</div>';      
                break;
            
            case "notepad":
                
                $html.= '<iframe class="" type="text/html" width="100%" height="400" src="notes.html" frameborder="0"> </iframe>';
                break;
            
            case "gallery":
                $iApplicationId = $this->data['iApplicationId'];
                
                $gallerydetail = $this->preview_model->getgallerydetail($iApplicationId,$iActiveId);
                
                #echo "<pre>";
                #print_r($gallerydetail);exit;
                
                if($gallerydetail){
                    $maingalimagearr = array();
                    if($gallerydetail['eImageServiceType'] == 'Custom'){
                        $galleryimages = $this->preview_model->getgalleryimages($gallerydetail['iGalleryId']);
                        
                        foreach($galleryimages as $key=>$val){
                           $maingalimagearr[$key]['image'] = $this->data['base_upload']."gallery/".$val['iGalleryImageId']."/".$val['vGalleryImage']; 
                           $maingalimagearr[$key]['desc'] = $val['tDescription'];
                        }
                        #echo "<pre>";
                        #print_r($maingalimagearr);exit;
                        
                        if(count($maingalimagearr) > 0){
                            if($gallerydetail['eDisplayStyle'] == 'Grid'){
                                
                                $html.= '<div class="gallery">';
                                
                                foreach($maingalimagearr as $key=>$val){
                                    #echo "<pre>";
                                    #print_r($val);exit;
                                    $html.= '<div class="gallery_photo"><a href="'.$val['image'].'"><img src="'.$val['image'].'" alt="" width="135" height="80"></a></div>';    
                                }
                                $html.= '</div>';
                                
                           }else{
                                
                            }    
                        }else{
                            $html.= '<div class="no_data">No gallery images found.</div>'; 
                        }
                        
                        
                    }elseif($gallerydetail['eImageServiceType'] == 'Flicker'){
                        $vFlickerApi = $gallerydetail['vFlickerApi'];
                        $vFlickerEmail = $gallerydetail['vFlickerEmail'];
                        $eFlickerGalleryType = $gallerydetail['eFlickerGalleryType'];
                        
                        $f = new phpFlickr($vFlickerApi);
                        
                        $recent = $f->photos_getRecent();
                        $people_info = $f->people_findByEmail($vFlickerEmail);

                        $photo_stream  = array();
                        $photoset = array();
                        $user_photos = $f->people_getPhotos($people_info['id']);
                        
                        if($eFlickerGalleryType == 'Photsets'){
                            $user_photoset =  $f->photosets_getList($people_info['id']);
                            
                            foreach($user_photoset['photoset'] as $k => $v){
                            	$photo_details = $f->photosets_getPhotos($v['id']);
                            	$images = array();
                            	foreach ($photo_details['photoset']['photo'] as $key => $value) {
                            		$images[$key]['org_url'] = "http://farm".$value['farm'].".staticflickr.com/".$value['server']."/".$value['id']."_".$value['secret'].".jpg";
                            		$images[$key]['tumb_url'] = "http://farm".$value['farm'].".staticflickr.com/".$value['server']."/".$value['id']."_".$value['secret']."_t.jpg";
                            		$images[$key]['title'] = $value['title'];
                            	}
                            	$photoset[$k]['desc'] = $photo_details['photoset']['title'];
                                
                                
                                if($images){
                                    if($images[0]['tumb_url'] !=''){
                                        $photoset[$k]['image'] = $images[0]['tumb_url'];    
                                    }else{
                                        $photoset[$k]['image'] = $this->data['base_image']."noimg.png";
                                    }
                                        
                                }
                            	$photoset[$k]['photoset_images'] = $images;
                            }
                            
                            if(count($photoset) > 0){
                                $html.= '<ul data-role="listview" data-inset="true" class="listradius" id="'.$pageID.'_list">';
                                for($j=0;$j<count($photoset);$j++){
                                    if($j%2 == 0){
                                        $html.= '<li class="list-odd-bg" >
                                                <a class="listing_anr" href="">
                                                    <img src="'.$photoset[$j]['image'].'" class="image_sp"/>
                                                    <h2 class="hd_whitecolor">'.$photoset[$j]['desc'].'</h2>
                                                </a>
                                            </li>';           
                                    }else{
                                        $html.= '<li class="list-even-bg">
                                                <a class="listing_anr" href="">
                                                    <img src="'.$photoset[$j]['image'].'" class="image_sp"/>
                                                    <h2 class="hd_whitecolor">'.$photoset[$j]['desc'].'</h2>
                                                </a>
                                            </li>';  
                                    }
                                }   
                                $html.= '</ul>';
                                
                            }else{
                                $html.= '<div class="no_data">No photo set found.</div>'; 
                            }
                            
                            
                            #echo '<pre>';print_r($photoset);exit;
                            
                        }elseif($eFlickerGalleryType == 'Phtostream'){
                            #echo '<b>Photo Stream</b><br>';
                            foreach ($user_photos['photos']['photo'] as $key => $photo) {
                            	$photo_stream[$key]['desc'] = $photo['title'];
                            	$photo_stream[$key]['org_url'] = "http://farm".$photo['farm'].".staticflickr.com/".$photo['server']."/".$photo['id']."_".$photo['secret'].".jpg";
                            	$photo_stream[$key]['thumb_url'] = "http://farm".$photo['farm'].".staticflickr.com/".$photo['server']."/".$photo['id']."_".$photo['secret']."_t.jpg";
                            }
                            #echo '<pre>';print_r($photo_stream);exit;
                            
                            if(count($photo_stream) > 0){
                                for($j=0;$j<count($photo_stream);$j++){
                                    $html.= '<div class="gallery_photo"><img src="'.$photo_stream[$j]['org_url'].'" alt="" width="135" height="80"></div>';    
                                }
                            }else{
                                $html.= '<div class="no_data">No photo stream found.</div>';
                            }
                        }
                       
                        
                        
                        
                    }elseif($gallerydetail['eImageServiceType'] == 'Instagram'){
                     
                     if($gallerydetail['vInstagramEmail'] !=''){
                        $html.= '<iframe onload="" style="height: 800px;" id="iframecode" src="http://instaembedder.com/gallery.php?username='.$gallerydetail['vInstagramEmail'].'&amp;hashtag=&amp;width=80&amp;cols=3&amp;frame=1&amp;image_border=2&amp;rows=19&amp;cell_margin=10&amp;display_username=0&amp;likes=0&amp;comments=0&amp;date=0&amp;link=0&amp;caption=0&amp;color=gray" frameborder="0" scrolling="no" width="278"></iframe>';   
                     }else{
                        $html.= '<div class="no_data">No gallery found.</div>';
                     }   
                        
                    }
                }
                break;
                
            case "2tire":
            
            $iApplicationId = $this->data['iApplicationId'];
            $tiresectionArr = $this->preview_model->get2tiresectionlist($iApplicationId,$iActiveId);
            
            #echo "<pre>";
            #print_r($tiresectionArr);exit;
            
            
            if(count($tiresectionArr) > 0){
                $html.= '<ul data-role="listview" data-inset="true" class="listradius" id="'.$pageID.'_list">';
                
                for($j=0;$j<count($tiresectionArr);$j++){
                    
                    $html.= '<li data-role="list-divider" role="heading" class="ui-li-divider ui-bar-d ui-first-child">'.$tiresectionArr[$j]['vSection'].'</li>';
                    
                    $tirepagesArr = $this->preview_model->get2tirepageslist($tiresectionArr[$j]['vSection'],$iApplicationId,$iActiveId);
                    
                    if(count($tirepagesArr) > 0){
                        for($k=0;$k<count($tirepagesArr);$k++){
    
                            #echo "<pre>";
                            #print_r($tirepagesArr);exit;
                            
                            if($tirepagesArr[$k]['vThumbnilImage'] !=''){
                                $tirepagesArr[$k]['vThumbnilImage'] = $this->data['base_upload']."twotire/thumbimg/".$tirepagesArr[$k]['iTwotireInfotabId']."/thumb_".$tirepagesArr[$k]['vThumbnilImage']; 
                            }else{
                                $tirepagesArr[$k]['vThumbnilImage'] = $this->data['base_image']."noimg.png";
                            }
                            
                            if($tirepagesArr[$k]['vHeaderImage'] !=''){
                                $tirepagesArr[$k]['vHeaderImagemain'] = $this->data['base_upload']."twotire/headerimg/".$tirepagesArr[$k]['iTwotireInfotabId']."/".$tirepagesArr[$k]['vHeaderImage']; 
                            }
                            
                            if($tirepagesArr[$k]['vHeaderImage'] !=''){
                                $tirepagesArr[$k]['vHeaderImage'] = $this->data['base_upload']."twotire/headerimg/".$tirepagesArr[$k]['iTwotireInfotabId']."/thumb_".$tirepagesArr[$k]['vHeaderImage']; 
                            }
                            
                            
                            
                            #echo "<pre>";
                            #print_r($TiredataArr);exit;
                            
                            if($k%2 == 0){
                                $html.= '<li class="list-odd-bg 2tire_list" >
                                        <a class="listing_anr" href="">
                                            <img src="'.$tirepagesArr[$k]['vThumbnilImage'].'" class="image_sp"/>
                                            <h2 class="hd_whitecolor">'.$tirepagesArr[$k]['vName'].'</h2>
                                            <h5 style="display:none">'.$tirepagesArr[$k]['tDescription'].'</h5>
                                            <span style="display:none">'.$tirepagesArr[$k]['vHeaderImagemain'].'</span>
                                        </a>
                                    </li>';           
                            }else{
                                $html.= '<li class="list-even-bg 2tire_list">
                                        <a class="listing_anr" href="">
                                            <img src="'.$tirepagesArr[$k]['vThumbnilImage'].'" class="image_sp"/>
                                            <h2 class="hd_whitecolor">'.$tirepagesArr[$k]['vName'].'</h2>
                                            <h5 style="display:none">'.$tirepagesArr[$k]['tDescription'].'</h5>
                                            <span style="display:none">'.$tirepagesArr[$k]['vHeaderImagemain'].'</span>
                                        </a>
                                    </li>';  
                            }
                            
                        }
                    }
                    
                }   
                $html.= '</ul>'; 
            }else{
              $html.= '<div class="no_data">No info tab found.</div>';  
            }
            
            
            
            
            
            
            /*case "form":
                    $html.= '<div class="emailform">
                                <label for="basic">First Name:</label>
                                <input type="text" name="name" id="basic" value=""  />
                                <label for="basic">Last Name:</label>
                                <input type="text" name="name" id="basic" value=""  />
                                <label for="basic">Address:</label>
                                <input type="text" name="name" id="basic" value=""  />
                                <label for="basic">Street Address:</label>
                                <input type="text" name="name" id="basic" value=""  />
                                <label for="basic">City:</label>
                                <input type="text" name="name" id="basic" value=""  />
                                <label for="basic">State:</label>
                                <input type="text" name="name" id="basic" value=""  />
                                <label for="select-choice-0" class="select">Country:</label>
                                <select name="select-choice-0" id="select-choice-0">
                                   <option value="standard">Country</option>
                                   <option value="rush">Rush: 3 days</option>
                                   <option value="express">Express: next day</option>
                                   <option value="overnight">Overnight</option>
                                </select>
                                <label for="basic">Zip / Postal Code:</label>
                                <input type="text" name="name" id="basic" value=""  />
                                <label for="basic">Email:</label>
                                <input type="text" name="name" id="basic" value=""  />
                                <!--<input type="button" value="Button" />-->
                                <a class="btnbg" href="#iframe_page" data-role="button">Login</a> 
                             </div>';    
                break;*/
        }
        return $html;
    }

    /*function ajax_listing_write($pageID){
        $iApplicationId = $this->data['iApplicationId'];
        $dest = $this->data['base_download_path']."www-".$iApplicationId;
        $script_file = $dest.'/javascripts/script.js';
        
        switch($pageID){
            case "rss":
                    $url = $this->data['base_url'].'preview/eventlisting?iApplicationId='.$iApplicationId;
                    $SCRIPTbody.= '$( document ).ready(function() {
                    $("#'.$pageID.'").on("pageshow",function(){
                        $.ajax({
                        url: "'.$url.'",
                        type: "GET",
                        dataType: "json",
                        crossDomain:true,
                        success: function(result)
                        {

                        }
                    });
                    });
                });';
                $handle4 = fopen($script_file, 'w') or die('Cannot open file:  '.$script_file);
                fwrite($handle4, $SCRIPTbody);
                fclose($handle4);
            break;
        }
    }*/

    function getgooglenews($keyword){
        $keyword = urlencode($keyword);
        $url = "https://ajax.googleapis.com/ajax/services/search/news?"."v=1.0&q=".$keyword."&userip=192.168.1.41&rsz=8";
        
        // note how referer is set manually
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_REFERER, 'http://192.168.1.41/php/slb_new');
        $body = curl_exec($ch);
        curl_close($ch);
        
        // now, process the JSON string
        $json = json_decode($body);
       
        if(count($json->responseData->results) > 0){
            return $json->responseData->results;
        }else{
            return '';
        }
    }
    
    
    
    function xml2array($contents, $get_attributes=1, $priority = 'tag') {
        if(!$contents) return array();
    
        if(!function_exists('xml_parser_create')) {
            //print "'xml_parser_create()' function not found!";
            return array();
        }
        
    
        //Get the XML parser of PHP - PHP must have this module for the parser to work
        $parser = xml_parser_create('');
        xml_parser_set_option($parser, XML_OPTION_TARGET_ENCODING, "UTF-8"); # http://minutillo.com/steve/weblog/2004/6/17/php-xml-and-character-encodings-a-tale-of-sadness-rage-and-data-loss
        xml_parser_set_option($parser, XML_OPTION_CASE_FOLDING, 0);
        xml_parser_set_option($parser, XML_OPTION_SKIP_WHITE, 1);
        xml_parse_into_struct($parser, trim($contents), $xml_values);
        xml_parser_free($parser);
    
        if(!$xml_values) return;//Hmm...
    
        //Initializations
        $xml_array = array();
        $parents = array();
        $opened_tags = array();
        $arr = array();
    
        $current = &$xml_array; //Refference
    
        //Go through the tags.
        $repeated_tag_index = array();//Multiple tags with same name will be turned into an array
        foreach($xml_values as $data) {
            unset($attributes,$value);//Remove existing values, or there will be trouble
    
            //This command will extract these variables into the foreach scope
            // tag(string), type(string), level(int), attributes(array).
            extract($data);//We could use the array by itself, but this cooler.
    
            $result = array();
            $attributes_data = array();
            
            if(isset($value)) {
                if($priority == 'tag') $result = $value;
                else $result['value'] = $value; //Put the value in a assoc array if we are in the 'Attribute' mode
            }
    
            //Set the attributes too.
            if(isset($attributes) and $get_attributes) {
                foreach($attributes as $attr => $val) {
                    if($priority == 'tag') $attributes_data[$attr] = $val;
                    else $result['attr'][$attr] = $val; //Set all the attributes in a array called 'attr'
                }
            }
    
            //See tag status and do the needed.
            if($type == "open") {//The starting of the tag '<tag>'
                $parent[$level-1] = &$current;
                if(!is_array($current) or (!in_array($tag, array_keys($current)))) { //Insert New tag
                    $current[$tag] = $result;
                    if($attributes_data) $current[$tag. '_attr'] = $attributes_data;
                    $repeated_tag_index[$tag.'_'.$level] = 1;
    
                    $current = &$current[$tag];
    
                } else { //There was another element with the same tag name
    
                    if(isset($current[$tag][0])) {//If there is a 0th element it is already an array
                        $current[$tag][$repeated_tag_index[$tag.'_'.$level]] = $result;
                        $repeated_tag_index[$tag.'_'.$level]++;
                    } else {//This section will make the value an array if multiple tags with the same name appear together
                        $current[$tag] = array($current[$tag],$result);//This will combine the existing item and the new item together to make an array
                        $repeated_tag_index[$tag.'_'.$level] = 2;
                        
                        if(isset($current[$tag.'_attr'])) { //The attribute of the last(0th) tag must be moved as well
                            $current[$tag]['0_attr'] = $current[$tag.'_attr'];
                            unset($current[$tag.'_attr']);
                        }
    
                    }
                    $last_item_index = $repeated_tag_index[$tag.'_'.$level]-1;
                    $current = &$current[$tag][$last_item_index];
                }
    
            } elseif($type == "complete") { //Tags that ends in 1 line '<tag />'
                //See if the key is already taken.
                if(!isset($current[$tag])) { //New Key
                    $current[$tag] = $result;
                    $repeated_tag_index[$tag.'_'.$level] = 1;
                    if($priority == 'tag' and $attributes_data) $current[$tag. '_attr'] = $attributes_data;
    
                } else { //If taken, put all things inside a list(array)
                    if(isset($current[$tag][0]) and is_array($current[$tag])) {//If it is already an array...
    
                        // ...push the new element into that array.
                        $current[$tag][$repeated_tag_index[$tag.'_'.$level]] = $result;
                        
                        if($priority == 'tag' and $get_attributes and $attributes_data) {
                            $current[$tag][$repeated_tag_index[$tag.'_'.$level] . '_attr'] = $attributes_data;
                        }
                        $repeated_tag_index[$tag.'_'.$level]++;
    
                    } else { //If it is not an array...
                        $current[$tag] = array($current[$tag],$result); //...Make it an array using using the existing value and the new value
                        $repeated_tag_index[$tag.'_'.$level] = 1;
                        if($priority == 'tag' and $get_attributes) {
                            if(isset($current[$tag.'_attr'])) { //The attribute of the last(0th) tag must be moved as well
                                
                                $current[$tag]['0_attr'] = $current[$tag.'_attr'];
                                unset($current[$tag.'_attr']);
                            }
                            
                            if($attributes_data) {
                                $current[$tag][$repeated_tag_index[$tag.'_'.$level] . '_attr'] = $attributes_data;
                            }
                        }
                        $repeated_tag_index[$tag.'_'.$level]++; //0 and 1 index is already taken
                    }
                }
    
            } elseif($type == 'close') { //End of tag '</tag>'
                $current = &$parent[$level-1];
            }
        }
        
        return($xml_array);
    }
        
    function file_get_contents_curl($url) {
    	$ch = curl_init();
    	
    	curl_setopt($ch, CURLOPT_HEADER, 0);
    	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    	curl_setopt($ch, CURLOPT_URL, $url);
    	
    	$data = curl_exec($ch);
    	curl_close($ch);
    	
    	return $data;
    }
    
    
}
/* End of file Preview.php */
/* Location: ./application/controllers/Preview.php */
?>