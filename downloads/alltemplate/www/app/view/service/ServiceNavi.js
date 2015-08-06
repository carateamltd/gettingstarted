Ext.define("MyApp.view.service.ServiceNavi", {
    extend: "Ext.navigation.View",
    requires: [
        "MyApp.view.service.ServiceView"
    ],
    alias: "widget.servicenavi",
    config: {
        scrollable: false,
        navigationBar: {
            hidden:false,
//            baseCls: 'younaviCls',
//            height: 50,
//            items:[{
//                      xtype:'button',
//                      text:'Share',
//                      align:'right',
//                      itemId:'sharingId',
//                      hidden:true
//            }]
        },
        items: [{
                xtype:'serviceview',
                title:'Service',
//                style: "background-image: url('img/splash.png');",
            }]
    }
});
