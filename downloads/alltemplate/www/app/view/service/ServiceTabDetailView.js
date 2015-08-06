Ext.define('MyApp.view.service.ServiceTabDetailView', {
    extend: 'Ext.Container',
    alias: 'widget.servicetabdetailview',
    config: {
        layout: 'card',
        title: Loc.t('SERVICE.TITLE')
    },
    initialize: function () {
        var storeData = this.config.data;

//        var headerImage = storeData.vCatalogueImage;
        var Title = storeData.vServiceName;
        var descr = storeData.tDescription;
        var vServiceFees = storeData.vServiceFees;
        var vCurrency = storeData.vCurrency;
        var vImage = storeData.vImage;
        
        
        var ImagePanel = new Ext.Panel({
            layout: {
                type: 'vbox',
            //  pack: 'center'
            },
            scrollable: {
                indicators: false
            },
            items: [{
                        html: '<div style="text-align: center;font-weight: bold;font-size: 30px;font-family: fantasy;background: rgba(0,0,0,0.2);border-top: 1px solid #000;border-bottom: 1px solid #000;">' + Title + '<div>',
                        margin: '10 0 10 0'
                    },{
                        html: '<div style="text-align:center"><img src="http://'+vImage+'" width="100%"/></div>',
                        margin: '0 10 10 10'
                    },{
                        html: '<div style="font-weight: bold;padding: 10px 10px;">'+Loc.t('SERVICE.DETAILS')+'</div>',
                        margin: '0 10 0 10'
                    },{
                        html: '<div style="text-align: left;font-size: 16px;word-wrap: break-word;width: 100%;padding: 5px 10px;">' + descr + '</div>',
                        itemId: 'itemDetail_panelid',
                        margin: '0 10 0 10'
                    },{
                        html: '<div style="text-align:center"><b>'+Loc.t('SERVICE.PRICE')+'</b>: '+vServiceFees+' '+vCurrency+'</div>',
                        margin: '0 10 10 10'
                    },{
                        style: 'word-wrap: break-word;',
                        itemId:'headerid',
                        hidden:false,
                        html: '<table style="border:1px solid #000000;margin-bottom:0px;"><tr><th style="background: rgba(0,0,0,0.2);border-right:1px solid #000000;width:33.33%;text-align:center;">'+Loc.t('SERVICE.DAY')+'</th><th style="background: rgba(0,0,0,0.2); border-right:1px solid #000000;width:33.33%;text-align:center;">'+Loc.t('SERVICE.SERVICEFROM')+'</th><th style="background: rgba(0,0,0,0.2); border-right:1px solid #000000;width:33.33%;text-align:center;">'+Loc.t('SERVICE.SERVICETO')+'</th></tr></table>',
                    },{
                        style: 'word-wrap: break-word;',
                        itemId:'Sunday',
                        hidden:true,
                        html: "<div style='padding: 10px;text-align:left;font-size:16px;'>\n\
                                <div><span style='font-weight:bold;font-size:16px;'>Day:</span> Sunday<div>\n\
                                <div><span style='font-weight:bold;font-size:16px;'>Open from:</span> 11:00 PM<div>\n\
                                <div><span style='font-weight:bold;font-size:16px;'>Open to:</span> 5:00 PM<div></div>",
                    },{
                        style: 'word-wrap: break-word;',
                        itemId:'Monday',
                        hidden:true,
                        html: "<div style='padding: 10px;text-align:left;font-size:16px;'>\n\
                                <div><span style='font-weight:bold;font-size:16px;'>Day:</span> Monday<div>\n\
                                <div><span style='font-weight:bold;font-size:16px;'>Open from:</span> 11:00 PM<div>\n\
                                <div><span style='font-weight:bold;font-size:16px;'>Open to:</span> 5:00 PM<div></div>",
                    },{
                        style: 'word-wrap: break-word;',
                        itemId:'Tuesday',
                        hidden:true,
                        html: "<div style='padding: 10px;text-align:left;font-size:16px;'>\n\
                                <div><span style='font-weight:bold;font-size:16px;'>Day:</span> Tuesday<div>\n\
                                <div><span style='font-weight:bold;font-size:16px;'>Open from:</span> 11:00 PM<div>\n\
                                <div><span style='font-weight:bold;font-size:16px;'>Open to:</span> 5:00 PM<div></div>",
                    },{
                        style: 'word-wrap: break-word;',
                        itemId:'Wednesday',
                        hidden:true,
                        html: "<div style='padding: 10px;text-align:left;font-size:16px;'>\n\
                                <div><span style='font-weight:bold;font-size:16px;'>Day:</span> Wensday<div>\n\
                                <div><span style='font-weight:bold;font-size:16px;'>Open from:</span> 11:00 PM<div>\n\
                                <div><span style='font-weight:bold;font-size:16px;'>Open to:</span> 5:00 PM<div></div>",
                    },{
                        style: 'word-wrap: break-word;',
                        itemId:'Thursday',
                        hidden:true,
                        html: "<div style='padding: 10px;text-align:left;font-size:16px;'>\n\
                                <div><span style='font-weight:bold;font-size:16px;'>Day:</span>Thursday<div>\n\
                                <div><span style='font-weight:bold;font-size:16px;'>Open from:</span> 11:00 PM<div>\n\
                                <div><span style='font-weight:bold;font-size:16px;'>Open to:</span> 5:00 PM<div></div>",
                    },{
                        style: 'word-wrap: break-word;',
                        itemId:'Friday',
                        hidden:true,
                        html: "<div style='padding: 10px;text-align:left;font-size:16px;'>\n\
                                <div><span style='font-weight:bold;font-size:16px;'>Day:</span> Friday<div>\n\
                                <div><span style='font-weight:bold;font-size:16px;'>Open from:</span> 11:00 PM<div>\n\
                                <div><span style='font-weight:bold;font-size:16px;'>Open to:</span> 5:00 PM<div></div>",
                    },{
                        style: 'word-wrap: break-word;',
                        itemId:'Saturday',
                        hidden:true,
                        html: "<div style='padding: 10px;text-align:left;font-size:16px;'>\n\
                                <div><span style='font-weight:bold;font-size:16px;'>Day:</span> Saturday<div>\n\
                                <div><span style='font-weight:bold;font-size:16px;'>Open from:</span> 11:00 PM<div>\n\
                                <div><span style='font-weight:bold;font-size:16px;'>Open to:</span> 5:00 PM<div></div>",
                    }
                ]
        })
        this.add([ImagePanel])
    }
   
})