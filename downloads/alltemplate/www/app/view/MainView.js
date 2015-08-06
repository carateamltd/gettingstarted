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
                "title": "Home",
                "layout": "fit",
                "tabCls": "icnhomeTab",
                "iconCls": "homeCls",
                "iconMask": true
            },{//1
                "xtype": "eventnavi",
                "title": "Event",
                "tabCls": "eventTab",
                "iconCls": "eventCls",
                "iconMask": true
            },{//2
                "xtype": "mailinglistview",
                "title": "Mailinglist",
                "tabCls": "mailinglistTab",
                "iconCls": "mailinglistCls",
                "iconMask": true
            },{//3
                "xtype": "pdfnavi",
                "title": "PDF",
                "tabCls": "pdfTab",
                "iconCls": "pdfCls",
                "iconMask": true
            }, {//4
                "xtype": "rssnavi",
                "title": "RSS Feeds",
                "tabCls": "rssTab",
                "iconCls": "rssCls",
                "iconMask": true
            }, {//5
                "xtype": "websitenavi",
                "title": "Website",
                "tabCls": "websiteTab",
                "iconCls": "websiteCls",
                "iconMask": true
            }, {//6
                "xtype": "youtubenavi",
                "title": "YouTube",
                "tabCls": "youtubeTab",
                "iconCls": "youtubeCls",
                "iconMask": true
            }, {//7
                "xtype": "locationnavi",
                "title": "Location",
                "tabCls": "locationTab",
                "iconCls": "locationCls",
                "iconMask": true
            }, {//8
                "xtype": "gallarynaviview",
                "title": "Gallery",
                "tabCls": "gallaryTab",
                "iconCls": "gallaryCls",
                "iconMask": true
            }, {//9
                "xtype": "arroundnavi",
                "title": "Around Us",
                "tabCls": "arroundusTab",
                "iconCls": "arroundusCls",
                "iconMask": true
            }, {//10
                xtype: 'voicerecording',
                title: 'Voice Recording',
                tab: {
                    cls: 'voicerecordingTab',
                },
                iconCls: 'voicerecordingCls',
                iconMask: true
            }, {//11
                "xtype": "socialmediaview",
                "title": "SocialMedia",
                "layout": "fit",
                "tabCls": "socialsiteTab",
                "iconCls": "socialsiteCls",
                "iconMask": true
            }, {//12
                "xtype": "qrnavi",
                "title": "QrCode",
                "tabCls": "qrTab",
                "iconCls": "qrCls",
                "iconMask": true
            },{//13
                "xtype": "contactview",
                "title": "ContactUs",
                "tabCls": "contactTab",
                "iconCls": "contactCls",
                "iconMask": true
            },
            {//14
                "xtype": "menunavi",
                "title": "Menu",
                "tabCls": "menuTab",
                "iconCls": "menuCls",
                "iconMask": true
            },
            {//15
                "xtype": "newsnavi",
                "title": "News",
                "tabCls": "menuTab", 
                "iconCls": "menuCls",
                "iconMask": true
            },
            {//16
                "xtype": "ordernavi",
                "title": "Order",
                "tabCls": "orderTab",
                "iconCls": "orderCls",
                "iconMask": true
            }, {//17
                "xtype": "reservationnavi",
                "title": "Reservation",
                "tabCls": "reservationTab",
                "iconCls": "reservationCls",
                "iconMask": true
            }, {//18
            "xtype": "catelognavi",
            "title": "Catelog",
            "tabCls": "catelogTab",
            "iconCls": "catelogCls",
            "iconMask": true,
        },{//19
                "xtype": "loyalitinavi",
                "title": "Loyalty",
                "tabCls": "loyalityTab",
                "iconCls": "LoyalityCls",
                "iconMask": true
            },{//20
                "xtype": "customview",
                "title": "Custom",
                "layout": "fit",
                "tabCls": "customTab",
                "iconCls": "customCls",
                "iconMask": true
            },{//21
                "xtype": "messageview",
                "title": "Message",
                "tabCls": "messageTab",
                "iconCls": "messageCls",
                "iconMask": true
            },
            {//22
                "xtype": "downloadlist",
                "title": "Downloads",
                "tabCls": "downloadTab",
                "iconCls": "downloadCls",
                "iconMask": true
            },{//23
                "xtype": "partnerview",
                "title": "Partners",
                "tabCls": "partnerTab",
                "iconCls": "partnerCls",
                "iconMask": true
            },{//24
                "xtype": "mortgagecalculator",
                "title": "Mortgage Calculator",
                "tabCls": "MortgageCalcTab",
                "iconCls": "MortgageCalcCls",
                "iconMask": true
            },{//25
                "xtype": "scientificcalculatorview",
                "title": "Scientific Calculator",
                "tabCls": "ScientificCalTab",
                "iconCls": "ScientificCalCls",
                "iconMask": true
            },{//26
                "xtype": "notepadnavi",
                "title": "Notepad",
                "tabCls": "notepadTab",
                "iconCls": "notepadCls",
                "iconMask": true
            },{//27
                "xtype": "scannerview",
                "title": "Sacnner",
                "tabCls": "scannerTab",
                "iconCls": "scannerCls",
                "iconMask": true
            },{//28
                "xtype": "appointmentview",
                "title": "appoinment",
                "tabCls": "appointmentTab",
                "iconCls": "appointmentCls",
                "iconMask": true
            },{//29
                "xtype": "quoteview",
                "title": "Quotation",
                "tabCls": "quoteTab",
                "iconCls": "quoteCls",
                "iconMask": true
            },{//30
                "xtype": "review",
                "title": "Review",
                "tabCls": "reviewTab",
                "iconCls": "reviewCls",
                "iconMask": true
            },{//31
                "xtype": "testimonialview",
                "title": "Testimonial",
                "tabCls": "testimonialTab",
                "iconCls": "testimonialCls",
                "iconMask": true
            },{ //32
                "xtype": "coupenview",
                "title": "Coupen",
                "tabCls": "coupenTab",
                "iconCls": "coupenCls",
                "iconMask": true
            },
            {//33
                "xtype": "survayview",
                "title": "Survay",
                "tabCls": "survayTab",
                "iconCls": "survayCls",
                "iconMask": true,
            },
            {//34
                "xtype": "newarrivalnavi",
                "title": "New Arrival",
                "tabCls": "newarrivalTab",
                "iconCls": "newarrivalCls",
                "iconMask": true,
            },
            {//35
                "xtype": "donationnavi",
                "title": "Donation",
                "tabCls": "donationTab",
                "iconCls": "donationCls",
                "iconMask": true,
            },
            {//36
                "xtype": "servicenavi",
                "title": "Service",
                "tabCls": "serviceTab",
                "iconCls": "serviceCls",
                "iconMask": true,
            },
            {//37
                "xtype": "ticketinfoview",
                "title": "Ticket info",
                "tabCls": "ticketTab",
                "iconCls": "ticketCls",
                "iconMask": true,
            },
            {//38
                "xtype": "blognavi",
                "title": "Blog",
                "tabCls": "blogTab",
                "iconCls": "blogCls",
                "iconMask": true,
            },
            {//39
                "xtype": "menudaynavi",
                "title": "Mennuoftheday",
                "tabCls": "menudayTab",
                "iconCls": "menudayCls",
                "iconMask": true,
            }
        ]
    }
});
