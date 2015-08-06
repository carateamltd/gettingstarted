Ext.define("MyApp.store.OrderDetailStore", {
    extend: "Ext.data.Store",
    requires: [
        'MyApp.model.OrderDetailModel'
    ],
    config: {
        model: 'MyApp.model.OrderDetailModel',
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