<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Preview extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('preview_model', '', TRUE);
        $this->load->library('rssparser');    
    }    

    function index()
    {
        //echo ROOTPATH_DOWNLOAD;exit;
        $this->data['tpl_name']= "view-app-step5.tpl";
        $iApplicationId = $this->uri->segment(3); 
        $this->data['tab_cnt'] =$this->get_appfeature_count($iApplicationId);       
        $this->data['iApplicationId'] = $iApplicationId; 
        
        

        //########################### START: ALL DESIGN DATA GET HERE  ###########################
        $activeTabs = $this->preview_model->getactivetabs($iApplicationId);
        $iconbackground = $this->preview_model->geticonbackground($iApplicationId);
        $iconcolorId = $this->preview_model->geticoncolor($iApplicationId);
        /*$pageTypeArr1 = $this->preview_model->getTabTypeArr();*/
        
        
        //########################### START ALL DATA GET HERE  ###########################
        
        foreach($activeTabs AS $key=>$tabArr){
            
            
            $iAppTabId = $tabArr['iAppTabId'];
            
            
            $appwisevents = $this->preview_model->getappwiseevents($iApplicationId,$iAppTabId);
            // echo "<pre>";
            // print_r($appwisevents);exit;
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
            
            // echo "<pre>";
            // print_r($this->data['appdata']['appwisevents']);exit;
           
            $appwisnews = $this->preview_model->getappwisenews($iApplicationId,$iAppTabId);
            
            #echo "<pre>";
            #print_r($appwisnews);
    
            if($appwisnews[0]['eGoogleNews'] == 'Yes' && $appwisnews[0]['vGoogleNewsKeyWords'] != ''){
                $keyword = $appwisnews[0]['vGoogleNewsKeyWords'];
                $allgooglenews = $this->getgooglenews($keyword);
                $this->data['appdata']['allgooglenews'][$iAppTabId] = $allgooglenews;
            }
            
            
            
            $appwiseRssInfo = $this->preview_model->gerappwiseRssfeed($iApplicationId,$iAppTabId);
            
            #echo "<pre>";
            #print_r($this->data['base_image']);
    
            if($appwiseRssInfo['vRSSURL'] !=''){
                
                if($appwiseRssInfo['vIcon'] !=''){
                    $appwiseRssInfo['vIcon'] = $this->data['base_upload']."rss/".$appwiseRssInfo['iRSSId']."/".$appwiseRssInfo['vIcon'];
                }else{
                    $appwiseRssInfo['vIcon'] = $this->data['base_image']."deafault_rss.png";
                }
                
                $rssdata = $this->rssparser->set_feed_url($appwiseRssInfo['vRSSURL'])->set_cache_life(30)->getFeed(12);
                
                foreach($rssdata as $rsskey=>$rssvalue){
                    $rssdata[$rsskey]['rssicon'] = $appwiseRssInfo['vIcon'];
                }
               
                $this->data['appdata']['allrssdata'][$iAppTabId] = $rssdata;
            }
           
             
          
            $appwiseinfotab = $this->preview_model->appwiseinfodata($iApplicationId,$iAppTabId);
            
            /*echo "<pre>";
            print_r($appwiseinfotab);exit;*/
            
            if($appwiseinfotab){
                $this->data['appdata']['infotabdata'][$iAppTabId] = $appwiseinfotab;
            }
            /*echo "<pre>";
            print_r($appwiseinfotab);exit;*/
            
                        
            $videolisting = $this->preview_model->getvideolisting($iApplicationId,$iAppTabId);
            
            
            
            if($videolisting){
                $this->data['appdata']['videodatas'][$iAppTabId] = $videolisting;    
            }
            
           
            
            $appwisepdfdata = $this->preview_model->appwisepdfdata($iApplicationId,$iAppTabId);
            
            #echo "<pre>";
            #print_r($appwisepdfdata);
            if($appwisepdfdata){
                $this->data['appdata']['pdfdata'][$iAppTabId] = $appwisepdfdata;
            }
            
            
            #$appwismallingslist = $this->preview_model->getappwisemallingslist($iApplicationId,$iAppTabId);
            
            $appwislocationlist = $this->preview_model->getappwislocationlist($iApplicationId,$iAppTabId);
            
            if($appwislocationlist){
                $this->data['appdata']['locationdata'][$iAppTabId] = $appwislocationlist;
            }
            
            
            
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
            
            
            
            $appwisepodcastInfo = $this->preview_model->gerappwisePodcast($iApplicationId,$iAppTabId);
            
            #echo "<pre>";
            #print_r($appwisepodcastInfo);
    
            if($appwisepodcastInfo['vPodcastRssUrl'] !=''){
                
                if($appwisepodcastInfo['vPodcastIcon'] !=''){
                    $appwisepodcastInfo['vPodcastIcon'] = $this->data['base_upload']."podcast/".$appwisepodcastInfo['iPodcastId']."/".$appwisepodcastInfo['vPodcastIcon'];
                }else{
                    $appwisepodcastInfo['vPodcastIcon'] = $this->data['base_image']."noimg.png";
                }
                
                $podcastdata = $this->rssparser->set_feed_url($appwisepodcastInfo['vPodcastRssUrl'])->set_cache_life(30)->getFeed(12);
                
                foreach($podcastdata as $podkey=>$podvalue){
                    $podcastdata[$rsskey]['rssicon'] = $appwisepodcastInfo['vPodcastIcon'];
                }
               
                $this->data['appdata']['allpodcastdata'][$iAppTabId] = $podcastdata;
            }
            
            
            
            $appwisevoicerecordingInfo = $this->preview_model->gerappwisevoicerecording($iApplicationId,$iAppTabId);
            
            if($appwisevoicerecordingInfo){
                $this->data['appdata']['allvoicerecorddata'][$iAppTabId] = $appwisevoicerecordingInfo;    
            }
           
        }

        // echo "<pre>";
        // print_r($this->data['appdata']);exit;
        
        //########################### END ALL DATA GET HERE  ###########################
        
        

        /*if($iconcolorId[0]['iIconcolorId'] != ''){
            foreach($activeTabs AS $key=>$val){
                $activeTabs[$key]['iIconcolorId'] = $iconcolorId[0]['iIconcolorId'];
                if($activeTabs[$key]['vImage'] !=''){
                    $activeTabs[$key]['vImage'] = $this->data['base_upload']."tab_icon/".$activeTabs[$key]['iIconcolorId']."/".$activeTabs[$key]['vImage'];    
                }
            }    
        } */
        
        #echo "<pre>";
        #print_r($activeTabs);exit;
        
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
            
            if($tabwisemainbackgroundimage){
                foreach($tabwisemainbackgroundimage as $bgkey=>$backimage){
                    
                    if($backimage['iAppTabId'] == $activeTabs[$key]['iAppTabId']){
                        if($backimage['eType'] == 'Mobile'){
                            if($backimage['vImage'] !=''){
                                $backgroundimageArr[$key]['mobileimage'] = $this->data['base_upload']."background_image/".$backimage['iBackgroundimgId']."/".$backimage['vImage'];
                                $activeTabs[$key]['mobileimage']= $this->data['base_upload']."background_image/".$backimage['iBackgroundimgId']."/".$backimage['vImage'];
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
                                $backgroundimageArr[$key]['tabletimage'] = $this->data['base_upload']."background_image/".$backimage['iBackgroundimgId']."/".$backimage['vImage'];
                                $activeTabs[$key]['tabletimage'] = $this->data['base_upload']."background_image/".$backimage['iBackgroundimgId']."/".$backimage['vImage'];
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
        
        
        $this->data['appdata']['activeTabs'] = $activeTabs;                // GET TAB WISE ALL DATA

        // echo "<pre>";
        // print_r($activeTabs);exit;
        
        $appotherinfo = $this->preview_model->getappotherinfo($iApplicationId);
        
        if($appotherinfo[0]['eBtnLayout'] ==''){
            $appotherinfo[0]['eBtnLayout'] = 'Bottom';
        }

        if($appotherinfo){
            if($appotherinfo[0]['tabbackground'] !=''){
                $appotherinfo[0]['tabbackground'] = $this->data['base_upload']."tab_btn_background/".$appotherinfo[0]['iBackgroundId']."/".$appotherinfo[0]['tabbackground'];
            }else{
                $appotherinfo[0]['iBackgroundId'] = 1;
                $appotherinfo[0]['tabbackground'] = 'TB1.png';
                $appotherinfo[0]['tabbackground'] = $this->data['base_upload']."tab_btn_background/".$appotherinfo[0]['iBackgroundId']."/".$appotherinfo[0]['tabbackground'];
            }
            
            if($appotherinfo[0]['lunch_header'] !=''){
                $appotherinfo[0]['lunch_header'] = $this->data['base_upload']."lunch_header/".$appotherinfo[0]['iLunchheaderId']."/".$appotherinfo[0]['lunch_header'];
            }else{
                $appotherinfo[0]['lunch_header'] = $this->data['base_image']."no_heade.png";
            }
            
            if($appotherinfo[0]['global_header'] !=''){
                $appotherinfo[0]['global_header'] = $this->data['base_upload']."lunch_header/".$appotherinfo[0]['iGlobalHeaderId']."/".$appotherinfo[0]['global_header'];
            }else{
                $appotherinfo[0]['global_header'] = $this->data['base_image']."no_heade.png";
            }
        }
        
         #echo "<pre>";
         #print_r($appotherinfo);exit;
        
        $this->data['appdata']['appOtherInfo'] = $appotherinfo;         
        
        
        
        
        //GET ALL OTHER DATA OF DESING 
        
        $layout = $appotherinfo[0]['eBtnLayout'];
        
        $layoutArr = array(
          "Bottom"  => "www-4",
          "Top"  => "www-1",
          "Left"  => "www-3",
          "Right"  => "www-2"
        );
        
        $pageTypeArr = array(
          "Home"  => "home",
          "Event"  => "list",
          "Fanwall"  => "home",
          "Information"  => "content",
          "Mailinglist"  => "home",
          "News"  => "list",
          "Notepad"  => "home",
          "PDF"  => "list",
          "Podcast"  => "list",
          "RSS Feeds"  => "list",   
          "Voice Recording"  => "home",
          "Website"  => "list",
          "YouTube"  => "video",
          "Location"  => "list"
        );

        $this->data['appdata']['pageTypeArr'] = $pageTypeArr;
        
        if(!is_dir('downloads/')){
            @mkdir('downloads/', 0777);
        }

        $src = $this->data['base_download_path']."alltemplate/".$layoutArr[$layout]."";
        
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
        //echo $appInfo['lunch_header'];exit;
        // echo "<pre>";
        // print_r($appInfo);exit;
        if($appInfo['tabbackground'] !=''){
            $CSSbody = str_replace("##TAB_BACKGROUND_IMAGE##",$appInfo['tabbackground'],$CSSbody);
        }else{
            $CSSbody = str_replace("##TAB_BACKGROUND_IMAGE##",'../images/tab_default.jpg',$CSSbody);
        }

        if($appInfo['vTabTexColor'] !=''){
            $CSSbody = str_replace("##TAB_TEXT_COLOR##",$appInfo['vTabTexColor'],$CSSbody);
        }else{
            $CSSbody = str_replace("##TAB_TEXT_COLOR##",'#FFFFFF',$CSSbody);
        }

        if($appInfo['lunch_header'] !=''){
            $CSSbody = str_replace("##GLOBAL_HEADER_BACKGROUND_IMAGE##",$appInfo['lunch_header'],$CSSbody);
        }else{
            $CSSbody = str_replace("##GLOBAL_HEADER_BACKGROUND_IMAGE##",'../images/header_default.jpg',$CSSbody);
        }
        
        
        if($appInfo['vGlobalTintColor'] !=''){
            $CSSbody = str_replace("##GLOBAL_TEXT_COLOR##",$appInfo['vGlobalTintColor'],$CSSbody);
        }else{
            $CSSbody = str_replace("##GLOBAL_TEXT_COLOR##",'#FFFFFF',$CSSbody);
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
            /*echo "<pre>";
            print_r($this->data['appdata']['appOtherInfo']);exit;*/
            $html_last.= '<div data-role="page" id="default_menu">';
            $html_last.= '<div data-role="header" id="hedbg" class="headerbg">
                            <div class="defaulthedbg">
                                <ul>';
                                    if($this->data['appdata']['appOtherInfo'][0]['eCallBtn'] == 'Yes')
                                        $html_last.= '<li><a href="#"><span><img src="images/callus.png" alt=""></span> <span>Call Us</span></a></li>';
                                    else
                                        $html_last.= '<li>&nbsp;</li>';
                                    if($this->data['appdata']['appOtherInfo'][0]['eDirectionBtn'] == 'Yes')
                                        $html_last.= '<li><a href="#"><span><img src="images/directions.png" alt=""></span> <span>Directions</span></a></li>';
                                    else
                                        $html_last.= '<li>&nbsp;</li>';
                                    if($this->data['appdata']['appOtherInfo'][0]['eTellFriendBtn'] == 'Yes')
                                        $html_last.= '<li><a href="#"><span><img src="images/sharefriend.png" alt=""></span> <span>Tell Friend</span></a></li>';
                                    else
                                        $html_last.= '<li>&nbsp;</li>';
                                $html_last.= '</ul>
                            </div>                            
                        </div>
                        <div style="clear:both;"></div>
                        <div data-role="content" style="display:none;">
                            <div id="midpartwrap">
                                &nbsp;                  
                            </div>
                        </div>';
            $html_last.= $this->createFooter();
            $html_last.= '</div>';


        for($k=0;$k<count($activeTabs);$k++){            
            $pageID = str_replace(" ","_",$activeTabs[$k]['vTitle']);
            $pageID = strtolower($pageID);
            
            $iApplicationId = $this->data['iApplicationId'];
            $dest = $this->data['base_download_path']."www-".$iApplicationId;
            $script_file = $dest.'/javascripts/script.js';

            if($activeTabs[$k]['mobileimage'] != ''){
                $mobileimage = $activeTabs[$k]['mobileimage'];
            }else{
                
            }
            if($mobileimage){
                $SCRIPTbody .= '$(document).on("pageshow", "#'.$pageID.'_'.$k.'",function (data) {
                    $("body").css("background", "url('.$mobileimage.')");
                    $("body").css("background-size", "100% 100%");
                });';    
            }else{

            }
            $html_last.='<div data-role="page" id="'.$pageID.'_'.$k.'">
                            '.$this->createHeader($k).'
                            <div style="clear:both;"></div>
                            '.$this->createBody($k).'
                            
                        </div>'."\n\n";
        };

        $html_last.= '<div data-role="page" id="all_detail">';
            $html_last.= '<div data-role="header" id="hedbg" class="headerbg">
                            <h1 class="hedbg">&nbsp;</h1>
                            <div class="bgcolor_hed">&nbsp;</div>
                        </div>
                        <div style="clear:both;"></div>
                        <div data-role="content" style="display:none;">
                            <div id="all_detail_main">
                                &nbsp;                  
                            </div>
                        </div>
                    </div>';

        $html_last.= '<div data-role="page" id="map_container">';
            $html_last.= '<div data-role="header" id="hedbg" class="headerbg">
                            <h1 class="hedbg">&nbsp;</h1>
                            <div class="bgcolor_hed">&nbsp;</div>
                        </div>
                        <div style="clear:both;"></div>
                        <div data-role="content" style="display:none;">
                            <div id="map_containerdiv" >
                                &nbsp;                  
                            </div>
                        </div>
                    </div>';

        //'.$this->createFooter($k).'
        $handle4 = fopen($script_file, 'w') or die('Cannot open file:  '.$script_file);
        fwrite($handle4, $SCRIPTbody);
        fclose($handle4);
        return $html_last;
    }
    
    function createHeader($i=0){
        $appinfo = $this->data['appdata']['activeTabs'];
        $title = $appinfo[$i]['vTitle']; 
        $html = '';
        $html.= '<div data-role="header" id="hedbg" class="headerbg">';	
        $html.= '<a href="#default_menu" data-role="button" data-rel="">Back</a>';
        $html.= '<h1 class="hedbg">'.$title.'</h1>';
        $html.= '<div class="bgcolor_hed">&nbsp;</div>';
        $html.= '</div>';
        $html.= '<div style="clear:both;"></div>';
        return $html;
    }
    
    function createFooter($i=0){
        $appinfo = $this->data['appdata']['activeTabs'];
        $title = $appinfo[$i]['vTitle']; 
        $html = '';
        $html.= '<div data-role="footer" class="footerpartmain">
                    <div data-role="navbar" data-grid="d" data-position="fixed" class="menuside">'
                        .$this->createFooterMenu($i).
                    '</div> 
                </div>';
        return $html;
    }

    
    function createFooterMenu($i){
        $activeTabs = $this->data['appdata']['activeTabs'];
        $title = $appinfo[$i]['vTitle']; 
        $html = '';
        if(count($activeTabs) < 5){
            $perDIVwidth = '25%';    
        }else{
            $perDIVwidth = '20%';    
        }
        $html.= '<ul class="footer_hight">';
        for($j=0;$j<count($activeTabs);$j++){
            $pageID = str_replace(" ","_",$activeTabs[$j]['vTitle']);
            $pageID = strtolower($pageID);
            $html.= '<li style="width:'.$perDIVwidth.'"><a class="mybg" href="#'.$pageID.'_'.$j.'"><span class="nav_icon"><img src="'.$activeTabs[$j]['vImage'].'" alt="'.$activeTabs[$j]['vTitle'].'"></span> <strong class="navtext">'.$activeTabs[$j]['vTitle'].'</strong></a></li>
            ';    
        }
        $html.='</ul>';
        $html.= '<div class="bgnavup">';
        for($j=0;$j<count($activeTabs);$j++){
            $pageID = str_replace(" ","_",$activeTabs[$j]['vTitle']);
            $pageID = strtolower($pageID);
            
            $html.= '<a class="upbg" href="#'.$pageID.'_'.$j.'"></a>';
        }
        $html.= '</div>';
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
        //echo $tabTYpe."</br>";
        $pageTypes = $this->data['appdata']['pageTypeArr'][''.$tabTYpe.''];
        $pageID = str_replace(" ","_",$activeTabs['vTitle']);
        $pageID = strtolower($pageID);
        //echo $tabTYpe."==".$pageTypes."</br>";
        $html = '';
        switch($pageTypes){
            case "home":
                    $html.= '&nbsp;';    
                break;
            case "list":
                    $html.= '<ul data-role="listview" data-inset="true" class="listradius" id="'.$pageID.'_list">';
                    if($tabTYpe == 'Event'){
                        
                        #echo "<pre>";
                        #print_r($this->data);exit;
                        $eventlisting_data = $this->data['appdata']['appwisevents'][$iActiveId];
                        for($j=0;$j<count($eventlisting_data);$j++){
                            if($j%2 == 0){
                                $html.= '<li class="list-odd-bg">
                                        <a class="listing_anr" href="">
                                            <img src="'.$eventlisting_data[$j]['vImage'].'" class="image_sp"/>
                                            <h2 class="hd_whitecolor">'.$eventlisting_data[$j]['vTitle'].'</h2>
                                            <p class="white_info">Start Date'.$eventlisting_data[$j]['dStartDate'].' '.$eventlisting_data[$j]['vStartTime'].'<br/>End Date'.$eventlisting_data[$j]['dEndDate'].' '.$eventlisting_data[$j]['vEndTime'].'</p>                                        
                                        </a>
                                    </li>';
                            }else{
                                $html.= '<li class="list-even-bg">
                                        <a class="listing_anr" href="">
                                            <img src="'.$eventlisting_data[$j]['vImage'].'" class="image_sp"/>
                                            <h2 class="hd_lackcolor">'.$eventlisting_data[$j]['vTitle'].'</h2>
                                            <p class="black_info">Start Date'.$eventlisting_data[$j]['dStartDate'].' '.$eventlisting_data[$j]['vStartTime'].'<br/>End Date'.$eventlisting_data[$i]['dEndDate'].' '.$eventlisting_data[$i]['vEndTime'].'</p>                                        
                                        </a>
                                    </li>';    
                            }

                        }
                    }elseif($tabTYpe == 'News'){
                        $allgooglenews = $this->data['appdata']['allgooglenews'][$iActiveId];
                        
                        for($j=0;$j<count($allgooglenews);$j++){
                            if($j%2 == 0){
                                $html.= '<li class="list-odd-bg">
                                        <a class="listing_anr" href="">
                                            <img src="'.$allgooglenews[$j]->image->url.'" class="image_sp"/>
                                            <h2 class="hd_whitecolor">'.$allgooglenews[$j]->title.'</h2>
                                            <p class="white_info">'.$allgooglenews[$j]->content.'<br/>Published Date'.$allgooglenews[$i]->publishedDate.'</p>
                                        </a>
                                    </li>';           
                            }else{
                                $html.= '<li class="list-even-bg">
                                        <a class="listing_anr" href="">
                                            <img src="'.$allgooglenews[$j]->image->url.'" class="image_sp"/>
                                            <h2 class="hd_lackcolor">'.$allgooglenews[$j]->title.'</h2>
                                            <p class="black_info">'.$allgooglenews[$j]->content.'<br/>Published Date'.$allgooglenews[$j]->publishedDate.'</p>
                                        </a>
                                    </li>';  
                            }
                        }   
                    }elseif($tabTYpe == 'RSS Feeds'){

                        $allrssfeeds = $this->data['appdata']['allrssdata'][$iActiveId];
                        for($j=0;$j<count($allrssfeeds);$j++){
                            if($j%2 == 0){
                                $html.= '<li class="list-odd-bg">
                                        <a class="listing_anr" href="">
                                            <img src="'.$allrssfeeds[$j]['rssicon'].'" class="image_sp"/>
                                            <h2 class="hd_whitecolor">'.$allrssfeeds[$j]['title'].'</h2>
                                            <p class="white_info">'.$allrssdata[$j]['description'].'<br/>Published Date'.$allrssfeeds[$j]['pubDate'].'</p>
                                        </a>
                                    </li>';           
                            }else{
                                $html.= '<li class="list-even-bg">
                                        <a class="listing_anr" href="">
                                            <img src="'.$allrssfeeds[$j]['rssicon'].'" class="image_sp"/>
                                            <h2 class="hd_lackcolor">'.$allrssfeeds[$j]['title'].'</h2>
                                            <p class="black_info">'.$allrssdata[$j]['description'].'<br/>Published Date'.$allrssfeeds[$j]['pubDate'].'</p>
                                        </a>
                                    </li>';  
                            }

                        }   
                    }elseif($tabTYpe == 'PDF'){
                        $allpdfdata = $this->data['appdata']['pdfdata'][$iActiveId];
                        
                        for($j=0;$j<count($allpdfdata);$j++){
                            if($j%2 == 0){
                                $html.= '<li class="list-odd-bg">
                                            <h2 class="hd_whitecolor">'.$allpdfdata[$j]['vPdfTitle'].'</h2>';
                                            
                                            if($allpdfdata[$j]["vPdfFile"] !='' && $allpdfdata[$j]["vPdfUrl"] ==''){
                                                
                                                $vPdfFile = $this->data['base_upload']."pdfs/".$allpdfdata[$j]["iPdfId"]."/".$allpdfdata[$j]['vPdfFile'];
                                                $html.= '<p class="white_info"><a href="'.$vPdfFile.'" target="_blank">'.$allpdfdata[$j]['vPdfFile'].'</a></p>';
                                                            
                                             }elseif($allpdfdata[$i]["vPdfFile"] =='' && $allpdfdata[$j]["vPdfUrl"] !=''){
                                                
                                                $html.= '<p class="white_info"><a href="'.$allpdfdata[$j]["vPdfUrl"].'" target="_blank">'.$allpdfdata[$j]["vPdfUrl"].'</a></p>';
                                                
                                             }else{
                                                $html.= '<p class="white_info">---</p>';
                                             }
                                 
                                $html .='</li>';           
                            }else{
                                $html.= '<li class="list-even-bg">
                                            <h2 class="hd_whitecolor">'.$allpdfdata[$j]['vPdfTitle'].'</h2>';
                                        
                                        if($allpdfdata[$i]["vPdfFile"] !='' && $allpdfdata[$j]["vPdfUrl"] ==''){
                                                
                                                $vPdfFile = $this->data['base_upload']."pdfs/".$allpdfdata[$j]["iPdfId"]."/".$allpdfdata[$j]['vPdfFile'];
                                                $html.= '<p class="white_info"><a href="'.$vPdfFile.'" target="_blank">'.$allpdfdata[$j]['vPdfFile'].'</a></p>';
                                                            
                                             }elseif($allpdfdata[$i]["vPdfFile"] =='' && $allpdfdata[$j]["vPdfUrl"] !=''){
                                                
                                                $html.= '<p class="white_info"><a href="'.$allpdfdata[$j]["vPdfUrl"].'" target="_blank">'.$allpdfdata[$j]["vPdfUrl"].'</a></p>';
                                                
                                             }else{
                                                $html.= '<p class="white_info">---</p>';
                                             }
                                $html.= '</li>';  
                            }

                        }   
                    }elseif($tabTYpe == 'Location'){
                        $alllocationdata = $this->data['appdata']['locationdata'][$iActiveId];                      
                        for($j=0;$j<count($alllocationdata);$j++){
                            if($j%2 == 0){
                                $html.= '<li class="list-odd-bg">
                                            <h2 class="hd_whitecolor">'.$alllocationdata[$j]['vWebsite'].'</h2>';
                                                $html.= '<p class="white_info">'.$alllocationdata[$i]['vEmail'].'</p>';
                                $html .='</li>';           
                            }else{
                                $html.= '<li class="list-even-bg">
                                            <h2 class="hd_whitecolor">'.$alllocationdata[$j]['vWebsite'].'</h2>';
                                                $html.= '<p class="white_info">'.$alllocationdata[$i]['vEmail'].'</p>';
                                $html .='</li>';   
                            }
                        }   
                    }elseif($tabTYpe == 'Website'){

                        $appwiswebsite = $this->data['appdata']['appwiswebsite'][$iActiveId];

                        for($j=0;$j<count($appwiswebsite);$j++){
                            if($j%2 == 0){
                                $html.= '<li class="list-odd-bg">
                                        <a class="listing_anr" href="">
                                            <img src="'.$appwiswebsite[$j]['vWebImage'].'" class="image_sp"/>
                                            <h2 class="hd_whitecolor">'.$appwiswebsite[$j]['vWebTitle'].'</h2>
                                            <p class="white_info">'.$appwiswebsite[$j]['vWebUrl'].'</p>
                                        </a>
                                    </li>';           
                            }else{
                                $html.= '<li class="list-even-bg">
                                        <a class="listing_anr" href="">
                                            <img src="'.$appwiswebsite[$j]['rssicon'].'" class="image_sp"/>
                                            <h2 class="hd_lackcolor">'.$appwiswebsite[$j]['title'].'</h2>
                                            <p class="black_info">'.$appwiswebsite[$j]['vWebUrl'].'</p>
                                        </a>
                                    </li>';  
                            }

                        }   
                    }elseif($tabTYpe == 'Podcast'){

                        $allpodcastdata = $this->data['appdata']['allpodcastdata'][$iActiveId];
                        for($j=0;$j<count($allpodcastdata);$j++){
                            if($j%2 == 0){
                                $html.= '<li class="list-odd-bg">
                                        <a class="listing_anr" href="">                                            
                                            <h2 class="hd_whitecolor">'.$allpodcastdata[$j]['title'].'</h2>
                                            <p class="white_info ppodcast">Published Date'.$allpodcastdata[$j]['pubDate'].'</p>
                                        </a>
                                    </li>';           
                            }else{
                                $html.= '<li class="list-even-bg">
                                        <a class="listing_anr" href="">
                                            <img src="'.$allpodcastdata[$j]['rssicon'].'" class="image_sp"/>
                                            <h2 class="hd_lackcolor">'.$allpodcastdata[$j]['title'].'</h2>
                                            <p class="black_info">Published Date'.$allpodcastdata[$j]['pubDate'].'</p>
                                        </a>
                                    </li>';  
                            }

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
                    $html.= '</ul>';   
                break;
            case "video":
                    $videolisting_data = $this->data['appdata']['videodatas'][$iActiveId]; 
                   
                    if($videolisting_data['tDescription'] !=''){
                        $html.= '<iframe class="youtube-player" type="text/html" width="100%" height="476.5" src="'.$videolisting_data['tDescription'].'?html5=1" frameborder="0"> </iframe>';    
                    }else{
                        $html.= '<div class="detail_part">';
                        $html.= '<div class="infomain">';
                            $html.= '<p>No video found.</p>';
                        $html.= '</div>';
                    $html.= '</div>'; 
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
            case "form":
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
                break;
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
}
/* End of file Preview.php */
/* Location: ./application/controllers/Preview.php */
?>