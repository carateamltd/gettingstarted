Ext.define('MyApp.store.MenuStore', {
    extend: 'Ext.data.Store',
    config: {
        model: 'MyApp.model.MenuModel',
        autoLoad: false,
        proxy: {
            url: URLConstants.URL + 'action=easyapp_menu_category&iApplicationId=' + TextConstants.ApplicationId,
            type: 'ajax',
            reader: {
                type: 'json',
                rootProperty: 'items'
            }
        }
    }
});
 