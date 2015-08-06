Ext.define('MyApp.store.CatalogProductStore', {
    extend: 'Ext.data.Store',
    config: {
        model: 'MyApp.model.CatalogProduct',
        autoLoad: false,
        proxy: {
            type: 'ajax',
            reader: {
                type: 'json',
                rootProperty: 'items'
            }
        }
    }
});
 