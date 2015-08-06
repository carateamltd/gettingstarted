Ext.define('MyApp.model.MenuModel', {
    extend: 'Ext.data.Model',
    config: {
        fields: [
            {name: 'iMenuID', type: 'int'},
            {name: 'iApplicationId', type: 'int'},
            {name: 'iAppTabId', type: 'int'},
            {name: 'text', type: 'string'},
            {name: 'vImage', type: 'string'},
            {name: 'vStatus', type: 'string'}
        ]
    }
});
  