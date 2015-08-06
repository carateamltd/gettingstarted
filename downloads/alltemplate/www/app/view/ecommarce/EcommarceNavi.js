Ext.define("MyApp.view.ecommarce.EcommarceNavi", {
    extend: "Ext.navigation.View",
    requires: [
        "MyApp.view.ecommarce.EcommarceView"
    ],
    alias: "widget.ecommarcenavi",
    config: {
        scrollable: false,
        navigationBar: {
            hidden:true,
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
                xtype:'ecommarceview',
//                title:'Donation',
//                style: "background-image: url('img/splash.png');",
            }]
    }
});
