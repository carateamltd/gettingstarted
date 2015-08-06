Ext.define("MyApp.view.Loyality.LoyalitiNavi", {
    extend: "Ext.navigation.View",
    requires: [
        "MyApp.view.Loyality.LoyalitiView"
    ],
    alias: "widget.loyalitinavi",
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
                xtype:'loyalitiview',
                title: Loc.t('LOYALTY.TITLE'),
//                style: "background-image: url('img/splash.png');",
            }]
    }
});
