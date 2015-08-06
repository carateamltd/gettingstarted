Ext.define('MyApp.store.ServiceStore', {
    extend: 'Ext.data.Store',
    config: {
        model: 'MyApp.model.ServiceModel',
        storeId:'servicestore',
        proxy: {
            type: 'localstorage',
            reader: {
                type: 'json'
            }
        }
    }
});
 