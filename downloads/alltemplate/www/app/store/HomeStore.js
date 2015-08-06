Ext.define('MyApp.store.HomeStore', {
    extend: 'Ext.data.Store',
    config: {
        model: 'MyApp.model.HomeModel',
        storeId:'homestorid',
        autoLoad: true,
        proxy: {
            type: 'localstorage',
            reader: {
                type: 'json'
            }
        }
    }
});
 