Ext.define('MyApp.store.UrlStore', {
    extend: 'Ext.data.Store',
    config: {
        model: 'MyApp.model.UrlModel',
        storeId:'urlstoreid',
        autoLoad: true,
        proxy: {
            type: 'localstorage',            
            reader: {
                type: 'json'
            }
        }
    }
});
 