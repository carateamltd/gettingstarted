Ext.define('MyApp.store.ServiceTimingTabStore', {
    extend: 'Ext.data.Store',
    config: {
        model: 'MyApp.model.ServiceTimingTabModel',
        storeId:'servicetimingtabstoreid',
        autoLoad: true,
        proxy: {
            type: 'localstorage',
            reader: {
                type: 'json'
            }
        }
    }
});
 