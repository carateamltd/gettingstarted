Ext.define('MyApp.store.BlogStore', {
    extend: 'Ext.data.Store',
    config: {
        model: 'MyApp.model.BlogModel',
        storeId:'blosgstoreid',
        autoLoad: true,
        proxy: {
            type: 'localstorage',
            reader: {
                type: 'json'
            }
        }
    }
});
 