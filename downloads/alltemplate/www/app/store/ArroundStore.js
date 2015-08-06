Ext.define('MyApp.store.ArroundStore', {
    extend: 'Ext.data.Store',
    config: {
        model: 'MyApp.model.ArroundusModel',
        storeId:'arroundstoreid',
        autoLoad: true,
        proxy: {
            type: 'localstorage',
            reader: {
                type: 'json'
            }
        }
    }
});
 