Ext.define('MyApp.store.CustomStore', {
    extend: 'Ext.data.Store',
    config: {
        model: 'MyApp.model.CustomModel',
        storeId:'customstoreid',
        autoLoad: true,
        proxy: {
            type: 'localstorage',
            reader: {
                type: 'json'
            }
        }
    }
});
 