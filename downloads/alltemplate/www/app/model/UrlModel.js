Ext.define('MyApp.model.UrlModel', {
    extend: 'Ext.data.Model',
    config: {
        fields: [
            {name: 'urlId'},
            {name: 'iApplicationId'},
            {name: 'iAppTabId'},
            {name: 'vURLTitle'},
            {name: 'vURLLink'},
            {name: 'vURLImage'}
        ]
    }
});
  
