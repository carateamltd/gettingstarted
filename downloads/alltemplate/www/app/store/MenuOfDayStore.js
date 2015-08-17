Ext.define("MyApp.store.MenuOfDayStore", {
    extend: "Ext.data.Store",
    requires: [
        'MyApp.model.MenuOfDayModel'
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