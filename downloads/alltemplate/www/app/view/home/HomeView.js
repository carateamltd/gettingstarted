Ext.define('MyApp.view.home.HomeView', {
    extend: 'Ext.Panel',
    xtype: 'homeview',
    requires: [
        'Ext.ux.localization.view.SelectFieldLocalization'
    ],
    config: {
        layout: 'vbox',
        items: [{
                xtype: 'toolbar',
                title: Loc.t('HOME.TITLE'),
                docked: 'top'
            },{
                xtype: 'panel',
                itemId:'homepanelId',
                scrollable: {
                    indicators:false
                },
                styleHtmlContent: true,
                layout: 'vbox',
                items: [
                    {
                        html: '',
                        itemId:'homeImageID'
                    }, 
                    {
                        style: 'word-wrap: break-word;',
                        html: "<p class='title' style='text-align:center;margin-bottom: 0px;font-size: 40px;'><strong>"+Loc.t('HOME.DESCRIPTION')+"</strong></p>",
                    },{
                        style:'word-wrap:break-word;',
                        itemId:'homeDescribtionID',
                        html:"<div style='text-align:center;font-weight:bold;'>"+Loc.t('HOME.NODESCMESSAGE')+"</div>"
                    },{
                        style: 'word-wrap: break-word;',
                        html: "<div style='text-align:center;font-size:40px;font-weight:bold;font-family: KleymisskyRegular !important;'>"+Loc.t('HOME.DETAILS')+"</div>",
                    },{
                        style: 'word-wrap: break-word;',
                        itemId:'home_WebsiteTagID',
                        margin:'0 0 5 0',
                        html: "<div style='padding: 10px;text-align:left;font-size:16px;background-color: rgba(255, 255, 255, 0.22);margin-bottom:10px;border-radius: 10px;border: 1px dotted black;'><span style='font-weight:bold;font-size:16px;'>"+Loc.t('HOME.WEBSITE')+":</span></div>",
                    },{
                        style: 'word-wrap: break-word;',
                        itemId:'home_EmailTagID',
                        margin:'0 0 5 0',
                        html: "<div style='padding: 10px;text-align:left;font-size:16px;background-color: rgba(255, 255, 255, 0.22);margin-bottom:10px;border-radius: 10px;border: 1px dotted black;'><span style='font-weight:bold;font-size:16px;'>"+Loc.t('HOME.EMAIL')+":</span></div>",
                    },{
                        style: 'word-wrap: break-word;',
                        itemId:'home_TelephoneTagID',
                        margin:'0 0 5 0',
                        html: "<div style='padding: 10px;text-align:left;font-size:16px;background-color: rgba(255, 255, 255, 0.22);margin-bottom:10px;border-radius: 10px;border: 1px dotted black;'><span style='font-weight:bold;font-size:16px;'>"+Loc.t('HOME.TELEPHONE')+":</span></div>",
                    },{
                        style: 'word-wrap: break-word;',
                        itemId:'home_AddressTagID',
                        margin:'0 0 5 0',
                        html: "<div style='padding: 10px;text-align:left;font-size:16px;background-color: rgba(255, 255, 255, 0.22);margin-bottom:10px;border-radius: 10px;border: 1px dotted black;'><span style='font-weight:bold;font-size:16px;'>"+Loc.t('HOME.ADDRESS')+":</span></div>",
                    },{
                        style: 'word-wrap: break-word;',
                        itemId:'home_CityTagID',
                        margin:'0 0 5 0',
                        html: "<div style='padding: 10px;text-align:left;font-size:16px;background-color: rgba(255, 255, 255, 0.22);margin-bottom:10px;border-radius: 10px;border: 1px dotted black;'><span style='font-weight:bold;font-size:16px;'>"+Loc.t('HOME.CITY')+":</span></div>",
                    },{
                        style: 'word-wrap: break-word;',
                        itemId:'home_StateTagID',
                        margin:'0 0 5 0',
                        html: "<div style='padding: 10px;text-align:left;font-size:16px;background-color: rgba(255, 255, 255, 0.22);margin-bottom:10px;border-radius: 10px;border: 1px dotted black;'><span style='font-weight:bold;font-size:16px;'>"+Loc.t('HOME.STATE')+":</span></div>",
                    },{
                        style: 'word-wrap: break-word;',
                        itemId:'home_ZipTagID',
                        margin:'0 0 5 0',
                        html: "<div style='padding: 10px;text-align:left;font-size:16px;background-color: rgba(255, 255, 255, 0.22);margin-bottom:10px;border-radius: 10px;border: 1px dotted black;'><span style='font-weight:bold;font-size:16px;'>"+Loc.t('HOME.ZIP')+":</span></div>",
                    }
                ]
            }]
    }
});