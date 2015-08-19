Ext.define("MyApp.view.blog.BlogNavi", {
    extend: "Ext.navigation.View",
    requires: [
        "MyApp.view.blog.BlogView"
    ],
    alias: "widget.blognavi",
    config: {
        scrollable: false,
        navigationBar: {
            hidden:false,
//            baseCls: 'younaviCls',
//            height: 50,
            items:[{
                      xtype:'button',
                      text:Loc.t('BLOG.SHARE'),
                      align:'right',
                      itemId:'sharingId',
                      hidden:true
            }]
        },
        items: [{
                xtype:'blogview',
                title:Loc.t('BLOG.TITLE'),
//                style: "background-image: url('img/splash.png');",
            }]
    }
});
