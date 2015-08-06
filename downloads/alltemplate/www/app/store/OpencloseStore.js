Ext.define('MyApp.store.OpencloseStore', {
    extend: 'Ext.data.Store',
    config: {
        model: 'MyApp.model.OpencloseModel',
        storeId:'openclosestoreid',
        autoLoad: true,
        proxy: {
            type: 'localstorage',
            reader: {
                type: 'json'
            }
        }
    }
});
 