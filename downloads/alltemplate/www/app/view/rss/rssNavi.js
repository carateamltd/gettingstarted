Ext.define("MyApp.view.rss.rssNavi", {
    extend: "Ext.navigation.View",
    requires: [
        "MyApp.view.rss.RssListView"
    ],
    alias: "widget.rssnavi",
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
                xtype: 'rsslistview',
                title: Loc.t('RSSFEEDS.TITLE'),
                scrollable: {
                    indicators: false
                }
            }]
    }
});
