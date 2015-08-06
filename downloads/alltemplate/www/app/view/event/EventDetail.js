Ext.define('MyApp.view.event.EventDetail', {
    extend: 'Ext.Container',
    alias: 'widget.eventdetail',
    config: {
        layout: 'card',
        title: Loc.t('EVENT.TITLE')
    },
    
    initialize: function () {
    	var headerImage=this.config.data.vHeaderImage
    	var desc=this.config.data.tDescription
    	var bgcolor=this.config.data.vBackgroundColor
    	var textcolor=this.config.data.vTextColor
        var dStartDate = this.config.data.dStartDate
        var dEndDate = this.config.data.dEndDate
        var vStartTime = this.config.data.vStartTime
        var vEndTime = this.config.data.vEndTime
    	var img=this.config.data.vHeaderImage
        var Descpanel = Ext.create('Ext.Panel', {
                items:[{
                        styleHtmlContent:true,
                        html:'<div style="word-wrap: break-word;color:'+textcolor+';">'+desc+'</div>'
                }]
        });
        var finalPanel = new Ext.Panel({
            layout: 'vbox',
            scrollable:true,
            style:'background-color:'+bgcolor,
            items: [
                {
                      html:'<div><img src="http://'+img+'" height="100%" width="100%" /></div>\n\
                      <table style="width: 100%; font-size:11px; border: 1px solid #000000; margin-bottom: 0px;"><tr><td style="background: rgba(0,0,0,0.2); border-bottom: 1px solid #000000; border-right: 1px solid #000000;"></td><td style="background: rgba(0,0,0,0.2); text-align: center; border-bottom: 1px solid #000000; border-right: 1px solid #000000; font-weight: bold;">'+Loc.t('EVENT.STARTDATE')+'</td><td style="background: rgba(0,0,0,0.2); border-bottom: 1px solid #000000; font-weight: bold; text-align: center;">'+Loc.t('EVENT.ENDDATE')+'</td></tr><tr><td style="background: rgba(0,0,0,0.2); border-bottom: 1px solid #000000; border-right: 1px solid #000000; text-align: center; font-weight: bold;">Date</td><td style="text-align: center; border-bottom: 1px solid #000000; border-right:1px solid #000000;">'+dStartDate+'</td><td style="text-align: center; border-bottom: 1px solid #000000;">'+dEndDate+'</td></tr><tr><td style="background: rgba(0,0,0,0.2); border-right: 1px solid #000000; text-align: center; font-weight: bold;">Heure</td><td style="border-right: 1px solid #000000; text-align: center;">'+vStartTime+'</td><td style="text-align: center;">'+vEndTime+'</td></tr></table>\n\</div></li>'
                },
                Descpanel
            ]
        });
        this.add([finalPanel])
    }
});
