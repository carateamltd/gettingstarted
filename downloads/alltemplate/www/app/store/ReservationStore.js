Ext.define('MyApp.store.ReservationStore', {
    extend: 'Ext.data.Store',
    config: {
        model: 'MyApp.model.ReservationModel',
        storeId:'resesrvationstoreid',
        autoLoad: true,
        proxy: {
            type: 'localstorage',
            reader: {
                type: 'json'
            }
        }
    }
});
 