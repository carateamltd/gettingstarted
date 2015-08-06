Ext.define("MyApp.view.qrcode.QRCodeView", {
    extend: "Ext.navigation.View",
    requires: [
        "MyApp.view.qrcode.QRListView"
    ],
    alias: "widget.qrnavi",
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
                xtype: 'qrlistview',
                title: 'Qr View',
                scrollable: {
                    indicators: false
                }
            }]
    }
});
