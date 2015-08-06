Ext.define('MyApp.store.SizeItemStore', {
    extend: 'Ext.data.Store',
    config: {
        model: 'MyApp.model.SizeItemModel',
        storeId:'sizeitemstoreid',
        autoLoad: true,
        proxy: {
            type: 'localstorage',
            reader: {
                type: 'json'
            }
        }
    }
});
 