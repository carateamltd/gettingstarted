Ext.define('MyApp.store.ScheduleReservationStore', {
    extend: 'Ext.data.Store',
    config: {
        model: 'MyApp.model.ScheduleReservationModel',
        storeId:'schedulereservationstore',
        proxy: {
            type: 'localstorage',
            reader: {
                type: 'json'
            }
        }
    }
});
 