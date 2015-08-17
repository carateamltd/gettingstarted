Ext.define('MyApp.model.MenuOfDayModel', {
    extend: 'Ext.data.Model',
    config: {
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
            {name: 'options', type: 'auto'},
            {name: 'iApplicationId', type: 'string'},
            {name: 'vItemName', type: 'auto'},
            {name: 'status', type: 'auto'}
        ]
    }
});
