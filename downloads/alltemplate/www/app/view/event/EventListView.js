Ext.define('MyApp.view.event.EventListView', {
    extend: 'Ext.List',
    xtype: 'eventlistview',
    requires: ['MyApp.view.event.EventDetail'],
    config: {
    	scrollable:{
        	indicators:false
        },
         emptyText: Loc.t('EVENT.NOEVENTAVAILABLE'),
         itemTpl:'<li style="padding: 10px;font-family: "Times New Roman, Georgia, Serif;">\n\
			<div style="padding:0px;  color:black;background-color:rgba(255, 255, 255, 1);border: 1px solid #efefef; border-radius: 10px;">\n\
			<div style="padding:5px;font-style: italic;font-size:12px;font-weight:700;text-align: center; background: rgba(0,0,0,0.5);border-radius: 10px 10px 0px 0px;margin-bottom:5px;">{vTitle}</div>\n\
			<div style="float:left;margin-right:5px;border-radius: 0px;overflow:hidden;"><img src="http://{vImage}" style="width: 95px; height: 95px;"/></div>\n\
			<table style="word-break: break-all;width: 63%; font-size:11px; border: 1px solid #000000; margin-bottom: 0px;"><tr><td style="background: rgba(0,0,0,0.2); border-bottom: 1px solid #000000; border-right: 1px solid #000000;"></td><td style="background: rgba(0,0,0,0.2); text-align: center; border-bottom: 1px solid #000000; border-right: 1px solid #000000; font-weight: bold;">'+Loc.t('EVENT.STARTDATE')+'</td><td style="background: rgba(0,0,0,0.2); border-bottom: 1px solid #000000; font-weight: bold; text-align: center;">'+Loc.t('EVENT.ENDDATE')+'</td></tr><tr><td style="background: rgba(0,0,0,0.2); border-bottom: 1px solid #000000; border-right: 1px solid #000000; text-align: center; font-weight: bold;">Date</td><td style="text-align: center; border-bottom: 1px solid #000000; border-right:1px solid #000000;">{dStartDate}</td><td style="text-align: center; border-bottom: 1px solid #000000;">{dEndDate}</td></tr><tr><td style="background: rgba(0,0,0,0.2); border-right: 1px solid #000000; text-align: center; font-weight: bold;">Heure</td><td style="border-right: 1px solid #000000; text-align: center;">{vStartTime}</td><td style="text-align: center;">{vEndTime}</td></tr></table>\n\</div></li>',
        store: 'eventstoreid'
    }
});