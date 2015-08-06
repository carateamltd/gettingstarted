Ext.define('MyApp.view.menu.MenuView', {
    extend: 'Ext.List',
    xtype: 'menuview',
    requires: ['MyApp.view.menu.OrderDetailView'],
    config: {
        store: 'orderliststoreid',
        itemTpl: '<div>\n\
                    <div style="width: 100%;text-align: center;font-family:RalewayRegular;font-weight:bold;;position: absolute;background: rgba(255, 255, 255, 0.73);padding: 5px 0px;">{vName}\n\
                    </div><img src="http://{vImage}" height="200px" width="100%" /></div>',
        items: []
    }
});