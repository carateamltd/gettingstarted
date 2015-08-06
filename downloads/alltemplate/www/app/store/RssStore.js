Ext.define('MyApp.store.RssStore', {
    extend: 'Ext.data.Store',
    config: {
        model: 'MyApp.model.RssModel',
        storeId:'rssstoreid',
        autoLoad: true,
        proxy: {
            type: 'localstorage',            
            reader: {
                type: 'json'
            }
        }
    }
});
 