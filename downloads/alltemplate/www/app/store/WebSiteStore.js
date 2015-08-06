
Ext.define('MyApp.store.WebSiteStore', {
    extend: 'Ext.data.Store',
    config: {
        model: 'MyApp.model.WebSiteModel',
        storeId:'websitestoreid',
       autoLoad:true,
        proxy: {
            type: 'localstorage',
            reader: {
                type: 'json'
            }
        }
    }
});
 