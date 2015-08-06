Ext.define("MyApp.view.website.WebsiteNavi", {
    extend: "Ext.navigation.View",
    requires: [
        "MyApp.view.website.WebSiteListView"
    ],
    alias: "widget.websitenavi",
    config: {
        navigationBar: {
            hidden: false,
//            baseCls: 'younaviCls',
//            height: 50,
//            items:[{
//                      xtype:'button',
//                      ui:'plain',
//                      text:'<img src="img/backbtn.png" />'
//            }]
        },
        items: [{
                xtype: 'websitelistview',
                title: 'WebSites',
//                baseCls: 'younaviCls',
//                height: 50,
                scrollable: {
                    indicators: false
                }
            }]
    }
});
