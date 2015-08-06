Ext.define('MyApp.store.CatelogSizeStore', {
    extend: 'Ext.data.Store',
    config: {
        model: 'MyApp.model.CatelogSizeModel',
        storeId:'catelogsizestoreid',
        autoLoad: true,
        proxy: {
            type: 'localstorage',
            reader: {
                type: 'json'
            }
        }
    }
});
 