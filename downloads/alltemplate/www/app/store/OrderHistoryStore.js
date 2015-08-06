Ext.define('MyApp.store.OrderHistoryStore', {
    extend: 'Ext.data.Store',
    config: {
        model: 'MyApp.model.OrderHistoryModel',
        storeId:'orderhistoryid',
        autoLoad: true,
        proxy: {
            type: 'localstorage',
            reader: {
                type: 'json'
            }
        }
    }
});
 