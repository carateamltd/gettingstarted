Ext.define('MyApp.store.NewsStore', {
    extend: 'Ext.data.Store',
    config: {
        model: 'MyApp.model.NewsModel',
        storeId:'newsstoreid',
        autoLoad:true,
        proxy: {
            type: 'localstorage',
            reader: {
                type: 'json'
            }
        }
    }
});
 