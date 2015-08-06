Ext.define('MyApp.store.SocialStore', {
    extend: 'Ext.data.Store',
    config: {
        model: 'MyApp.model.SocialModel',
        storeId:'socialstorid',
          autoLoad: true,
        proxy: {
            type: 'localstorage',
            reader: {
                type: 'json'
            }
        }
    }
});
 