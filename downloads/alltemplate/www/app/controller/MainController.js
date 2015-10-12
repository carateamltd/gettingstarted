Ext.define('MyApp.controller.MainController', {
    extend: 'Ext.app.Controller',
    requires: [
        'MyApp.services.RemoteService',
        'Ext.ux.localization.view.SelectFieldLocalization'
    ],
    config: {
        refs: {
            mainView: 'mainview',
            homeView: 'homeview',
            youTubeView: 'youtube',
            youtubeNavi: 'youtubenavi',
            playVideoView: 'playvideo',
            loyalitiNavi: 'loyalitinavi',
            loyalitiView: 'loyalitiview',
            loyalityDetailView: 'loyalitydetail',
            orderDetailView: 'orderdetailview',
            itemDetailsView: 'itemdetailsview',
            showOrderView: 'showorderview',
            gallaryView: 'gallaryview',
            gallaryNaviView: 'gallarynaviview',
            gallaryListView: 'gallarylistview',
            websiteNavi: 'websitenavi',
            websitelistView: 'websitelistview',
            socialMediaView: 'socialmediaview',
            pdfListView: "pdflistview",
            pdfNavi: "pdfnavi",
            customView: 'customview',
            qrNavi: 'qrnavi',
            qrListView: 'qrlistview',
            rssNavi: 'rssnavi',
            rssListView: 'rsslistview',
            eventNavi: 'eventnavi',
            eventListView: 'eventlistview',
            notepadNavi: 'notepadnavi',
           	menuNavi: 'menunavi',
           // menuView: 'menuview',
            newsNavi: 'newsnavi',
            contactNavi: 'contactview',
            newsList: 'newslist',
            voiceRecording: 'voicerecording',
            reservationNavi: 'reservationnavi',
            scheduleReservationView: 'schedulereservation',
            servicesView: 'servicesview',
            timeView: 'timeview',
            customerOrderDetailView: 'customerorderdetailview',
            confirmView: 'confirmview',
            detailForm: 'detailform',
            arroundNavi: 'arroundnavi',
            arroundusList: 'arrounduslist',
            locationNavi: 'locationnavi',
            locationListView: 'locationlist',
            contactView: 'contactview',
            mailingListView: 'mailinglistview',
            messageView: 'messageview',
            downloadList: 'downloadlist',
            partnerViewList: 'partnerview',
            mortgageCalculator: 'mortgagecalculator',
            scannerView: 'scannerview',
            appointmentView: 'appointmentview',
            quoteView: 'quoteview',
            orderHistory: 'orderhistory',
            newarrivalView: 'newarrivalview',
            newarrivalNavi: 'newarrivalnavi',
            donationView: 'donationview',
            catelogNavi: 'catelognavi',
            catelogView: 'catelogview',
            testimonialView: 'testimonialview',
            reView: 'review',
            ticketInfoView: 'ticketinfoview',
            ecommarceView: 'ecommarceview',
            ecommarceNavi: 'ecommarcenavi',
            ecommarceDetails: 'ecommarcedetails',
            serviceNavi: 'servicenavi',
            serviceTabView: 'serviceview',
            blogNavi: 'blognavi',
            blogView: 'blogview',
            menuDayNavi: 'menudaynavi',
            locationList: 'locationlist list[itemId=locationListId]',
            size_ItemList: 'itemdetailsview list[itemId=sizeitemListID]',
            option_ItemList: 'itemdetailsview list[itemId=optionListid]',
            submitOrderBtnId: 'orderdetailview button[itemId=submitorderId]',
            placeOrderBtnId: 'showorderview button[itemId=placeorderId]',
            CarouselBtnId: 'coverview  carousel[itemId=carid]',
            addNoteBtn: 'notepadnavi  button[itemId=addNoteBtnId]',
            saveNoteBtn: 'notepadnavi  button[itemId=saveNoteBtnID]',
            scheduleBtnID: 'reservationview  button[itemId=ScheduleReservationBtnID]',
            reservationview_segmentBtnId: 'reservationview  segmentedbutton[itemId=segmentedbtnid]',
            arrounduslist_segmentBtnId: 'arrounduslist  segmentedbutton[itemId=arroundsegmentedbtnid]',
            loyality_Sharing_Btn: 'loyalitinavi  button[itemId=sharingId]',
            messages_Sharing_Btn: 'messageview  button[itemId=msgsharingId]',
           // menu_MenuDayBtn: 'menuview  image[itemId=menuBtnDayId]',
            gallary_ShareBtn: 'gallarynaviview  button[itemId=galleryShareBtnid]',
            msg_DeleteBtn: 'messageview  button[itemId=msgsharingId]',
            appointment_FormPanel: 'appointmentview  formpanel[itemId=appointmentformid]',
            testimonial_SubmitBtnid: 'testimonialview  button[itemId=testimonialsubmitbtnid]',
            review_BtnId: 'review  button[itemId=reviewconfirmbtnid]',
            ecommarch_SearchBtnId: 'ecommarceview  button[itemId=ecommarcesearchbtnid]',
            ecommarceDetails_SizeList: 'ecommarcedetails  list[itemId=commerceSizeListid]',
            scientificCalculatorView: 'scientificcalculatorview',
            donationNavi: 'donationnavi',
            orderNavi: 'ordernavi',
            customViewNavi: 'customview',
            customListView: 'list[itemId=infoList]'
        },
        control: {
            mainView: {
//                activate: 'onMainViewActivate',
                initialize: 'onMainViewActivate'
            },
            ecommarceNavi: {
                push: 'onEcommerceNaviViewPush',
                pop: 'onEcommerceNaviViewpop'
            },
            homeView: {
                activate: 'onHomeActivate'
            },
            youTubeView: {
                itemtap: 'onYouTubeListTap'
            },
            youtubeNavi: {
                activate: 'onVideosListInitialize'
            },
            playVideoView: {
                onCancle: 'onCancleTap'
            },
            loyalitiNavi: {
                push: 'onLoyalityNaviViewPush',
                pop: 'onLoyalityNaviViewPop',
                popToRoot: 'onLoyalityNaviViewPopToRoot',
                activate: 'onLoyalitiNaviActivate'
            },
            loyalitiView: {
                activate: 'onLoyalityActivate',
                itemtap: 'onLoyalitiTap'
            },
            loyalityDetailView: {
                onSecretSubmitTap: 'onSecretSubmitTap'
            },
            orderHistory: {
                deactivate: 'onShowOrderDeactivate'
            },
            itemDetailsView: {
                onAddOrderTap: 'onAddOrderBtnTap'
            },
            showOrderView: {
                deactivate: 'onShowOrderDeactivate',
                activate: 'onShowOrderactivate',
                itemtap: 'onSubmitDetailTap'
            },
            customerOrderDetailView: {
                onSubmitTap: 'onCustomerSubmitBtnTap'
            },
            gallaryNaviView: {
                push: 'onGallaryNaviPush',
                pop: 'onGallaryNaviPop',
                activate: 'onGallaryActivates'
            },
            gallaryView: {
                itemtap: 'onGallaryTap',
                activate: 'onGallaryActivates'
            },
             newarrivalNavi: {
                activate: 'onArrivalViewActivate'
            },
            gallaryListView: {
                itemtap: 'onGallaryListViewTap'
            },
            websiteNavi: {
                activate: 'onWebsitListActivates'
            },
            websitelistView: {
                itemtap: 'WebsiteListTap'
            },
            socialMediaView: {
                activate: 'onSocialActivates',
                itemtap: 'onSocialSiteListTap'
            },
            pdfNavi: {
                activate: 'onPdfNaviActivate'
            },
            pdfListView: {
                itemtap: 'onPdfListTap'
            },
            customView: {
                activate: 'onCustomActivate'
            },
            qrNavi: {
                activate: 'onQRViewActivate'
            },
            qrListView: {
                itemtap: 'onQrListTap'
            },
            rssNavi: {
//                activate: 'onRssNaviViewActivate',
            },
            rssListView: {
                activate: 'onRssNaviViewActivate',
                itemtap: 'onRssListTap'
            },
            eventNavi: {
                activate: 'onEventActivated',
                popToRoot: 'onEventNaviViewPopToRoot'
            },
            eventListView: {
                itemtap: 'onEventListTap'
            },
            addNoteBtn: {
                tap: 'onNotePad_AddBtnTap'
            },
            saveNoteBtn: {
                tap: 'onNotePad_SaveBtnTap'
            },
            notepadNavi: {
                push: 'onNoteNaviViewPush',
                pop: 'onNoteNaviViewPop',
                activate: 'onNotepadNaviActivate'
            },
          /*  menuView: {
                activate: 'onOrderListActivate',
                itemtap: 'onMenuListTap',
                onMenuArrowTap: 'onMenu_MenuDayBtnTap'
            },*/
            newsNavi: {
                activate: 'onNewsActivated'
            },
            contactNavi: {
                activate: 'onContactActivated'
            },
            newsList: {
                itemtap: 'onNewsListTap'
            },
            voiceRecording: {
                activate: 'onVoiceRecordingActivated'
            },
            reservationNavi: {
                activate: 'onReservationNaviActivated',
                popToRoot: 'onReservationNaviViewPopToRoot'
            },
            scheduleReservationView: {
                itemtap: 'onScheduleReservationListTap'
            },
            servicesView: {
                itemtap: 'onServiceListTap'
            },
            timeView: {
                onBookTap: 'onBookTap'
            },
            confirmView: {
                onConfirmBtn: 'onConfirmBtnTap'
            },
            detailForm: {
                onConfirmBooking: 'onConfirmBookingBtnTap'
            },
            arroundNavi: {
                activate: 'onArroundusActivated'
            },
            arroundusList: {
                activate: 'onArroundusActivated',
                itemtap: 'onArroundListTap'
            },
            locationNavi: {
                activate: 'onLocationActivated'
            },
            locationList: {
                itemtap: 'onLocationListTap'
            },
            locationListView: {
            	activate: 'onLocationActivated'
            },
            mortgageCalculator: {
                onCalucalate: 'onCalucalateTap',
                activate: 'onMortgageCalculatorActivate'
            },
            scheduleBtnID: {
                tap: 'onScheduleBtnID'
            },
            reservationview_segmentBtnId: {
                toggle: 'onSegmentTap'
            },
            arrounduslist_segmentBtnId: {
                toggle: 'onArroundSegmentTap'
            },
            ordernavi_CarBtnTap: {
                tap: 'onCartBtnTap'
            },
            ordernavi_HistoryBtnTap: {
                tap: 'onOrderHistoryBtnTap'
            },
            contactView: {
                onSubmitTap: 'onSubmitTap'
            },
            mailingListView: {
                onSubmitTap: 'onSubscribtionBtnTap',
                activate: 'onMailingListViewActivate'
            },
            loyality_Sharing_Btn: {
                tap: 'onLoyalityShareTap'
            },
            messageView: {
                itemtap: 'onMessagesListTap',
                activate: 'onMessageViewActivate'
            },
            orderview_MenuDayBtn: {
                tap: 'onOrder_MenuDayBtnTap'
            },
            menu_MenuDayBtn: {
                tap: 'onMenu_MenuDayBtnTap'
            },
            gallary_ShareBtn: {
                tap: "onGallary_ShareBtnTap"
            },
            msg_DeleteBtn: {
                tap: 'onMessageDeleteBtnTap'
            },
            downloadList: {
                itemtap: 'onDownlistTap'
            },
            partnerViewList: {
                itemtap: 'onDownlistTap'
            },
            scannerView: {
                onScan: 'onScanTap',
                activate: 'onScannerViewActivate'
            },
            appointmentView: {
                onConfirmTap: 'onAppointmentConfirmBtnTap',
                activate: 'onAppointmentViewActivate'
            },
            quoteView: {
                onQuoteSubmitTap: 'onQuoteSubmitTap',
                activate: 'onQuoteViewActivate'
            },
            size_ItemList: {
                itemtap: 'onSizeItemListTap'
            },
            option_ItemList: {
                itemtap: 'onOptionItemListTap'
            },
            newarrivalView: {
               itemtap: 'onNewArrivalListTap'
            },
            donationView: {
                onSubmitTap: "onOrgnizationSubmitBtnTap"
            },

            testimonialView: {
                activate: 'onTestimonialViewActivate'
            },
            testimonial_SubmitBtnid: {
                tap: 'onTestimonialSubmitBtnTap'
            },
            review_BtnId: {
                tap: 'onReviewBtnTap'
            },
            catelogView: {
                itemtap: 'onCatelogListTap'
            },
            appointmentView:{
                activate: 'onAppointmentViewActivate'
            },
            ticketInfoView: {
                activate: 'onTicketInfoViewActivate'
            },
            ecommarch_SearchBtnId: {
                tap: 'onEcommarceSearchBtnTap'
            },
            ecommarceView: {
                itemtap: 'onEcommarceSerchListTap'
            },
            ecommarceDetails: {
                onBuyTest: "onBuyBtnTap"
            },
            ecommarceDetails_SizeList: {
                itemtap: 'onEcommarceSizeListTap'
            },
            ecommarceview_CartBtn: {
                tap: 'ecommarceview_CartBtnTap'
            },
            serviceNavi: {
                activate: 'onServiceNaviActivate'
            },
            serviceTabView: {
                itemtap: 'onServiceTabListTap'
            },
            blogNavi: {
                activate: 'onBlogNaviActivate'
            },
            blogView: {
                itemtap: 'onBlogListTap'
            },
            menuDayNavi: {
                activate: 'onMenu_MenuDayBtnTap'
            },
//            showOrderBtnId:{
//            	tap:'onShowOrderBtnTap'
//            },
//            placeOrderBtnId:{
//            	tap:'onPlaceOrderBtnTap'
//            }
			menuNavi: {
				activate: 'onMenuNaviActivate'
			},
			scientificCalculatorView: {
				activate: 'onScientificCalculatorViewActivate'
			},
			reView: {
				activate: 'onReViewActivate'
			},
			catelogNavi: {
				activate: 'onCatelogNaviActivate'
			},
			donationNavi: {
				activate: 'onDonationNaviActivate'
			},
			orderNavi: {
				activate: 'onOrderNaviActivate'
			},
			customListView: {
                itemtap: 'onCustomListTap',
                activate: 'onCustomActivate'
            }
        }
    },
    slideLeftTransition: {
        type: 'slide',
        direction: 'left'
    },
    slideRightTransition: {
        type: 'slide',
        direction: 'right'
    },
    launch: function () {
        console.log('launch fn enter')
    },
    init: function () {
        console.log('init fn enter');
    },
    onMainViewActivate: function (component, options) {
        var me = this;
        me.appreance();
//        appMask()
//        var url = URLConstants.URL + 'action=easyapps_total_show_tabs&iApplicationId=' + TextConstants.ApplicationId;
//        MyApp.services.RemoteService.remoteCall(url,
//                function success(Response) {
//                    var tabs = Ext.ComponentQuery.query('mainview')[0];
//                    console.log(tabs);
//                    console.log(Response);
////                    var length = Response.features_details.length;
////                    var length = Response.appfeature.length;
////                    var tab_arr = ['home', 'Event', 'Mailinglist', 'PDF', 'RSSFeeds', 'Website',
////                        'YouTube', 'Location', 'Gallery', 'AroundUs', 'SocialMedia',
////                        'QrCode', 'ContactUs', 'Menu', 'Order', 'Reservation', 'Loyalty',
////                        'Custom', 'Notepad', 'VoiceRecorder', 'News'];
//                    var DynamicPanel = [
//                        {
//                            xtype: 'homeview',
//                            title: 'Accueil',
//                            layout: 'fit',
////                            tabCls:'icnhomeTab',
//                            iconCls: 'homeCls',
//                            iconMask: true
//                        },
//                        {
//                            xtype: 'eventnavi',
//                            title: 'Event',
////                            tabCls: 'eventTab',
//                            iconCls: 'eventCls',
//                            iconMask: true
//                        },
//                        {
//                            xtype: 'eventnavi',
//                            title: 'Mailinglist',
////                            tabCls: 'mailinglistTab',
//                            iconCls: 'mailinglistCls',
//                            iconMask: true
//                        },
//                        {
//                            xtype: 'pdfnavi',
//                            title: 'PDF',
////                            tabCls: 'pdfTab',
//                            iconCls: 'pdfCls',
//                            iconMask: true
//                        },
//                        {
//                            xtype: 'rssnavi',
//                            title: 'Rss List',
//                            tab: {
//                                cls: 'rssTab',
//                            },
//                            iconCls: 'rssCls',
//                            iconMask: true
//                        },
//                        {
//                            xtype: 'websitenavi',
//                            title: 'WebSite',
//                            tab: {
//                                cls: 'websiteTab',
//                            },
//                            iconCls: 'websiteCls',
//                            iconMask: true
//                        },
//                        {
//                            xtype: 'youtubenavi',
//                            title: 'Youtube',
//                            layout: 'fit',
//                            tab: {
//                                cls: 'youtubeTab',
//                            },
//                            iconCls: 'youtubeCls',
//                            iconMask: true
//                        },
//                        {
//                            xtype: 'arroundnavi',
//                            title: 'Location',
//                            tab: {
//                                cls: 'locationTab',
//                            },
//                            iconCls: 'locationCls',
//                            iconMask: true
//                        }, {
//                            xtype: 'gallarynaviview',
//                            title: 'Gallérie',
//                            tab: {
//                                cls: 'gallaryTab',
//                            },
//                            iconCls: 'gallaryCls',
//                            iconMask: true
//                        },
//                        {
//                            xtype: 'arroundnavi',
//                            title: 'Arround Us',
//                            tab: {
//                                cls: 'arroundusTab',
//                            },
//                            iconCls: 'arroundusCls',
//                            iconMask: true
//                        },
//                        {
//                            xtype: 'socialmediaview',
//                            title: 'Social',
//                            layout: 'fit',
//                            tab: {
//                                cls: 'socialsiteTab',
//                            },
//                            iconCls: 'socialsiteCls',
//                            iconMask: true
//                        },
//                        {
//                            xtype: 'qrnavi',
//                            title: 'QR List',
//                            tab: {
//                                cls: 'qrTab',
//                            },
//                            iconCls: 'qrCls',
//                            iconMask: true
//                        },
//                        {
//                            xtype: 'customview',
//                            title: 'Custom',
//                            layout: 'fit',
//                            tab: {
//                                cls: 'customTab',
//                            },
//                            iconCls: 'customCls',
//                            iconMask: true
//                        },
//                        {
//                            xtype: 'menunavi',
//                            title: 'Menu',
//                            tab: {
//                                cls: 'menuTab',
//                            },
//                            iconCls: 'menuCls',
//                            iconMask: true
//                        },
//                        {
//                            xtype: 'ordernavi',
//                            title: 'Commande',
//                            tab: {
//                                cls: 'orderTab',
//                            },
//                            iconCls: 'orderCls',
//                            iconMask: true
//                        },
//                        {
//                            xtype: 'reservationnavi',
//                            title: 'Reservation',
//                            tab: {
//                                cls: 'reservationTab',
//                            },
//                            iconCls: 'reservationCls',
//                            iconMask: true
//                        },
//                        {
//                            xtype: 'loyalitinavi',
//                            title: 'Fidélisation',
//                            tab: {
//                                cls: 'loyalityTab',
//                            },
//                            iconCls: 'LoyalityCls',
//                            iconMask: true
//                        },
//                        {
//                            xtype: 'customview',
//                            title: 'Custom',
//                            layout: 'fit',
//                            tab: {
//                                cls: 'customTab',
//                            },
//                            iconCls: 'customCls',
//                            iconMask: true
//                        },
//                        {
//                            xtype: 'notepadnavi',
//                            title: 'Notepad',
//                            tab: {
//                                cls: 'eventTab',
//                            },
//                            iconCls: 'eventCls',
//                            iconMask: true
//                        },
//                        {
//                            xtype: 'voicerecording',
//                            title: 'Voice Recording',
//                            tab: {
//                                cls: 'voicerecordingTab',
//                            },
//                            iconCls: 'voicerecordingCls',
//                            iconMask: true
//                        },
//                        {
//                            xtype: 'newsnavi',
//                            title: 'News',
//                            tab: {
//                                cls: 'menuTab',
//                            },
//                            iconCls: 'menuCls',
//                            iconMask: true
//                        }
//                    ];
//
//                    var length = Response.Demo.length;
//                    console.log('------------------------')
//                    console.log(length)
//                    console.log('------------------------')
////                    for (var i = 0; i < length; i++) {
////                        component.add(Response.Demo[i]);
////                    }
//
//                    me.appreance();
//                    appUnmask();
//                },
//                function failure(Response) {
//                    appUnmask();
////                    appCustomAlert(TextConstants.Error, Response.Message);
//                }
//        );
    },
    appreance: function () {
        var url = URLConstants.URL + 'action=easyapps_appereance_details&iApplicationId=' + TextConstants.ApplicationId;
        MyApp.services.RemoteService.remoteCall(url,
                function success(Response) {
                    console.log(Response);
                    var Toolbar_Image = Response.appereance_details.lunch_header;
                    var Toolbar_Title = Response.appereance_details.vNavigationText;
                    var Tab_Title = Response.appereance_details.vTabTexColor;
                    var Btn_Title = Response.appereance_details.vButtonTextColor;
                    var TabBg_Color = Response.appereance_details.vTabColor;
                    var Tab_Activate_Background = Response.appereance_details.tab_btn_background;

                    var y = document.getElementsByClassName("x-toolbar-dark");
                    var textcolor = document.getElementsByClassName("x-title");
                    var tabcolor = document.getElementsByClassName("x-tab");
                    var btncolor = document.getElementsByClassName("x-button-label");
                    var tabPanel = document.getElementsByClassName("x-tabbar-dark");
                    var tabactivate = document.getElementsByClassName("x-tab-active");

                    tabPanel[0].style.background = TabBg_Color;
                    tabPanel[0].style.height = "69px";
                    var textLength = textcolor.length;
                    var tabLength = tabcolor.length;
                    var btnLength = btncolor.length;
                    var ylength = y.length;

                    for (var i = 0; i < ylength; i++) {
                        y[i].style.backgroundImage = "url('http://" + Toolbar_Image + "')";
                    }
                    for (var j = 0; j < textLength; j++) {
                        textcolor[j].style.color = Toolbar_Title;
                    }
                    for (var k = 0; k < tabLength; k++) {
                        tabcolor[k].style.color = Tab_Title;
                        tabcolor[k].style.background = "url('http://" + Tab_Activate_Background + "')";
                        tabcolor[k].style.backgroundSize = "100% 100%";
                        tabcolor[k].style.marginLeft = "1px";
                    }
                    appUnmask();
                },
                function failure(Response) {
                    appUnmask();
            //  appCustomAlert(TextConstants.Error, Response.Message);
                }
        );
    },
    onHomeActivate: function (tab) {
        var me = this, tabId = tab.config.iAppTabId;
        var mainView = Ext.ComponentQuery.query('mainview')[0];
		var view = mainView.getActiveItem();
        appMask();
        this.setPageTitle(tab);
        var url = URLConstants.URL + 'action=easyapps_home_get&iApplicationId=' + TextConstants.ApplicationId + '&iAppTabId=' + tabId;
//        console.log("====================");
//        console.log("home= "+url);
//        console.log("====================");
        Ext.Ajax.request({
            url: url,
            success: function (response, opts) {
                appUnmask();
                var Response = Ext.decode(response.responseText);

                var homeStore = Ext.getStore('homestorid');
                homeStore.removeAll();
                try{
					homeStore.add(Response.home);
					homeStore.sync();
                }
                catch(e){
                	console.log(e);
                }

                var openCloseStore = Ext.getStore('openclosestoreid');
                openCloseStore.removeAll();
                try{
					openCloseStore.add(Response.openingtime);
					openCloseStore.sync();
				}
				catch(e){
					console.log(e);
				}
//                alert(openCloseStore.getCount());
//                alert(homeStore.getCount());

				if(typeof Response.openingtime != 'undefined')
                {
                	var count = Response.openingtime.length;
					for (var i = 0; i < count; i++) {
						Ext.ComponentQuery.query('homeview #' + Response.openingtime[i].vDay + '')[0].setHtml("<div style='float:left;font-size:16px;width: 100%;'>\n\
						   <div style='float:left;padding: 10px;width: 35%;font-size: 14px;border-bottom:1px solid black;border-left: 1px solid black;border-right: 1px solid black;text-align: center;background-color:rgba(255, 255, 255, 0.22);'> " + Response.openingtime[i].vDay + "</div>\n\
						   <div style='float:left;padding: 10px;width: 35%;font-size: 14px;border: 1px solid sliver;text-align: center;'> " + Response.openingtime[i].vOpenfrom + "</div>\n\
						   <div style='float:left;padding: 10px;width: 30%;font-size: 14px;border: 1px solid sliver;text-align: center;'> " + Response.openingtime[i].vOpento + "</div></div>");
						Ext.ComponentQuery.query('homeview #' + Response.openingtime[i].vDay + '')[0].setHidden(false)
					}
				}
				
				if(typeof Response.home != 'undefined')
                {
					var desc = Response.home.vDescription;
					var image = Response.home.vImage;
					var website = Response.home.vWebsite
					var email = Response.home.vEmail
					var Telephone = Response.home.vTelephone
					var address = Response.home.vAddress1
					var city = Response.home.vCity
					var state = Response.home.vState
					var zip = Response.home.vZip;
					
					me.onSetHome(desc, image, website, email, Telephone, address, city, state, zip);
				}
				if (Response.backgroundimage.backgroundimage) {
					view.down('panel').setStyle({backgroundImage: 'url(\'http://' + Response.backgroundimage.backgroundimage + '\')'});
				}
            },
            failure: function (response, opts) {
                appUnmask();
                var openCloseStore = Ext.getStore('openclosestoreid');
                var count = openCloseStore.getCount();

                var homeStore = Ext.getStore('homestorid');
                var count2 = homeStore.getCount();
                if (count2 > 0){
                    var desc = homeStore.data.items[0].data.vDescription;
                    var image = homeStore.data.items[0].data.vImage;
                    var website = homeStore.data.items[0].data.vWebsite;
                    var email = homeStore.data.items[0].data.vEmail;
                    var Telephone = homeStore.data.items[0].data.vTelephone;
                    var address = homeStore.data.items[0].data.vAddress1;
                    var city = homeStore.data.items[0].data.vCity;
                    var state = homeStore.data.items[0].data.vState;
                    var zip = homeStore.data.items[0].data.vZip;
                }
                if (count > 0) {
                    for (var i = 0; i < count; i++) {
                        Ext.ComponentQuery.query('homeview #' + openCloseStore.data.items[i].data.vDay + '')[0].setHtml("<div style='float:left;font-size:16px;width: 100%;'>\n\
                           <div style='float:left;padding: 10px;width: 35%;font-size: 14px;border-bottom:1px solid black;border-left: 1px solid black;border-right: 1px solid black;text-align: center;background-color:rgba(255, 255, 255, 0.22);'> " + openCloseStore.data.items[i].data.vDay + "</div>\n\
                           <div style='float:left;padding: 10px;width: 35%;font-size: 14px;border: 1px solid sliver;text-align: center;'> " + openCloseStore.data.items[i].data.vOpenfrom + "</div>\n\
                           <div style='float:left;padding: 10px;width: 30%;font-size: 14px;border: 1px solid sliver;text-align: center;'> " + openCloseStore.data.items[i].data.vOpento + "</div></div>");
                        Ext.ComponentQuery.query('homeview #' + openCloseStore.data.items[i].data.vDay + '')[0].setHidden(false)
                    }
                }
                me.onSetHome(desc, image, website, email, Telephone, address, city, state, zip);
            }
        });
//        MyApp.services.RemoteService.remoteCall(url,
//                function success(Response) {
//                    
//                    var homeStore=Ext.getStore('homestorid');
//                    homeStore.removeAll();
//                    homeStore.add(Response.home);
//                    homeStore.sync();
//                    
//                    var openCloseStore=Ext.getStore('openclosestoreid');
//                    openCloseStore.removeAll();
//                    openCloseStore.add(Response.openingtime);
//                    openCloseStore.sync();
//                    alert(openCloseStore.getCount());
//                    alert(homeStore.getCount());
//                    var desc = Response.home.vDescription;
//                    var image = Response.home.vImage;
//                    var website=Response.home.vWebsite
//                    var email=Response.home.vEmail
//                    var Telephone=Response.home.vTelephone
//                    var address=Response.home.vAddress1
//                    var city=Response.home.vCity
//                    var state=Response.home.vState
//                    var zip=Response.home.vZip;
//                     var count = Response.openingtime.length;
//                    if (Response.background.vImage) {
//                        Ext.ComponentQuery.query('homeview #homepanelId')[0].setStyle({backgroundImage: 'url(\'http://' + Response.background.vImage + '\')'})
//                    }
//                    for (var i = 0; i < count; i++) {
//                        Ext.ComponentQuery.query('homeview #' + Response.openingtime[i].vDay + '')[0].setHtml("<div style='float:left;font-size:16px;width: 100%;'>\n\
//                                <div style='float:left;padding: 10px;width: 35%;font-size: 14px;border-bottom:1px solid black;border-left: 1px solid black;border-right: 1px solid black;text-align: center;background-color:rgba(255, 255, 255, 0.22);'> " + Response.openingtime[i].vDay + "</div>\n\
//                                <div style='float:left;padding: 10px;width: 35%;font-size: 14px;border: 1px solid sliver;text-align: center;'> " + Response.openingtime[i].vOpenfrom + "</div>\n\
//                                <div style='float:left;padding: 10px;width: 30%;font-size: 14px;border: 1px solid sliver;text-align: center;'> " + Response.openingtime[i].vOpento + "</div></div>");
//                        Ext.ComponentQuery.query('homeview #' + Response.openingtime[i].vDay + '')[0].setHidden(false)
//
//
//                    }
//                    me.onSetHome(desc,image,website,email,Telephone,address,city,state,zip);
//
//                    
//                    appUnmask();
//                },
//                function failure(Response) {
//                    appUnmask();
//                    var openCloseStore=Ext.getStore('openclosestoreid');
//                    var count = openCloseStore.getCount();
//                 
//                    var homeStore=Ext.getStore('homestorid');
//                    var count2=homeStore.getCount();
//                    if(count2 > 0)
//                    	{
//                    	 var desc = homeStore.data.items[0].data.vDescription;
//                         var image = homeStore.data.items[0].data.vImage;
//                         var website=homeStore.data.items[0].data.vWebsite
//                         var email=homeStore.data.items[0].data.vEmail
//                         var Telephone=homeStore.data.items[0].data.vTelephone
//                         var address=homeStore.data.items[0].data.vAddress1
//                         var city=homeStore.data.items[0].data.vCity
//                         var state=homeStore.data.items[0].data.vState
//                         var zip=homeStore.data.items[0].data.vZip;
//                        
//                    	}
//                    
//                   
//                    if(count > 0){
//                    	
//                    	for (var i = 0; i < count; i++) {
//                            Ext.ComponentQuery.query('homeview #' + openCloseStore.data.items[i].data.vDay + '')[0].setHtml("<div style='float:left;font-size:16px;width: 100%;'>\n\
//                                    <div style='float:left;padding: 10px;width: 35%;font-size: 14px;border-bottom:1px solid black;border-left: 1px solid black;border-right: 1px solid black;text-align: center;background-color:rgba(255, 255, 255, 0.22);'> " + openCloseStore.data.items[i].data.vDay + "</div>\n\
//                                    <div style='float:left;padding: 10px;width: 35%;font-size: 14px;border: 1px solid sliver;text-align: center;'> " + openCloseStore.data.items[i].data.vOpenfrom + "</div>\n\
//                                    <div style='float:left;padding: 10px;width: 30%;font-size: 14px;border: 1px solid sliver;text-align: center;'> " + openCloseStore.data.items[i].data.vOpento + "</div></div>");
//                            Ext.ComponentQuery.query('homeview #' + openCloseStore.data.items[i].data.vDay + '')[0].setHidden(false)
//
//
//                        }
//                    }
//                    me.onSetHome(desc,image,website,email,Telephone,address,city,state,zip);
//                    
//                   
//                    
//                }
//        );
    },
    onSetHome: function (desc, image, website, email, Telephone, address, city, state, zip) {
    	var mainView = Ext.ComponentQuery.query('mainview')[0];
    	var view = mainView.getActiveItem();
		//CODE CHANGES FOR TASK "REMOVE Description for HOME tab"
        if (desc) {
            //Ext.ComponentQuery.query('homeview #homeDescribtionID')[0].setHtml("<div class='descCls'>" + desc + "</div>");
            view.down('#homeDescribtionID').setHtml("<div class='descCls'>" + desc + "</div>");
        }
        if(image.indexOf('assets/images/empty.png') === -1){
        	view.down('#homeImageID').setHtml("<div style='text-align:center'><img src='http://" + image + "' width='98%' /></div>");
        }
        else{
        	view.down('#homeImageID').setHtml("<div style='text-align:center'><img src='http://" + image + "' /></div>");
        }

        view.down('#home_WebsiteTagID').setHtml("<div style='word-break: break-all;padding: 10px 5px;;text-align:left;font-size:16px;background-color: rgba(255, 255, 255, 0.22);margin-bottom:10px;border-radius: 10px;border: 1px dotted black;'><span style='font-weight:bold;font-size:16px;'>"+Loc.t('HOME.WEBSITE')+":</span><span style='margin-left:5px;font-size:14px;font-style:italic;'>" + website + "</span></div>");
        view.down('#home_EmailTagID').setHtml("<div style='word-break: break-all;padding: 10px 5px;;text-align:left;font-size:16px;background-color: rgba(255, 255, 255, 0.22);margin-bottom:10px;border-radius: 10px;border: 1px dotted black;'><span style='font-weight:bold;font-size:16px;'>"+Loc.t('HOME.EMAIL')+":</span><span style='margin-left:5px;font-size:14px;font-style:italic;'>" + email + "</span></div>");
        view.down('#home_TelephoneTagID').setHtml("<div style='padding: 10px 5px;;text-align:left;font-size:16px;background-color: rgba(255, 255, 255, 0.22);margin-bottom:10px;border-radius: 10px;border: 1px dotted black;'><span style='font-weight:bold;font-size:16px;'>"+Loc.t('HOME.TELEPHONE')+":</span><span style='margin-left:5px;font-size:14px;font-style:italic;'>" + Telephone + "</span></div>");
        view.down('#home_AddressTagID').setHtml("<div style='padding: 10px 5px;;text-align:left;font-size:16px;background-color: rgba(255, 255, 255, 0.22);margin-bottom:10px;border-radius: 10px;border: 1px dotted black;'><span style='font-weight:bold;font-size:16px;'>"+Loc.t('HOME.ADDRESS')+":</span><span style='margin-left:5px;font-size:14px;font-style:italic;'>" + address + "</span></div>");
        view.down('#home_CityTagID').setHtml("<div style='padding: 10px 5px;;text-align:left;font-size:16px;background-color: rgba(255, 255, 255, 0.22);margin-bottom:10px;border-radius: 10px;border: 1px dotted black;'><span style='font-weight:bold;font-size:16px;'>"+Loc.t('HOME.CITY')+":</span><span style='margin-left:5px;font-size:14px;font-style:italic;'>" + city + "</span></div>");
        view.down('#home_StateTagID').setHtml("<div style='padding: 10px 5px;;text-align:left;font-size:16px;background-color: rgba(255, 255, 255, 0.22);margin-bottom:10px;border-radius: 10px;border: 1px dotted black;'><span style='font-weight:bold;font-size:16px;'>"+Loc.t('HOME.STATE')+":</span><span style='margin-left:5px;font-size:14px;font-style:italic;'>" + state + "</span></div>");
        view.down('#home_ZipTagID').setHtml("<div style='padding: 10px 5px;;text-align:left;font-size:16px;background-color: rgba(255, 255, 255, 0.22);margin-bottom:10px;border-radius: 10px;border: 1px dotted black;'><span style='font-weight:bold;font-size:16px;'>"+Loc.t('HOME.ZIP')+":</span><span style='margin-left:5px;font-size:14px;font-style:italic;'>" + zip + "</span></div>");
    },
    onLoyalityNaviViewPush: function (view, item) {
        var loyalityNavigationView = this.getLoyalitiNavi();
        if (item.xtype == "loyalitydetail") {
//            Ext.ComponentQuery.query('loyalitinavi #sharingId')[0].setHidden(false)
        }
    },
    onEcommerceNaviViewPush: function (view, item) {
        var ecommarceNavi = this.getEcommarceNavi();
        if (item.xtype == "ecommarcedetails" || item.xtype == "ecommercecartdetails") {
            console.log(ecommarceNavi);
            ecommarceNavi.getNavigationBar().setHidden(false);
        }
    },
    onEcommerceNaviViewpop: function (view, item) {
        var ecommarceNavi = this.getEcommarceNavi();
        if (item.xtype == "ecommarcedetails" || item.xtype == "ecommercecartdetails") {
            console.log(ecommarceNavi);
            ecommarceNavi.getNavigationBar().setHidden(true);
        }
    },
    onGallaryNaviPush: function (view, item) {
        var gallaryNavi = this.getGallaryNaviView();
        console.log(item.xtype);
        if (item.xtype == "coverview") {
            console.log("hidden false");
            //Ext.ComponentQuery.query('gallarynaviview #galleryShareBtnid')[0].setHidden(false);
            view.down('#galleryShareBtnid').setHidden(false);
        }
    },
    onGallaryNaviPop: function (view, item) {
        var gallaryNavi = this.getGallaryNaviView();
        console.log(item.xtype);
        if (item.xtype == "coverview") {
            console.log("hidden true");
            view.down('#galleryShareBtnid').setHidden(true);
        }
    },
    onLoyalityNaviViewPop: function (view, item) {
        var loyalityNavigationView = this.getLoyalitiNavi();
        if (item.xtype == "loyalitydetail") {
//            Ext.ComponentQuery.query('loyalitinavi #sharingId')[0].setHidden(true)
        }
    },
    onReservationNaviViewPopToRoot: function (view, item) {
        this.getReservationNavi().pop(this.getReservationNavi().getInnerItems().length - 1);
    },
    onOrderNaviViewPopToRoot: function (view, item) {
        this.getOrderNavi().pop(this.getOrderNavi().getInnerItems().length - 1);
    },
    onEventNaviViewPopToRoot: function (view, item) {
        this.getEventNavi().pop(this.getEventNavi().getInnerItems().length - 1);
    },
    onNoteNaviViewPush: function (view, item) {
        console.log(item.xtype);
        if (item.xtype == "editnoteview") {
            console.log(this.getNotepadNavi());
            Ext.ComponentQuery.query('.notepadnavi #saveNoteBtnID')[0].setHidden(false);
            Ext.ComponentQuery.query('.notepadnavi #addNoteBtnId')[0].setHidden(true);
        }
    },
    onNoteNaviViewPop: function (view, item) {
        console.log(item.xtype)
        if (item.xtype == "editnoteview") {
            console.log(this.getNotepadNavi());
            Ext.ComponentQuery.query('.notepadnavi #saveNoteBtnID')[0].setHidden(true);
            Ext.ComponentQuery.query('.notepadnavi #addNoteBtnId')[0].setHidden(false);
        }
    },
    onVideosListInitialize: function (tab) {
        appMask();
        var me = this, tabId = tab.config.iAppTabId;
        var mainView = Ext.ComponentQuery.query('mainview')[0];
		var view = mainView.getActiveItem();
        var url = URLConstants.URL + 'action=easyapps_youtube_get&iApplicationId=' + TextConstants.ApplicationId + '&iAppTabId=' + tabId;
        var chennal = "";
        MyApp.services.RemoteService.remoteCall(url,
                function success(Response) {
                    console.log('============================================================');
                    console.log(Response);
                    console.log("=============================================================");
                    var bgimage = Response.backgroundimage.backgroundimage;
                    view.down('youtube').setStyle({backgroundImage: 'url(\'http://' + bgimage + '\')'});
                    if(typeof Response.youtube != 'undefined')
                    {
                    	chennal = Response.youtube.vChannelName;
                    	me.youtubeVideo(chennal);
                    }
                    me.setPageTitle(tab);
                    appUnmask();
                },
                function failure(Response) {
                    appUnmask();
                    me.setPageTitle(tab);
                }
        );
    },
    youtubeVideo: function (chennal) {
        var url = "http://gdata.youtube.com/feeds/api/users/" + chennal + "/uploads/";
        console.log(url);
        Ext.data.JsonP.request({
            scope: this,
//            url: "http://gdata.youtube.com/feeds/api/users/barclaysfootballtv/uploads/",
            url: url,
            params: {
                'v': 2,
                'alt': 'json'
            },
            success: function (result, request) {
                var entries = result.feed.entry;
                var store = Ext.getStore("youtubestoreid");
				store.removeAll();
                console.log(entries);
                var count = entries.length;
                for (var i = 0; i < count; i++) {
                    var u = {
                        title: entries[i].title.$t,
                        thumbnail: entries[i].media$group.media$thumbnail[0].url,
                        href: entries[i].link[0].href,
                        dob: entries[i].published.$t
                    }
                    store.add(u);
                    store.sync();
                    appUnmask();
                }
            },
            failure: function (response) {
                appUnmask();
               // appCustomAlert(TextConstants.MESSAGE, TextConstants.NetWork_Problem);
            },
        })
    },
    onYouTubeListTap: function (dataView, index, target, record, e, eOpts) {
        var link = record.data.href;
        var myId = getId(link);
        Ext.Viewport.add({
            xclass: 'MyApp.view.youtube.PlayVideo'
        }).show();
        Ext.ComponentQuery.query('playvideo #videoid')[0].setHtml('<iframe  src="http://www.youtube.com/embed/'
                + myId + '" frameborder="0" allowfullscreen></iframe>');
    },
    onCancleTap: function () {
        var videoView = this.getPlayVideoView();
        if (videoView) {
            videoView.destroy();
        }
    },
    onLoyalitiTap: function (dataView, index, target, record, e, eOpts) {
        var myTarget = e.target;
        var mycls = myTarget.className;
        if (mycls == 'sharebtncls') {
            var msg = record.data.vRewardText;
            socialsharing(msg);
        } else {
            var LoyalityNavigationView = this.getLoyalitiNavi();
            TextConstants.NO_OF_USE_CONST = record.data.UserUsed;
//            TextConstants.NO_OF_USE_CONST = record.data.remain_loyalty;
            TextConstants.LOYALITY_INDEX = index;
            TextConstants.loyalityid = record.data.iLoyaltyID;
            var index = TextConstants.NO_OF_USE_CONST;
            index = parseInt(TextConstants.NO_OF_USE_CONST);
            console.log(record.data.iLoyaltyID);
            if (LoyalityNavigationView.getInnerItems().length == 1) {
                app_PushView(LoyalityNavigationView, 'loyalitydetail', "");
            }
            switch (index) {
                case 0:
                    Ext.ComponentQuery.query('loyalitydetail #coupenBtnId')[0].setHtml('');
                    break;
                case 1:
                    Ext.ComponentQuery.query('loyalitydetail #coupenBtnId')[0].setHtml('<img src="img/Tabicon/cupen.png" width="25px" heigt="25px" />');
                    break;
                case 2:
                    Ext.ComponentQuery.query('loyalitydetail #coupenBtnId')[0].setHtml('<img src="img/Tabicon/cupen.png" width="25px" heigt="25px" />	 <img src="img/Tabicon/cupen.png" width="25px" heigt="25px" />');
                    break;
                case 3:
                    Ext.ComponentQuery.query('loyalitydetail #coupenBtnId')[0].setHtml('<img src="img/Tabicon/cupen.png" width="25px" heigt="25px" />	 <img src="img/Tabicon/cupen.png" width="25px" heigt="25px" /> <img src="img/Tabicon/cupen.png" width="25px" heigt="25px" />');
                    break;
                case 4:
                    Ext.ComponentQuery.query('loyalitydetail #coupenBtnId')[0].setHtml('<img src="img/Tabicon/cupen.png" width="25px" heigt="25px" />	 <img src="img/Tabicon/cupen.png" width="25px" heigt="25px" /> <img src="img/Tabicon/cupen.png" width="25px" heigt="25px" /> <img src="img/Tabicon/cupen.png" width="25px" heigt="25px" />');
                    break;
            }
        }
    },
    onLoyalityActivate: function (tab) {
        var me = this, tabId = tab.config.iAppTabId;
        var mainView = Ext.ComponentQuery.query('mainview')[0];
		var view = mainView.getActiveItem();
        appMask();
        var url = URLConstants.URL + 'action=easyapps_loyalty_bgimg&iUserId=' + TextConstants.UserID + '&iApplicationId=' + TextConstants.ApplicationId + '&iAppTabId=' + tabId;
        console.log(url);
        MyApp.services.RemoteService.remoteCall(url,
                function success(Response) {
                    console.log('============================================================');
                    console.log(Response);
                    console.log("=============================================================");
                    if (Response.backgroundimage.backgroundimage) {
                        view.down('loyalitiview').setStyle({backgroundImage: 'url(\'http://' + Response.backgroundimage.backgroundimage + '\') '});
                    }
                    me.GetLoyalityList();
                    appUnmask();
                },
                function failure(Response) {
                    me.GetLoyalityList();
                    appUnmask();
                }
        );
    },
    GetLoyalityList: function () {
        appMask();
        var url = URLConstants.URL + 'action=easyapps_loyalty_get_details&iUserId=' + TextConstants.UserID + '&iApplicationId=' + TextConstants.ApplicationId;
        console.log('============================================================');
        console.log(url);
        console.log("=============================================================");
        MyApp.services.RemoteService.remoteCall(url,
                function success(Response) {
                    console.log('============================================================');
                    console.log(Response);
                    console.log("=============================================================");
                    var objLoyalityStore = Ext.getStore('loyalitistoreid');
                    objLoyalityStore.removeAll();
                    objLoyalityStore.add(Response.loyalty);
                    objLoyalityStore.sync();
                    appUnmask();
                },
                function failure(Response) {
                    var objLoyalityStore = Ext.getStore('loyalitistoreid');
                    objLoyalityStore.removeAll();
                    objLoyalityStore.sync();
                    appUnmask();
                }
        );
    },
    onSecretSubmitTap: function () {
        var scretText = Ext.ComponentQuery.query('loyalitydetail #secretCodeID')[0].getValue();
        if (scretText) {
            if (TextConstants.NO_OF_USE_CONST != 0) {
                TextConstants.NO_OF_USE_CONST = TextConstants.NO_OF_USE_CONST - 1;
                appMask();
                var url = URLConstants.URL + 'action=save_coupons&iLoyaltyId=' + TextConstants.loyalityid + '&tabid=1796&applicationid="' + TextConstants.ApplicationId + '"&iSecretCode=' + scretText;
                MyApp.services.RemoteService.remoteCall(url,
                        function success(Response) {
                            console.log(Response);
                            appUnmask();
                            var objLoyalityStore = Ext.getStore('loyalitistoreid');
                            objLoyalityStore.removeAll();
                            objLoyalityStore.add(Response.data);
                            objLoyalityStore.sync();
                            var index = TextConstants.NO_OF_USE_CONST;
                            index = parseInt(TextConstants.NO_OF_USE_CONST);
                            switch (index) {
                                case 0:
                                    Ext.ComponentQuery.query('loyalitydetail #coupenBtnId')[0].setHtml('');
                                    break;
                                case 1:
                                    Ext.ComponentQuery.query('loyalitydetail #coupenBtnId')[0].setHtml('<img src="img/Tabicon/cupen.png" width="25px" heigt="25px" />');
                                    break;
                                case 2:
                                    Ext.ComponentQuery.query('loyalitydetail #coupenBtnId')[0].setHtml('<img src="img/Tabicon/cupen.png" width="25px" heigt="25px" />	 <img src="img/Tabicon/cupen.png" width="25px" heigt="25px" />');
                                    break;
                                case 3:
                                    Ext.ComponentQuery.query('loyalitydetail #coupenBtnId')[0].setHtml('<img src="img/Tabicon/cupen.png" width="25px" heigt="25px" />	 <img src="img/Tabicon/cupen.png" width="25px" heigt="25px" /> <img src="img/Tabicon/cupen.png" width="25px" heigt="25px" />');
                                    break;
                                case 4:
                                    Ext.ComponentQuery.query('loyalitydetail #coupenBtnId')[0].setHtml('<img src="img/Tabicon/cupen.png" width="25px" heigt="25px" />	 <img src="img/Tabicon/cupen.png" width="25px" heigt="25px" /> <img src="img/Tabicon/cupen.png" width="25px" heigt="25px" /> <img src="img/Tabicon/cupen.png" width="25px" heigt="25px" />');
                                    break;
                            }
                            Ext.ComponentQuery.query('loyalitydetail #secretCodeID')[0].setValue('');
                        },
                        function failure(Response) {
                            appCustomAlert(TextConstants.Sorry,  Loc.t('LOYALTY.NOLOYALTYSECRETAVAILABE'));
                            appUnmask();
                        }
                );
            } else {
                appCustomAlert(Loc.t('LOYALTY.SORRY'), Loc.t('LOYALTY.NOMORECOUPONAVAILABLE'));
            }
        } else {
            appCustomAlert(Loc.t('CATELOG.ALERT'), Loc.t('LOYALTY.ENTERSECRETCODE'));
        }
    },
    onOrderListActivate: function (tab) {
    	var tabId = tab.config.iAppTabId;
        appMask();
        var mainView = Ext.ComponentQuery.query('mainview')[0];
		var view = mainView.getActiveItem();
        var url = URLConstants.URL + 'action=easyapp_menu_category&iApplicationId=' + TextConstants.ApplicationId + '&iAppTabId=' + tabId;
        MyApp.services.RemoteService.remoteCall(url,
            function success(Response) {
                console.log(Response);
                var objOrderStore = Ext.getStore('orderliststoreid');
                objOrderStore.removeAll();
                objOrderStore.add(Response.category);
                objOrderStore.sync();
                if (Response.backgroundimage.backgroundimage) {
                    view.down('orderviewlist').setStyle({backgroundImage: 'url(\'http://' + Response.backgroundimage.backgroundimage + '\') '});
                    view.down('menuview').setStyle({backgroundImage: 'url(\'http://' + Response.backgroundimage.backgroundimage + '\') '});
                }
                appUnmask();
            },
            function failure(Response) {
                var objOrderStore = Ext.getStore('orderliststoreid');
                objOrderStore.removeAll();
                objOrderStore.sync();
                appUnmask();
            }
        );
    },
    onOrderListTap: function (dataView, index, target, record, e, eOpts) {
        var menuid = record.data.iMenuID;
        var OrderNavi = this.getOrderNavi();
        appMask();
        var url = URLConstants.URL + 'action=easyapps_item_get&iMenuId=' + menuid + '&iApplicationId=' + TextConstants.ApplicationId;
        console.log(url)
        MyApp.services.RemoteService.remoteCall(url,
                function success(Response) 
                {
                    console.log(Response);
                    var objlength = Response.category.length;
                    TextConstants.OrderDettail_ItemID = Response.category[objlength - 1].iItemId;
                    var objOrderDetailStore = Ext.getStore('orderdetialstoreid')
                    objOrderDetailStore.removeAll();
                    objOrderDetailStore.add(Response.category);
                    objOrderDetailStore.sync();
                    Ext.ComponentQuery.query('ordernavi #cartBtnID')[0].setHidden(true);
                    Ext.ComponentQuery.query('ordernavi #orderHistoryBtnID')[0].setHidden(true);
                    if (OrderNavi.getInnerItems().length == 1) {
                        console.log('come hear');
                        app_PushView(OrderNavi, 'orderdetailview', "");
                    }
                    appUnmask();
                },
                function failure(Response) {
                    appCustomAlert(TextConstants.Sorry, Loc.t('ORDER.NORECORDFOUND'));
                    appUnmask();
                }
        );
    },
    onOrderDetailTap: function (dataView, index, target, record, e, eOpts) 
    {
        TextConstants.OptionPrice = 0;
        TextConstants.SizePrice = 0;
        var myTarget = e.target;
        var cls = myTarget.className;
        var textId = record.data.id;
        var menuid = record.data.iMenuId;
        var itemid = record.data.iItemId;
        var tabid = record.data.iAppTabId;
        var applicationid = record.data.iApplicationId;
        TextConstants.ApplicationId = applicationid;
        TextConstants.AppTabId = tabid;
        var price = record.data.fPrice;
        if (cls == "addorderBtnCls") 
        {
            var textValue = document.getElementById(textId).value;
            appMask();
            var url = URLConstants.URL + 'action=save_quantity_session&iMenuID=' + menuid + '&iItemId=' + itemid + '&iApplicationId=' + applicationid + '&iAppTabId=' + tabid + '&vQuantity=' + textValue + '&fPrice=' + price;
            console.log(url);
            MyApp.services.RemoteService.remoteCall(url,
                    function success(Response) {
                        console.log(Response);
                        appUnmask();
                    //    appCustomAlert(TextConstants.MESSAGE, Loc.t('ORDER.YOURORDERSUCCESS'));
                    },
                    function failure(Response) {
                        appUnmask();
                    //    appCustomAlert(TextConstants.Sorry, Response);
                    }
            );
        } else if (cls == "BottomBtnCls") {
            var OrderNavi = this.getOrderNavi();
            appMask();
            var url = URLConstants.URL + 'action=get_order_detail&iUserId=' + TextConstants.UserID + '&iApplicationId=' + applicationid + '&iAppTabId=' + tabid;
            console.log(url);
            MyApp.services.RemoteService.remoteCall(url,
                    function success(Response) {
                        console.log(Response);
                        var length = Response.order_detail.length;
                        TextConstants.OrderID = Response.order_detail[length - 1].iOrderId;
                        var objshowstore = Ext.getStore('showorderstoreid');
                        objshowstore.removeAll();
                        objshowstore.add(Response.order_detail);
                        objshowstore.sync();
                        var count = objshowstore.getCount();
                        TextConstants.TotalAmount = 0;
                        for (var i = 0; i < count; i++) {
                            TextConstants.TotalAmount = TextConstants.TotalAmount + objshowstore.data.items[i].data.Total;
                        }
                        if (OrderNavi.getInnerItems().length == 2) {
                            app_PushView(OrderNavi, 'showorderview', "");
                        }
                        appUnmask();
                    },
                    function failure(Response) {
                        appUnmask();
                        appCustomAlert(TextConstants.Sorry, Response.Message);
                    }
            );
        } else {
            var data = record.data;
            var OrderNavi = this.getOrderNavi();
//            var itemid=record.data.iItemId;
//            appMask()
console.log('===================Data====================');
console.log(data);
console.log('===================End=====================');
            var url = URLConstants.URL + 'action=easyapps_item_sizeopt_details&iItemId=' + itemid + '&iApplicationId=' + applicationid;
            console.log(url);
            MyApp.services.RemoteService.remoteCall(url,
                    function success(Response) {
                        console.log(Response);
//                        Ext.ComponentQuery.query('itemdetailsview #sizeLabelid')[0].setHidden(false)
//                        Ext.ComponentQuery.query('itemdetailsview #optionLableid')[0].setHidden(false)
//                        Ext.ComponentQuery.query('itemdetailsview #optionListid')[0].setHidden(false);
//                        Ext.ComponentQuery.query('itemdetailsview #sizeitemListID')[0].setHidden(false);
                        var objsizeitemStore = Ext.getStore('sizeitemstoreid');
                        objsizeitemStore.removeAll();
                        objsizeitemStore.add(Response.item_size);
                        objsizeitemStore.sync();
                        var objOptionStore = Ext.getStore('optionitemstoreid');
                        objOptionStore.removeAll();
                        objOptionStore.add(Response.item_option);
                        objOptionStore.sync();
                        console.log(objsizeitemStore);
                        console.log(objOptionStore);
                        appUnmask();
                    },
                    function failure(Response) {
                        appUnmask();
                    }
            );
            if (OrderNavi.getInnerItems().length == 2) {
                app_PushView(OrderNavi, 'itemdetailsview', data);
            }
            Ext.ComponentQuery.query('ordernavi #cartBtnID')[0].setHidden(true);
            Ext.ComponentQuery.query('ordernavi #orderHistoryBtnID')[0].setHidden(true);
        }
    },
    onAddOrderBtnTap: function (storeData) 
    {
        var menuid = storeData.iMenuId;
        var itemid = storeData.iItemId;
        var tabid = storeData.iAppTabId;
        var price = storeData.fPrice;
        price = parseFloat(price);
        var Totalprice;
        var sizePrice = parseFloat(TextConstants.SizePrice);
        var optPrice = parseFloat(TextConstants.OptionPrice);
        if (sizePrice != 0) {
            Totalprice = sizePrice + optPrice;
        } else {
            Totalprice = price + optPrice;
        }
        var qty = Ext.ComponentQuery.query('itemdetailsview #qtyItemID')[0].getValue();
        var text = Ext.ComponentQuery.query('itemdetailsview #specificTextfieldid')[0].getValue();
        var OrderNavi = this.getOrderNavi();
        appMask();
        var url = URLConstants.URL + 'action=save_quantity_session&iMenuID=' + menuid + '&iUserId=' + TextConstants.UserID + '&iItemId=' + itemid + '&iApplicationId=' + TextConstants.ApplicationId + '&iAppTabId=' + tabid + '&vQuantity=' + qty + '&fPrice=' + Totalprice + '&vInstruction=' + text;
        console.log(url);
        MyApp.services.RemoteService.remoteCall(url,
                function success(Response) {
                    console.log(Response);
                    appUnmask();
                    OrderNavi.pop();
                //    appCustomAlert(TextConstants.MESSAGE, Loc.t('ORDER.YOURORDERSUCCESS'));
                    appUnmask();
                },
                function failure(Response) {
                    appUnmask();
                //    appCustomAlert(TextConstants.Sorry, Response);
                }
        );
    },
    onSubmitDetailTap: function (dataView, index, target, record, e, eOpts) {
        var myTarget = e.target;
        var cls = myTarget.className;
        var textId = record.data.id;
        var applictationid = record.data.iApplicationId;
        var tabid = record.data.iAppTabId;
        var orderid = record.data.iOrderId;
        if (cls == "deleteorderBtnCls") {
            appMask();
            var url = URLConstants.URL + 'action=delete_order&iOrderId=' + orderid + '&iUserId=' + TextConstants.UserID + '&iApplicationId=' + applictationid + '&iAppTabId=' + tabid;
            console.log(url);
            MyApp.services.RemoteService.remoteCall(url,
                    function success(Response) {
                        console.log(Response);
                        var length = Response.order_detail.length;
                        TextConstants.OrderID = Response.order_detail[length - 1].iOrderId;
                        var objshowstore = Ext.getStore('showorderstoreid');
                        objshowstore.removeAll();
                        objshowstore.add(Response.order_detail);
                        objshowstore.sync();
                        appUnmask();
                    },
                    function failure(Response) {
                        console.log(Response);
                        appUnmask();
                        var objshowstore = Ext.getStore('showorderstoreid');
                        objshowstore.removeAll();
                        objshowstore.sync();
                    }
            );
        } else if (cls == "BottomBtnCls") {
            var OrderNavi = this.getOrderNavi();
            if (OrderNavi.getInnerItems().length == 3 || OrderNavi.getInnerItems().length == 2) {
                app_PushView(OrderNavi, 'customerorderdetailview', "");
            }
        }
    },

    onCustomerSubmitBtnTap: function () {
        var OrderNavi = this.getOrderNavi();
        var name = Ext.ComponentQuery.query('customerorderdetailview #fullnameid')[0].getValue();
        var phonenumber = Ext.ComponentQuery.query('customerorderdetailview #mobilenum')[0].getValue();
        var address = Ext.ComponentQuery.query('customerorderdetailview #addressid')[0].getValue();
        var email = Ext.ComponentQuery.query('customerorderdetailview #emailid')[0].getValue();
        var areaname = Ext.ComponentQuery.query('customerorderdetailview #areanameid')[0].getValue();
        var pincode = Ext.ComponentQuery.query('customerorderdetailview #pincodeid')[0].getValue();
    
        /** order form validation details **/
        /** validation **/
        var alert_msg='';
        if(name==''){
           alert_msg+=Loc.t('CATELOG.NAMEERROR');
        }
        if(phonenumber==null){
            alert_msg+="<br />"+Loc.t('CATELOG.EMPTYTEL');
        }
        if(address==''){
            alert_msg+="<br />"+Loc.t('CATELOG.ADDRESSERROR');
        }
        if(email==''){
            alert_msg+="<br />"+Loc.t('CATELOG.EMAILERROR');
        }
        if(areaname==''){
            alert_msg+="<br />"+Loc.t('CATELOG.AREAERROR');
        }
        if(pincode==''){
            alert_msg+="<br />"+Loc.t('CATELOG.PINERROR');
        }

    if (name && phonenumber && address && email && areaname && pincode) 
    {
        appMask();
        var url = URLConstants.URL + 'action=save_order&iUserId=' + TextConstants.UserID + '&iApplicationId=' + TextConstants.ApplicationId + '&iAppTabId=' + TextConstants.AppTabId + '&vName=' + name + '&tAddress=' + address + '&vPhone=' + phonenumber + '&tEmail=' + email + '&vArea=' + areaname + '&vPincode=' + pincode + '';
        console.log(url);
        MyApp.services.RemoteService.remoteCall(url,
                function success(Response) {
                    console.log(Response);
                    TextConstants.OrderDetailsId = Response.data.Orderdetails;
//                    if (OrderNavi.getInnerItems().length == 4) {
//                        app_PushView(OrderNavi, 'paypalview', "");
//                    }
                    OrderNavi.push({
                        xtype: 'paypalview'
                    });
                    appUnmask();
                },
                function failure(Response) {
                    console.log(Response);
                    appUnmask();
                    appCustomAlert(TextConstants.Sorry, Response.Message);
                }
        );
    }else{
           appCustomAlert(TextConstants.MESSAGE, alert_msg);
    }
},
    onAfterPayPal: function () {
        appMask();
        var me = this;
        var url = URLConstants.URL + 'action=easyapps_paypal_details&iApplicationId=' + TextConstants.ApplicationId + '&iTransactionId=' + TextConstants.TransactionId + '&tTransactinTime=' + TextConstants.TransactinTime + '&fAmount=' + TextConstants.TotalAmount + '&vPaymentstatus=' + TextConstants.Payments + '&iOrderId=' + TextConstants.OrderDetailsId;
        MyApp.services.RemoteService.remoteCall(url,
                function success(Response) {
                    console.log(JSON.stringify(Response));
                    me.onOrderNaviViewPopToRoot();
                    appCustomAlert(TextConstants.MESSAGE, Response.Transaction.msg);
                    appUnmask();
                },
                function failure(Response) {
                    console.log(Response);
                    appUnmask();
                    appCustomAlert(TextConstants.Sorry, Loc.t('ORDER.CHECKCONNVECTION'));
                }
        );
    },
    onGallaryActivates: function (tab) {
    	var mainView = Ext.ComponentQuery.query('mainview')[0];
		var view = mainView.getActiveItem();
		var tabId = tab.config.iAppTabId;
        if (view && view.getInnerItems().length > 1 && tabId) {
        	var anim = mainView.getLayout().getAnimation();
        	mainView.getLayout().setAnimation(false);
			view.pop();
			mainView.getLayout().setAnimation(anim);
        }
    	if(!tabId){
    		//tabId = mainView.getActiveItem().config.iAppTabId;
    		this.setPageTitleOnBack();
    		return;
    	}
    	this.setPageTitle(tab);
        appMask();
        var url = URLConstants.URL + 'action=easyapps_gallery_get&iApplicationId=' + TextConstants.ApplicationId + '&iAppTabId=' + tabId;
        console.log(url);
        MyApp.services.RemoteService.remoteCall(url,
                function success(Response) {
                    console.log(Response);
                    var imgStore = Ext.getStore('imagestoreid');
                    imgStore.removeAll();
                    if (Response.gallery.eImageServiceType == 'Custom') {
                        imgStore.add(Response.custom_image);
                        imgStore.sync();
                        var text = "";
                        if(imgStore.getCount() === 0){
                        	text = Loc.t('GALLERY.NOIMAGESAVAILABLE');
                        }
                        view.down('gallaryview').setEmptyText(Loc.t('GALLERY.NOIMAGESAVAILABLE'));
                    } else if (Response.gallery.eImageServiceType == 'Picasa') {
                        var email = Response.gallery.PicassaEmail;
                        Picasa(email);
                    } else if (Response.gallery.eImageServiceType == 'Flicker') {
                        var key = Response.gallery.vFlickerApi;
                        var userid = Response.gallery.vFlickerEmail;
                        Flickr(key, userid);
                    }
                    try{
						var bgimage = Response.backgroundimage.backgroundimage;
						if (bgimage) {
							view.down('gallaryview').setStyle({backgroundImage: 'url(\'http://' + bgimage + '\')'});
						}
                    }
                    catch(e){
                    	console.log(e);
                    }
                    appUnmask();
                },
                function failure(Response) {
                    console.log(Response);
                    appUnmask();
                    appCustomAlert(TextConstants.Sorry, Response.Message);
                }
        );
    },
    onGallaryListViewTap: function (dataView, index, target, record, e, eOpts) {
        var gallaryNavi = this.getGallaryNaviView();
        if (gallaryNavi.getInnerItems().length == 1) {
            app_PushView(gallaryNavi, 'gallaryview', "");
        }
    },
    onGallaryTap: function (dataView, index, target, record, e, eOpts) {
        var data = index;
    //    TextConstants.GallaryShareImage_Link = 'data:image/gif;base64,' + record.data.vGalleryImage;
        TextConstants.GallaryShareImage_Link = record.data.vGalleryImage;
        var gallaryNavi = this.getGallaryNaviView();
        var mainView = Ext.ComponentQuery.query('mainview')[0];
		var view = mainView.getActiveItem();
        if (view && view.getInnerItems().length == 1) {
			var title = view.down('[docked=top]').getTitle();
            app_PushView(view, 'coverview', data, title);
        }
    },
    onWebsitListActivates: function (tab) {
    	var tabId = tab.config.iAppTabId;
    	var mainView = Ext.ComponentQuery.query('mainview')[0];
		var view = mainView.getActiveItem();
        appMask();
        var url = URLConstants.URL + 'action=easyapps_website_get&iApplicationId=' + TextConstants.ApplicationId + '&iAppTabId=' + tabId;
        console.log(url);
        MyApp.services.RemoteService.remoteCall(url,
                function success(Response) {
                    console.log(Response);
                    var objwebStore = Ext.getStore('websitestoreid');
                    objwebStore.removeAll();
                    objwebStore.add(Response.website_details);
                    objwebStore.sync();
                    appUnmask();
                    view.down('websitelistview').setStyle({backgroundImage: 'url(\'http://' + Response.backgroundimage.backgroundimage + '\') '});
                },
                function failure(Response) {
                    console.log(Response);
                    appUnmask();
                }
        );
    },
    WebsiteListTap: function (dataView, index, target, record, e, eOpts) {
        appMask();
        var url = record.data.vWebUrl;
        var websiteNavi = this.getWebsiteNavi();
        if (websiteNavi.getInnerItems().length == 1) {
            app_PushView(websiteNavi, 'websiteview', "");
        }
        appUnmask();
        var webview = Ext.ComponentQuery.query('websiteview #websiteid')[0]
        webview.setHtml(loadURL(url));
    },
    onSocialActivates: function (tab) {
    	var tabId = tab.config.iAppTabId;
    	var mainView = Ext.ComponentQuery.query('mainview')[0];
		var view = mainView.getActiveItem();
        appMask();
        var url = URLConstants.URL + 'action=easyapps_socialmedia_get&iApplicationId=' + TextConstants.ApplicationId + '&iAppTabId=' + tabId;
        console.log(url);
        MyApp.services.RemoteService.remoteCall(url,
            function success(Response) {
                console.log(Response);
                var objsocialStore = Ext.getStore('socialstorid');
                objsocialStore.removeAll();
                objsocialStore.add(Response.socialmedia_details);
                objsocialStore.sync();
                if (Response.backgroundimage.backgroundimage) {
                    view.down('socialmediaview').setStyle({backgroundImage: 'url(\'http://' + Response.backgroundimage.backgroundimage + '\') '});
                }
                appUnmask();
            },
            function failure(Response) {
                console.log(Response);
                var objsocialStore = Ext.getStore('socialstorid');
                objsocialStore.removeAll();
                objsocialStore.sync();
                appUnmask();
            }
        ); 
    }, 
    onSocialSiteListTap: function (dataView, index, target, record, e, eOpts) {
        var url = record.data.vUrl;
        window.open(url, '_system'); 
    },
    onPdfListTap: function (dataView, index, target, record, e, eOpts) {
        var data = record.data;
        var pdfnavi = this.getPdfNavi();
        pdfnavi.push({
            xtype: 'pdfview',
            data: data
        });
    },
    onPdfNaviActivate: function (tab) {
    	var tabId = tab.config.iAppTabId;
    	var mainView = Ext.ComponentQuery.query('mainview')[0];
		var view = mainView.getActiveItem();
        appMask();
        var url = URLConstants.URL + 'action=easyapps_pdf_get&iApplicationId=' + TextConstants.ApplicationId + '&iAppTabId=' + tabId;
        console.log(url);
        MyApp.services.RemoteService.remoteCall(url,
                function success(Response) {
                    console.log(Response);
                    var objpdfStore = Ext.getStore('pdfstoreid');
                    objpdfStore.removeAll();
                    objpdfStore.add(Response.pdfs);
                    objpdfStore.sync();
                    if (Response.backgroundimage.backgroundimage) {
                        view.down('pdflistview').setStyle({backgroundImage: 'url(\'http://' + Response.backgroundimage.backgroundimage + '\') '});
                    }
                    appUnmask();
                },
                function failure(Response) {
                    var objpdfStore = Ext.getStore('pdfstoreid');
                    objpdfStore.removeAll();
                    objpdfStore.sync();
                    console.log(Response);
                    appUnmask();
                }
        );
    },
    onCustomActivate: function (tab) {
    	var me = this;
    	var tabId = tab.config.iAppTabId;
    	var mainView = Ext.ComponentQuery.query('mainview')[0];
    	var view = mainView.getActiveItem();
    	if (view && view.getInnerItems().length > 1 && tabId) {
        	var anim = mainView.getLayout().getAnimation();
        	mainView.getLayout().setAnimation(false);
			view.pop();
			mainView.getLayout().setAnimation(anim);
        }
    	if(!tabId){
    		this.setPageTitleOnBack();
    		return;
    	}
        appMask();
    	this.setPageTitle(tab);
    	var customStore = Ext.getStore('customstoreid');
        customStore.removeAll();
        var url = URLConstants.URL + 'action=easyapps_custom_get&iApplicationId=' + TextConstants.ApplicationId + '&iAppTabId=' + tabId;

        Ext.Ajax.request({
            url: url,
            success: function (response, opts) {
                var Response = Ext.decode(response.responseText);
                try{
					/*var desc = {
						describtion: Response.custom.tDescription
					}*/
					var desc = Response.custom;
                }
                catch(e){
                	console.log(e);
                }
                //07966170309
                //parth_patel9@yahoo.com
                //parthhu@gmail.com
                //var Response = Ext.decode(response.responseText);
                console.log(Response);
                if(desc){
					customStore.add(desc);
					customStore.sync();
					if(customStore.getCount() === 1){
						me.onCustomListTap(null, null, null, customStore.getAt(0), null, null);
					}
                }
                try{
					if (Response.backgroundimage.backgroundimage && customStore.getCount() != 1) {
						view.down('list').setStyle({backgroundImage: 'url(\'http://' + Response.backgroundimage.backgroundimage + '\')'});
					}
					else if (Response.backgroundimage.backgroundimage && customStore.getCount() === 1) {
						view.down('customdetail').setStyle({backgroundImage: 'url(\'http://' + Response.backgroundimage.backgroundimage + '\')'});
						view.down('customdetail').element.dom.getElementsByClassName('x-layout-card-item')[0].style.backgroundColor = "transparent";
					}
				}
                catch(e){
                	console.log(e);
                }
                appUnmask();
            },
            failure: function (Response, opts) {
                console.log(Response);
                var customStore = Ext.getStore('customstoreid');
                var count = customStore.getCount();
                if (count > 0) {
                    Ext.ComponentQuery.query('customview #customTextId')[0].setHtml(customStore.data.items[0].data.describtion);
                }
                appUnmask();
            }
        });
    },
    onQRViewActivate: function (tab) {
        var objQrStore = Ext.getStore('qrstoreid'), tabId = tab.config.iAppTabId;
        var mainView = Ext.ComponentQuery.query('mainview')[0];
		var view = mainView.getActiveItem();
        objQrStore.removeAll();
        appMask();
        this.setPageTitle(tab);
        var url = URLConstants.URL + 'action=easyapps_Qrcode_get&iApplicationId=' + TextConstants.ApplicationId + '&iAppTabId=' + tabId;
        console.log(url);
        MyApp.services.RemoteService.remoteCall(url,
            function success(Response) {
                console.log(Response);
                appUnmask();
                try{
					objQrStore.add(Response.Qrcode)
					objQrStore.sync();
                }
                catch(e){
                	console.log(e);
                }
                if (Response.backgroundimage.backgroundimage) {
                    view.down('qrlistview').setStyle({backgroundImage: 'url(\'http://' + Response.backgroundimage.backgroundimage + '\')'});
                }
            },
            function failure(Response) {
                console.log(Response);
                appUnmask();
            }
        );
    },
    onQrListTap: function (dataView, index, target, record, e, eOpts) {
        var qrText = record.data.tQrCode;
        var dscription = record.data.tDescription;
        var qrnavi = this.getQrNavi();
        qrnavi.push({
            xtype: 'qrview',
        });
        Ext.ComponentQuery.query('qrview #qrdscid')[0].setHtml('<div style="text-align:center;margin:10px;word-wrap: break-word;">' + dscription + '<div>');
        updateQRCode(qrText);
    },
    onRssNaviViewActivate: function (tab) {
        var me = this, tabId = tab.config.iAppTabId;
        var mainView = Ext.ComponentQuery.query('mainview')[0];
		var view = mainView.getActiveItem();
        appMask();
        var url = URLConstants.URL + 'action=easyapps_RSS_get&iApplicationId=' + TextConstants.ApplicationId + '&iAppTabId=' + tabId;
        console.log(url);
        MyApp.services.RemoteService.remoteCall(url,
                function success(Response) {
                    console.log(Response);
                    TextConstants.ListImage = Response.RSS[0].vIcon;
                    if (Response.backgroundimage.backgroundimage) {
                        view.down('rsslistview').setStyle({backgroundImage: 'url(\'http://' + Response.backgroundimage.backgroundimage + '\')'});
                    }
                    var rssurl = Response.RSS[0].vRSSURL;
                    if (rssurl) {
                        me.GetRss(rssurl);
                    }
                    appUnmask();
                },
                function failure(Response) {
                    console.log(Response);
                    var store = Ext.getStore("rssstoreid");
                    store.removeAll();
                    store.sync();
                    appUnmask();
                }
        );
    },
    GetRss: function (rssurl) {
        appMask();
        Ext.data.JsonP.request({
            scope: this,
            url: URLConstants.GoogleApi + rssurl,
            params: {
                'v': 2,
                'alt': 'json'
            },
            success: function (result, request) {
                console.log(result);
                if (result.responseData) {
                    var entries = result.responseData.feed.entries;
                    var store = Ext.getStore("rssstoreid");
                    store.add(entries);
                    store.sync();
                } else {
                    appCustomAlert(TextConstants.MESSAGE, Loc.t('RSS.RSSFEEDNOTVALID'));
                }
                appUnmask();
            },
            failure: function (response) {
                appUnmask();
              //  appCustomAlert(TextConstants.MESSAGE, TextConstants.NetWork_Problem);
            }
        });
    },
    onRssListTap: function (dataView, index, target, record, e, eOpts) {
        appMask();
        var link = record.data.link;
        var RssNavi = this.getRssNavi();
        RssNavi.push({
            xtype: 'webview'
        });
        var webview = Ext.ComponentQuery.query('webview #webid')[0];
        webview.setHtml(loadURL(link));
        appUnmask();
    },
    onEventActivated: function (tab) {
        var me = this, tabId = tab.config.iAppTabId;
        var mainView = Ext.ComponentQuery.query('mainview')[0];
		var view = mainView.getActiveItem();
        me.onEventNaviViewPopToRoot();
        appMask();
        this.setPageTitle(tab);
        var objEventStore = Ext.getStore('eventstoreid');
        console.log(objEventStore);
        var url = URLConstants.URL + 'action=easyapps_event_get&iApplicationId=' + TextConstants.ApplicationId + '&iAppTabId=' + tabId;
        console.log(url);
        MyApp.services.RemoteService.remoteCall(url,
                function success(Response) {
					try{
						console.log(Response);
						objEventStore.removeAll();
						objEventStore.add(Response.event);
						objEventStore.sync();
					}
					catch(e){
						console.log(e);
					}                    
                    if (Response.backgroundimage.backgroundimage) {
                        view.down('eventlistview').setStyle({backgroundImage: 'url(\'http://' + Response.backgroundimage.backgroundimage + '\')'});
                    }
                    appUnmask();
                },
                function failure(Response) {
                    var objEventStore = Ext.getStore('eventstoreid');
                    objEventStore.removeAll();
                    objEventStore.sync();
                    console.log(Response);
                    appUnmask();
                }
        );
    },
    onEventListTap: function (dataView, index, target, record, e, eOpts) {
        var data = record.data;
        var eventNavi = this.getEventNavi();
        eventNavi.push({
            xtype: 'eventdetail',
            data: data
        });
    },
    onNotePad_AddBtnTap: function () {
        var noteNavi = this.getNotepadNavi();
        noteNavi.push({
            xtype: 'editnoteview'
        });
    },
    onNotePad_SaveBtnTap: function () {
        var editNoteText = Ext.ComponentQuery.query('editnoteview #noteTextAreaID')[0].getValue();
        var addObj = {
            text: editNoteText,
            date: new Date()
        }
        var objNoteStore = Ext.getStore('notestroid');
        objNoteStore.add(addObj);
        objNoteStore.sync();
        var noteNavi = this.getNotepadNavi();
        noteNavi.pop();
    },
    onMenuListTap: function (dataView, index, target, record, e, eOpts) {
        var menuNavi = this.getMenuNavi();
        var menuid = record.data.iMenuID;
        appMask();
        var url = URLConstants.URL + 'action=easyapps_item_get&iMenuId=' + menuid + '&iApplicationId=' + TextConstants.ApplicationId;
        MyApp.services.RemoteService.remoteCall(url,
                function success(Response) {
                    console.log(Response);
                    var objlength = Response.category.length;
                    TextConstants.OrderDettail_ItemID = Response.category[objlength - 1].iItemId;
                    var objOrderDetailStore = Ext.getStore('orderdetialstoreid');
                    objOrderDetailStore.removeAll();
                    objOrderDetailStore.add(Response.category);
                    objOrderDetailStore.sync();
                    if (menuNavi.getInnerItems().length == 1) {
                        app_PushView(menuNavi, 'orderdetailview1', "");
                    }
                    appUnmask();
                },
                function failure(Response) {
                    appCustomAlert(TextConstants.Sorry, Loc.t('MENU.NOMENUAVAILABLE'));
                    appUnmask();
                }
        );
    },
    onNewsActivated: function (tab) {
        var me = this, tabId = tab.config.iAppTabId;
        var mainView = Ext.ComponentQuery.query('mainview')[0];
		var view = mainView.getActiveItem();
        appMask();
        this.setPageTitle(tab);
        var mainView = Ext.ComponentQuery.query('mainview')[0];
		var view = mainView.getActiveItem();
		view.down('newslist').setEmptyText(Loc.t('NEWS.NONEWSISAVAILABLE') + tab.config.title);
        var url = URLConstants.URL + 'action=easyapp_news_details&iApplicationId=' + TextConstants.ApplicationId + '&iAppTabId=' + tabId;
        console.log(url);
        MyApp.services.RemoteService.remoteCall(url,
                function success(Response) {
                    console.log(Response);
                    if (Response.backgroundimage.backgroundimage) {
                        view.down('newslist').setStyle({backgroundImage: 'url(\'http://' + Response.backgroundimage.backgroundimage + '\')'});
                    }
                    var keyword = Response.News.vGoogleNewsKeyWords;
                    me.GetNews(keyword);
                    appUnmask();
                },
                function failure(Response) {
                    appUnmask();
                }
        );
    },
    onContactActivated: function (tab) {
        var me = this, tabId = tab.config.iAppTabId;
        var mainView = Ext.ComponentQuery.query('mainview')[0];
		var view = mainView.getActiveItem();
        appMask();
        this.setPageTitle(tab);
        var url = URLConstants.URL + 'action=easyapps_get_contact_bg&iApplicationId=' + TextConstants.ApplicationId + '&iAppTabId=' + tabId;
        console.log(url);
        MyApp.services.RemoteService.remoteCall(url,
                function success(Response) {
                    console.log(Response);
                    if (Response.backgroundimage.backgroundimage) {
                        view.down('formpanel').setStyle({backgroundImage: 'url(\'http://' + Response.backgroundimage.backgroundimage + '\')'});
                    }
                    appUnmask();
                },
                function failure(Response) {
                    appUnmask();
                }
        );
    },
    GetNews: function (keyword) {
        var objNewsStore = Ext.getStore('newsstoreid');
        objNewsStore.removeAll();
        appMask();
        Ext.data.JsonP.request({
            scope: this,
            url: 'http://ajax.googleapis.com/ajax/services/search/news?v=1.0&q=' + keyword + '&rsz=8',
//            url: 'http://ajax.googleapis.com/ajax/services/search/news?v=1.0&q=sports&rsz=8',
//            url: URLConstants.GoogleNews + keyword + 'sports&rsz=8',
            params: {
                'v': 2,
                'alt': 'json'
            },
            success: function (result, request) {
                console.log(result);
                var length = result.responseData.results.length;
                console.log(length);

                for (var i = 0; i < length; i++) {
                    var imageURL;
                    if (result.responseData.results[i].image) {
                        imageURL = result.responseData.results[i].image.url;
                    } else {
                        imageURL = "img/splash.png";
                    }
                    var addobj = {
                        content: result.responseData.results[i].content,
                        title: result.responseData.results[i].title,
                        publisher: result.responseData.results[i].publisher,
                        publishedDate: result.responseData.results[i].publishedDate,
                        signedRedirectUrl: result.responseData.results[i].signedRedirectUrl,
                        image: imageURL
                    }
                    objNewsStore.add(addobj);
                    objNewsStore.sync();
                }
                appUnmask();
            },
            failure: function (response) {
                appUnmask();
              //  appCustomAlert(TextConstants.MESSAGE, TextConstants.NetWork_Problem);
            }
        })
    },
    onNewsListTap: function (dataView, index, target, record, e, eOpts) {
        appMask();
        var link = record.data.signedRedirectUrl;

        var newsNavi = this.getNewsNavi();
        newsNavi.push({
            xtype: 'newswebview'
        });
        var webview = Ext.ComponentQuery.query('newswebview #newswebid')[0];
        webview.setHtml(loadURL(link));
        appUnmask();
    },
    onVoiceRecordingActivated: function (tab) {
        var me = this, tabId = tab.config.iAppTabId;
        var mainView = Ext.ComponentQuery.query('mainview')[0];
		var view = mainView.getActiveItem();
        appMask();
        var url = URLConstants.URL + 'action=easyapps_voicerecording_details&iApplicationId=' + TextConstants.ApplicationId + '&iAppTabId=' + tabId;
        console.log(url);
        MyApp.services.RemoteService.remoteCall(url,
                function success(Response) {
                    console.log(Response);
                    if (Response.backgroundimage.backgroundimage) {
                        view.down('voicerecording[itemId=mypanelid]').setStyle({backgroundImage: 'url(\'http://' + Response.backgroundimage.backgroundimage + '\')'});
                    }
                    appUnmask();
                },
                function failure(Response) {
                    appUnmask();
                }
        );
    },
    onReservationNaviActivated: function (tab) {
    	var tabId = tab.config.iAppTabId;
    	var mainView = Ext.ComponentQuery.query('mainview')[0];
		var view = mainView.getActiveItem();
        appMask();
        this.setPageTitle(tab);
        var reservationStore = Ext.getStore('resesrvationstoreid');
        reservationStore.removeAll();
        var url = URLConstants.URL + 'action=easyapps_reservation_future_lists&iApplicationId=' + TextConstants.ApplicationId + '&iAppTabId=' + tabId;
        MyApp.services.RemoteService.remoteCall(url,
                function success(Response) {
                    console.log(Response);
                    try{
						reservationStore.add(Response.reservation_list);
						reservationStore.sync();
                    }
                    catch(e){
                    	console.log(e);
                    }
                    try{
						if (Response.backgroundimage.backgroundimage) {
							view.down('reservationview').setStyle({backgroundImage: 'url(\'http://' + Response.backgroundimage.backgroundimage + '\')'});
						}
                    }
                    catch(e){
                    	console.log(e);
                    }
                    appUnmask();
                },
                function failure(Response) {
                    appUnmask();
                }
        );
    },
    onScheduleBtnID: function () {
        appMask();
        var reservationNavi = this.getReservationNavi();
        var url = URLConstants.URL + 'action=easyapps_reservation_location&iApplicationId=' + TextConstants.ApplicationId;
        var objScheduleStore = Ext.getStore('schedulereservationstore');
        objScheduleStore.removeAll();
        MyApp.services.RemoteService.remoteCall(url,
                function success(Response) {
                    console.log(Response);
                    objScheduleStore.add(Response.reservation_location);
                    objScheduleStore.sync();
                    TextConstants.LocationId = Response.reservation_location[0].iLocationId;
                    reservationNavi.push({
                        xtype: 'schedulereservation'
                    });
                    appUnmask();
                },
                function failure(Response) {
                    appCustomAlert(TextConstants.Sorry, Loc.t('RESERVATION.NORESERVATIONAVAILABLE'));
                    appUnmask();
                }
        );
    },
    onScheduleReservationListTap: function (dataView, index, target, record, e, eOpts) {
        appMask();
        var reservationNavi = this.getReservationNavi();
        var url = URLConstants.URL + 'action=easyapps_reservation_service_location&iApplicationId=' + TextConstants.ApplicationId;
        var objServiceStore = Ext.getStore('servicestore');
        objServiceStore.removeAll();
        MyApp.services.RemoteService.remoteCall(url,
                function success(Response) {
                    console.log(Response);
                    TextConstants.ServiceId = Response.reservation_service.iServiceId;
                    objServiceStore.add(Response.reservation_service);
                    objServiceStore.sync();
                    console.log(objServiceStore.getCount());
                    reservationNavi.push({
                        xtype: 'servicesview'
                    });
                    appUnmask();
                },
                function failure(Response) {
                    appUnmask();
                    appCustomAlert(TextConstants.Sorry, Response.Message);
                }
        );
    },
    onServiceListTap: function (dataView, index, target, record, e, eOpts) {
        var mystore = Ext.getStore('timestore');
        mystore.removeAll();
        var d = new Date();
        var day = d.getDay();
        TextConstants.serviceid = record.data.iServiceId;
        TextConstants.ServicePrice = record.data.vPrice;
        TextConstants.ServiceTFees = record.data.vReservationFee;
        appMask();
        var reservationNavi = this.getReservationNavi()

        var url = URLConstants.URL + 'action=get_current_day_time&iDay=' + day + '&iServiceId=' + TextConstants.serviceid;
        MyApp.services.RemoteService.remoteCall(url,
                function success(Response) {
                    console.log(Response);
                    TextConstants.Price = Response.vPrice;
                    TextConstants.ReservationFee = Response.vReservationFee;
                    TextConstants.ServiceName = Response.vServiceName;
                    mystore.add(Response.Daytime);
                    mystore.sync();
                    reservationNavi.push({
                        xtype: 'timeview'
                    });
                    appUnmask();
                },
                function failure(Response) {
                    appUnmask();
                    appCustomAlert(TextConstants.Sorry, Response.Message);
                }
        );
    },
    onBookTap: function () {
        var TimeValue = Ext.ComponentQuery.query('timeview #timeid')[0].getValue();
        var DateValue = Ext.ComponentQuery.query('timeview #dateID')[0].getValue();

        var today = new Date(DateValue);
        var dd = today.getDate();
        var mm = today.getMonth() + 1;

        var yyyy = today.getFullYear();
        if (dd < 10) {
            dd = '0' + dd;
        }
        if (mm < 10) {
            mm = '0' + mm;
        }
        var today = dd + '/' + mm + '/' + yyyy;

        console.log(TimeValue);
        console.log(today);

        var reservationNavi = this.getReservationNavi();
        reservationNavi.push({
            xtype: 'confirmview'
        });
        var objScheduleStore = Ext.getStore('schedulereservationstore');
        var Address = objScheduleStore.data.items[0].data.vAddress1;
        var City = objScheduleStore.data.items[0].data.vCity;
        var State = objScheduleStore.data.items[0].data.vState;
        var Zip = objScheduleStore.data.items[0].data.vZip;
//        TextConstants.Price
        Ext.ComponentQuery.query('confirmview #serviceNameId')[0].setHtml(TextConstants.ServiceName);
        Ext.ComponentQuery.query('confirmview #serviceAddressid')[0].setHtml(Address);
        Ext.ComponentQuery.query('confirmview #cityStateZipId')[0].setHtml(City + ',' + State + ',' + Zip);
        Ext.ComponentQuery.query('confirmview #bookDateTimeid')[0].setHtml(today + ' ' + TimeValue);
        Ext.ComponentQuery.query('confirmview #bookPriceid')[0].setHtml(TextConstants.Price);
        Ext.ComponentQuery.query('confirmview #reservationFeeId')[0].setHtml(TextConstants.ReservationFee);
    },
    onConfirmBtnTap: function () {
        var reservationNavi = this.getReservationNavi();
        reservationNavi.push({
            xtype: 'detailform'
        });
        appMask();
        var date = Ext.ComponentQuery.query('timeview #dateID')[0].getFormattedValue();
        var time = Ext.ComponentQuery.query('timeview #timeid')[0].getValue();

        var url = URLConstants.URL + 'action=easyapps_final_reservation&iApplicationId=' + TextConstants.ApplicationId + '&iUserId=' + TextConstants.UserID + '&iLocationId=' + TextConstants.LocationId + '&iServiceId=' + TextConstants.ServiceId + '&vServicePrice=' + TextConstants.ServicePrice + '&vServiceFees=' + TextConstants.ServiceTFees + '&vDate=' + date + '&vTime=' + time;
        MyApp.services.RemoteService.remoteCall(url,
                function success(Response) {
                    console.log(Response);
                    TextConstants.ReservationID = Response.Message.reservation_id;
                    appUnmask();
                },
                function failure(Response) {
                    appUnmask();
                    appCustomAlert(TextConstants.Sorry, Response.Message);
                }
        );
    },
    onConfirmBookingBtnTap: function () {
        appMask()
        var me = this;
        var email = Ext.ComponentQuery.query('detailform #emailid')[0].getValue();
        var phone = Ext.ComponentQuery.query('detailform #mobilenum')[0].getValue();
        var fname = Ext.ComponentQuery.query('detailform #firstnameid')[0].getValue();
        var lname = Ext.ComponentQuery.query('detailform #lastnameid')[0].getValue();
        var type = Ext.ComponentQuery.query('confirmview #paymethodeid')[0].getValue();

        appUnmask();
        if (type == 'cash') {
            var url = URLConstants.URL + 'action=easyapps_reservation_paypal&iApplicationId=' + TextConstants.ApplicationId + '&iUserId=' + TextConstants.UserID + '&iReservationId=' + TextConstants.ReservationID + '&iTransactionId=null&tTransactinTime=null&fAmount=' + TextConstants.ServicePrice + '&vPaymentstatus=Completed&vEmail=' + email + '&vFirstname=' + fname + '&vLastname=' + lname + '&iPhone=' + phone + '&vPaymenttype=' + type;

            MyApp.services.RemoteService.remoteCall(url,
                    function success(Response) {
                        console.log(Response);
                        appUnmask();
                    },
                    function failure(Response) {
                        appUnmask();
                        appCustomAlert(TextConstants.Sorry, Response.Message);
                    }
            );
        } else {
            TextConstants.TotalAmount = TextConstants.ServicePrice;
            TextConstants.PayOption = 'booking';
            appUnmask();
            OnBuy();
        }
    },
    
    afterBooking_PayPal: function () {
        appMask();
        var me = this;
        var email = Ext.ComponentQuery.query('detailform #emailid')[0].getValue();
        var phone = Ext.ComponentQuery.query('detailform #mobilenum')[0].getValue();
        var fname = Ext.ComponentQuery.query('detailform #firstnameid')[0].getValue();
        var lname = Ext.ComponentQuery.query('detailform #lastnameid')[0].getValue();
        var type = Ext.ComponentQuery.query('confirmview #paymethodeid')[0].getValue();

        var url = URLConstants.URL + 'action=easyapps_reservation_paypal&iApplicationId=' + TextConstants.ApplicationId + '&iUserId=' + TextConstants.UserID + '&iReservationId=' + TextConstants.ReservationID + '&iTransactionId=' + TextConstants.TransactionId + '&tTransactinTime=' + TextConstants.TransactinTime + '&fAmount=' + TextConstants.ServicePrice + '&vPaymentstatus=Completed&vEmail=' + email + '&vFirstname=' + fname + '&vLastname=' + lname + '&iPhone=' + phone + '&vPaymenttype=' + type;

        MyApp.services.RemoteService.remoteCall(url,
            function success(Response) {
                console.log(Response);
                me.onReservationNaviViewPopToRoot();
                appUnmask();
            },
            function failure(Response) {
                appUnmask();
                appCustomAlert(TextConstants.Sorry, Response.Message);
            }
        );
    },

    onSegmentTap: function (userDeskSegment) {
        var selectTextValue = userDeskSegment.getPressedButtons()[0].getText();
        console.log(selectTextValue);
        if (selectTextValue === 'Past') {
            appMask();
            var reservationStore = Ext.getStore('resesrvationstoreid');
            reservationStore.removeAll();
            var url = URLConstants.URL + 'action=easyapps_reservation_past_lists&iApplicationId=' + TextConstants.ApplicationId;
            MyApp.services.RemoteService.remoteCall(url,
                function success(Response) {
                    console.log(Response);
                    reservationStore.add(Response.reservation_list);
                    reservationStore.sync()
                    appUnmask();
                },
                function failure(Response) {
                    appUnmask();
                }
            );
        } else {
            appMask();
            var reservationStore = Ext.getStore('resesrvationstoreid');
            reservationStore.removeAll();
            var url = URLConstants.URL + 'action=easyapps_reservation_future_lists&iApplicationId=' + TextConstants.ApplicationId;
            MyApp.services.RemoteService.remoteCall(url,
                    function success(Response) {
                        console.log(Response);
                        reservationStore.add(Response.reservation_list);
                        reservationStore.sync()
                        appUnmask();
                    },
                    function failure(Response) {
                        appUnmask();
                    }
            );
        }
    },

    onArroundusActivated: function (tab) {
    	var tabId = tab.config.iAppTabId;
        appMask();
        var url = URLConstants.URL + 'action=easyapps_aroundus_get&iApplicationId=' + TextConstants.ApplicationId + '&iAppTabId=' + tabId;
        MyApp.services.RemoteService.remoteCall(url,
                function success(Response) {
                    console.log(Response);
                    var ArroundusStore = Ext.getStore('arroundstoreid');
                    ArroundusStore.removeAll();
                    var ArroundusSubStore = Ext.getStore('arroundsubstoreid');
                    ArroundusSubStore.removeAll();
                    ArroundusStore.add(Response.Aroundus);
                    ArroundusStore.sync();
                    ArroundusSubStore.add(Response.Category);
                    ArroundusSubStore.sync();

                    var btn1 = ArroundusSubStore.data.items[0].data.rCatName;
                    var btn1_bg_color = ArroundusSubStore.data.items[0].data.rCatColor;
                    var btn2 = ArroundusSubStore.data.items[1].data.rCatName;
                    var btn2_bg_color = ArroundusSubStore.data.items[1].data.rCatColor;
                    var btn3 = ArroundusSubStore.data.items[2].data.rCatName;
                    var btn3_bg_color = ArroundusSubStore.data.items[2].data.rCatColor;

                    Ext.ComponentQuery.query('arrounduslist #btn1id')[0].setText(btn1);
                    Ext.ComponentQuery.query('arrounduslist #btn2id')[0].setText(btn2);
                    Ext.ComponentQuery.query('arrounduslist #btn3id')[0].setText(btn3);

                    Ext.ComponentQuery.query('arrounduslist #btn1id')[0].setStyle('color:black;background-color:' + btn1_bg_color);
                    Ext.ComponentQuery.query('arrounduslist #btn2id')[0].setStyle('color:black;background-color:' + btn2_bg_color);
                    Ext.ComponentQuery.query('arrounduslist #btn3id')[0].setStyle('color:black;background-color:' + btn3_bg_color);

                    appUnmask();
                },
                function failure(Response) {
                    appUnmask();
                }
        );
    },
    onLocationActivated: function (tab) {
    	var tabId = tab.config.iAppTabId;
    	if(!tabId){
    		//tabId = mainView.getActiveItem().config.iAppTabId;
    		this.setPageTitleOnBack();
    		return;
    	}
        appMask();
        var mainView = Ext.ComponentQuery.query('mainview')[0];
        var view = mainView.getActiveItem();
        this.setPageTitle(tab);
        var LocationStore = Ext.getStore('locationstoreid');
        LocationStore.removeAll();
        var url = URLConstants.URL + 'action=easyapps_location_get&iApplicationId=' + TextConstants.ApplicationId + '&iAppTabId=' + tabId;
        MyApp.services.RemoteService.remoteCall(url,
                function success(Response) {
                    console.log(Response);
                    try{
						LocationStore.add(Response.Aroundus_category);
						LocationStore.sync();
                    }
                    catch(e){
                    	console.log(e);
                    }
                    var bgimage = Response.backgroundimage.backgroundimage;
                    if (bgimage) {
                        view.down('locationlist').setStyle({backgroundImage: 'url(\'http://' + bgimage + '\')'});
                    }
                    appUnmask();
                },
                function failure(Response) {
                    appUnmask();
                }
        );
    },
    onLocationListTap: function (dataView, index, target, record, e, eOpts) {
        var data = record.data;
        var locationNavi = this.getLocationNavi();
        /*locationNavi.push({
            xtype: 'mymap',
            data: data
        });*/
        var mainView = Ext.ComponentQuery.query('mainview')[0];
		var view = mainView.getActiveItem();
        if (view && view.getInnerItems().length == 1) {
			var title = view.down('[docked=top]').getTitle();
            app_PushView(locationNavi, 'mymap', data, title);
        }
    },
    onArroundListTap: function () {
        var arroundnavi = this.getArroundNavi();
        arroundnavi.push({
            xtype: 'arroundus',
        });
    },
    onArroundSegmentTap: function (userDeskSegment) {
        var selectTextValue = userDeskSegment.getPressedButtons()[0].getText();
        console.log(selectTextValue);
        if (selectTextValue == 'List') {
            Ext.ComponentQuery.query('arrounduslist #arroundListId')[0].setHidden(false);
            Ext.ComponentQuery.query('arrounduslist #mapitemid')[0].setHidden(true);
        } else {
            Ext.ComponentQuery.query('arrounduslist #arroundListId')[0].setHidden(true);
            Ext.ComponentQuery.query('arrounduslist #mapitemid')[0].setHidden(false);
        }
    },
    onCartBtnTap: function () {
        var OrderNavi = this.getOrderNavi();
        appMask();
        var url = URLConstants.URL + 'action=get_order_detail&iUserId=' + TextConstants.UserID + '&iApplicationId=' + TextConstants.ApplicationId;
        console.log(url);
        MyApp.services.RemoteService.remoteCall(url,
                function success(Response) {
                    console.log(Response);
                    var length = Response.order_detail.length;
                    TextConstants.OrderID = Response.order_detail[length - 1].iOrderId;
                    var objshowstore = Ext.getStore('showorderstoreid');
                    objshowstore.removeAll();
                    objshowstore.add(Response.order_detail);
                    objshowstore.sync();
                    var count = objshowstore.getCount();
                    for (var i = 0; i < count; i++) {
                        TextConstants.TotalAmount = TextConstants.TotalAmount + objshowstore.data.items[i].data.Total;
                    }
                    Ext.ComponentQuery.query('ordernavi #cartBtnID')[0].setHidden(true);
                    Ext.ComponentQuery.query('ordernavi #orderHistoryBtnID')[0].setHidden(true);
                    if (OrderNavi.getInnerItems().length == 1) {
                        app_PushView(OrderNavi, 'showorderview', "");
                    }
                    appUnmask();
                },
                function failure(Response) {
                    appUnmask();
                    appCustomAlert(TextConstants.Sorry, Response.Message);
                }
        );
    },
    onOrderHistoryBtnTap: function () {
        var OrderNavi = this.getOrderNavi();
        var objOrderstore = Ext.getStore('orderhistoryid');
        objOrderstore.removeAll();
        appMask();
        var url = URLConstants.URL + 'action=easyapps_order_history_get&iApplicationId=' + TextConstants.ApplicationId + '&iUserId=' + TextConstants.UserID;
        console.log(url);
        MyApp.services.RemoteService.remoteCall(url,
                function success(Response) {
                    console.log(Response);
                    objOrderstore.add(Response.order_history_details);
                    objOrderstore.sync();
                    console.log(objOrderstore.getCount());
                    if (OrderNavi.getInnerItems().length == 1) {
                        app_PushView(OrderNavi, 'orderhistory', "");
                    }
                    Ext.ComponentQuery.query('ordernavi #orderHistoryBtnID')[0].setHidden(true);
                    appUnmask();
                },
                function failure(Response) {
                    appUnmask();
                    appCustomAlert(TextConstants.Sorry, Loc.t('ORDER.ORDERHISTORYFOUND'));
                }
        );
    },
    onShowOrderDeactivate: function () {
        Ext.ComponentQuery.query('ordernavi #cartBtnID')[0].setHidden(false);
        Ext.ComponentQuery.query('ordernavi #orderHistoryBtnID')[0].setHidden(false);
    },
    onShowOrderactivate: function () {
        Ext.ComponentQuery.query('ordernavi #cartBtnID')[0].setHidden(true);
        Ext.ComponentQuery.query('ordernavi #orderHistoryBtnID')[0].setHidden(true);
    },
    onSubmitTap: function () {
        var email = Ext.ComponentQuery.query('contactview #emailid')[0].getValue();
        var number = Ext.ComponentQuery.query('contactview #mobilenumid')[0].getValue();
        var msg = Ext.ComponentQuery.query('contactview #messagefieldid')[0].getValue();
        var name = Ext.ComponentQuery.query('contactview #fullnameid')[0].getValue();

        if (email && number && msg && name) {
            appMask();
            var url = URLConstants.URL + 'action=save_contactus&vName=' + name + '&vEmail=' + email + '&vContactNumber=' + number + '&tMessage=' + msg + '&iApplicationId=' + TextConstants.ApplicationId;
            MyApp.services.RemoteService.remoteCall(url,
                    function success(Response) {
                        console.log(Response);
                        appCustomAlert(TextConstants.MESSAGE, Loc.t('CONTACTUS.MESSAGETHANKYOU'));
                        Ext.ComponentQuery.query('contactview #emailid')[0].setValue('');
                        Ext.ComponentQuery.query('contactview #mobilenumid')[0].setValue('');
                        Ext.ComponentQuery.query('contactview #messagefieldid')[0].setValue('');
                        Ext.ComponentQuery.query('contactview #fullnameid')[0].setValue('');
                        appUnmask();
                    },
                    function failure(Response) {
                        appUnmask();
                    }
            );
        } else {
            appCustomAlert(TextConstants.MESSAGE, Loc.t('ORDER.ALLFIELDMANDATORY'));
        }
    },
    onSubscribtionBtnTap: function () {
        var email = Ext.ComponentQuery.query('mailinglistview #emailid')[0].getValue();
        var name = Ext.ComponentQuery.query('mailinglistview #fullnameid')[0].getValue();
        if (email) {
            if (name) {
                appMask();
                var url = URLConstants.URL + 'action=easyapps_mailchimp_subscription&iApplicationId=' + TextConstants.ApplicationId + '&name=' + name + '&email=' + email;
                MyApp.services.RemoteService.remoteCall(url,
                        function success(Response) {
                            console.log(Response);
                            Ext.ComponentQuery.query('mailinglistview #emailid')[0].setValue('');
                            Ext.ComponentQuery.query('mailinglistview #fullnameid')[0].setValue('');
                            appCustomAlert(TextConstants.MESSAGE, Loc.t('MAIN.THANKSSUBSCRIBE'));
                            appUnmask();
                        },
                        function failure(Response) {
                            appUnmask();
                        }
                );
            } else {
                appCustomAlert(TextConstants.MESSAGE, Loc.t('CATELOG.NAMEERROR'));
            }
        } else {
            appCustomAlert(TextConstants.MESSAGE, Loc.t('CATELOG.EMAILERROR'));
        }

    },
    onLoyalityShareTap: function () {
        socialsharing();
    },
    onMessagesListTap: function (dataView, index, target, record, e, eOpts) {
        var myTarget = e.target;
        var mycls = myTarget.className;
        var str1 = 'My_';
        str1 += record.data.id
        if (mycls == 'sharebtncls') {
            var msg = record.data.message;
            socialsharing(msg);
        } else if (mycls == 'emptycheck') {
            document.getElementById(str1).className = 'CheckedP';
            document.getElementById(str1).src = "img/checkboxselnormal.png";
            TextConstants.MSGITEMARRAYCONSTANT.push(record.data.id);
        } else if (mycls == "CheckedP") {
            document.getElementById(str1).className = 'emptycheck';
            document.getElementById(str1).src = "img/checkbox480.png";
            var index = TextConstants.MSGITEMARRAYCONSTANT.indexOf(record.data.id);
            if (index > -1) {
                TextConstants.MSGITEMARRAYCONSTANT.splice(index, 1);
            }
        }
    },
    onMenu_MenuDayBtnTap: function (tab) {
        var menuNavi = this.getMenuDayNavi(), tabId = tab.config.iAppTabId;
        appMask();
        this.setPageTitle(tab);
        var url = URLConstants.URL + 'action=easyapps_menuofthe_day&iApplicationId=' + TextConstants.ApplicationId;
        MyApp.services.RemoteService.remoteCall(url,
                function success(Response) {
                    console.log(Response);
                    var objlength = Response.items.length
                    TextConstants.OrderDettail_ItemID = Response.items[objlength - 1].iItemId;
                    var objOrderDetailStore = Ext.getStore('MenuOfDayStore')
                    objOrderDetailStore.removeAll();
                    objOrderDetailStore.add(Response.items);
                    objOrderDetailStore.sync();
                    Ext.ComponentQuery.query('ordernavi #cartBtnID')[0].setHidden(true);
                    Ext.ComponentQuery.query('ordernavi #orderHistoryBtnID')[0].setHidden(true);
                    if (menuNavi.getInnerItems().length == 1) {
                        app_PushView(menuNavi, 'orderdetailview1', "");
                    }
                    appUnmask();
                },
                function failure(Response) {
                    var objOrderDetailStore = Ext.getStore('orderdetialstoreid')
                    objOrderDetailStore.removeAll();
                    appCustomAlert(TextConstants.Sorry, Loc.t('MENUOFTHEDAY.NOMENUAVAILABLE'));
                    appUnmask();
                }
        );
    },
    onOrder_MenuDayBtnTap: function () {
        var OrderNavi = this.getOrderNavi();
        appMask();
        var url = URLConstants.URL + 'action=easyapps_menuofthe_day&iApplicationId=' + TextConstants.ApplicationId;
        MyApp.services.RemoteService.remoteCall(url,
                function success(Response) {
                    console.log(Response);
                    var objlength = Response.Menu_day.length;
                    TextConstants.OrderDettail_ItemID = Response.Menu_day[objlength - 1].iItemId;
                    var objOrderDetailStore = Ext.getStore('orderdetialstoreid');
                    objOrderDetailStore.removeAll();
                    objOrderDetailStore.add(Response.Menu_day);
                    objOrderDetailStore.sync();
                    Ext.ComponentQuery.query('ordernavi #cartBtnID')[0].setHidden(true);
                    Ext.ComponentQuery.query('ordernavi #orderHistoryBtnID')[0].setHidden(true);
                    if (OrderNavi.getInnerItems().length == 1) {
                        console.log('come hear');
                        app_PushView(OrderNavi, 'orderdetailview', "");
                    }
                    appUnmask();
                },
                function failure(Response) {
                    var objOrderDetailStore = Ext.getStore('orderdetialstoreid');
                    objOrderDetailStore.removeAll();
                    appUnmask();
                    appCustomAlert(TextConstants.Sorry, Loc.t('MENUOFTHEDAY.NOMENUAVAILABLE'));
                }
        );
    },
    activateTab: function (tab) {
        var a = parseInt(tab);
        a = a - 1;
        var tabPanel = this.getMainView();
        tabPanel.setActiveItem(a);
    },
    onGallary_ShareBtnTap: function () {
        SocialSharingLink();
    },
    onMessageDeleteBtnTap: function () {
        var length = TextConstants.MSGITEMARRAYCONSTANT.length;
        var msgStore = Ext.getStore('messagestoreid');
        Ext.Msg.show({
            title: Loc.t('CATELOG.ALERT'),
            message: Loc.t('MESSAGE.SUREDELETEMSG'),
            scope: this,
            buttons: [
                {
                    itemId: 'no',
                    text: Loc.t('BUTTON.CANCEL'),
                    ui: 'action'
                },
                {
                    itemId: 'yes',
                    text: Loc.t('BUTTON.OK'),
                    ui: 'action'
                }
            ],
            fn: function (btn) {
                if (btn == 'yes') {
                    if (length > 0) {
                        for (var i = 0; i < length; i++) {
                            console.log(TextConstants.MSGITEMARRAYCONSTANT[i]);
                            var aRecord = msgStore.getById(TextConstants.MSGITEMARRAYCONSTANT[i]);
                            msgStore.remove(aRecord);
                            msgStore.sync();
                        }
                        TextConstants.MSGITEMARRAYCONSTANT = [];
                    }
                } else {
//                     ownedProducts();
                }
            }
        });
    },
    onDownlistTap: function (dataView, index, target, record, e, eOpts) {
        var url = record.data.link;
        window.open(url, '_system');
    },
    onCalucalateTap: function () {
        var homePrice = Ext.ComponentQuery.query('mortgagecalculator #homepriceID')[0].getValue();
        homePrice = parseInt(homePrice);
        var DP = Ext.ComponentQuery.query('mortgagecalculator #downPaymentID')[0].getValue();
        DP = parseInt(DP);
        var LoanAmount = homePrice - DP;
        Ext.ComponentQuery.query('mortgagecalculator #loanAmtId')[0].setValue(LoanAmount);
        LoanAmount = parseInt(LoanAmount);
        var Interest = Ext.ComponentQuery.query('mortgagecalculator #interestRateID')[0].getValue();
        var LoanTerms = Ext.ComponentQuery.query('mortgagecalculator #loantermsID')[0].getValue();
        var n = LoanTerms * 12;

        var i = Interest / 12;
        i = i / 100;

        var i1 = i + 1;
        var v3 = i + 1;

        for (var j = 1; j < n; j++) {
            i1 = i1 * v3;
        }

        var final = i1 * i;
        var final_p = LoanAmount * final;
        var D = i1 - 1;

        var Final_result = final_p / D;

        Ext.ComponentQuery.query('mortgagecalculator #monthlyAmtId')[0].setValue(Final_result);

    },
    onScanTap: function () {
        scan();
    },
    onAppointmentConfirmBtnTap: function () {
        var formRecord = Ext.ComponentQuery.query('appointmentview #appointmentformid')[0];

        var date = Ext.ComponentQuery.query('appointmentview #dateID')[0].getValue();
        var time = Ext.ComponentQuery.query('appointmentview #appointmenttimeid')[0].getValue();
        var name = Ext.ComponentQuery.query('appointmentview #appointmentnameid')[0].getValue();
        var email = Ext.ComponentQuery.query('appointmentview #emailid')[0].getValue();
        var phone = Ext.ComponentQuery.query('appointmentview #phonenameid')[0].getValue();
        var remark = Ext.ComponentQuery.query('appointmentview #remarkid')[0].getValue();

        console.log(formRecord);
        var AppointmentModel = Ext.create('MyApp.model.AppointmentModel'),
                errors, errorMessage = '';

        formRecord.updateRecord(AppointmentModel);
        errors = AppointmentModel.validate();

        if (!errors.isValid()) {
            errors.each(function (err) {
                errorMessage += err.getMessage() + '<br/>';
            });
            Ext.Msg.alert('Form is invalid!', errorMessage);
        } else {
            appMask();
            var url = URLConstants.URL + 'action=easyapps_appoitment_details&iApplicationId=' + TextConstants.ApplicationId + '&iAppoitmentDate=' + date + '&vAppoitmentTime=' + time + '&vAppoitmentName=' + name + '&vEmail=' + email + '&vPhone=' + phone + '&vRemark=' + remark;
            MyApp.services.RemoteService.remoteCall(url,
                    function success(Response) {
                        console.log(JSON.stringify(Response));
                        appCustomAlert(TextConstants.MESSAGE, Loc.t('APPOINTMENT.SUCCESSFULLYADDED'));
                        appUnmask();
                    },
                    function failure(Response) {
                        console.log(Response);
                        appUnmask();
                        appCustomAlert(TextConstants.Sorry, Loc.t('APPOINTMENT.CHECKINTERNETCONNECTION'));
                    }
            );
        }
    },
    onQuoteSubmitTap: function () {
        var formRecord = Ext.ComponentQuery.query('quoteview #appointmentformid')[0];
        var name = Ext.ComponentQuery.query('quoteview #quotenameid')[0];
        var email = Ext.ComponentQuery.query('quoteview #quoteemailid')[0];
        var phone = Ext.ComponentQuery.query('quoteview #quotephonenumberid')[0];
        var comment = Ext.ComponentQuery.query('quoteview #quotecommentid')[0];

        var name = formRecord.quotetname;
        var QuotationModel = Ext.create('MyApp.model.QuotationModel'),
                errors, errorMessage = '';

        formRecord.updateRecord(QuotationModel);
        errors = QuotationModel.validate();

        if (!errors.isValid()) {
            errors.each(function (err) {
                errorMessage += err.getMessage() + '<br/>';
            });
            Ext.Msg.alert('Form is invalid!', errorMessage);
        } else {
            appMask();
            var url = URLConstants.URL + 'action=easyapps_quotation_details&iApplicationId=' + TextConstants.ApplicationId + '&vQuotationName=' + name + '&vQuotationemail=' + email + '&vQuotationNumber=' + phone + '&vQuotationComment=' + comment;
            MyApp.services.RemoteService.remoteCall(url,
                    function success(Response) {
                        console.log(JSON.stringify(Response));
                        appCustomAlert(TextConstants.MESSAGE, Loc.t('QUOTATION.SUCCESSFULLYADDED'));
                        appUnmask();
                    },
                    function failure(Response) {
                        console.log(Response);
                        appUnmask();
                        appCustomAlert(TextConstants.Sorry, Loc.t('APPOINTMENT.CHECKINTERNETCONNECTION'));
                    }
            );
        }
    },
    onSizeItemListTap: function (dataView, index, target, record, e, eOpts) {
        TextConstants.SizePrice = record.data.fPrice;
    },
    onOptionItemListTap: function (dataView, index, target, record, e, eOpts) {
        TextConstants.OptionPrice = record.data.fCharge;
    },

    onArrivalViewActivate: function (tab) {
    	var tabId = tab.config.iAppTabId;
    	var mainView = Ext.ComponentQuery.query('mainview')[0];
		var view = mainView.getActiveItem();
        var objNewArrivalStore = Ext.getStore('newarrivalstoreid');
        objNewArrivalStore.removeAll();
        appMask();
        var url = URLConstants.URL + 'action=easyapps_arrival_details&iApplicationId=' + TextConstants.ApplicationId + '&iAppTabId=' + tabId;
        console.log("====================================================================");
        console.log(url);
        console.log("====================================================================");
        MyApp.services.RemoteService.remoteCall(url,
                function success(Response) {
                    console.log(Response);
                    try{
						objNewArrivalStore.add(Response.arrival);
						objNewArrivalStore.sync();
					}
					catch(e){
                    	console.log(e);
                    }
					var bgimage = Response.backgroundimage.backgroundimage;
					if (bgimage) {
						view.down('newarrivalview').setStyle({backgroundImage: 'url(\'http://' + bgimage + '\')'});
					}
                    appUnmask();
                },
                function failure(Response) {
                    appCustomAlert(TextConstants.Sorry,  Loc.t('NEWARRIVAL.NONEWARRIVAL'));
                }
        );
    },
    onNewArrivalListTap: function(dataView, index, target, record, e, eOpts){
        var newarrivalNavi = this.getNewarrivalNavi();
        var data = record.data;
        if(newarrivalNavi.getInnerItems().length == 1){
            app_PushView(newarrivalNavi, 'newarrivaldetails', data);
        }
    },
    onOrgnizationSubmitBtnTap: function () {
        TextConstants.PayOption = 'donation';
        TextConstants.TotalAmount = Ext.ComponentQuery.query('donationview #ammountid')[0].getValue();
        OnBuy();
    },
    onOrgnizationAfterSubmitBtnTap: function () {
        var OrganizationTextValue = Ext.ComponentQuery.query('donationview #organizationid')[0].getValue();
        var name = Ext.ComponentQuery.query('donationview #fullnameid')[0].getValue();
        var currencycode = Ext.ComponentQuery.query('donationview #currencycodeid')[0].getValue();
        appMask();
        var me = this;
        var url = URLConstants.URL + 'action=easyapps_donation_details&iApplicationId=' + TextConstants.ApplicationId + '&vOrganization=' + OrganizationTextValue + '&vTransactionId=' + TextConstants.TransactionId + '&vName=' + name + '&vCurrencyCode=' + currencycode + '&fAmount=' + TextConstants.TotalAmount + '&tDateTime=' + TextConstants.TransactinTime + '&vPaymentstatus=' + TextConstants.Payments;
        MyApp.services.RemoteService.remoteCall(url,
                function success(Response) {
                    console.log(JSON.stringify(Response));
                    appCustomAlert(TextConstants.MESSAGE, Loc.t('DONATION.THANKYOUDONATION'));
                    appUnmask();
                },
                function failure(Response) {
                    console.log(Response);
                    appUnmask();
                    appCustomAlert(TextConstants.Sorry, Loc.t('DONATION.CHECKINTERNETCONNECTION'));
                }
        );
    },

    onTestimonialViewActivate: function (tab) {
    	var tabId = tab.config.iAppTabId;
        var objtestmonialstore = Ext.getStore("testimonialstoreid");
        objtestmonialstore.removeAll();
        appMask();
        var url = URLConstants.URL + 'action=easyapps_testonomial_details&iApplicationId=' + TextConstants.ApplicationId + '&iAppTabId=' + tabId;
        MyApp.services.RemoteService.remoteCall(url,
                function success(Response) {
                    console.log(JSON.stringify(Response));
                    objtestmonialstore.add(Response.testomonial_details);
                    objtestmonialstore.sync();
                   
                    Ext.ComponentQuery.query('testimonialview #feedbacktextid')[0];
                    appUnmask();
                },
                function failure(Response) {
                    console.log(Response);
                    appUnmask();
                    appCustomAlert(TextConstants.Sorry, Loc.t('DONATION.CHECKINTERNETCONNECTION'));
                }
        );
    },
    onTestimonialSubmitBtnTap: function () {
        var name = Ext.ComponentQuery.query('testimonialview #nameid')[0].getValue();
        var description = Ext.ComponentQuery.query('testimonialview #feedbacktextid')[0].getValue();
        var me = this;
        appMask();
        var url = URLConstants.URL + 'action=easyapps_testomonial_add&iApplicationId=' + TextConstants.ApplicationId + '&iTestonomialName=' + name + '&tDescription=' + description;
        MyApp.services.RemoteService.remoteCall(url,
                function success(Response) {
                    console.log(JSON.stringify(Response));
                    Ext.ComponentQuery.query('testimonialview #nameid')[0].setValue('');
                    Ext.ComponentQuery.query('testimonialview #feedbacktextid')[0].setValue('');
                    me.onTestimonialViewActivate();
                    appCustomAlert(TextConstants.MESSAGE, Loc.t('TESTIMONIAL.ADDSUCCESS'));
                    appUnmask();
                },
                function failure(Response) {
                    console.log(Response);
                    appUnmask();
                    appCustomAlert(TextConstants.Sorry, Loc.t('DONATION.CHECKINTERNETCONNECTION'));
                }
        );
    },
    onReviewBtnTap: function () {
        var name = Ext.ComponentQuery.query('review #nameid')[0].getValue();
        var description = Ext.ComponentQuery.query('review #feedbacktextid')[0].getValue();
        appMask();
        var url = URLConstants.URL + 'action=easyapps_review_add&iApplicationId=' + TextConstants.ApplicationId + '&iTestonomialName=' + name + '&tDescription=' + description;
        MyApp.services.RemoteService.remoteCall(url,
                function success(Response) {
                    console.log(JSON.stringify(Response));
                    Ext.ComponentQuery.query('review #nameid')[0].setValue('');
                    Ext.ComponentQuery.query('review #feedbacktextid')[0].setValue('');
                    appCustomAlert(TextConstants.MESSAGE, Loc.t('REVIEW.ADDSUCCESS'));
                    appUnmask();
                },
                function failure(Response) {
                    console.log(Response);
                    appUnmask();
                    appCustomAlert(TextConstants.Sorry, Loc.t('DONATION.CHECKINTERNETCONNECTION'));
                }
        );
    },
    onCatelogListTap: function (dataView, index, target, record, e, eOpts) {
        var catelogNavi = this.getCatelogNavi();
        var data = record.data;

        if (catelogNavi.getInnerItems().length == 1) {
            app_PushView(catelogNavi, 'catelogdetails', data);
        }
    },
    onAppointmentViewActivate: function (tab) {
    	var tabId = tab.config.iAppTabId;
        Ext.ComponentQuery.query('appointmentview #appointmentcnfrmTextid')[0].setHidden(true);
        appMask();
        var url = URLConstants.URL + 'action=easyapps_appointment_details&iApplicationId=' + TextConstants.ApplicationId + '&iAppTabId=' + tabId;
        MyApp.services.RemoteService.remoteCall(url,
                function success(Response) {
                    console.log(JSON.stringify(Response));

                    Ext.ComponentQuery.query('appointmentview #appointmentcnfrmTextid')[0].setHidden(false);
                    if (Response.appointment.eStatus != "Active") {
                        Ext.ComponentQuery.query('appointmentview #appointmentcnfrmTextid')[0].setHtml('<div style="text-align: center;  margin-top: 10px;  color: red;font-weight: bold;">'+Loc.t('APPOINTMENT.NOTCONFIRMMSG')+'</div>');
                    } else {
                        Ext.ComponentQuery.query('appointmentview #appointmentcnfrmTextid')[0].setHtml('<div style="text-align: center;  margin-top: 10px;  color: green;font-weight: bold;">'+Loc.t('APPOINTMENT.CONFIRMMSG')+'</div>');
                    }
                    appUnmask();
                },
                function failure(Response) {
                    Ext.ComponentQuery.query('appointmentview #appointmentcnfrmTextid')[0].setHidden(true);
                    console.log(Response);
                    appUnmask();
                    appCustomAlert(TextConstants.Sorry, Loc.t('DONATION.CHECKINTERNETCONNECTION'));
                }
        );
    },
    onTicketInfoViewActivate: function (tab) {
    	var tabId = tab.config.iAppTabId;
    	var mainView = Ext.ComponentQuery.query('mainview')[0];
		var view = mainView.getActiveItem();
        var objTicketStore = Ext.getStore("ticketstoreid");
        objTicketStore.removeAll();
        appMask();
        var url = URLConstants.URL + 'action=easyapps_ticket_details&iApplicationId=' + TextConstants.ApplicationId + '&iAppTabId=' + tabId;
        MyApp.services.RemoteService.remoteCall(url,
                function success(Response) {
                    console.log(JSON.stringify(Response));
                    objTicketStore.add(Response.ticket);
                    objTicketStore.sync();
                    var bgimage = Response.backgroundimage.backgroundimage;
//                      alert(bgimage)
                      console.log(Ext.ComponentQuery.query('servicesview'));
                    if (bgimage) {
                        view.down('ticketinfoview').setStyle({backgroundImage: 'url(\'http://' + bgimage + '\')'});
                    }
                    appUnmask();
                },
                function failure(Response) {
                    Ext.ComponentQuery.query('appointmentview #appointmentcnfrmTextid')[0].setHidden(true);
                    console.log(Response);
                    appUnmask();
                    appCustomAlert(TextConstants.Sorry, Loc.t('DONATION.CHECKINTERNETCONNECTION'));
                }
        );
    },
    onEcommarceSearchBtnTap: function () {
        var SearchTextValue = Ext.ComponentQuery.query('ecommarceview #searchBox')[0].getValue();
        var objCatelogStore = Ext.getStore('catelogestoreid');
        var objCatelogsizeStore = Ext.getStore('catelogsizestoreid');
        objCatelogStore.removeAll();
        objCatelogsizeStore.removeAll();
        var sizelength;
        appMask();
        var url = URLConstants.URL + 'action=easyapps_ecommerce_search&iApplicationId=' + TextConstants.ApplicationId + '&key=' + SearchTextValue;
        MyApp.services.RemoteService.remoteCall(url,
                function success(Response) {
                    console.log(JSON.stringify(Response));
                    objCatelogStore.add(Response.search_result);
                    objCatelogStore.sync
                    var length1 = Response.search_result.length;
                    if (length1 > 0) {
                        for (var i = 0; i < length1; i++) {
                            sizelength = Response.search_result[i].size_details.length;
                    //        alert('size array length : '+sizelength);
                            if (sizelength > 0) {
                                for (var j = 0; j < sizelength; j++) {
                                    objCatelogsizeStore.add(Response.search_result[i].size_details[j]);
                                    objCatelogsizeStore.sync();
                                }
                            }
                        }
                    }
                    appUnmask();
                },
                function failure(Response) {
                    Ext.ComponentQuery.query('appointmentview #appointmentcnfrmTextid')[0].setHidden(true);
                    console.log(Response);
                    appUnmask();
                    appCustomAlert(TextConstants.Sorry, Loc.t('DONATION.CHECKINTERNETCONNECTION'));
                }
        );
    },
    onEcommarceSerchListTap: function (dataView, index, target, record, e, eOpts) {
        var data = record.data;
        var EcommarceNavi = this.getEcommarceNavi();
        var cartstoreid = Ext.getStore("addcartstoreid");
        var itemText = record.data.iCatelogueId;
        var index = cartstoreid.find("iCatelogueId", itemText);
        if (EcommarceNavi.getInnerItems().length == 1) {
            app_PushView(EcommarceNavi, 'ecommarcedetails', data);
        }
        if (index >= 0) {
            Ext.ComponentQuery.query('ecommarcedetails #ecommerce_AddtocartBtnid')[0].setText(Loc.t('CART.REMOVE'));
            Ext.ComponentQuery.query('ecommarcedetails #ecommerce_AddtocartBtnid')[0].setUi('decline');
        } else {
            Ext.ComponentQuery.query('ecommarcedetails #ecommerce_AddtocartBtnid')[0].setText(Loc.t('CART.ADD'));
            Ext.ComponentQuery.query('ecommarcedetails #ecommerce_AddtocartBtnid')[0].setUi('action');
        }
    },
    onEcommarceSizeListTap: function (dataView, index, target, record, e, eOpts) {
        TextConstants.CatelogueId = record.data.iCatelogueId;
        if (record.data.fSizePrice) {
            TextConstants.TotalAmount = record.data.fSizePrice;
        }
    },
    onBuyBtnTap: function (storeData) {
        var BtnText = Ext.ComponentQuery.query('ecommarcedetails #ecommerce_AddtocartBtnid')[0].getText();
        var itemText = storeData.iCatelogueId;
        var cartstoreid = Ext.getStore("addcartstoreid");

        if (BtnText == Loc.t('CART.REMOVE')) {
            var index = cartstoreid.find("iCatelogueId", itemText);
            console.log(index);
            cartstoreid.removeAt(index);
            cartstoreid.sync();
            Ext.ComponentQuery.query('ecommarcedetails #ecommerce_AddtocartBtnid')[0].setText(Loc.t('CART.ADD'));
            Ext.ComponentQuery.query('ecommarcedetails #ecommerce_AddtocartBtnid')[0].setUi('action');
        } else {
            cartstoreid.add(storeData);
            cartstoreid.sync();
            Ext.ComponentQuery.query('ecommarcedetails #ecommerce_AddtocartBtnid')[0].setText(Loc.t('CART.REMOVE'));
            Ext.ComponentQuery.query('ecommarcedetails #ecommerce_AddtocartBtnid')[0].setUi('decline');
        }
        //        TextConstants.PayOption = 'ecommarcebuy'
        //        console.log("price= " + TextConstants.TotalAmount)
        //        console.log("optaion= " + TextConstants.PayOption)
        //        OnBuy()
    },

    onAfterEcommerceBuy: function () {
        appMask();
        var store = Ext.getStore("catelogestoreid");
        var user = store.findRecord('iCatelogueId', TextConstants.CatelogueId);
        console.log(user.data.tTotalProduct);
        var TotalProduct = user.data.tTotalProduct;
        var me = this;
        var url = URLConstants.URL + 'action=easyapps_ecommerse_paypal_payment&iApplicationId=' + TextConstants.ApplicationId + '&vTransactionId=' + TextConstants.TransactionId + '&iUserId=' + TextConstants.UserID + '&iCatalogueId=' + TextConstants.CatelogueId + '&fTotalPrice=' + TextConstants.TotalAmount + '&vDateTime=' + TextConstants.TransactinTime + '&vPaymentStatus=' + TextConstants.Payments + '&iTotalProduct=' + TotalProduct;
        MyApp.services.RemoteService.remoteCall(url,
                function success(Response) {
                    console.log(JSON.stringify(Response));
                    appCustomAlert(TextConstants.MESSAGE, Loc.t('PURCHASE.SUCCESS'));
                    appUnmask();
                },
                function failure(Response) {
                    console.log(Response);
                    appUnmask();
                    appCustomAlert(TextConstants.Sorry, Loc.t('DONATION.CHECKINTERNETCONNECTION'));
                }
        );
    },

    ecommarceview_CartBtnTap: function () {
        var EcommarceNavi = this.getEcommarceNavi();
        if (EcommarceNavi.getInnerItems().length == 1) {
            app_PushView(EcommarceNavi, 'ecommercecartdetails', "");
        }
    },

    onServiceNaviActivate: function (tab) {
		var tabId = tab.config.iAppTabId;
		var mainView = Ext.ComponentQuery.query('mainview')[0];
		var view = mainView.getActiveItem();
        var objServiceTabStore = Ext.getStore("servicetabstoreid");
        objServiceTabStore.removeAll();
        var objServiceTimingTabStore = Ext.getStore("servicetimingtabstoreid");
        objServiceTimingTabStore.removeAll();
        var sizelength;
        appMask();
        this.setPageTitle(tab);
        var url = URLConstants.URL + 'action=easyapps_service_details&iApplicationId=' + TextConstants.ApplicationId + '&iAppTabId=' + tabId;
        MyApp.services.RemoteService.remoteCall(url,
                function success(Response) {
                	try{
						console.log(JSON.stringify(Response));
						objServiceTabStore.add(Response.service);
						objServiceTabStore.sync();
						var length1 = Response.service.length;
					 
						if (length1 > 0) {
							for (var i = 0; i < length1; i++) {
								if(Response.service[i].service_timing){
									sizelength = Response.service[i].service_timing.length;
									if (sizelength > 0) {
										for (var j = 0; j < sizelength; j++) {
											objServiceTimingTabStore.add(Response.service[i].service_timing[j]);
											objServiceTimingTabStore.sync();
										}
									}
								}
							}
						}
                    }
                    catch(e){
                    	console.log(e);
                    }
                    var bgimage = Response.backgroundimage.backgroundimage;
					if (bgimage) {
						view.down('serviceview').setStyle({backgroundImage: 'url(\'http://' + bgimage + '\')'});
					}
                    appUnmask();
                },
                function failure(Response) {
                    console.log(Response);
                    appUnmask();
                    appCustomAlert(TextConstants.Sorry, Loc.t('DONATION.CHECKINTERNETCONNECTION'));
                }
        );
    },
    onServiceTabListTap: function (dataView, index, target, record, e, eOpts) {
        var data = record.data;
        var ServiceNavi = this.getServiceNavi();
        if (ServiceNavi.getInnerItems().length == 1) {
            app_PushView(ServiceNavi, 'servicetabdetailview', data);
        }
        var TimeStore = Ext.getStore("servicetimingtabstoreid");
        var count = TimeStore.getCount();
        if (count > 0) {
            for (var i = 0; i < count; i++) {
                Ext.ComponentQuery.query('servicetabdetailview #' + TimeStore.data.items[i].data.vServiceDay + '')[0].setHtml("<table style='border-bottom:1px solid #000;border-right:1px solid #000000;border-left:1px solid #000000;border-top:none;margin-bottom:0px;'><tr><td style='text-align:center;border-right:1px solid #000;width:33.33%;'>" + TimeStore.data.items[i].data.vServiceDay + "</td><td style='text-align:center;border-right:1px solid #000;width:33.33%;'>" + TimeStore.data.items[i].data.tServiceStartTime + "</td><td style='text-align:center;width:33.33%;'>" + TimeStore.data.items[i].data.tServiceEndTime + "</td></tr></table>");
                Ext.ComponentQuery.query('servicetabdetailview #' + TimeStore.data.items[i].data.vServiceDay + '')[0].setHidden(false);
            }
        }
    },
    onBlogNaviActivate: function (tab) {
    	var tabId = tab.config.iAppTabId;
    	var mainView = Ext.ComponentQuery.query('mainview')[0];
		var view = mainView.getActiveItem();
        var objblogStore = Ext.getStore("blosgstoreid");
        objblogStore.removeAll();
        var url = URLConstants.URL + 'action=easyapps_blog_details&iApplicationId=' + TextConstants.ApplicationId + '&iAppTabId=' + tabId;
        MyApp.services.RemoteService.remoteCall(url,
                function success(Response) {
                    console.log(Response);
                    objblogStore.add(Response.blog);
                    objblogStore.sync();
                    appUnmask();
                    var bgimage = Response.backgroundimage.backgroundimage;
//                      alert(bgimage);
                      console.log(Ext.ComponentQuery.query('servicesview'));
                    if (bgimage) {
                        view.down('blogview').setStyle({backgroundImage: 'url(\'http://' + bgimage + '\')'});
                    }
                },
                function failure(Response) {
                    console.log(Response);
                    appUnmask();
                    appCustomAlert(TextConstants.Sorry, Loc.t('DONATION.CHECKINTERNETCONNECTION'));
                }
        );
    },
    onBlogListTap: function (dataView, index, target, record, e, eOpts) {
        var blognavi = this.getBlogNavi();

        if (blognavi.getInnerItems().length == 1) {
            app_PushView(blognavi, 'blogwebview', "");
        }

        var link = record.data.vBlogUrl;
        var webview = Ext.ComponentQuery.query('blogwebview #webid')[0];
        webview.setHtml(loadURL(link));
    },
	onMailingListViewActivate: function(tab){
		var me, tabId = tab.config.iAppTabId;
		console.log(tabId);
	},
	onMenuNaviActivate: function(tab){
		var me, tabId = tab.config.iAppTabId;
		console.log(tabId);
		this.setPageTitle(tab);
	},
	onNotepadNaviActivate: function(tab){
		var me, tabId = tab.config.iAppTabId;
		console.log(tabId);
	},
	onMessageViewActivate: function(tab){
		var me, tabId = tab.config.iAppTabId;
		var mainView = Ext.ComponentQuery.query('mainview')[0];
		var view = mainView.getActiveItem();
        appMask();
		this.setPageTitle(tab);
		var url = URLConstants.URL + 'action=get_msg_bg_img&iApplicationId=' + TextConstants.ApplicationId + '&iAppTabId=' + tabId;
        console.log(url);
        MyApp.services.RemoteService.remoteCall(url,
                function success(Response) {
                    console.log(Response);
                    if (Response.backgroundimage.backgroundimage) {
                        view.setStyle({backgroundImage: 'url(\'http://' + Response.backgroundimage.backgroundimage + '\')'});
                    }
                    appUnmask();
                },
                function failure(Response) {
                    appUnmask();
                }
        );
	},
	onMortgageCalculatorActivate: function(tab){
		var me, tabId = tab.config.iAppTabId;
		console.log(tabId);
	},
	onScientificCalculatorViewActivate: function(tab){
		var me, tabId = tab.config.iAppTabId;
		console.log(tabId);
	},
	onScannerViewActivate: function(tab){
		var me, tabId = tab.config.iAppTabId;
		console.log(tabId);
	},
	onAppointmentViewActivate: function(tab){
		var me, tabId = tab.config.iAppTabId;
		console.log(tabId);
	},
	onQuoteViewActivate: function(tab){
		var me, tabId = tab.config.iAppTabId;
		console.log(tabId);
	},
	onReViewActivate: function(tab){
		var me, tabId = tab.config.iAppTabId;
		console.log(tabId);
	},
	onCatelogNaviActivate: function(tab){
		var me, tabId = tab.config.iAppTabId;
		console.log(tabId);
	},
	onDonationNaviActivate: function(tab){
		var me, tabId = tab.config.iAppTabId;
		console.log(tabId);
	},
	onOrderNaviActivate: function(tab){
		var me, tabId = tab.config.iAppTabId;
		console.log(tabId);
		this.setPageTitle(tab);
	},
	onLoyalitiNaviActivate: function(tab){
		var me, tabId = tab.config.iAppTabId;
		console.log(tabId);
		this.setPageTitle(tab);
	},
	setPageTitle: function(tab){
		if(!tab.config.title){
			return;
		}
		var mainView = Ext.ComponentQuery.query('mainview')[0];
		var view = mainView.getActiveItem();
		view.down('[docked=top]').setTitle(tab.config.title);
		if(view.down('toolbar')){
			view.down('toolbar').setTitle(tab.config.title);
		}
		if(view.down('titlelbar')){
			view.down('titlebar').setTitle(tab.config.title);
		}
	},
	setPageTitleOnBack: function(){
		setTimeout(function(){
			var mainView = Ext.ComponentQuery.query('mainview')[0];
			var view = mainView.getActiveItem();
			if(mainView.getActiveItem().getNavigationBar){
				mainView.getActiveItem().getNavigationBar().setTitle(view.$currentTitle);
			}
		}, 251);
	},
	onCustomListTap: function (dataView, index, target, record, e, eOpts) {
        var data = record.data;
        //var customNavi = this.getCustomViewNavi();
        var mainView = Ext.ComponentQuery.query('mainview')[0];
		var view = mainView.getActiveItem();
        if (view && view.getInnerItems().length == 1) {
			var title = view.down('[docked=top]').getTitle();
            app_PushView(view, 'customdetail', data, title, dataView);
        }
    }
});
