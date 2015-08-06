Ext.define('MyApp.store.QRStore', {
    extend: 'Ext.data.Store',
    config: {
        model: 'MyApp.model.QRModel',
        storeId:'qrstoreid',
        autoLoad: true,
        proxy: {
            type: 'localstorage',
            reader: {
                type: 'json'
            }
        }
    }
});
 