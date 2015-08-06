Ext.define('MyApp.store.OptionItemStore', {
    extend: 'Ext.data.Store',
    config: {
        model: 'MyApp.model.OptionItemModel',
        storeId:'optionitemstoreid',
        autoLoad: true,
        proxy: {
            type: 'localstorage',
            reader: {
                type: 'json'
            }
        }
    }
});
 