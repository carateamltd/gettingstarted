Ext.define('MyApp.store.SocialMediaStore', {
    extend: 'Ext.data.Store',
    config: {
        model: 'MyApp.model.SocialMediaModel',
        storeId:'socialmediastoreid',
          autoLoad: true,
        proxy: {
            type: 'localstorage',
            reader: {
                type: 'json'
            }
        }
    }
});
 