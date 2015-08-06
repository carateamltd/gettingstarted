Ext.define('MyApp.view.menu.MenuViewList', {
    extend: 'Ext.List',
    xtype: 'menuviewlist',
	requires: ['MyApp.view.menu.MenuDetailView'],
    config: {
        store: 'MenuStore',
        itemTpl: '<div><img width="50" height="50" src="http://{vImage}" /> <span style="position: relative;top:-20px">{text}</span></div>'
    }
});