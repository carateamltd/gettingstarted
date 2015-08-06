Ext.define("MyApp.view.menuoftheday.MenudayNavi", {
    extend: "Ext.navigation.View",
    requires: [
        "MyApp.view.menuoftheday.OrderdayDetailView"
    ],
    alias: "widget.menudaynavi",
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
//                }]
        },
        items: [{
                xtype: 'orderdaydetailview1',
                title: Loc.t('MENUOFTHEDAY.TITLE'),
                scrollable: {
                    indicators: false
                }
            }]
    }
});
