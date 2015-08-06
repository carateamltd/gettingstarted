Ext.define('MyApp.store.Videos', {
    extend: 'Ext.data.Store',
    config: {
        model: 'MyApp.model.Video',
        storeId:'youtubestoreid',
        autoLoad: true,
        proxy: {
            type: 'localstorage',
            reader: {
                type: 'json'
            }
        }
    
    }
});
 