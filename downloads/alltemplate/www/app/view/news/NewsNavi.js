Ext.define("MyApp.view.news.NewsNavi", {
    extend: "Ext.navigation.View",
    requires: [
        "MyApp.view.news.NewsList"
    ],
    alias: "widget.newsnavi",
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
                xtype: 'newslist',
                title: Loc.t('NEWS.TITLE'),
                style: "background-image: url('img/splash.png');",
                scrollable: {
                    indicators: false
                }
            }]
    }
});
