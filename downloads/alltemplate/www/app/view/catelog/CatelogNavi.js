Ext.define("MyApp.view.catelog.CatelogNavi", {
    extend: "Ext.navigation.View",
    requires: [
        "MyApp.view.catelog.CatelogView"
    ],
    alias: "widget.catelognavi",
    config: {
        scrollable: false,
        navigationBar: {
            hidden:false,
//            baseCls: 'younaviCls',
//            height: 50,
            items:[{
                      xtype:'button',
                      text:Loc.t('LOYALTY.SHARE'),
                      align:'right',
                      itemId:'sharingId',
                      hidden:true
            },{
                xtype: 'button',
//              baseCls:'orderviewBtnCls',
                style: 'border: 2px solid white;',
                text: '<img src="img/cart_white.png" width="25px" height="25px"/>',
                align: 'right',
                ui: 'plain',
                height: 40,
                itemId: 'ecommerceCartBtnID',
                id: 'ecommerceCartBtnID'
            }]
        },
        items: [{
                xtype:'catelogview',
                title:Loc.t('CATELOG.TITLE')
//                style: "background-image: url('img/splash.png');",
            }]
    }
});
