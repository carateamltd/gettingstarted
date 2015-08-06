Ext.define('MyApp.store.LocationStore', {
    extend: 'Ext.data.Store',
    config: {
        model: 'MyApp.model.LocationModel',
        storeId: 'locationstoreid',
        autoLoad: true,
        proxy: {
            type: 'localstorage',
            reader: {
                type: 'json'
            }
        }
    }
});
 