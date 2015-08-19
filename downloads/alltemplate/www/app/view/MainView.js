Ext.define("MyApp.view.MainView", {
    extend: "Ext.tab.Panel",
    xtype: "mainview",
    requires: [
        "MyApp.view.home.HomeView",
        "MyApp.view.youtube.YouTube",
        "MyApp.view.service.ServiceView",
        "MyApp.view.message.MessageView",
        "MyApp.view.youtube.YouTubeNavi",
        "MyApp.view.Loyality.LoyalitiNavi",
        "MyApp.view.OrderView.OrderNavi",
        "MyApp.view.gallary.GallaryNaviView",
        "MyApp.view.website.WebsiteNavi",
        "MyApp.view.socialmedia.SocialMediaView",
        "MyApp.view.custom.CustomView",
        "MyApp.view.pdf.PdfNavi",
        "MyApp.view.qrcode.QRNavi",
        "MyApp.view.rss.rssNavi",
        "MyApp.view.event.EventNavi",
        "MyApp.view.notepad.NotepadNavi",
        "MyApp.view.fanwall.FanwallNavi",
        "MyApp.view.menu.MenuNavi",
        "MyApp.view.news.NewsNavi",
        "MyApp.view.voicerecording.VoiceRecording",
        "MyApp.view.reservation.ReservationNavi",
        "MyApp.view.arround.ArroundNavi",
        "MyApp.view.location.LocationNavi",
        "MyApp.view.contactus.ContactView",
        "MyApp.view.mailinglist.MailingList",
        "MyApp.view.Downloads.DownloadList",
        "MyApp.view.partner.PartnerView",
        "MyApp.view.calculator.MortgageCalculator",
        "MyApp.view.ScientificCalculator.ScientificCalculatorView",
        "MyApp.view.scanner.ScannerView",
        "MyApp.view.appointment.AppointmentView",
        "MyApp.view.quote.QuoteView",
        "MyApp.view.review.Review",
        "MyApp.view.testimonial.TestimonialView",
        "MyApp.view.coupen.CoupenView",
        "MyApp.view.survay.SurvayView",
        "MyApp.view.catelog.CatelogNavi",
        "MyApp.view.newarrival.NewArrivalNavi",
        "MyApp.view.donation.DonationNavi",
        "MyApp.view.service.ServiceNavi",
        "MyApp.view.ticketinfo.TicketInfoView",
        "MyApp.view.ecommarce.EcommarceNavi",
        "MyApp.view.blog.BlogNavi",
        "MyApp.view.menuoftheday.MenudayNavi"
    ],
    config: {
        fullscreen: true,
        tabBar: {
            docked: "bottom",
            scrollable: {
                direction: "horizontal",
                indicators: false
            },
        },
        layout: {
            type: "card",
            animation: {
                type: "slide",
                duration: 500,
            }
        },
        defaults: {
            styleHtmlContent: true
        },
        items: [{//0
                "xtype": "homeview",
                "title": Loc.t('HOME.TITLE'),
                "layout": "fit",
                "tabCls": "icnhomeTab",
                "iconCls": "homeCls",
                "iconMask": true
            },{//1
                "xtype": "eventnavi",
                "title": Loc.t('EVENT.TITLE'),
                "tabCls": "eventTab",
                "iconCls": "eventCls",
                "iconMask": true
            },{//2
                "xtype": "mailinglistview",
                "title": Loc.t('MAILING.TITLE'),
                "tabCls": "mailinglistTab",
                "iconCls": "mailinglistCls",
                "iconMask": true
            },{//3
                "xtype": "pdfnavi",
                "title": Loc.t('PDF.TITLE'),
                "tabCls": "pdfTab",
                "iconCls": "pdfCls",
                "iconMask": true
            }, {//4
                "xtype": "rssnavi",
                "title": Loc.t('RSSFEEDS.TITLE'),
                "tabCls": "rssTab",
                "iconCls": "rssCls",
                "iconMask": true
            }, {//5
                "xtype": "websitenavi",
                "title": Loc.t('WEBSITES.TITLE'),
                "tabCls": "websiteTab",
                "iconCls": "websiteCls",
                "iconMask": true
            }, {//6
                "xtype": "youtubenavi",
                "title": Loc.t('YOUTUBE.TITLE'),
                "tabCls": "youtubeTab",
                "iconCls": "youtubeCls",
                "iconMask": true
            }, {//7
                "xtype": "locationnavi",
                "title": Loc.t('LOCATION.TITLE'),
                "tabCls": "locationTab",
                "iconCls": "locationCls",
                "iconMask": true
            }, {//8
                "xtype": "gallarynaviview",
                "title": Loc.t('GALLERY.TITLE'),
                "tabCls": "gallaryTab",
                "iconCls": "gallaryCls",
                "iconMask": true
            }, {//9
                "xtype": "arroundnavi",
                "title": Loc.t('AROUND.TITLE'),
                "tabCls": "arroundusTab",
                "iconCls": "arroundusCls",
                "iconMask": true
            }, {//10
                xtype: 'voicerecording',
                title: Loc.t('VOICERECORD.TITLE'),
                tab: {
                    cls: 'voicerecordingTab',
                },
                iconCls: 'voicerecordingCls',
                iconMask: true
            }, {//11
                "xtype": "socialmediaview",
                "title": Loc.t('SOCIALMEDIA.TITLE'),
                "layout": "fit",
                "tabCls": "socialsiteTab",
                "iconCls": "socialsiteCls",
                "iconMask": true
            }, {//12
                "xtype": "qrnavi",
                "title": Loc.t('QRCODE.TITLE'),
                "tabCls": "qrTab",
                "iconCls": "qrCls",
                "iconMask": true
            },{//13
                "xtype": "contactview",
                "title": Loc.t('CONTACTUS.TITLE'),
                "tabCls": "contactTab",
                "iconCls": "contactCls",
                "iconMask": true
            },
            {//14
                "xtype": "menunavi",
                "title": Loc.t('MENU.TITLE'),
                "tabCls": "menuTab",
                "iconCls": "menuCls",
                "iconMask": true
            },
            {//15
                "xtype": "newsnavi",
                "title": Loc.t('NEWS.TITLE'),
                "tabCls": "menuTab", 
                "iconCls": "menuCls",
                "iconMask": true
            },
            {//16
                "xtype": "ordernavi",
                "title": Loc.t('ORDER.TITLE'),
                "tabCls": "orderTab",
                "iconCls": "orderCls",
                "iconMask": true
            }, {//17
                "xtype": "reservationnavi",
                "title": Loc.t('RESERVATION.TITLE'),
                "tabCls": "reservationTab",
                "iconCls": "reservationCls",
                "iconMask": true
            }, {//18
            "xtype": "catelognavi",
            "title": Loc.t('CATELOG.TITLE'),
            "tabCls": "catelogTab",
            "iconCls": "catelogCls",
            "iconMask": true,
        },{//19
                "xtype": "loyalitinavi",
                "title": Loc.t('LOYALTY.TITLE'),
                "tabCls": "loyalityTab",
                "iconCls": "LoyalityCls",
                "iconMask": true
            },{//20
                "xtype": "customview",
                "title": Loc.t('CUSTOM.TITLE'),
                "layout": "fit",
                "tabCls": "customTab",
                "iconCls": "customCls",
                "iconMask": true
            },{//21
                "xtype": "messageview",
                "title": Loc.t('MESSAGE.TITLE'),
                "tabCls": "messageTab",
                "iconCls": "messageCls",
                "iconMask": true
            },
            {//22
                "xtype": "downloadlist",
                "title": Loc.t('DOWNLOAD.TITLE'),
                "tabCls": "downloadTab",
                "iconCls": "downloadCls",
                "iconMask": true
            },{//23
                "xtype": "partnerview",
                "title": Loc.t('PARTNERS.TITLE'),
                "tabCls": "partnerTab",
                "iconCls": "partnerCls",
                "iconMask": true
            },{//24
                "xtype": "mortgagecalculator",
                "title": Loc.t('MORTGAGECALCULATOR.TITLE'),
                "tabCls": "MortgageCalcTab",
                "iconCls": "MortgageCalcCls",
                "iconMask": true
            },{//25
                "xtype": "scientificcalculatorview",
                "title": Loc.t('SCIENTIFICCALCULATOR.TITLE'),
                "tabCls": "ScientificCalTab",
                "iconCls": "ScientificCalCls",
                "iconMask": true
            },{//26
                "xtype": "notepadnavi",
                "title": Loc.t('NOTEPAD.TITLE'),
                "tabCls": "notepadTab",
                "iconCls": "notepadCls",
                "iconMask": true
            },{//27
                "xtype": "scannerview",
                "title": Loc.t('SCANNER.TITLE'),
                "tabCls": "scannerTab",
                "iconCls": "scannerCls",
                "iconMask": true
            },{//28
                "xtype": "appointmentview",
                "title":Loc.t('APPOINTMENT.TITLE'),
                "tabCls": "appointmentTab",
                "iconCls": "appointmentCls",
                "iconMask": true
            },{//29
                "xtype": "quoteview",
                "title": Loc.t('QUOTATION.TITLE'),
                "tabCls": "quoteTab",
                "iconCls": "quoteCls",
                "iconMask": true
            },{//30
                "xtype": "review",
                "title": Loc.t('REVIEW.TITLE'),
                "tabCls": "reviewTab",
                "iconCls": "reviewCls",
                "iconMask": true
            },{//31
                "xtype": "testimonialview",
                "title": Loc.t('TESTIMONIAL.TITLE'),
                "tabCls": "testimonialTab",
                "iconCls": "testimonialCls",
                "iconMask": true
            },{ //32
                "xtype": "coupenview",
                "title": Loc.t('COUPOUN.TITLE'),
                "tabCls": "coupenTab",
                "iconCls": "coupenCls",
                "iconMask": true
            },
            {//33
                "xtype": "survayview",
                "title": Loc.t('SURVEY.TITLE'),
                "tabCls": "survayTab",
                "iconCls": "survayCls",
                "iconMask": true,
            },
            {//34
                "xtype": "newarrivalnavi",
                "title": Loc.t('NEWARRIVAL.TITLE'),
                "tabCls": "newarrivalTab",
                "iconCls": "newarrivalCls",
                "iconMask": true,
            },
            {//35
                "xtype": "donationnavi",
                "title": Loc.t('DONATION.TITLE'),
                "tabCls": "donationTab",
                "iconCls": "donationCls",
                "iconMask": true,
            },
            {//36
                "xtype": "servicenavi",
                "title": Loc.t('SERVICE.TITLE'),
                "tabCls": "serviceTab",
                "iconCls": "serviceCls",
                "iconMask": true,
            },
            {//37
                "xtype": "ticketinfoview",
                "title": Loc.t('TICKETINFO.TITLE'),
                "tabCls": "ticketTab",
                "iconCls": "ticketCls",
                "iconMask": true,
            },
            {//38
                "xtype": "blognavi",
                "title": Loc.t('BLOG.TITLE'),
                "tabCls": "blogTab",
                "iconCls": "blogCls",
                "iconMask": true,
            },
            {//39
                "xtype": "menudaynavi",
                "title": Loc.t('MENUOFTHEDAY.TITLE'),
                "tabCls": "menudayTab",
                "iconCls": "menudayCls",
                "iconMask": true,
            }
        ]
    }
});
