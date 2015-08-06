Ext.define('MyApp.store.LoyalitStore', {
    extend: 'Ext.data.Store',
    config: {
        model: 'MyApp.model.LoyalitiModel',
        storeId:'loyalitistoreid',
        autoLoad: true,
        proxy: {
            type: 'localstorage',
            reader: {
                type: 'json'
            }
        }
    }
});
 