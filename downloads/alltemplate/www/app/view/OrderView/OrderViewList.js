Ext.define('MyApp.view.OrderView.OrderViewList', {
    extend: 'Ext.List',
    xtype: 'orderviewlist',
    requires: ['MyApp.view.OrderView.OrderDetailView'],
    config: {
        store: 'OrderStore',
        itemTpl: '<div><img width="50" height="50" src="http://{vImage}" /> <span style="position: relative;top:-20px">{text}</span></div>'
    }
});