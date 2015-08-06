Ext.define("MyApp.store.MenuDetailStore", {
    extend: "Ext.data.Store",
    requires: [
        'MyApp.model.MenuDetailModel'
    ],
    config: {
        model: 'MyApp.model.MenuDetailModel',
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