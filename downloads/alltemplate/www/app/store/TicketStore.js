Ext.define('MyApp.store.TicketStore', {
    extend: 'Ext.data.Store',
    config: {
        model: 'MyApp.model.TicketModel',
        storeId:'ticketstoreid',
        autoLoad: true,
        proxy: {
            type: 'localstorage',
            reader: {
                type: 'json'
            }
        }
    }
});
 