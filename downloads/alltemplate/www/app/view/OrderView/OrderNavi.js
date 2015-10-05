Ext.define("MyApp.view.OrderView.OrderNavi", {
    extend: "Ext.navigation.View",
    requires: [
        "MyApp.view.OrderView.OrderViewList", "MyApp.view.OrderView.ShowOrderView","MyApp.view.OrderView.OrderHistory"
    ],
    alias: "widget.ordernavi",
    config: {
    	useTitleForBackButtonText: false,
    	defaultBackButtonText: Loc.t('BUTTON.BACK'), 
        navigationBar: {
            hidden: false,
            items: [{
                    xtype: 'button',
//                    baseCls:'orderviewBtnCls',
                    style:'border: 2px solid white;',
                    text:'<img src="img/cart_white.png" width="25px" height="25px"/>',
                    align: 'right',
                    ui:'plain',
                    height: 40,
                    itemId: 'cartBtnID',
                    id: 'cartBtnID'
                }/*{
                    xtype:'button',
                    style:'border: 2px solid white;',
                    text:'<img src="img/histroy_white.png" width="25px" height="25px"/>',
                    align: 'left',
                    ui:'plain',
                    height: 40,
                    itemId:'orderHistoryBtnID',
                    id:'orderHistoryBtnID'
                }*/]
        },
        items: [{
                xtype: 'orderviewlist',
                title: Loc.t('ORDER.TITLE'),
                style: "background-image: url('img/splash.png');",
                scrollable: {
                    indicators: false
                }
            }]
    }
});
