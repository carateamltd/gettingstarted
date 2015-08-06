/**
 * Created by hirendave on 5/25/15.
 */
Ext.define('MyApp.store.OrderCartStore', {
    extend: 'Ext.data.Store',
    config: {
        model: 'MyApp.model.OrderCartModel',
        autoLoad: true,
        proxy: {
            type: 'localstorage',
            reader: {
                type: 'json'
            }
        }
    }
});
