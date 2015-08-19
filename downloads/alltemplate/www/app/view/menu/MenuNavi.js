Ext.define("MyApp.view.menu.MenuNavi", {
    extend: "Ext.navigation.View",
    requires: [
        "MyApp.view.menu.MenuViewList"
    ],
    alias: "widget.menunavi",
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
                xtype: 'menuviewlist',
                title: Loc.t('MENU.TITLE'),
				style: "background-image: url('img/splash.png');",
                scrollable: {
                    indicators: false
                }
            }]
    }
});
