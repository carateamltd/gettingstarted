Ext.define('MyApp.store.OrderStore', {
    extend: 'Ext.data.Store',
    config: {
        model: 'MyApp.model.OrderModel',
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
 