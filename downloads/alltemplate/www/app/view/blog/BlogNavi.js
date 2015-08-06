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
                      text:'Share',
                      align:'right',
                      itemId:'sharingId',
                      hidden:true
            }]
        },
        items: [{
                xtype:'blogview',
                title:'Blogs',
//                style: "background-image: url('img/splash.png');",
            }]
    }
});
