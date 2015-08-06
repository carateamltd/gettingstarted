Ext.define('MyApp.store.ArroundSubStore', {
    extend: 'Ext.data.Store',
    config: {
        model: 'MyApp.model.ArroundSubModel',
        storeId:'arroundsubstoreid',
        autoLoad: true,
        proxy: {
            type: 'localstorage',
            reader: {
                type: 'json'
            }
        }
    }
});
 