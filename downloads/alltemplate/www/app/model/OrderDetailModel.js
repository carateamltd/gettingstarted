Ext.define("MyApp.model.OrderDetailModel", {
    extend: 'Ext.data.Model',
    config: {
        idProperty: 'iItemId',
        fields: [
            {name:'iItemId', type:'int'},
            {name: 'iAppTabId', type: 'int'},
            {name: 'iMenuId', type: 'int'},
            {name: 'vImage', type: 'string'},
            {name: 'vVarient', type: 'auto'},
            {name: 'text', type: 'string'},
            {name: 'tDescription', type: 'string'},
            {name: 'fPrice', type: 'string'},
            {name: 'eStatus', type: 'string'},
            {name: 'vCurrency', type: 'string'},
            {name: 'sizes', type: 'auto'},
            {name: 'options', type: 'auto'}
        ]
    }
});