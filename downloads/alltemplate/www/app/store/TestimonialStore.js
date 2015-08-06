Ext.define('MyApp.store.TestimonialStore', {
    extend: 'Ext.data.Store',
    config: {
        model: 'MyApp.model.TestimonialModel',
        storeId:'testimonialstoreid',
        autoLoad: true,
        proxy: {
            type: 'localstorage',
            reader: {
                type: 'json'
            }
        }
    }
});
 