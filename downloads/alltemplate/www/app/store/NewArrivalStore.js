Ext.define('MyApp.store.NewArrivalStore', {
    extend: 'Ext.data.Store',
    config: {
        model: 'MyApp.model.NewArrivalModel',
        storeId:'newarrivalstoreid',
        autoLoad: true,
        proxy: {
            type: 'localstorage',
            reader: {
                type: 'json'
            }
        }
    }
});
 