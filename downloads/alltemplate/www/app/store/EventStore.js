Ext.define('MyApp.store.EventStore', {
    extend: 'Ext.data.Store',
    config: {
        model: 'MyApp.model.EventModel',
        storeId:'eventstoreid',
        autoLoad: true,
        proxy: {
            type: 'localstorage',
            reader: {
                type: 'json'
            }
        }
    }
});
 