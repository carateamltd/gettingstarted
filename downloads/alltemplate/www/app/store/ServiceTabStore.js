Ext.define('MyApp.store.ServiceTabStore', {
    extend: 'Ext.data.Store',
    config: {
        model: 'MyApp.model.ServiveTabModel',
        storeId:'servicetabstoreid',
        autoLoad: true,
        proxy: {
            type: 'localstorage',
            reader: {
                type: 'json'
            }
        }
    }
});
 