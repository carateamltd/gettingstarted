Ext.define("MyApp.view.fanwall.FanwallNavi", {
    extend: "Ext.navigation.View",
    requires: [
        "MyApp.view.fanwall.FanwallView"
    ],
    alias: "widget.fanwallnavi",
    config: {
        navigationBar: {
            hidden: false,
//            baseCls: 'younaviCls',
//            height: 50,
//            items: [{
//                    xtype: 'button',
//                    align:'right',
//                    iconCls: 'add',
//                    itemId: 'addNoteBtnId'
//                },{
//                    xtype:'button',
//                    align:'right',
//                    text:'Save',
//                    hidden:true,
//                    itemId:'saveNoteBtnID'
//                }]
        },
        items: [{
                xtype: 'fanwallview',
                title: 'Fanwall',
                scrollable: {
                    indicators: false
                }
            }]
    }
});
