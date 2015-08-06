Ext.define('MyApp.store.AddCartStore', {
    extend: 'Ext.data.Store',
    config: {
        model: 'MyApp.model.AddCartModel',
        autoLoad: true,
        proxy: {
            type: 'localstorage',
            reader: {
                type: 'json'
            }
        }
    }
});
 