Ext.Loader.setConfig({
    enabled: true,
    paths: {
        'Ext.ux': 'ux'
    }
});
Ext.Loader.setPath({
    'MyApp': 'app',
    'Sqlite': 'sqlite'
});
Ext.require('MyApp.util.InitSQLite');
Ext.application({
    name  : 'MyApp',
    requires: [
        'Ext.ux.Localization'
    ],
    controllers:['MainController','CatalogController','OrderController','MenuController'],
    stores:['Videos','MessageStore','LoyalitStore','OrderStore','OrderDetailStore','ShowOrderStore',
        'ImageStore','WebSiteStore','SocialStore','PdfStore','QRStore','RssStore','EventStore','NoteStore',
        'NewsStore','ScheduleReservationStore','ServiceStore','TimeStore','ReservationStore',
        'ArroundStore','ArroundSubStore','LocationStore','HomeStore','OpencloseStore',
        'CustomStore','DownloadStore',"PartnerStore","AlbumStore","ReviewStore",
        "OrderHistoryStore","OptionItemStore","SizeItemStore","NewArrivalStore","CatelogStore","TestimonialStore","TicketStore",
        "CatelogSizeStore","AddCartStore","ServiceTabStore","ServiceTimingTabStore","BlogStore",'CatalogProductStore','OrderCartStore','MenuStore','MenuDetailStore', 'OrderSummaryStore',
        'MenuOfDayStore', 'UrlStore', 'SocialMediaStore'],
    models:['Video','MessageModel','LoyalitiModel','OrderModel','OrderDetailModel',
        'OrderDetailModel','ImageModel','WebSiteModel','SocialModel','PdfModel','QRModel','RssModel','EventModel',
    'NoteModel','NewsModel','ScheduleReservationModel','ServiceModel','TimeModel','ReservationModel','ArroundusModel',
    'ArroundSubModel','LocationModel','HomeModel','OpencloseModel','CustomModel','DownloadModel',"PartnerModel",
    "AlbumModel","AppointmentModel","QuotationModel","OrderHistoryModel","SizeItemModel","OptionItemModel","NewArrivalModel",
    "CatelogModel","TestimonialModel","TicketModel","CatelogSizeModel","AddCartModel","ServiveTabModel","ServiceTimingTabModel","BlogModel",'CatalogProduct','OrderCartModel','MenuModel','MenuDetailModel',
    'MenuOfDayModel', 'UrlModel', 'SocialMediaModel'],
    views : ['Ext.ux.panel.PDF','catelog.CatalogProducts','catelog.CatalogCart','catelog.CustomerDetails','OrderView.OrderCart','OrderView.CustomerDetails'],
    launch: function() {
    	this.chrome43Fix();
		 Ext.Viewport.add(Ext.create('MyApp.view.MainView'));
		 app.initPaymentUI();
		//below fix added for android
		//because in some android devices (mostly for Messagebox-and-Overlay-Problems-on-HTC-One-Browser) and for chrome browser on desktop
		if(Ext.os.name === "Android" || Ext.os.deviceType === "Desktop"){
		   Ext.Component.prototype.animateFn = // or Ext.override( Ext.Component, { animateFn:
				function (animation, component, newState, oldState, options, controller) {
					var me = this;
					if (animation && (!newState || (newState && this.isPainted()))) {
						this.activeAnimation = new Ext.fx.Animation(animation);
						this.activeAnimation.setElement(component.element);
						if (!Ext.isEmpty(newState)) {
							var onEndInvoked = false;
							var onEnd = function () {
							if (!onEndInvoked) {
								onEndInvoked = true;
								me.activeAnimation = null;
								controller.resume();
							}
						};
						this.activeAnimation.setOnEnd(onEnd);
						window.setTimeout(onEnd, 50 + (this.activeAnimation.getDuration() || 500));
						controller.pause();
					}
					Ext.Animator.run(me.activeAnimation);
				}
			};
		}
    },
	//fix for chrome version 43 and Android version >= 5, UI and scrolling issues
    chrome43Fix: function () { // Look details on Sencha forum - https://www.sencha.com/forum/showthread.php?300288-Scrolling-Issues-in-latest-Google-Chrome
		'use strict';
		Ext.override(Ext.util.PaintMonitor, {
			constructor: function (config) {
				if (Ext.browser.is.Firefox || (Ext.browser.is.WebKit && Ext.browser.engineVersion.gtEq('536') && !Ext.browser.engineVersion.ltEq('537.36') && !Ext.os.is.Blackberry)) {
					return new Ext.util.paintmonitor.OverflowChange(config);
				}
				else {
					return new Ext.util.paintmonitor.CssAnimation(config);
				}
			}
		});
		Ext.override(Ext.util.SizeMonitor, {
			constructor: function (config) {
				var namespace = Ext.util.sizemonitor;

				if (Ext.browser.is.Firefox) {
					return new namespace.OverflowChange(config);
				} else if (Ext.browser.is.WebKit) {
					if (!Ext.browser.is.Silk && Ext.browser.engineVersion.gtEq('535') && !Ext.browser.engineVersion.ltEq('537.36')) {
						return new namespace.OverflowChange(config);
					} else {
						return new namespace.Scroll(config);
					}
				} else if (Ext.browser.is.IE11) {
					return new namespace.Scroll(config);
				} else {
					return new namespace.Scroll(config);
				}
			}
		});
	}
});